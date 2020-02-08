@extends('layouts.index')

@section('content')
<div class="row justify-content-center">
    @include('includes.messages')
    <form name="form-user-task" id="form-user-task" method="post" class="col-md-10" action="{{ route('user_task_store') }}">
        @csrf
        
        <div class="col-md-12">
            <label for="user" class="text-dark">User: <b>"{{ $user->name }}"</b></label>
            <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">

            @foreach ($tasks as $task)
                <div class="card-body row">
                    <div class="col-md-1">
                        <label class="switch">
                            <input name="task_id[]" id="task_id_{{ $task->id }}" value="{{ $task->id }}"
                            @foreach ($user_tasks->tasks as $task_user)
                             {{ $task->id == $task_user->id ? 'checked': ''}}
                            @endforeach
                            type="checkbox">
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div class="col-md-11">{{ $task->name }}</div>
                </div>
            @endforeach
            <div class="card-body row text-md-center">
                <button type="submit" class="btn btn-info">Save</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a class="btn btn-warning" href="{{ route('user.index') }}">Back</a>
            </div>       
        </div>
    </form>
</div>
@endsection

@section('head_script')
<style>
.card-body.row{
    padding-bottom: 0;
    padding-left: 0;
}
/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
@endsection
