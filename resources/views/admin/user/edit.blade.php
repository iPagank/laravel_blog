@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit user {{ $user->name }}</div>
                <div class="card-body">
                    <form action="{{route('admin.user.update', $user->id)}}" method="post">
                    @csrf
                    @method('PUT')

                    @foreach ($roles as $item)


                        <div class="form-check">
                            <input type="checkbox" name="roles[]" value="{{$item->id}}"
                                {{ ($user->role->pluck('id')->contains($item->id)) ? 'checked' : '' }}
                            >
                            <label>{{$item->name}}</label>
                        </div>

                    @endforeach
                    <button class="btn btn-primary">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
