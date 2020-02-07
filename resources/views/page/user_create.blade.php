@extends('layouts.index')

@section('content')

    <div class="card-body col-md-12 col-form-label text-md-center">
        <h5 class="card-title">Create User</h5>
    </div>
    @include('includes.messages')
    <form name="user-task" method="POST" action="{{ route('user.store') }}">
    @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Type User') }}</label>
            <div class="col-md-6">
                <select name="type" id="type" class="form-control">
                    <option value="0">Employee</option>
                    <option value="1">Admin</option>
                </select>
            </div>
        </div>
        <div id="password_content" style="display:none">
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                </div>
            </div>
        </div>

        <div class="card-body col-md-12 col-form-label text-md-center">
            <button type="submit" class="btn btn-info">Save</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
            <a class="btn btn-warning" href="{{ route('user.index') }}">Back</a>
        </div>

    </form>

@endsection


@section('footer_script')
<script>
    $(document).on('change','#type', function(){
        if($(this).val() == 1){
            $('#password_content').show();
            $('#password').attr('required','required');
        }else{
            $('#password_content').hide();
            $('#password').removeAttr('required');
        }
    });
</script>
@endsection