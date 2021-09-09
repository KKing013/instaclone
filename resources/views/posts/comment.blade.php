<div class="row d-flex justify-content-start">
    <div class="col-lg-8 col-lg-12">
        <div class="card shadow-0 border" style="background-color: #f0f2f5;">

            <div class="card-body p-2">

                <div class="card mb-1">

                    <div class="card-body">


                        <div class="d-flex justify-content-between">


                            <div class="d-flex flex-row align-items-center">

                                <img src="{{ $comment->user->profile->profileImage() }}" alt=""
                                    class="w-100 rounded-circle" style="max-width: 40px">

                                <a href="/profile/{{ $comment->user->id }}">
                                    <p class="font-weight-bold text-dark small mb-0 ms-2 ml-2">
                                        {{ $comment->user->username }}


                                    </p>
                                </a>


                            </div>

                        </div>

                        <p class="mt-2"> {{ $comment->body }}</p>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
