@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <form id="register" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Name') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-left">{{ __('Password') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-left">{{ __('Confirm Password') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                {{-- </form>
                                <form method="POST" action="{{ route('register.address.store') }}">
                                    @csrf --}}
            
                                    <div class="form-group row">
                                        
                                        <label for="dzongkhag" class="col-md-4 col-form-label text-md-left">{{ __('Dzongkhag') }}</label>
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
                                        <label for="gewog" class="col-md-4 col-form-label text-md-left">{{ __('Gewog') }}</label>
            
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
                                        <label for="village" class="col-md-4 col-form-label text-md-left">{{ __('Village' ) }}</label>
            
                                        <div class="col-md-6">
                                            <input id="village" type="text" class="form-control @error('village') is-invalid @enderror" name="village" value="{{ old('village') }}" required autocomplete="village">
            
                                            @error('village')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                {{-- </form>
                                <form method="POST" action="{{ route('register.others.store') }}">
                                    @csrf --}}
                                   
                                    <div class="form-group row">
                                        <label for="education" class="col-md-4 col-form-label text-md-left">{{ __('Education') }}</label>
                                        <div class="col-md-6">
                                            <select id="education" class="form-control" @error('education') is-invalid @enderror name="education" value="{{ old('education') }}" required autofocus>
                                                <optgroup label="Education">
                                                    
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
                                                   
                                                </optgroup>
                                            </select>
                                            @error('dratshang')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                {{-- </form> --}}
                            </div>
                            <div class="col-md-6">
                                {{-- <form method="POST" action="{{ route('register.monk.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('post') --}}
                                    <div class="form-group row">
                                        <label for="cid" class="col-md-4 col-form-label text-md-left">{{ __('CID') }}</label>
            
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
                                        <label for="choename" class="col-md-4 col-form-label text-md-left">{{ __('Choename') }}</label>
            
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
                                        <label for="regno" class="col-md-4 col-form-label text-md-left">{{ __('Registration Number') }}</label>
            
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
                                        <label for="regage" class="col-md-4 col-form-label text-md-left">{{ __('Registration Age') }}</label>
            
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
                                        <label for="dob" class="col-md-4 col-form-label text-md-left">{{ __('Date of Birth') }}</label>
            
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
                                        <label for="year" class="col-md-4 col-form-label text-md-left">{{ __('Registration Year') }}</label>
            
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
                                        <label for="image" class="col-md-4 col-form-label text-md-left">{{ __('Image') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" required>
            
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                {{-- </form>
                                <form method="POST" action="{{ route('register.parents.store') }}">
                                    @csrf --}}
                                    <div class="form-group row">
                                        <label for="father_cid" class="col-md-4 col-form-label text-md-left">{{ __('Father cid') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="father_cid" type="text" class="form-control @error('father_cid') is-invalid @enderror" name="father_cid" value="{{ old('father_cid') }}" required autocomplete="father_cid">
            
                                            @error('father_cid')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="father_name" class="col-md-4 col-form-label text-md-left">{{ __('Father Name') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="father_name" type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" value="{{ old('father_name') }}" required autocomplete="father_name">
            
                                            @error('father_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="mother_cid" class="col-md-4 col-form-label text-md-left">{{ __('Mother cid') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="mother_cid" type="text" class="form-control @error('mother_cid') is-invalid @enderror" name="mother_cid" value="{{ old('mother_cid') }}" required autocomplete="mother_cid">
            
                                            @error('mother_cid')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="mother_name" class="col-md-4 col-form-label text-md-left">{{ __('Mother Name') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="mother_name" type="text" class="form-control @error('mother_name') is-invalid @enderror" name="mother_name" value="{{ old('mother_name') }}" required autocomplete="mother_name">
            
                                            @error('mother_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-center">
                                <button id="submit" class="btn btn-primary  w-75" type="submit">
                                    Register
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(function(){
        $('#submit').click(function(e){
            e.preventDefault();
            $('#register').submit();
        });
    });
</script>
@endsection