@extends('layouts.master')
@section('title', 'Member')
@section('content')
    <div class="members">
    <h1 class="page-header">Members</h1>    
        @forelse($profiles as $user)
        <div class="row member-row">
            <div class="col-md-3"> <!-- {{$user->photo}} -->
                <img src="{{$user->photo}}" class="img-thumbnail" alt="">
                <div class="text-center">
                    {{$user->name}}
                </div>
                <div class="text-center">
                    Username: {{$user->username}}
                </div>
            </div>
            <div class="col-md-3">
                <p><a href="#" class="btn btn-success btn-block"><i class="fa fa-users"></i> Follow User</a></p>
            </div>
            <div class="col-md-3">
                <p><a href="#" class="btn btn-default btn-block"><i class="fa fa-envelope"></i> View users</a></p>
            </div>
            <div class="col-md-3">
                <p><a href="#" class="btn btn-primary btn-block"><i class="fa fa-edit"></i> View Profile</a></p>
            </div>
        </div>
        @empty
        <div class="col-md-6"> No Data </div>
        @endforelse
    </div>
@endsection
