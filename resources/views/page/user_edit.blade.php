@extends('layouts.index')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
    <div class="card-body col-md-12 col-form-label text-md-center">
        <h5 class="card-title">user Edit</h5>
        <p class="card-text">Created at "<b>{{ $user->created_at->diffForHumans() }}</b>" Updated at "<b>{{$user->updated_at->diffForHumans()}}</b>"</p>
    </div>
    @include('includes.messages')
    <form name="form-user" id="form-user" method="post" action="{{ route('user.update',$user->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ? old('name') : $user->name }}" required autocomplete="name" autofocus>

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
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ? old('email') : $user->email }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        @if(auth()->user()->type == 1)
        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Type User') }}</label>
            <div class="col-md-6">
                <select name="type" id="type" class="form-control">
                    <option value="0" {{ $user->type == 0 ? 'checked' : '' }}>Employee</option>
                    <option value="1" {{ $user->type == 1 ? 'checked' : '' }}>Admin</option>
                </select>
            </div>
        </div>
        @endif
        <div id="password_content" {{ $user->type == 0 ? 'style="display:none"' : '' }}>
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
</div>
</div>

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