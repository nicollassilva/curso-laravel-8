<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdatePost;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(); //Post::get()

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
        $data = $request->all();

        if($request->image->isValid()) {
            $nameImage = Str::slug($request->title, '-') . ".{$request->image->getClientOriginalExtension()}";
            $image = $request->image->storeAs('posts', $nameImage);
            $data['image'] = $image;
        }

        Post::create($data);

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

        if(Storage::exists($post->image))
            Storage::delete($post->image);

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
            
        $data = $request->all();

        if($request->image && $request->image->isValid()) {
            if(Storage::exists($post->image))
                Storage::delete($post->image);

            $nameImage = Str::slug($request->title, '-') . ".{$request->image->getClientOriginalExtension()}";

            $image = $request->image->storeAs('posts', $nameImage);
            $data['image'] = $image;
        }

        $post->update($data);

        return redirect()
            ->route('posts.index')
            ->with('message', 'Post atualizado com sucesso!');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $posts = Post::where('title', 'LIKE', "%{$request->search}%")
                        ->orWhere('content', 'LIKE', "%{$request->search}%")
                        ->paginate();

        return view('admin.posts.index', [
            'posts' => $posts,
            'filters' => $filters
        ]);     
    }
}
