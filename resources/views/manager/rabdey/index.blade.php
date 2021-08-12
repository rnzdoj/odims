@extends('layouts.manager')
@section('content')
<div class="container mb-5 w-75">
    <div class="card">
        <div class="card-body">
            <table class="table compact display mb-5" id="rabdey-table">
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
<script>
    $(function(){
        $('#rabdey-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route('datatables.manager.getRabdeys') !!}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'totalDratshang', name: 'totalDratshang' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ],
        });
    });
</script>
@endsection