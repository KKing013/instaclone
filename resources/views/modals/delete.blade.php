<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">You sure?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

       <div class="modal-body">




           <form action="/p/{{ $post->id }}" method="POST">
               @csrf
               @method('DELETE')
               <button type="submit" class="btn btn-danger ml-4">Delete</button>
           </form>

            









       </div>

    </div>
</div>
</div>
<!-- Modal -->