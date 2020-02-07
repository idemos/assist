@extends('layout.index')

@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">task Edit</h5>
        <p class="card-text">Created at "<b>{{ $task->created_at->diffForHumans() }}</b>" Updated at "<b>{{$task->updated_at->diffForHumans()}}</b>"</p>
    </div>
    @include('include.messages')
  <form name="form-task" id="form-task" action="{{ route('task.update', $task->id) }}" method="post">
  @csrf
  @method('PUT')
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <div class="form-group">
                <label for="name" class="text-dark">Title</label>
                <input value="{{ $task->name }}" type="text" class="form-control" name="name" id="name" aria-describedby="titleHelp" placeholder="Enter text">
                <small id="titleHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
        </li>
    </ul>
    <div class="card-body">
        <button type="submit" class="btn btn-info">Save</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
        <a class="btn btn-warning" href="{{ route('task.index') }}">Back</a>
    </div>
    </form>
</div>

         
@endsection