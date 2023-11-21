<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page = LengthAwarePaginator::resolveCurrentPage();
        $response = Http::get("http://127.0.0.1:8000/api/gallery?page=" . $request->page);
        if ($response->successful()) {
            $galleries = $response->json()['data'];
            $paginator = new LengthAwarePaginator($galleries['data'], $galleries['total'],   10, $page, [
                'path' => LengthAwarePaginator::resolveCurrentPath(),
            ]);
            return view('gallery.index', ['items' => $paginator]);
        } else {
            abort(500, 'Failed to retrieve data from the API');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'picture' => 'image|required'
        ]);


        $file = request('picture');
        $file_path = $file->getPathname();
        $file_mime = $file->getMimeType('image');
        $file_uploaded_name = $file->getClientOriginalName();

        $client = new \GuzzleHttp\Client();
        $res = $client->request("POST", "http://127.0.0.1:8000/api/gallery", [
            'multipart' => [
                [
                    'name' => 'file',
                    'filename' => $file_uploaded_name,
                    'Mime-Type' => $file_mime,
                    'contents' => fopen($file_path, 'r'),
                ], [
                    'name' => "title",
                    'contents' => $request->title,
                ],
                [
                    'name' => "description",
                    'contents' => $request->description,
                ],
            ]
        ]);
        if ($res->getStatusCode() == 200) {
            return redirect('gallery')->with('success', 'Berhasil menambahkan data baru');
        } else {
            return redirect()->back()->withErrors(['custom_error' => 'Upload gagal']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $post = Http::get("http://127.0.0.1:8000/api/gallery/" . $id)->json()['data'];
        return view('gallery.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title' => 'max:255',
            'description' => '',
            'picture' => 'image'
        ]);
        $client = new \GuzzleHttp\Client();
        $url = "http://127.0.0.1:8000/api/gallery/" . $id;

        if ($request->hasFile('picture')) {
            $file = request('picture');
            $file_path = $file->getPathname();
            $file_mime = $file->getMimeType('image');
            $file_uploaded_name = $file->getClientOriginalName();

            $res = $client->request("POST", $url, [
                'multipart' => [
                    [
                        'name' => 'file',
                        'filename' => $file_uploaded_name,
                        'Mime-Type' => $file_mime,
                        'contents' => fopen($file_path, 'r'),
                    ], [
                        'name' => "title",
                        'contents' => $request->title,
                    ],
                    [
                        'name' => "description",
                        'contents' => $request->description,
                    ],
                ]
            ]);
        } else {
            $res = $client->request("POST", $url, [
                'multipart' => [
                    [
                        'name' => "title",
                        'contents' => $request->title,
                    ],
                    [
                        'name' => "description",
                        'contents' => $request->description,
                    ],
                ]
            ]);
        }

        if ($res->getStatusCode() == 200) {
            return redirect('gallery')->with('success', 'Berhasil mengupdate data ');
        } else {
            return redirect()->back()->withErrors(['custom_error' => 'Update gagal']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete("http://127.0.0.1:8000/api/gallery/{$id}");
        if ($response->successful()) {
            return redirect()->route('gallery.index')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('gallery.index')->with('error', 'Data tidak ditemukan');
        }
    }
}
