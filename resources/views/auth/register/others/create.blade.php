@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-danger">{{ __('Step 4 Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register.others.store') }}">
                        @csrf
                       
                        <div class="form-group row">
                            <label for="education" class="col-md-4 col-form-label text-md-left">{{ __('Education') }}</label>
                            <div class="col-md-6">
                                <select id="education" class="form-control" @error('education') is-invalid @enderror name="education" value="{{ old('education') }}" required autofocus>
                                    <optgroup label="Education">
                                        @foreach ($educations as $education)
                                            <option value="{{$education->id}}" >{{$education->level}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                                @error('education')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>    
                        </div>

                        <div class="form-group row">
                            <label for="position" class="col-md-4 col-form-label text-md-left">{{ __('Position') }}</label>
                            <div class="col-md-6">
                                <select id="position" class="form-control" @error('position') is-invalid @enderror name="position" value="{{ old('position') }}" required autofocus>
                                    <optgroup label="Position">
                                        @foreach ($positions as $position)
                                            <option value="{{$position->id}}" >{{$position->name}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                                @error('position')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>    
                        </div>

                        <div class="form-group row">
                            <label for="rabdey" class="col-md-4 col-form-label text-md-left">{{ __('Rabdey') }}</label>
                            <div class="col-md-6">
                                <select id="rabdey" class="form-control" @error('rabdey') is-invalid @enderror name="rabdey" value="{{ old('rabdey') }}" required autocomplete="rabdey" autofocus>
                                    <optgroup label="rabdey">
                                        @foreach ($rabdeys as $rabdey)
                                            <option value="{{$rabdey->id}}" selected="">{{$rabdey->name}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                                @error('rabdey')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>    
                        </div>
                        <div class="form-group row">
                            <label for="dratshang" class="col-md-4 col-form-label text-md-left">{{ __('Dratshang') }}</label>
                            <div class="col-md-6">
                                <select id="dratshang" class="form-control" @error('dratshang') is-invalid @enderror name="dratshang" value="{{ old('dratshang') }}" required autocomplete="dratshang" autofocus>
                                    <optgroup label="dratshang" name="optgroup">
                                        @foreach ($dratshangs as $dratshang)
                                            <option value="{{$dratshang->id}}" selected="">{{$dratshang->name}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                                @error('dratshang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn bg-danger text-white">
                                    {{ __('Finish') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="rabdey"]').on('change', function() {
            var rabdeyID = $(this).val();
            if(rabdeyID) {
                $.ajax({
                    url: '/api/rabdey' + '/dratshangs/'+rabdeyID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                    $('select[name="dratshang"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="dratshang"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="dratshang"]').empty();
            }
        });
    });
    </script>
@endsection
