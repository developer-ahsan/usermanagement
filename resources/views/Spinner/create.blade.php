@extends('index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-default">
                <div class="panel-heading">Add Banner</div>

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
                        <form class="form-horizontal" method="POST" action="{{ url('spinner/store') }}" enctype="multipart/form-data">
                         {{ csrf_field() }}
                          <div class="form-body pal">
                            <div class="form-group"><label for="inputheaderbanner" class="col-md-3 control-label">Spinner title</label>
                              <div class="col-md-9">
                                <input id="headertext" type="text" class="form-control" name="headertext">
                              </div>
                            </div>                                          
                          </div>
                          <div class="form-body pal">
                            <div class="form-group"><label for="inputheaderbanner" class="col-md-3 control-label">Select Coupon</label>
                              <div class="col-md-9">
                                <select class="form-control" name="coupon">
                                  <option>Select Coupon</option>
                                </select>
                              </div>
                            </div>                                          
                          </div>
                          <div class="form-body pal">
                            <div class="form-group"><label for="inputheaderbanner" class="col-md-3 control-label">Select Position</label>
                              <div class="col-md-9">
                                <select class="form-control" name="position">
                                  <option>Select Position</option>
                                </select>
                              </div>
                            </div>                                          
                          </div>
                          <div class="form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn btn-primary">Save</button>
                                &nbsp;
                                <a href="{{url('/bannerslist')}}"  type="button" class="btn btn-primary">Cancel</a>
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
