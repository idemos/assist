@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="p-5">
                          <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                          </div>
                          <form class="user">
                            <div class="form-group row">
                              <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name">
                              </div>
                              <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name">
                              </div>
                            </div>
                            <div class="form-group">
                              <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                            </div>
                            <div class="form-group row">
                              <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                              </div>
                              <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                              </div>
                            </div>
                            <a href="login.html" class="btn btn-primary btn-user btn-block">
                              Register Account
                            </a>
                          </form>

                        </div>
                      </div>
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
