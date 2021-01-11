@extends('index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-default">
                <div class="panel-heading">Edit About</div>

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
                        <form class="form-horizontal" method="POST" action="{{ url('about/update') }}" enctype="multipart/form-data">
                         {{ csrf_field() }}
                          <div class="form-body pal">
                            <input id="title" type="hidden" class="form-control" name="id" value="{{$data->id}}">
                            <div class="form-body pal">
                            <div class="form-group"><label for="inputdescription" class="col-md-4 control-label">Description</label>
                              <div class="col-md-6">
                                  <div class="input-icon"><textarea  class="form-control" name="description" >{{$data->description}}</textarea></div>
                               @if ($errors->has('description'))
                                <span class="help-block">
                                 <strong>{{ $errors->first('description') }}</strong>
                                 </span>
                                @endif
                              </div>
                            </div>
                          </div>
                            
                          </div>
                          <div class="form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn btn-primary">Update</button>
                                &nbsp;
                                <a href="{{url('/about/list')}}"  type="button" class="btn btn-primary">Cancel</a>
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
