@extends('layouts.app')

@section('content')

<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Roles</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
      <tr>
      <th scope="row">{{$item->id}}</th>
        <td>{{$item->name}}</td>
        <td>{{$item->email}}</td>
        <td>{{implode(', ',$item->role()->get()->pluck('name')->toArray())}}</td>
      <td><a class="btn btn-warning" href="{{ route('admin.user.edit',$item->id) }}">Edit</a></td>
      <form action="{{route('admin.user.destroy',$item->id)}}" method="post">
          @csrf
          @method("DELETE")
          <td><button class="btn btn-danger">Delete</button></td>
      </form>
    </tr>
      @endforeach
    </tbody>
  </table>

@endsection
