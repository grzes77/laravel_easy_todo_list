@extends('layouts.app')

@section('title','cos fajnego')

@section('content')

    <div class="container"><a href="{{route('tasks.create')}}" class="btn btn-primary">Dodaj</a>
        <hr>
        <table class="table table-hover">
            <tr>
                <th>id</th>
                <th>name</th>
                <th>zrobione/niezrobione</th>
                <th>edit</th>
                <th>delete</th>
            </tr>

            @foreach($tasks as $task)
                <tr>
                    <td>{{$task->id}}</td>


                    @if($task->is_to_do)

                        <td><s>{{$task->to_do}}</s></td>
                        <td><a href="{{route('tasks.show',$task->id)}}" class="btn btn-primary">jednak nie koniec</a>
                        </td>

                    @else
                        <td>{{$task->to_do}}</td>
                        <td><a href="{{route('tasks.show',$task->id)}}" class="btn btn-primary">zakoncz</a></td>

                    @endif

                    <td><a href="{{route('tasks.edit',$task->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{route('tasks.destroy',$task->id)}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="delete">
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>

            @endforeach

        </table>

        {{$tasks->links()}}
    </div>





@endsection