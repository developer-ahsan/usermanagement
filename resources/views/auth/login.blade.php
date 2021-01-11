@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 80px;">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">  
                </div>
                <div class="col-md-4"> 
                    <div class="row">
                    <center><a href="{{ url('/home') }}" class="logo">
                        <!-- Add the class icon to your logo image or logo icon to add the margining -->
                        <img alt="Automobile" src="{{URL::asset('/storage/images/logo.png')}}" height="100" width="150" style="margin-bottom: 5%">
                    </a></center>
                    </div> 
                    
                    <div class="panel panel-default" style="width: 100%">

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <span style="margin-left: 15px;"> E-Mail Address</span>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <span style="margin-left: 15px;">Password</span>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12" style="text-align: center;">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <!-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
                </div>
                <div class="col-md-4">  
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
