@extends('index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Card</div>

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
                        <form class="form-horizontal" method="POST" action="{{ url('contact/update') }}" enctype="multipart/form-data">
                         {{ csrf_field() }}
                          <div class="form-body pal">
                            <input id="title" type="hidden" class="form-control" name="id" value="{{$data->id}}">
                            <div class="form-group"><label for="inputtitle" class="col-md-3 control-label">Email</label>
                              <div class="col-md-9">
                                  <div class="input-icon"><input id="contact_email" type="text" class="form-control" name="contact_email" value="{{$data->contact_email}}" required autofocus></div>
                                @if ($errors->has('contact_email'))
                                  <span class="help-block">
                                    <strong>{{ $errors->first('contact_email') }}</strong>
                                  </span>
                                @endif
                              </div>
                            </div>
                            <div class="form-group"><label for="inputposition" class="col-md-3 control-label">Phone</label>
                              <div class="col-md-9">
                                  <div class="input-icon"><input id="contact_phone" type="number" class="form-control" name="contact_phone" value="{{$data->contact_phone}}" required></div>
                                @if ($errors->has('contact_phone'))
                                  <span class="help-block">
                                    <strong>{{ $errors->first('contact_phone') }}</strong>
                                  </span>
                                @endif
                              </div>
                            </div>
                            
                          </div>
                          <div class="form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn btn-primary">Update</button>
                                &nbsp;
                                <a href="{{url('/contact/list')}}"  type="button" class="btn btn-primary">Cancel</a>
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
