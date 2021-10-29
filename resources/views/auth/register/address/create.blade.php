@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Step 3 Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register.address.store') }}">
                        @csrf

                        <div class="form-group row">
                            
                            <label for="dzongkhag" class="col-md-4 col-form-label text-md-right">{{ __('Dzongkhag') }}</label>
                            <div class="col-md-6">
                                <select id="dzongkhag" class="form-control" @error('dzongkhag') is-invalid @enderror name="dzongkhag" value="{{ old('dzongkhag') }}" required autocomplete="dzongkhag" autofocus>
                                    <optgroup label="Dzongkhag" id="dzongkhag-optgroup">
                                    </optgroup>
                                </select>
                                @error('dzongkhag')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gewog" class="col-md-4 col-form-label text-md-right">{{ __('Gewog') }}</label>

                            <div class="col-md-6">
                               <select id="gewog" class="form-control" value="{{ old('gewog') }}" required autocomplete="gewog" autofocus>
                                    <optgroup label="Gewog" id="gewog-optgroup">
                                    </optgroup>
                                </select>
                                @error('gewog')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="village" class="col-md-4 col-form-label text-md-right">{{ __('Village' ) }}</label>

                            <div class="col-md-6">
                                <input id="village" type="text" class="form-control @error('village') is-invalid @enderror" name="village" value="{{ old('village') }}" required autocomplete="village">

                                @error('village')
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
@section('script')
<script>
    $(function(){
        $.get('/api/dzongkhags', function(dzongkhags){
            var option = ``;
            dzongkhags.forEach(dzongkhag => {
                option = option + `<option value="${dzongkhag->id}">${dzongkhag->name}</option>`;
            });
            $('#dzongkhag-optgroup').epmty().append(option);
        });
        $('#dzongkhag-optgroup').on('change', function(e){
            const id = $('#dzongkhag').val();
            var option = ``;
            $.get(`/api/dzongkhags/${id}/gewogs`, function($gewogs){
                var option = "";
                gewogs.forEach(gewog => {
                    option = option + `<option value="${gewog->id}">${gewog->name}</option>`;
                });
                $('#gewog-optgroup').epmty().append(option);
            });
        });
    });
</script>
@endsection
