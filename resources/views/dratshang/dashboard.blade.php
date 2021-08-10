@extends('layouts.dratshang')

@section('content')
<div class="card card-shadow">
    <div class="card-body">
        <table id="monks-table" class="display table compact">
            <thead>
                <tr>
                    <th>Cid</th>
                    <th>Name</th>
                    <th>Choename</th>
                    <th>Dob</th>
                    <th>Reg year</th>
                    <th>Reg age</th>
                    <th>Position</th>
                    <th>Education</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<script>
    $(function() {
        $('#monks-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('datatables.dratshang.getMonks') !!}',
            columns: [
                { data: 'cid', name: 'cid'},
                { data: 'name', name: 'name'},
                { data: 'choename', name: 'choename'},
                { data: 'dob', name: 'dob'},
                { data: 'year', name: 'year'},
                { data: 'regage', name: 'regage'},
                { data: 'position', name: 'position'},
                { data: 'education', name: 'education'}
            ]
        });
    });
</script>
@endsection