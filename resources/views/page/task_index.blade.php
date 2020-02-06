<<<<<<< HEAD
@extends('layouts.index')
=======
@extends('layouts.app')
>>>>>>> 6d607f7dded6dfb3289b81c6ad37ca8d8a8d986c

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footerscript')
<script>
</script>
@endsection
