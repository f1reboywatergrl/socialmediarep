@extends('layouts.master')
@section('title', 'Edit Post')
@section('content')
<div class="clearfix"></div>
    <div class="panel-heading">
        <h3 class="panel-title">Edit your post</h3>
    </div>
    <div class="panel-body">
        <form role = "form" method="POST" action="/index/{{$post->id}}/edit">
        {{ csrf_field() }}  
        @method('PUT') 
        <input type="hidden" name="_method" value="PUT">

            <div class="form-group">
                <textarea class="form-control" placeholder="What's on your mind?" id="body" name ='body' value ="{{old('body','')}}">{{old('body',$post->body)}} </textarea>
            @error('body')
                <div class ="alert alert-danger">You cannot post an empty post!</div>
            @enderror                
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Attach a photo..." id="photo" name ='photo' value ="{{old('photo','')}}">{{old('post_photo',$post->post_photo)}}</input>             
            </div>

            <button type="submit" class="btn btn-warning">Finalize</button>
            <div class="pull-right hidden">
                <div class="btn-toolbar">
                    <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i>Text</button>
                    <button type="button" class="btn btn-default"><i class="fa fa-file-image-o"></i>Image</button>
                    <button type="button" class="btn btn-default"><i class="fa fa-file-video-o"></i>Video</button>
                </div>
            </div>
        </form>
    </div>

@endsection