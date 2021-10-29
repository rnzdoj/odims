@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="text-dark mb-4">ཟུར་གདོག།</h3>
        </div>
        <div class="col">
            @can('forceDelete', $monk)
                <form action="{{route('monk.destroy',$monk->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-danger float-right mr-2">Delete</button>
                </form>
            @endcan
            @can('update', $monk)
                <a href="{{route('monk.edit',$monk->id)}}" class="btn btn-sm btn-dark float-right mr-2">Edit</a>
            @endcan
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card  mb-3">
                <div class="card-body text-center ">
                    <img class="rounded-circle mb-3 mt-4" src="/storage/avater/{{$monk->image}}" width="160" height="160" alt="Profile">
                </div>
            </div>
            <div class="card   mb-4">
                <div class="card-header py-3">
                    <h6 class="text-dark font-weight-bold m-0">Address Setting</h6>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="village"><strong>Village</strong><br></label>
                            <input disabled  id="village" class="form-control" type="text" name="village" value="{{$monk->address->village->name}}">
                        </div>
                        <div class="form-group">
                            <label for="gewog"><strong>Gewog</strong><br></label>
                            <input disabled  id="gewog" class="form-control" type="text" name="gewog" value="{{$monk->address->gewog->name}}">
                        </div>
                        <div class="form-group">
                            <label for="dzongkhag"><strong>dzongkhag</strong><br></label>
                            <input disabled  class="form-control" type="text" name="dzongkhag" id="dzongkhag" value="{{$monk->address->dzongkhag->name}}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col">
                    <div class="card   mb-3">
                        <div class="card-header py-3">
                            <p class="text-dark m-0 font-weight-bold">User User</p>
                        </div>
                        <div class="card-body">
                            <form>                        
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group"><label for="username">
                                            <strong>Name</strong><br></label>
                                            <input disabled  class="form-control" type="text" name="username" value="{{ $monk->user->name }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group"><label for="email"><strong>Email Address</strong></label>
                                            <input disabled  class="form-control" type="email" name="email" value="{{ $monk->user->email }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card  ">
                        <div class="card-header py-3">
                            <p class="text-dark m-0 font-weight-bold">Bio Data</p>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="cid"><strong>CID</strong><br></label>
                                            <input disabled  id="cid" class="form-control" type="text" name="cid" value="{{ $monk->cid}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group"><label for="regno"><strong>Registration Number</strong><br></label>
                                            <input disabled  id="regno" class="form-control" type="text" name="regno" value="{{ $monk->regno}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group"><label for="choename"><strong>Choename</strong><br></label>
                                            <input disabled  class="form-control" type="text" name="choename" value="{{ $monk->choename }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group"><label for="regage"><strong>Registration Age</strong><br></label>
                                            <input disabled  class="form-control" type="text" name="regage" value="{{ $monk->regage}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group"><label for="year"><strong>Registration Year</strong><br></label>
                                            <input disabled  class="form-control" type="text" value="{{ $monk->year}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="position"><strong>Position</strong><br></label>
                                            <input disabled  class="form-control" type="text" value="{{ $monk->position->name}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="education">Education Level<br></label>
                                            <input disabled  type="text" class="form-control" value="{{ $monk->education->level}}">
                                        </div>
                                    </div>
                                </div>
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
            
            <div class="card   mb-5">
                <div class="card-header py-3">
                    <p class="text-dark m-0 font-weight-bold">Parents</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            @if ($monk->father != null)
                            <div class="card">
                                <div class="card-header py-3">
                                    <p class="text-dark m-0 font-weight-bold">Father</p>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="cid"><strong>CID</strong><br></label>
                                            <input disabled  id="cid" name="cid" class="form-control" type="text" value="{{ $monk->father->cid}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name"><strong>Name</strong><br></label>
                                            <input disabled  class="form-control" type="text" id="name" name="name" value="{{ $monk->father->name}}">
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
                                    <p class="text-dark m-0 font-weight-bold">Mother</p>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="cid"><strong>CID</strong><br></label>
                                            <input disabled  id="cid" name="cid" class="form-control" type="text" value="{{ $monk->mother->cid}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name"><strong>Name</strong><br></label>
                                            <input disabled  class="form-control" type="text" id="name" name="name" value="{{ $monk->mother->name}}">
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
</div>
@endif
@endsection