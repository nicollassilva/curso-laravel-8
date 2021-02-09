<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all(); //Post::get()

        return view('admin.posts.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(StoreUpdatePost $request)
    {
        Post::create($request->all());

        return redirect()
                ->route('posts.index')
                ->with('message', 'Post criado com sucesso!');
    }

    public function show($id)
    {
        if(!$post = Post::find($id))
            return redirect()->route('posts.index');

        return view('admin.posts.show', [
            'post' => $post
        ]);
    }

    public function destroy($id)
    {
        if(!$post = Post::find($id))
            return redirect()->route('posts.index');

        $post->delete();

        return redirect()
                    ->route('posts.index')
                    ->with('message', 'Post deletado com sucesso!');
    }

    public function edit($id)
    {
        if(!$post = Post::find($id))
            return redirect()->back();

        return view('admin.posts.edit', [
            'post' => $post
        ]);
    }

    public function update(StoreUpdatePost $request, $id)
    {
        if(!$post = Post::find($id))
            return redirect()->back();

        $post->update($request->all());

        return redirect()
            ->route('posts.index')
            ->with('message', 'Post atualizado com sucesso!');
    }
}
