<h1>Cadastrar novo post</h1>

@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <li style="color: red">{{ $error }}</li>
        @endforeach
    </div>
@endif
<form action="{{ route('posts.store') }}" method="post">
    @csrf
    <input type="text" name="title" id="title" placeholder="Titulo" value="{{ old('title') }}">
    <textarea name="content" id="content" cols="30" rows="4" placeholder="Conteúdo">{{ old('content') }}</textarea>
    <button type="submit">Enviar</button>
</form>