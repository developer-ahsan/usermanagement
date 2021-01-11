@extends('index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-default">
                <div class="panel-heading">Add About</div>

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
                       <form class="form-horizontal" method="POST" action="{{ url('about/store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-body pal">
                            <div class="form-group"><label for="inputdescription" class="col-md-4 control-label">Description</label>
                              <div class="col-md-6">
                                  <div class="input-icon"><textarea  class="form-control" name="description"></textarea></div>
                               @if ($errors->has('description'))
                                <span class="help-block">
                                 <strong>{{ $errors->first('description') }}</strong>
                                 </span>
                                @endif
                              </div>
                            </div>
                          </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add About
                                </button>
                                <div style="float: left; margin-right:3px;">
                                  <a href="{{ url('about/list') }}" title="Back" class="btn btn-primary">Back</a>  
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
