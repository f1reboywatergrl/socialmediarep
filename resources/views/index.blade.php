@extends('layouts.master')
@section('title', 'Home')
@section('content')
    <div>
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }} {{Auth::user()->name}}.
                        </div>
                    @elseif (session('post_success'))
                    <div class="alert alert-success" role="alert">
                            {{ session('post_success') }}
                    </div> 
                    @elseif (session('del_success'))
                    <div class="alert alert-success" role="alert">
                            {{ session('del_success') }}
                    </div>
                    @elseif (session('updatepost_success'))
                    <div class="alert alert-success" role="alert">
                            {{ session('updatepost_success') }}
                    </div>
                    @elseif (session('like_success'))
                    <div class="alert alert-success" role="alert">
                            {{ session('like_success') }}
                    </div>                                 
                    @endif
    </div>
    <div class="panel panel-default">

    <div class="clearfix"></div>
        <div class="panel-heading">
            <h3 class="panel-title">Wall</h3>
        </div>
        <div class="panel-body">
            <form role = "form" method="POST" action="/index">
            @csrf
                <div class="form-group">
                    <textarea class="form-control" placeholder="What's on your mind?" id="body" name ='body' value ="{{old('body','')}}"></textarea>
                @error('body')
                    <div class ="alert alert-danger">You cannot post an empty post!</div>
                @enderror                
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Attach a photo..." id="photo" name ='photo' value ="{{old('photo','')}}"></input>             
                </div>

                <button type="submit" class="btn btn-default">Post</button>
                <div class="pull-right hidden">
                    <div class="btn-toolbar">
                        <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i>Text</button>
                        <button type="button" class="btn btn-default"><i class="fa fa-file-image-o"></i>Image</button>
                        <button type="button" class="btn btn-default"><i class="fa fa-file-video-o"></i>Video</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @forelse ($posts as $key=>$post)
    <div class="panel panel-default post">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-2">
                    <a href="{{ url('profile') }}" class="post-avatar thumbnail"><img src="{{$user_and_posts[$key]->photo}}" alt="">
                        <div class="text-center"> {{$user_and_posts[$key]->username}} </div>
                    </a>
                    <form action="{{route('post.like',$post_likes[$key]->post_id)}}" method="POST"><!--{{route('post.like',[$post_likes[$key]->post_id]) }}-->
                        @csrf
                        @method('PUT')
                        <div class="likes text-center"><a href="/index/{{$post_likes[$key]->post_id}}/like" class="btn btn-success btn-sm mr-1" value="{{$post_likes[$key]->post_id}}">Like | {{$post_likes[$key]->like}} </a></div>
                    </form>
                </div>
                <div class="col-sm-10">
                    <div class="bubble">
                        <div class="pointer">
                            <p> {{$post->body}} </p>
                        </div>
                        <div class="pointer-border"></div>
                    </div>
                    <p class="post-actions">
                    
                    @if (Auth::id()==$user_and_posts[$key]->profil_id)
                    <form action="/index" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="/index/{{$post->id}}/edit" class="btn btn-warning btn-sm mr-1">Edit Post</a>
                        <button type="submit" class="btn btn-danger btn-sm" value="{{$user_and_posts[$key]->id}}" id="del", name="del">Delete Post</button>
                    </form>
                    @endif
                    </p>
                    <div class="comment-form">
                        <form class="form-inline">
                        @csrf
                            <div class="form-group">
                                <input type="text" id="comment" name="comment" class="form-control" value ="{{old('comment','')}}" placeholder="enter comment"></input>
                                @error('comment')
                                <div class ="alert alert-danger">You cannot comment an empty post!</div>
                                @enderror                                  
                            </div>
                            <button type="submit" class="btn btn-default">Add</button>
 
                        </form>
                    </div>
                    <div class="clearfix"></div>

                </div>
            </div>
        </div>
    </div>
    @empty
    <div> No Posts yet. Be the first to post! </div>
    @endforelse
    
@endsection
