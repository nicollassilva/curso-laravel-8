@extends('admin.layouts.app')
@section('title', "Editar post: {$post->title}")

@section('content')
<h1>Editando post <b>{{ $post->title }}</b></h1>


<form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @include('admin.posts.partials.form')
</form>
@endsection