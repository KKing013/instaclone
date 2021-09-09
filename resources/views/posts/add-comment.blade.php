
<form method="POST" action="/p/{{ $post->id }}/comments">
    @csrf

    <header class="d-flex align-items-center">

    </header>

    <div class="form-group">

        <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Comment"
            required></textarea>
    </div>

    <div class="form-group">

        <button type="submit" class="btn btn-primary">Post</button>

    </div>

</form>
