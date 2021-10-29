@extends('layouts.manager')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('stipend.store') }}" method="POST">
                <table class="table compact">
                    <tbody>
                        @csrf
                        @method('post')
                        @foreach ($monks as $monk)
                        <tr>
                            <input type="hidden" name="monk_id[]" value="{{$monk->id}}">
                            <td>{{$monk->cid}}</td>
                            <td>{{$monk->choename}}</td>
                            <td>
                                <input type="hidden" name="status[]" value="true">
                                <input type="checkbox" checked>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <button class="btn" type="submit">submit</button>
            </form>
            <script>
                $(function(){
                    $('input[type=checkbox]').on('change', function(){
                        let value = $(this).is(':checked');
                        $(this).prev('input[type=hidden]').val(value);
                    });
                });
            </script>
        </div>
    </div>
@endsection