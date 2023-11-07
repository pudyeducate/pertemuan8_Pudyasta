<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AuthController extends Controller
{
    public function __construct()
    {
        // Apply the 'guest' middleware to both 'register' and 'login' methods
        $this->middleware('guest')->only(['register', 'login']);
    }

    //
    public function register()
    {

        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);
        if ($request->file('photo')) {
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();

            $time = time();
            $filenametostore = $filename . '_' . $time . '.' . $extension;
            $thumb = 'thumb_' . $filenametostore;
            $square = 'square_' . $filenametostore;

            $request->file('photo')->storeAs('profile', $filenametostore);
            $request->file('photo')->storeAs('profile/thumbnail', $thumb);
            $request->file('photo')->storeAs('profile/thumbnail', $square);
            $smallthumbnailpath = public_path('storage/profile/thumbnail/' . $thumb);
            $this->createThumbnail($smallthumbnailpath, 150, 93);

            $mediumthumbnailpath = public_path('storage/profile/thumbnail/' . $square);
            $this->createSquare($mediumthumbnailpath, 300, 300);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'photo' => $filenametostore
        ]);

        $details = [
            'subject' => "Konfiramsi Pendaftaran Akun",
            'body' => "konfirmasi",
            'name' => $request->name,
            'email' => $request->email
        ];
        // dispatch(new SendMailJob($details));

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('dashboard')
            ->withSuccess('You have successfully registered & logged
        in!');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')
                ->withSuccess('You have successfully logged in!');
        }
        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our
            records.'
        ])->onlyInput('email');
    }

    public function dashboard()
    {

        if (Auth::check()) {
            return view('auth.dashboard');
        }
        return redirect()->route('login')
            ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    }

    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }
    public function createSquare($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height);
        $img->save($path);
    }
}
