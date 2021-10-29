@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            @include('components.session')
            <div class="card">
                <div class="card-header">
                    <div class="card-title float-left">
                        <h4>
                            <div class="">Education</div>
                        </h4>
                    </div>
                   <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-dark float-right" data-toggle="modal" data-target="#addEducationModal">
                        Add
                    </button>
                </div>
                <div class="card-body">
                    <table class="table compact hover table-sm" id="education-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<form class="delete-form" action method="post">
    @csrf
    @method('delete')
</form>
@endsection

@section('modal')
    <!-- Add Modal -->
    <div class="modal fade" id="addEducationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Group</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{ route('education.store') }}" method="post">
                @csrf
                @method('post')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" name="level" id="name" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    {{-- edit --}}
<div class="modal fade" role="dialog" tabindex="-1" id="editEducationModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
            <div class="modal-body">
                <form id="edit-form" action="" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Level</label>
                        <input type="text" name="level" id="level" class="form-control" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm  btn-light" type="button" data-dismiss="modal">Close</button>
                <button  type="button" class="btn btn-primary btn-sm confirm-edit-bnt">Save Changes</button>
            </div>
        </div>
    </div>
</div>
{{-- delete --}}
<div class="modal fade" role="dialog" tabindex="-1" id="deleteEducationModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Warning!</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
            <div class="modal-body">
                <p id="test">You are about to delete the detail permenantly !</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm  btn-light" type="button" data-dismiss="modal">Close</button>
                <button  type="button" class="btn btn-primary btn-sm confirm-delete-bnt">Confirm, Delete</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(function(){
        //edit
        $('#editEducationModal').on('shown.bs.modal', function (e) {
            let action = $(e.relatedTarget).attr('data-action');
            let value = $(e.relatedTarget).attr('data-value');
            $('#edit-form').attr('action', action);
            $('#level').val(value);
        });
        $('.confirm-edit-bnt').click(function () { 
            $('#edit-form').submit();
        });
        // delete
        $('#deleteEducationModal').on('show.bs.modal', function (e) {
            let action = $(e.relatedTarget).attr('data-action');
            $('.delete-form').attr('action', action);
        });
        $('.confirm-delete-bnt').click(function () { 
            $('.delete-form').submit();
        });
        $("#education-table").DataTable({
            processing:true,
            serverSide: true,
            ajax: "{{ route('datatables.admin.getEducations') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'level', name: 'level'},
                {data: 'created_at', name:'created_at'},
                {data: 'updated_at', name:'updated_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endsection