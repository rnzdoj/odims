@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Edit</div>
            <div class="card-body">
                <form action="{{ route('dratshang.update', $dratshang->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $dratshang->name}}">                        
                    </div>
                    <div class="form-group">
                        <label for="rabdey">Rabdey</label>
                        <select name="rabdey" id="rabdey" class="form-control">
                            <optgroup label="Rabdey">
                                @foreach ($rabdeys as $rabdey)
                                    <option value="{{$rabdey->id}}"
                                        @if($dratshang->rabdey->id == $rabdey->id) selected @endif    
                                    >{{$rabdey->name}}</option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="group">Group</label>
                        <select name="group" id="group" class="form-control">
                            <optgroup label="group">
                                @foreach ($groups as $group)
                                    <option value="{{$group->id}}"
                                        @if($dratshang->group->id == $group->id) selected @endif    
                                    >{{$group->name}}</option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection