@extends('layouts.manager')
@section('content')
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-body border-left border-left-primary">
                    <div class="card-body">
                        <h5 class="font-weight-bold text-dark">
                            Total Monks
                            {{ $total }}
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-body border-left border-left-danger">
                    <div class="card-body">
                        <h5 class="font-weight-bold text-dark">
                            Current Month
                            {{ \Carbon\Carbon::now()->month }}
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                {{-- <div class="card card-body border-left border-left-primary">
                    <div class="card-body">
                    
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection