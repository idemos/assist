@extends('layouts.index')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card-body col-md-12 col-form-label text-md-center">
            <h5 class="card-title">Request work-from-home Create</h5>
            <span id="clock"></span>
            <span id="deadline">End working day hour: 16:00</span>
        </div>
        @include('includes.messages')
        <form name="form-workfromhome" id="form-workfromhome" action="{{ route('workfromhome.store') }}" method="post">
            @csrf
            <ul class="list-group list-group-flush">
                @if(@auth()->user()->type == 1)
                <li class="list-group-item">
                    <div class="form-group">
                        <label for="job" class="text-dark">User*</label>
                        <select name="user_id" id="user_id" class="form-control">
                            <option value="">Select User</option>
                            @foreach ($users as $user)
                            <option value="{{ $user->id}}" {{ $user->id == old('user_id') ? 'checked': ''}}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </li>
                @endif
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

@section('footer_script')

    @if(auth()->user()->type !== 1)

        <script type="text/javascript">
        function display()
        {
            setInterval(function() {
                var today = new Date();
                var month = today.getMonth() + 1;
                var day = today.getDate();
                console.log('day',day);
                var year = today.getFullYear();

                var hour = today.getHours() > 12 ? today.getHours() - 12 : today.getHours();
                var minute = today.getMinutes();
                var seconds = today.getSeconds();
                //var milliseconds = today.getMilliseconds();

                var output = year + '/' + month + '/' + day + ' - ' + hour + ':' + minute + ':' + seconds;

                $('#clock').html(output);

            }, 1000);
        }

        display();
        </script>

    @endif
    
@endsection