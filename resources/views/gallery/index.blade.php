@extends('layouts.app')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <a href="/gallery/create" class="btn btn-primary mb-3">Add image</a>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
            <div class="card">
                <div class="card-header">Dashboard</div>
               
                <div class="card-body">
                    <div class="row">
               
                        @if (count($items) > 0)
                            @foreach ($items as $gallery)

                                <div class="col-sm-2">
                                    <div class="d-flex flex-column align-items-center">
                                        <a class="example-image-link"
                                            href="{{ $gallery['picture']}}"
                                            data-lightbox="roadtrip" data-title="">
                                            <img class="example-image img-fluid mb-2"
                                                src="{{$gallery['picture'] }}"
                                                alt="image-1" />
                                        </a>
                                        <div class="d-flex gap-3">
                                            <a href="{{ route('gallery.edit', ['gallery' => $gallery['id']]) }}"
                                                class="btn btn-warning">Edit</a>
                                            <form method="POST"
                                                action="{{ route('gallery.destroy', ['gallery' => $gallery['id']]) }}">
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
                            {{ $items->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
