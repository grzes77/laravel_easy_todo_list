@extends('layouts.app')

@section('content')


    <div class="container">
        <form action="{{route('tasks.update',$task->id)}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="put">
            <div class="form-group">
                <input type="text" class="form-control is-valid" name="to_do" placeholder="wpisz nazwę zadania do wykonania" value="{{$task->to_do}}" required>
            </div>

            <div class="form-group">
                <button class="btn btn-primary">zapisz</button>
            </div>
        </form>
    </div>

@endsection