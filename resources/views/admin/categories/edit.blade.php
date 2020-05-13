@extends('layouts.app')

@section('content')
@if ($item->exists)

    <form action="{{ route('admin.categories.update', $item->id) }}" method="post">
        @method('PATCH')
@else
<form action="{{ route('admin.categories.store') }}" method="post">
@endif
 @csrf
<div class="container">

        <div class="row">
        <div class="col ml-5 mb-4">
           <a href="{{route('admin.categories.index')}}" class="btn btn-primary">
               <svg class="bi bi-arrow-left" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                   <path fill-rule="evenodd" d="M5.854 4.646a.5.5 0 010 .708L3.207 8l2.647 2.646a.5.5 0 01-.708.708l-3-3a.5.5 0 010-.708l3-3a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                   <path fill-rule="evenodd" d="M2.5 8a.5.5 0 01.5-.5h10.5a.5.5 0 010 1H3a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
                 </svg>
           </a>
        </div>
    </div>



    @if ($errors->any())
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                    {{ $errors->first() }}
                </div>
            </div>
        </div>
        @endif
            @if (session('success'))
            <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">x</span>
                            </button>
                            {{ session()->get('success') }}
                        </div>
                    </div>
            </div>
            @endif

<div class="row justify-content-center">

        <div class="col-md-8">
            @include('admin.categories.includes.edit_main_col')
        </div>
        <div class="col-md-3">
            @include('admin.categories.includes.edit_side_col')
        </div>
    </div>
</div>
</form>
@endsection
