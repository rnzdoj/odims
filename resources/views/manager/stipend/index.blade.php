@extends('layouts.manager')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body mt-4 mb-4">
                    <table class="table compact" id="stipend-table">
                        <thead>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Month</th>
                            <th>Status</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="btn btn-block btn-dark">
                        <a style="text-decoration:none;" href="{{ route('stipend.create') }}" class="text-white">Update Records</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('#stipend-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('datatables.dratshang.getDratshangStipend') !!}',
            columns: [
                { data: 'id', name: 'id'},
                { data: 'name', name: 'name'},
                { data: 'month', name: 'month'},
                { data: 'status', name: 'status'}
            ]
        });
    });
</script>
@endsection