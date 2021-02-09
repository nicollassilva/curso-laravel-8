<h1>Exibindo o post: {{ $post->title }}</h1>[<a href="{{ route('posts.index') }}">Voltar</a> | <a href="{{ route('posts.edit', $post->id) }}">Editar</a>]
<ul>
    <li>Conteúdo:</li>
    <li>{{ $post->content }}</li>
</ul>

<form action="{{ route('posts.destroy', $post->id) }}" method="post">
    @method('DELETE')
    @csrf
    <button type="submit" style="background: red; color: white; padding: 5px; border: none; cursor: pointer;">Deletar</button>
</form>