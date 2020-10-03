@extends('layouts.master')
@section('title', 'Photo')
@section('content')
    <h1 class="page-header">Photos</h1>
    @forelse ($photos as $key=>$photo)
    <ul class="photos gallery-parent">
        <li><a href="img/sample1.jpg" data-hover="tooltip" data-placement="top" title="image" data-gallery="mygallery"
                data-parent=".gallery-parent" data-title="title" data-footer="this is a footer" data-toggle="lightbox"><img
                    src="img/sample1.jpg" class="img-thumbnail" alt=""></a></li>
    </ul>
    @empty
    <div> No photos yet. Be the first to post! </div>
    @endforelse
@endsection
