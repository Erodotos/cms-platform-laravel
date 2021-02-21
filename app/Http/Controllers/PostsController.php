<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;

use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Contracts\Service\Attribute\Required;

class PostsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::paginate(5);

        return view('posts/index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('posts/create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $attributes = request()->validate([
            'title' => 'required | min:3 | max:60',
            'subtitle' => 'required | min:3 | max:60',
            'slug' => 'required',
            'content' => 'required | min:3 | max:3000',
            'publish_at' => 'required',
        ]);

        $post = new Post();

        $post->title =  $attributes['title'];
        $post->subtitle =  $attributes['subtitle'];
        $post->slug =  $attributes['slug'];
        $post->content =  $attributes['content'];
        $post->publish_at =  $attributes['publish_at'];

        if ($request->file) {
            $fileName = time() . '.' . $request->file->extension();

            $request->file->move(public_path('uploads'), $fileName);

            $post->file = $fileName;
        }

        $post->save();

        $categories = Category::find($request['categories']);
        $post->categories()->attach($categories);



        // return response()->json(['status' => "success", 'user_id' => $post->id]);
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts/show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts/edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update(request(['title', 'subtitle', 'slug', 'content', 'publish_at']));
        $post->categories()->sync($request['categories']);

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        $post->delete();

        return redirect('/posts');
    }
}
