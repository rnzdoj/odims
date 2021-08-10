@extends('layouts.monk')
@section('content')
<div class="card shadow p-4">
    <table class="compact order-column" id="stipend-table">
        <thead>
            <th>Id</th>
            <th>Month</th>
            <th>Status</th>
        </thead>
    </table>
</div>
<script>
    $(function() {
        $('#stipend-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('datatables.user.getMyStipend') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'created_at', name: 'created_at' },
                { data: 'status', name: 'status' },
            ]
        });
    });
</script>
@endsection