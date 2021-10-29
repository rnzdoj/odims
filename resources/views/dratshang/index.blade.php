@extends('layouts.app')
@section('content')
    @can('admin')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @include('components.session')
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title float-left">
                                <h4>
                                    <div class="">Dratshang List</div>
                                </h4>
                            </div>
                            <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#addDratshangModal">
                                Add
                            </button>
                        </div>
                        <div class="card-body">
                            <table id="dratshang-table" class="table table-sm compact hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Rabdey</th>
                                        <th>Group</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form class="delete-form" action="" method="post">
            @csrf
            @method('delete')
        </form>
    @elsecan('manager')
        <div class="container w-75">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <table id="dratshang-table" class="table compact">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Total Monks</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan
@endsection

@section('modal')
@can('admin')
<!-- Add Modal -->
<div class="modal fade" id="addDratshangModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Dratshang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('dratshang.store') }}" method="POST">
                @csrf
                @method('post')
                <div class="form-group">
                    <label for="dratshang">Dratshang</label>
                    <input type="text" name="dratshang" id="dratshang" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="rabdey">Rabdey</label>
                    <select name="rabdey" id="rabdey" class="form-control" required>
                        <optgroup id="rabdey-optgroup" label="rabdey">
                        </optgroup>
                    </select>
                </div>
                <div class="form-group">
                    <label for="group">group</label>
                    <select name="group" id="group" class="form-control" required>
                        <optgroup id="group-optgroup" label="group">
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-primary">Add</button>
            </form>
        </div>
    </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="deleteDratshangModal">
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
@endcan
@endsection

@section('script')
@can('manager')
<script>
    $(function(){
        $('#dratshang-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route('datatables.manager.getDratshangs',$id ?? '') !!}",
            columns:[
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name'},
                { data: 'totalMonk', name: 'totalMonk'},
            ],
        });
    });
</script>
@elsecan('admin')
<script>
    $(function(){
        $('#dratshang-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('datatables.admin.getDratshangsAdmin', $id ?? '') }}",
            columns: [
                { data: "id", name: 'id'},
                { data: "name", name: 'name'},
                { data: 'rabdey', name: 'rabdey'},
                { data: "group", name: 'group'},
                { data: "action", name: 'action', orderable: false, searchable: false}
            ]
        });
        $('#addDratshangModal').on('show.bs.modal', function (e) {
            $.get('/api/rabdey/list', function(rabdeys){
                var option = ``;
                rabdeys.forEach( rabdey => {
                    option = option + `<option value="${rabdey.id}">${rabdey.name}</option>`;
                });
                $("#rabdey-optgroup").empty().append(option);
            });
            $.get('/api/groups', function(groups){
                var option = ``;
                groups.forEach( group => {
                    option += `<option value="${group.id}">${group.name}</option>`;
                });
                $("#group-optgroup").empty().append(option);
            });
        });
        $('#deleteDratshangModal').on('show.bs.modal', function (e) {
            let action = $(e.relatedTarget).attr('data-action');
            $('.delete-form').attr('action', action);
        });
        $('.confirm-delete-bnt').click(function () { 
            $('.delete-form').submit();
        });
    });
</script>
@endcan
@endsection