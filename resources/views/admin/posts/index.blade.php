<h1>Posts</h1><a href="{{ route('posts.create') }}">Criar novo post</a>

<ul>
@foreach ($posts as $post)
    <li>
        <b><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></b>
        <p>{{ $post->content }}</p>
    </li>
@endforeach
</ul>