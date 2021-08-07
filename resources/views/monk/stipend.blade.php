@extends('layouts.monk')
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
@endsection

@section('content')
<div class="card shadow p-2">

    <table id="table_id" class="display">
        <thead>
            <tr>
                <th>Month</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stipends as $stipend)
            <tr>
                <td>{{$stipend->created_at->format('M')}}</td>
                <td></td>
                <td>
                    @if ($stipend->status)
                        Recived
                    @else
                        Not Recived
                    @endif
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script>
@endsection

@section('script')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
@endsection