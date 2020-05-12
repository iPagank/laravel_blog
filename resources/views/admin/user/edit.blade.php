@extends('layouts.app')

@section('content')

<div class="container">
            <div class="row justify-content-center">
            <div class="col-md-7 mb-4">
               <a href="{{route('admin.user.index')}}" class="btn btn-primary">
                   <svg class="bi bi-arrow-left" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                       <path fill-rule="evenodd" d="M5.854 4.646a.5.5 0 010 .708L3.207 8l2.647 2.646a.5.5 0 01-.708.708l-3-3a.5.5 0 010-.708l3-3a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                       <path fill-rule="evenodd" d="M2.5 8a.5.5 0 01.5-.5h10.5a.5.5 0 010 1H3a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
                     </svg>
               </a>
            </div>
        </div>

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
