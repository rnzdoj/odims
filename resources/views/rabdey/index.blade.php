@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('components.session')
            <div class="card">
                <div class="card-header">
                    <h3 class="float-left">
                        Rabdey List
                    </h3>
                    @can('create', App\Models\Rabdey::class)
                    <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addRabdeyModal">
                        Add
                    </button>
                    @endcan
                </div>
                <div class="card-body">
                    <table class="table compact table-sm display mb-5 table-responsive-md" id="rabdey-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Total Dratshang</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
 <!-- Add Modal-->
 @can('create', App\Models\Rabdey::class)     
 <div class="modal fade" id="addRabdeyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Rabdey</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="{{ route('rabdey.store') }}" method="POST">
            @csrf
            @method('post')
        <div class="modal-body">
            <div class="form-group">
                <label for="">Rabdey Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-sm btn-primary">Save</button>
        </form>
        </div>
    </div>
    </div>
</div>
@endcan

<div class="modal fade" id="editRabdeyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Rabdey </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="edit-rabdey-form" action="" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="rabdey-name">Name</label>
                    <input type="text" name="name" id="rabdey-name" class="form-control">
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-sm btn-primary update-btn">Save changes</button>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" role="dialog" tabindex="-1" id="deleteRabdeyModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Warning!</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
            <div class="modal-body">
                <p id="test">You are about to delete the detail permenantly! and all the details realeted to to this rabdey, such as dratshang</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm  btn-light" type="button" data-dismiss="modal">Close</button>
                <button  type="button" class="btn btn-primary btn-sm confirm-delete-bnt">Confirm, Delete</button>
            </div>
        </div>
    </div>
</div>
<form class="delete-form" action method="post">
    @csrf
    @method('delete')
</form>
@endsection

@section('script')
<script>
    $(function(){
        $('#rabdey-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route('datatables.getRabdeys') !!}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'totalDratshang', name: 'totalDratshang' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ],
        });
        $("#editRabdeyModal").on('shown.bs.modal', function(e){
            $("#edit-rabdey-form").attr('action', $(e.relatedTarget).attr('data-action'));
            $("#rabdey-name").val($(e.relatedTarget).attr('data-name'));
        });
        $('.update-btn').on('click', function(e){
            e.preventDefault();
            $("#edit-rabdey-form").submit();
        });
         $('#deleteRabdeyModal').on('show.bs.modal', function (e) {
            let action = $(e.relatedTarget).attr('data-action');
            $('.delete-form').attr('action', action);
        });
        $('.confirm-delete-bnt').click(function () { 
            $('.delete-form').submit();
        });
    });
</script>
@endsection