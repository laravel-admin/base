@extends('admin::master')

@section('title')
    Login | Admin
@stop

@section('body-class')fixed-sn elegant-white-skin @stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-5 login-form mx-auto float-xs-none">
                <form action="{{ route('admin.attempt') }}" method="post">
                    {{ csrf_field() }}
                    <div class="card">
                        <div class="card-block">

                            <div class="form-header">
                                <h3><i class="fa fa-lock"></i> Admin:</h3>
                            </div>

                            <div class="md-form">
                                <i class="fa fa-envelope prefix"></i>
                                <input type="text" id="form2" name="email" class="form-control">
                                <label for="form2">Email</label>
                            </div>

                            <div class="md-form">
                                <i class="fa fa-lock prefix"></i>
                                <input type="password" id="form4" name="password" class="form-control">
                                <label for="form4">Password</label>
                            </div>

                            <div class="text-md-right">
                                <button class="btn btn-primary">Login</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
