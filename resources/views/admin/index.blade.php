@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card mt-2 card-body border-left border-left-primary">
                <div class="card-body">
                    <h5 class="font-weight-bold text-dark">
                        Monks
                        {{ $total }}
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mt-2 card-body border-left border-left-danger">
                <div class="card-body">
                    <h5 class="font-weight-bold text-dark">
                        Month
                        {{ \Carbon\Carbon::now()->month }}
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mt-2 card-body border-left border-left-success">
                <div class="card-body">
                    <h5 class="font-weight-bold text-dark">
                        Dratshang
                        {{$dratshangs}}
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mt-2 card-body border-left border-left-info">
                <div class="card-body">
                    <h5 class="font-weight-bold text-dark">
                        Rabdey
                        {{$rabdeys}}
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Rabdey List
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table compact display mb-5 table-responsive-md" id="rabdey-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Total Dratshang</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
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
                // { data: 'action', name: 'action', orderable: false, searchable: false },
            ],
        });
    });
</script>
@endsection