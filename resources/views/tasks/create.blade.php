@extends('layouts.app')

@section('content')


<div class="container">
    <form action="{{route('tasks.store')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <input type="text" class="form-control is-valid" name="to_do" placeholder="wpisz nazwę zadania do wykonania" required>
        </div>

        <div class="form-group">
            <button class="btn btn-primary">zapisz</button>
        </div>
    </form>
</div>

@endsection