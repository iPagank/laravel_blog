@extends('layouts.app')

@section('content')
<div class="content">
    <div class="row justify-content-center"></div>
        <div class="col-md-12">
        <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Добавить</a>
        </nav>
        <div class="card">
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>№</th>
                            <th>Категория</th>
                            <th>Родитель</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                            <td>{{ $item->id }}</td>
                                <td>
                                <a href="{{ route('admin.categories.edit',$item->id) }}">
                                {{ $item->title }}
                                </a>
                                </td>
                                <td
                                    @if (in_array($item->parent_id,[0, 1]))
                                        style= "color: red";
                                    @endif>
                                    {{ $item->parentCategory->title }}
                                </td>
                                <td>
                                <form action="{{route('admin.categories.destroy',$item->id)}}" method="POST">
                                 @csrf
                                  @method('DELETE')

                                    <button class="btn btn-danger">Delete</button>
                                </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@if($data->total() > $data->count())
<br>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                {{ $data->links() }}
            </div>
        </div>
    </div>
</div>
@endif
</div>
@endsection
