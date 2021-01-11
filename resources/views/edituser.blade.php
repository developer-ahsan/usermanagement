@extends('index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-default">
                <div class="panel-heading">Edit User</div>

                <div class="panel-body">
                    @if (session('message'))
                      <div class="alert alert-success">
                          {{ session('message') }}
                      </div>
                    @elseif (session('error'))
                      <div class="alert alert-danger">
                          {{ session('error') }}
                      </div>
                    @endif

                    <div class="page-content">
        <div id="form-layouts" class="row">
          <div class="col-lg-12">  
            <div style="background: transparent; border: 0; box-shadow: none !important" class="tab-content pan mtl mbn responsive">
              <div id="tab-form-actions" class="tab-pane fade active in">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="panel panel-green">
                      <div class="panel-body pan">
                        <form class="form-horizontal" method="POST" action="{{ url('updateuser') }}" enctype="multipart/form-data">
                         {{ csrf_field() }}
                          <div class="form-body pal">
                            <input id="name" type="hidden" class="form-control" name="id" value="{{$data->id}}">
                            <div class="form-group"><label for="inputname" class="col-md-3 control-label">Name</label>
                              <div class="col-md-9">
                                  <div class="input-icon"><input id="name" type="text" class="form-control" name="name" value="{{$data->name}}" required autofocus></div>
                                @if ($errors->has('name'))
                                  <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                                @endif
                              </div>
                            </div>
                          </div>
                          <div class="form-body pal">
                            <div class="form-group"><label for="inputemail" class="col-md-3 control-label">Email</label>
                              <div class="col-md-9">
                                <div class="input-icon"><input id="email" type="text" class="form-control" name="email" value="{{$data->email}}" autofocus></div>
                                @if ($errors->has('email'))
                                <span class="help-block">
                                 <strong>{{ $errors->first('email') }}</strong>
                                 </span>
                                @endif
                              </div>
                            </div>
                          </div>
                          <div class="form-body pal">
                            <div class="form-group"><label for="inputpassword" class="col-md-3 control-label">New Password</label>
                              <div class="col-md-9">
                                  <div class="input-icon"><input class="form-control" autocomplete="false" type="password" name="password"></div>
                               @if ($errors->has('password'))
                                <span class="help-block">
                                 <strong>{{ $errors->first('password') }}</strong>
                                 </span>
                                @endif
                              </div>
                            </div>
                          </div>
                          <div class="form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn btn-primary">Update</button>
                                &nbsp;
                                <a href="{{url('/userslist')}}"  type="button" class="btn btn-primary">Cancel</a>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>        
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
