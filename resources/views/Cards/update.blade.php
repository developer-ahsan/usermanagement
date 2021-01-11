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
                        <form class="form-horizontal" method="POST" action="{{ url('cards/update') }}" enctype="multipart/form-data">
                         {{ csrf_field() }}
                          <div class="form-body pal">
                            <input id="title" type="hidden" class="form-control" name="id" value="{{$data->id}}">
                            <div class="form-group"><label for="inputtitle" class="col-md-3 control-label">Amount</label>
                              <div class="col-md-9">
                                  <div class="input-icon"><input id="amount" type="number" class="form-control" name="amount" value="{{$data->amount}}" required autofocus></div>
                                @if ($errors->has('amount'))
                                  <span class="help-block">
                                    <strong>{{ $errors->first('amount') }}</strong>
                                  </span>
                                @endif
                              </div>
                            </div>
                            <div class="form-body pal">
                            <input id="title" type="hidden" class="form-control" name="id" value="{{$data->id}}">
                            <div class="form-group"><label for="inputtitle" class="col-md-3 control-label">Winning Amount</label>
                              <div class="col-md-9">
                                  <div class="input-icon"><input id="win_amount" type="number" class="form-control" name="win_amount" value="{{$data->win_amount}}" required autofocus></div>
                                @if ($errors->has('win_amount'))
                                  <span class="help-block">
                                    <strong>{{ $errors->first('win_amount') }}</strong>
                                  </span>
                                @endif
                              </div>
                            </div>

                            <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="type" class="col-md-3 control-label">Type</label>

                            <div class="col-md-9">
                              <select id="type" class="form-control" name="type">
                                <option value="weekly" {{ old('type', $data->type) == 'weekly' ? 'selected' : '' }}>Weekly</option>
                                <option value="big"  {{ old('type', $data->type) == 'big' ? 'selected' : '' }}>Big</option>
                                <option value="daily"  {{ old('type' , $data->type) == 'daily' ? 'selected' : '' }}>Daily</option>
                                
                              </select>
                            </div>
                        </div>

                            <div class="form-group"><label for="inputtitle" class="col-md-3 control-label">Start Date</label>
                              <div class="col-md-9">
                                  <div class="input-icon"><input id="start" type="datetime-local" class="form-control" name="start" value="{{$data->start}}" required autofocus></div>
                                @if ($errors->has('start'))
                                  <span class="help-block">
                                    <strong>{{ $errors->first('start') }}</strong>
                                  </span>
                                @endif
                              </div>
                            </div>

                            <div class="form-group"><label for="inputtitle" class="col-md-3 control-label">End Date</label>
                              <div class="col-md-9">
                                  <div class="input-icon"><input id="end" type="datetime-local" class="form-control" name="end" value="{{$data->end}}" required autofocus></div>
                                @if ($errors->has('end'))
                                  <span class="help-block">
                                    <strong>{{ $errors->first('end') }}</strong>
                                  </span>
                                @endif
                              </div>
                            </div>

                            <div class="form-group"><label for="inputtitle" class="col-md-3 control-label">Color</label>
                              <div class="col-md-9">
                                  <div class="input-icon"><input id="color" type="text" class="form-control" name="color" value="{{$data->color}}" required autofocus></div>
                                @if ($errors->has('color'))
                                  <span class="help-block">
                                    <strong>{{ $errors->first('color') }}</strong>
                                  </span>
                                @endif
                              </div>
                            </div>
                            <!-- <div class="form-group"><label for="inputposition" class="col-md-3 control-label">Position</label>
                              <div class="col-md-9">
                                  <div class="input-icon"><input id="position" type="number" class="form-control" name="position" value="{{$data->position}}" required></div>
                                @if ($errors->has('position'))
                                  <span class="help-block">
                                    <strong>{{ $errors->first('position') }}</strong>
                                  </span>
                                @endif
                              </div>
                            </div> -->
                            <div class="form-body pal">
                            <div class="form-group"><label for="inputdescription" class="col-md-3 control-label">Description</label>
                              <div class="col-md-9">
                                  <div class="input-icon"><textarea  class="form-control" name="detail">{{$data->detail}}</textarea></div>
                               @if ($errors->has('detail'))
                                <span class="help-block">
                                 <strong>{{ $errors->first('detail') }}</strong>
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
                                <a href="{{url('/cards/list')}}"  type="button" class="btn btn-primary">Cancel</a>
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
