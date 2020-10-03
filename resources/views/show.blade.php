@extends('layouts.master')
@section('title', 'Profile')
@section('content')
<div>
                    @if (session()->has('success.register'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success.register') }} Take a look at your brand new profile, {{Auth::user()->name}}!
                        </div>
                    @endif
</div>
    <div class="profile">
        <h1 class="page-header">{{Auth::user()->name}}'s Profile</h1>
        <div class="row">
            <div class="col-md-4">
                <img src="{{Auth::user()->photo}}" class="img-thumbnail" alt="">
            </div>
            <div class="col-md-8">
                <ul>
                    <li><a href="/profile/edit" class="btn btn-warning">Edit Profile</a></li>
                    <li><strong>Name : </strong>{{Auth::user()->name}}</li>
                    <li><strong>Username : </strong>{{Auth::user()->username}} </li>
                    <li><strong>Email : </strong>{{Auth::user()->email}}</li>
                    <li><strong>Address : </strong>{{Auth::user()->address}}</li>
                    <li><strong>Birthday : </strong>{{Auth::user()->birthdate}}</li>
                    <li><strong>Followers : </strong>{{Auth::user()->followers}}</li>
                    <li><strong>Following : </strong>{{Auth::user()->following}}</li>
                </ul>
            </div>
        </div><br><br>
        <div>
            <div class="col-md-12">
                <div class="panel panel-default post">
                    <div class="panel-heading">
                        <h3 class="panel-title">Posts</h3>
                    </div>
                    @forelse ($posts as $post)
                    <div class="panel panel-default post">
                    <div class="row">
                        <div class="col-sm-2">
                                <a href="{{ url('profile') }}" class="post-avatar thumbnail"><img src="{{Auth::user()->photo}}" alt="">
                                    <div class="text-center"> {{Auth::user()->username}} </div>
                                </a>
                                <div class="likes text-center">7 Likes</div>
                                </div>
                    <div class="panel-body">
                        {{$post->body}}
                    </div>
                    </div>
                    </div>
                    @empty
                    <div class="panel-body">
                        This user has not posted anything yet.
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
