@extends('layouts.index')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card-body col-md-12 col-form-label text-md-center">
            <h5 class="card-title">Task Create</h5>
        </div>
        @include('includes.messages')
        <form name="form-task" id="form-task" action="{{ route('task.store') }}" method="post">
            @csrf
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="form-group">
                        <label for="name" class="text-dark">Title</label>
                        <input value="{{ old('name') }}" type="text" class="form-control" name="name" id="name" aria-describedby="titleHelp" placeholder="Enter text">
                        <small id="titleHelp" class="form-text text-muted">Write the complete task.</small>
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
</div>

         
@endsection