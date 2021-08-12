@extends('layouts.manager')
@section('content')
<h3 class="text-primary mb-4">ཟུར་གདོག།</h3>
<div class="row mb-3">
    <div class="col-lg-4">
        <div class="card  mb-3">
            <div class="card-body text-center shadow">
                <img class="rounded-circle mb-3 mt-4" src="/storage/avater/{{$monk->image}}" width="160" height="160" alt="Profile">
                <div class="mb-3">
                    <button class="btn btn-primary btn-sm" type="button">
                        Change Photo
                    </button>
                </div>
            </div>
        </div>
        <div class="card  shadow mb-4">
            <div class="card-header py-3">
                <h6 class="text-primary font-weight-bold m-0">Address Setting</h6>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="village"><strong>Village</strong><br></label>
                        <input id="village" class="form-control" type="text" name="village" value="{{$monk->address->village->name}}">
                    </div>
                    <div class="form-group">
                        <label for="gewog"><strong>Gewog</strong><br></label>
                        <input id="gewog" class="form-control" type="text" name="gewog" value="{{$monk->address->gewog->name}}">
                    </div>
                    <div class="form-group">
                        <label for="dzongkhag"><strong>dzongkhag</strong><br></label>
                        <input class="form-control" type="text" name="dzongkhag" id="dzongkhag" value="">
                    </div>
                    <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">Save&nbsp;Settings</button></div>
            </form>
        </div>
    </div>
</div>
<div class="col-lg-8">
    <div class="row">
        <div class="col">
            <div class="card  shadow mb-3">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">User Settings</p>
                </div>
                @if (session('msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('msg')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('user.update', $monk->user->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group"><label for="username">
                                    <strong>Name</strong><br></label>
                                    <input class="form-control" type="text" name="username" value="{{ $monk->user->name }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group"><label for="email"><strong>Email Address</strong></label>
                                    <input class="form-control" type="email" name="email" value="{{ $monk->user->email }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">Save Settings</button></div>
                    </form>
                </div>
            </div>
            <div class="card  shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">Bio Data Settings</p>
                </div>
                @if (session('bio-data-update-success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('bio-data-update')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if (session('bio-data-update-fail'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    {{session('bio-data-update-fail')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('monk.update', $monk->id ) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="cid"><strong>CID</strong><br></label>
                                    <input id="cid" class="form-control" type="text" name="cid" value="{{ $monk->cid}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group"><label for="regno"><strong>Registration Number</strong><br></label>
                                    <input id="regno" class="form-control" type="text" name="regno" value="{{ $monk->regno}}" disabled>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group"><label for="choename"><strong>Choename</strong><br></label>
                                    <input class="form-control" type="text" name="choename" value="{{ $monk->choename }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group"><label for="regage"><strong>Registration Age</strong><br></label>
                                    <input class="form-control" type="text" name="regage" value="{{ $monk->regage}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group"><label for="year"><strong>Registration Year</strong><br></label>
                                    <input class="form-control" type="text" name="year" value="{{ $monk->year}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="rabdey">
                                        <strong>Rabdey</strong><br>
                                    </label>
                                    <select id="rabdey" name="rabdey" class="form-control">
                                        <optgroup label="Dratshangs">
                                            @foreach ($rabdeys as $rabdey)
                                                <option value="{{ $rabdey->id }}" @if($rabdey->id == $monk->dratshang->rabdey->id) selected="" @endif>{{ $rabdey->name}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="dratshang">
                                        <strong>Dratshang</strong><br>
                                    </label>
                                    <select id="dratshang" name="dratshang" class="form-control">
                                        <optgroup label="Dratshang">
                                            @foreach ($dratshangs as $dratshang)
                                                <option value="{{ $dratshang->id }}" @if($dratshang->id == $monk->dratshang->id) selected="" @endif>{{ $dratshang->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="position"><strong>Position</strong><br></label>
                                    <select id="position" name="position" class="form-control">
                                        <optgroup label="Position">
                                            @foreach ($positions as $position)
                                                <option value="{{ $position->id }}" @if ($position->id == $monk->position->id)
                                                    selected=""
                                                @endif >{{ $position->name}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group"><label for="education">Education Level<br></label>
                                    <select id="education" name="education" class="form-control">
                                        <optgroup label="Education">
                                            @foreach ($educations as $education)
                                                <option value="{{ $education->id }}" @if ($education->id == $monk->education->id)
                                                    selected=""    
                                                @endif
                                                >{{ $education->level }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">Save&nbsp;Settings</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@if ($monk->father == null && $monk->mother == null)
@else   
<div class="row">
    <div class="col">
        
        <div class="card  shadow mb-5">
            <div class="card-header py-3">
                <p class="text-primary m-0 font-weight-bold">Parents</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        @if ($monk->father != null)
                        <div class="card">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">Father</p>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('father.update',  $monk->father->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label for="cid"><strong>CID</strong><br></label>
                                        <input id="cid" name="cid" class="form-control" type="text" value="{{ $monk->father->cid}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="name"><strong>Name</strong><br></label>
                                        <input class="form-control" type="text" id="name" name="name" value="{{ $monk->father->name}}">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-sm" type="submit">Save&nbsp;Settings</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col">
                        @if($monk->mother != null)
                        <div class="card">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">Mother</p>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('mother.update',  $monk->mother->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label for="cid"><strong>CID</strong><br></label>
                                        <input id="cid" name="cid" class="form-control" type="text" value="{{ $monk->mother->cid}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="name"><strong>Name</strong><br></label>
                                        <input class="form-control" type="text" id="name" name="name" value="{{ $monk->mother->name}}">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-sm" type="submit">Save&nbsp;Settings</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection