<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\URL;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{

    public function index(User $user)
    {

        $postCount = Cache::remember(
            'count.posts' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->posts->count();
            }
        );

        $followersCount = Cache::remember(
            'count.followers' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->profile->followers->count();
            }
        );

        $followingCount = Cache::remember(
            'count.following' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->following->count();
            }
        );

       $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        return view('profiles.index', [


            'user' => $user,
            'follows' => $follows,
            'postCount' => $postCount,
            'followersCount' => $followersCount,
            'followingCount' => $followingCount,


        ]);
    }

    public function edit(User $user)
    {

        $this->authorize('update', $user->profile);

        return view('profiles.edit', [

            'user' => $user,

        ]);
    }

    public function update(User $user)
    {

        $this->authorize('update', $user->profile);

        $attributes = request()->validate([

            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',

        ]);

        if (request('image')) {

            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);

            $image->save();

            $imageArray = ['image' => $imagePath];
        }



        auth()->user()->profile()->update(array_merge($attributes, $imageArray ?? []));

        return redirect("/profile/{$user->id}");
    }
}
