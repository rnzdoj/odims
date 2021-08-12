@extends('layouts.manager')
@section('content')
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
<script>
    $(function(){
        $('#dratshang-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route('datatables.manager.getDratshangs',$id) !!}",
            columns:[
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name'},
                { data: 'totalMonk', name: 'totalMonk'},
            ],
        });
    });
</script>
@endsection