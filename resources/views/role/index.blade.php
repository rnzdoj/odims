@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            @include('components.session')
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Change User Role</div>
                </div>
                <div class="card-body">
                    <table id="user-table" class="table table-sm hover">
                        <thead>
                            <tr>
                                <th>Cid</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
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
<!-- Modal -->
<div class="modal fade" id="editUserRoleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit User Role</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <Form id="edit-user-role-form" action="" method="POST">
            @csrf
            @method('put')
            <div class="modal-body">
                <div class="form-group">
                    <label for="role">role</label>
                    <select name="role" id="role" class="form-control">
                        <option value=""></option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-primary save-changes">Save changes</button>
            </div>
        </Form>
      </div>
    </div>
  </div>
@endsection
@section('script')
<script>
    $(function(){
        $('#user-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("datatables.admin.getUsers") }}',
            columns: [
                {data: 'cid',name:'cid'},
                {data: 'name',name:'name'},
                {data: 'email',name:'email'},
                {data: 'role',name:'role'},
                {data: 'action',name:'action', orderable:false, searchable: false},
            ],
        });
        $('#editUserRoleModal').on('shown.bs.modal',function(e){
            e.preventDefault();
            let action = $(e.relatedTarget).attr('data-action');
            console.log(action);
            $('#edit-user-role-form').attr('action',action);
            $.get('/role',function(data){
                let option = "";
                console.log(data[0].id);
                for(let i = 0; i < data.length; i++){
                    option = option + `<option value="${data[i].id}"> ${data[i].name}</option>`;
                }
                $('#role').empty().append(option);
            });
        });
        $('.save-changes').click(function(e){
            e.preventDefault();
            $('#edit-user-role-form').submit();
        });
    });
</script>
@endsection