@extends('layouts.index')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card-body col-md-12 col-form-label text-md-center">
            <h5 class="card-title">Request work-from-home Create</h5>
        </div>
        @include('includes.messages')
        <form name="form-workfromhome" id="form-workfromhome" action="{{ route('workfromhome.store') }}" method="post">
            @csrf
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="form-group">
                        <label for="name" class="text-dark">Insert the date</label>
                        <input value="{{ old('date') }}" type="date" class="form-control" name="request_date" id="request_date" aria-describedby="request_dateHelp" placeholder="Enter date">
                        <small id="titleHelp" class="form-text text-muted">Write the date </small>
                    </div>
                </li>
            </ul>
            <div class="card-body">
                <button type="submit" class="btn btn-info">Save</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a class="btn btn-warning" href="{{ route('workfromhome.index') }}">Back</a>
            </div>
        </form>
    </div>
</div>

         
@endsection