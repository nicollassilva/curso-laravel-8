<h1>Editando post <b>{{ $post->title }}</b></h1>

@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <li style="color: red">{{ $error }}</li>
        @endforeach
    </div>
@endif
<form action="{{ route('posts.update', $post->id) }}" method="post">
    @csrf
    @method('PUT')
    <input type="text" name="title" id="title" placeholder="Titulo" value="{{ $post->title ?? old('title') }}">
    <textarea name="content" id="content" cols="30" rows="4" placeholder="Conteúdo">{{ $post->content ?? old('content') }}</textarea>
    <button type="submit">Enviar</button>
</form>