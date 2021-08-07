@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-danger">{{ __('Step 4 Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register.parents.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="f_cid" class="col-md-4 col-form-label text-md-right">{{ __('f_cid') }}</label>

                            <div class="col-md-6">
                                <input id="f_cid" type="text" class="form-control @error('f_cid') is-invalid @enderror" name="f_cid" value="{{ old('f_cid') }}" required autocomplete="f_cid">

                                @error('f_cid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="f_name" class="col-md-4 col-form-label text-md-right">{{ __('f_name') }}</label>

                            <div class="col-md-6">
                                <input id="f_name" type="text" class="form-control @error('f_name') is-invalid @enderror" name="f_name" value="{{ old('f_name') }}" required autocomplete="f_name">

                                @error('f_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="m_cid" class="col-md-4 col-form-label text-md-right">{{ __('m_cid') }}</label>

                            <div class="col-md-6">
                                <input id="m_cid" type="text" class="form-control @error('m_cid') is-invalid @enderror" name="m_cid" value="{{ old('m_cid') }}" required autocomplete="m_cid">

                                @error('m_cid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="m_name" class="col-md-4 col-form-label text-md-right">{{ __('m_name') }}</label>

                            <div class="col-md-6">
                                <input id="m_name" type="text" class="form-control @error('m_name') is-invalid @enderror" name="m_name" value="{{ old('m_name') }}" required autocomplete="m_name">

                                @error('m_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn bg-danger text-white">
                                    {{ __('Next') }}
                                </button>
                                <a class="btn bg-white text-danger" href="{{ route('register.others.create') }}">
                                    SKIP and NEXT
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
