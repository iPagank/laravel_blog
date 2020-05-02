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
    <div class="row justify-content-center">
        @if ($errors->any())
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="alert alert-danger" role="alert">
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
            @endif

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
