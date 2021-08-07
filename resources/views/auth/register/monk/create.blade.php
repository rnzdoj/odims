@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Step 2 Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register.monk.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="form-group row">
                            <label for="cid" class="col-md-4 col-form-label text-md-right">{{ __('CID') }}</label>

                            <div class="col-md-6">
                                <input id="cid" type="text" class="form-control @error('cid') is-invalid @enderror" name="cid" value="{{ old('cid') }}" required autocomplete="cid" autofocus>

                                @error('cid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="choename" class="col-md-4 col-form-label text-md-right">{{ __('choename') }}</label>

                            <div class="col-md-6">
                                <input id="choename" type="text" class="form-control @error('choename') is-invalid @enderror" name="choename" value="{{ old('choename') }}" required autocomplete="choename" autofocus>

                                @error('choename')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="regno" class="col-md-4 col-form-label text-md-right">{{ __('Registration Number') }}</label>

                            <div class="col-md-6">
                                <input id="regno" type="text" class="form-control @error('regno') is-invalid @enderror" name="regno" value="{{ old('regno') }}" required autocomplete="regno">

                                @error('regno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="regage" class="col-md-4 col-form-label text-md-right">{{ __('Registration Age') }}</label>

                            <div class="col-md-6">
                                <input id="regage" type="text" class="form-control @error('regage') is-invalid @enderror" name="regage" value="{{ old('regage') }}" required autocomplete="regage">

                                @error('regage')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('dob') }}</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob">

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('Registration Year') }}</label>

                            <div class="col-md-6">
                                <input id="year" type="number" min="1900" max="{{\Carbon\Carbon::now()->year}}"class="form-control @error('') is-invalid @enderror" name="year" required autocomplete="year">
                                @error('year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" required>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Next') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
