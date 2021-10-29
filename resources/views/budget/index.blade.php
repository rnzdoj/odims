@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            @include('components.session')
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-dark float-right btn-sm" data-toggle="modal" data-target="#addBudgetModal">
                        <i class="fa fa-add"></i>
                        Budget Registration
                    </button>
                </div>
                <div class="card-body overflow-auto">
                    <table id="budget-table" class="table compact table-sm hover ">
                        <thead>
                            <tr>
                                <th>Dratshang</th>
                                <th>Rabdey</th>
                                <th>Amount</th>
                                <th>Month</th>
                                <th>status</th>
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
<div class="modal fade" id="addBudgetModal" tabindex="-1" role="dialog" aria-labelledby="Stipend Registration" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="Stipend Registration">Stipend Registration for the month of {{\Carbon\Carbon::now()->format('M')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form id="add-budget-form" action="{{ route('budget.store') }}" method="post">
            @csrf
            @method('post')
            <div class="form-group">
                <label for="rabdey-select">Rabdey</label>
                <select id="rabdey-select" name="rabdey_id" class="form-control" required>
                    <optgroup label="Rabdey" id="optgroup-rabdey">
                    </optgroup>
                </select>
            </div>
            <div class="form-group">
                <label for="dratshang-select">Dratshang</label>
                <select name="dratshang_id" id="dratshang-select" class="form-control" required>
                    <optgroup name="dratshang" id="optgroup-dratshang" label="Dratshang">
                    </optgroup>
                </select>
            </div>
            <div class="form-group">
                <label for="amount">amount</label>
                <input type="text" name="amount" id="amount" class="form-control" required>
            </div>
            <div class="form-check">
                <input type="radio" name="status" id="radio-on" class="form-check-input" value="true" >
                <label for="radio-on"class="form-check-lable">Not Paid</label>
            </div>
            <div class="form-check">
                <input type="radio" name="status" id="radio-off"class="form-check-input"  value="false" checked>
                <label for="radio-off"class="form-check-lable">Paid</label>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
        <button id="add-budget-btn" type="button" class="btn btn-sm btn-primary">Save changes</button>
    </div>
    </div>
</div>
</div>
@endsection

@section('script')
<script>
    $(function(){
        $('#addBudgetModal').on('shown.bs.modal', function(e){
            $.get('/api/rabdey/list',function(rabdeys){
                var option = '<option value="null" disabled selected>...</option>';
                rabdeys.forEach(rabdey => {
                    option = option + `<option value="${rabdey.id}">${rabdey.name}</option>`;
                });
                $('#optgroup-rabdey').empty().append(option);
            });
        });
        $("#rabdey-select").on('change', function(e){
            let rabdey_id = $(this).val();
            $.get(`/api/rabdey/${rabdey_id}`,function(dratshangs){
                    var option = '<option value="null" disabled selected>...</option>';
                    dratshangs.forEach(dratshang => {
                        option = option + `<option value="${dratshang.id}">${dratshang.name}</option>`;
                    });
                    $('#optgroup-dratshang').empty().append(option);
            });
        });
        $('#add-budget-btn').click(function()
        {
            var amount = $('#amount');
            var flag = true;
            if($('#rabdey-select').val() == null)
            {
                $('#rabdey-select').addClass('border border-danger');
                flag = false;

            } else {
                $('#rabdey-select')
                    .removeClass('border border-danger')
                    .addClass("border border-success");
            }
            if($('#dratshang-select').val() == null)
            {   
                $('#dratshang-select').addClass('border border-danger');
                flag = false;

            } else {
                $('#dratshang-select') 
                    .removeClass('border border-danger')
                    .addClass("border border-success");
            }
            if(amount.val() == ""){
                amount.addClass("border border-danger");
                flag = false;
            } else {
                amount
                    .removeClass("border border-danger")
                    .addClass("border border-success");
            }
            if(flag){
                $('#add-budget-form').submit();
            }
        });
        $("#budget-table").DataTable({
            processing:true,
            serverSide:true,
            ajax: "{{ route('datatables.admin.getBudgets') }}",
            columns: [
                {data: 'dratshang',name: 'dratshang'},
                {data: 'rabdey',name:'rabdey'},
                {data: 'amount', name:'amount'},
                {data: 'month',name:'month'},
                {data: 'status',name:'status'},
            ]
        });
    });
</script>
@endsection