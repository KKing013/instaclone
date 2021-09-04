    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <form action="/p/{{ $post->id }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="row">

                        <div class="col-8 offset-2">



                            <div class="form-group row">



                                <input id="caption" type="text"
                                    class="form-control @error('caption') is-invalid @enderror"
                                    name="caption" value="{{ old('caption') ?? $post->caption }}"
                                    autocomplete="off" autofocus>

                                @error('caption')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>



                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>




                        </div>

                    </div>

                </form>









            </div>

        </div>
    </div>
</div>
<!-- Modal -->