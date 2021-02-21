@extends('layouts/layout')

@section ('pageTitle','New Category')

@section('content')

<h1 class="text-center">Create a New Category</h1>

<form method="POST" action="/categories">

    {{ csrf_field() }}

    <div class="form-group">
        <label for="titleInput">Title</label>
        <input id="titleInput" type="text" name="title" placeholder="Title" class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}" onchange="setSlugField(this.value)" value="{{ old('title') }}" required>
        <small class="form-text text-muted">Enter the category title here</small>
    </div>

    <div class="form-group">
        <label for="slugInput">Slug</label>
        <input id="slugInput" type="text" name="slug" placeholder="Slug" class="form-control {{ $errors->has('slug') ? 'is-invalid' : ''}}" value="{{ old('slug') }}" readonly required>
        <small class="form-text text-muted">Slug is an autogenerated field</small>
    </div>

    <button type="submit" class="btn btn-primary" style="width: 100%;" data-toggle="modal">Create Category</button>

    @if ($errors->any())

    <div class="notification bg-danger mt-3 p-2" style="border-radius: 10px; color:white;">
        <ul>
            @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

            @endforeach
        </ul>
    </div>
    @endif

</form>

@endsection