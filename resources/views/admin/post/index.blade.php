@extends('layouts.app')
    @section('content')
        <div class="container">
            @if (session('success'))
                <div class="row justify-content-center">
                    <div class="col-md-12">
                    <h1>{{session()->get('success')}}</h1>
                    </div>
                </div>
            @endif
            @if ($errors->any())
                <div class="row justify-content-center">
                    <div class="col-md-12">
                    <h1>{{$errors->first()}}</h1>
                    </div>
                </div>
            @endif

            <div class="row justify-content-center">

                <div class="col-md-12">
                    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a href="{{route('admin.post.create')}}" class="btn btn-primary">Создать новую статью</a>
                    </nav>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Автор</th>
                                        <th>Категория</th>
                                        <th>Заголовок</th>
                                        <th>Дата публикации</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($posts as $post)

                                        <tr @if (!$post->is_published) style="background-color: #ccc;" @endif>
                                        <td>{{$post->id}}</td>
                                        <td>{{$post->user->name}}</td>
                                        <td>{{$post->category->title}}</td>
                                            <td>
                                            <a href="{{route('admin.post.edit',$post->id)}}">{{$post->title}}</a>
                                            </td>
                                            <td>
                                            <form action="{{route('admin.post.destroy',$post->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                            </form>
                                            </td>
                                        <td>{{ $post->is_published ? \Carbon\Carbon::parse($post->published_at)->format('d.M H:i'):'' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot></tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @if ($posts->total() > $posts->count())
                <br>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                {{ $posts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @endsection
