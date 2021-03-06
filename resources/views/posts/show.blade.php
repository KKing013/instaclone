@extends('layouts.app')

@section('content')

    @include('modals.post-edit')

    @include('modals.post-delete')

    <div class="container">

        <div class="row">
            <div class="col-8">
                <img src="/storage/{{ $post->image }}" alt="" class="w-75">

            </div>

            <div class="col-4">

                <div class="d-flex align-items-center">

                    <div class="pr-3">
                        <img src="{{ $post->user->profile->profileImage() }}" alt="" class="w-100 rounded-circle"
                            style="max-width: 40px">
                    </div>

                    <div>


                        <div class="font-weight-bold">


                            <a href="/profile/{{ $post->user->id }}"><span
                                    class="text-dark">{{ $post->user->username }}


                                </span>
                            </a>



                        </div>

                    </div>



                    @if (Auth::user()->id == $post->user_id)

                        <div class="dropdown show">
                            <a class="btn btn-sm dropdown-toggle ml-4" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#posteditModal" data-toggle="modal"
                                    data-target="#posteditModal">Edit</a>
                                <a class="dropdown-item" href="#postdeleteModal" data-toggle="modal"
                                    data-target="#postdeleteModal">Delete</a>

                            </div>
                        </div>

                    @endif


                </div>

                <hr>

                <p>

                    <span class="font-weight-bold">
                        <a href="/profile/{{ $post->user->id }}">
                            <span class="text-dark">{{ $post->user->username }}</span>
                        </a>
                    </span> {{ $post->caption }}

                </p>


                @if (Auth::user()->id != $post->user_id)
                    <p> @include('posts.add-comment')</p>
                @endif


                @foreach ($post->comments as $comment)

                    @include('posts.comment')

                @endforeach

            </div>

        </div>
    </div>

@endsection
