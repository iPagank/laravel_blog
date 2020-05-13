@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <h1>Main Admin Panel</h1>
            <div class="row">
            <a href="{{route('admin.user.index')}}">
                <div class="col">
                    <img src="{{URL::asset('/img/user_admin.png')}}" height="200" width="200">
                    <h5><a href="{{route('admin.user.index')}}">User Panel</a></h5>
                </div>
            </a>
            <a href="{{route('admin.post.index')}}">
                <div class="col">
                    <img src="{{URL::asset('/img/post_admin.png')}}" height="200" width="200">
                    <h5><a href="{{route('admin.post.index')}}">Post Panel</a></h5>
                </div>
            </a>
            <a href="{{route('admin.categories.index')}}">
                <div class="col">
                    <img src="{{URL::asset('/img/category_admin.png')}}" height="200" width="200">
                    <h5><a href="{{route('admin.categories.index')}}">Category Panel</a></h5>
                </div>
            </a>
            </div>
        </div>
    </div>
</div>
@endsection
