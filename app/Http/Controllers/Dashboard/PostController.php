<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(3);
        return view('dashboard.post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::pluck('id', 'title');
        $post = new Post();

        echo view('dashboard.post.create', compact('categories', 'post'));
    }


    public function store(StoreRequest $request)
    {
        // $data = array_merge($request->all(), ['image' => '']);

        Post::create($request->validated());
        return to_route("post.index")->with('status', 'Register Create.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        echo view('dashboard.post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::pluck('id', 'title');

        echo view('dashboard.post.edit', compact('categories', 'post'));
    }

    public function update(PutRequest $request, Post $post)
    {
        $data = $request->validated();
        if (isset($data["image"])) {
            $data["image"] =  $filename = time().".".$data["image"]->extension();
            $request->image->move(public_path("image"), $filename);
        }
        $post->update($data);
        return to_route("post.index")->with('status', 'Register Updade.');

    }

    public function destroy(Post $post)
    {
        $post->delete();
        return to_route("post.index")->with('status', 'Register Delete');

    }
}
