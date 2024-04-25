<button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete_{{$type}}_{{$data->id}}">
    Delete
</button>


<div class="modal fade" id="delete_{{$type}}_{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Training Edge Consulting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route($routes,$data->id)}}" method="post">
                @method('DELETE')
                @csrf
                <div class="modal-body">
                    <h3>Are You Sure You want to Delete!</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </div>
            </form>


        </div>
    </div>
</div>