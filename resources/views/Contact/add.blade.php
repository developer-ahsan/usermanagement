@extends('index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-default">
                <div class="panel-heading">Add Contact</div>

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
                       <form class="form-horizontal" method="POST" action="{{ url('contact/store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('contact_email') ? ' has-error' : '' }}">
                            <label for="contact_email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="contact_email" type="text" class="form-control" name="contact_email" value="{{ old('contact_email') }}" required autofocus>

                                @if ($errors->has('contact_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contact_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('contact_phone') ? ' has-error' : '' }}">
                            <label for="contact_phone" class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                <input id="contact_phone" type="text" class="form-control" name="contact_phone" value="{{ old('contact_phone') }}" required autofocus>

                                @if ($errors->has('contact_phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contact_phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Contact
                                </button>
                                <div style="float: left; margin-right:3px;">
                                  <a href="{{ url('contact/list') }}" title="Back" class="btn btn-primary">Back</a>  
                                </div>
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
