@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white strong bg-success">Dashboard</div>

                <div class="card-body">
                    @auth
                        Hello <b>{{ strtoupper(auth()->user()->name) }}</b><br>
                        You are logged in as <b>{{ auth()->user()->type == 1 ? 'admin' : 'user'}}</b>!<br>
                        Account created at {{ auth()->user()->created_at->diffForHumans() }}<br>
                    @endauth

                </div>
            </div>
        </div>
    </div>
</div>
@endsection