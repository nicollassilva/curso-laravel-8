@extends('admin.layouts.app')
@section('title', 'Criar novo Post')

@section('content')
<h1>Cadastrar novo post</h1>

@if ($errors->any())
<div>
    @foreach ($errors->all() as $error)
    <li style="color: red">{{ $error }}</li>
    @endforeach
</div>
@endif
<form action="{{ route('posts.store') }}" method="post">
    @include('admin.posts.partials.form')
</form>
@endsection