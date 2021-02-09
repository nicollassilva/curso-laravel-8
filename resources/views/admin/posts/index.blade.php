@if (session('message'))
    <div style="background: green; color: white; padding: 5px 10px;">{{ session('message') }}</div>
@endif

<h1>Posts</h1><a href="{{ route('posts.create') }}">Criar novo post</a>

<ul>
@foreach ($posts as $post)
    <li>
        <b>{{ $post->title }} | [<a href="{{ route('posts.show', $post->id) }}">Ver</a> | <a href="{{ route('posts.edit', $post->id) }}">Editar</a>]</b>
        <p>{{ $post->content }}</p>
    </li>
@endforeach
</ul>