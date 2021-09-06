<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


class PostsController extends Controller
{

    public function __construct()

    {
        $this->middleware('auth');

        
    }

    public function welcome () {
        
        return view('welcome');
    }

    public function index() {

        $users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);

        // dd($posts[0]);

        return view('posts.index', [
            'posts' => $posts,
        ]);

    }

    public function create()
    {

        return view('posts.create');
    }

    public function store()
    {
        $attributes = request()->validate([

            'caption' => 'required',
            'image' => ['required','image']

        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $attributes['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/'. auth()->user()->id);
    }

    public function show (Post $post) 
    {

        

        
        

        return view('posts.show', [

            'post' =>  $post,
            
            
            
           
            

            
        ]);

    }

    public function edit(Post $post) {

        

        return view('posts.edit',[

            'post' => $post,

        ]);

    }

    public function update(Post $post, Request $request)
    {

        $attributes = request()->validate([

            'caption' => 'required',
            

        ]);

        $post->update($attributes);

         return back();
    }

    public function destroy(Post $post) {

        $post->delete();

        return redirect('/profile/'. auth()->user()->id);
    }
    


}
