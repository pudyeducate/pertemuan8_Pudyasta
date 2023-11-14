@extends('layouts.app')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <a href="/gallery/create" class="btn btn-primary mb-3">Add image</a>
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <div class="row">
                        @if (count($galleries) > 0)
                            @foreach ($galleries as $gallery)
                                <div class="col-sm-2">
                                    <div class="d-flex flex-column align-items-center">
                                        <a class="example-image-link"
                                            href="{{ asset('storage/posts_image/' . $gallery->picture) }}"
                                            data-lightbox="roadtrip" data-title="">
                                            <img class="example-image img-fluid mb-2"
                                                src="{{ asset('storage/posts_image/' . $gallery->picture) }}"
                                                alt="image-1" />
                                        </a>
                                        <div class="d-flex gap-3">
                                            <a href="{{ route('gallery.edit', ['gallery' => $gallery->id]) }}"
                                                class="btn btn-warning">Edit</a>
                                            <form method="POST"
                                                action="{{ route('gallery.destroy', ['gallery' => $gallery->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h3>Tidak ada data.</h3>
                        @endif
                        <div class="d-flex">
                            {{ $galleries->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection