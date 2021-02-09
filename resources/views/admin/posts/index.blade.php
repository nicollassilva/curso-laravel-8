@extends('admin.layouts.app')
@section('title', 'Página Inicial')

@section('content')
@if (session('message'))
<div style="background: green; color: white; padding: 5px 10px;">{{ session('message') }}</div>
@endif

<h1>Posts</h1><a style="background: darkgreen; color: white; padding: 10px; border: none"
    href="{{ route('posts.create') }}">Criar novo post</a>

<form action="{{ route('posts.search') }}" method="post" style="margin-top: 30px;">
    @csrf
    <input type="text" name="search" id="search" placeholder="Procure por um post">
    <button type="submit">Pesquisar</button>
</form>

<ul>
    @foreach ($posts as $post)
    <li>
        <b>{{ $post->title }} | [<a href="{{ route('posts.show', $post->id) }}">Ver</a> | <a
                href="{{ route('posts.edit', $post->id) }}">Editar</a>]</b>
        <p>{{ $post->content }}</p>
    </li>
    @endforeach
</ul>

@if(isset($filters))
{{ $posts->appends($filters)->links() }}
@else
{{ $posts->links() }}
@endif
@endsection