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
                       <form class="form-horizontal" method="POST" action="{{ url('cards/store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount" class="col-md-4 control-label">Amount</label>

                            <div class="col-md-6">
                                <input id="amount" type="number" class="form-control" name="amount" value="{{ old('amount') }}" required autofocus>

                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('win_amount') ? ' has-error' : '' }}">
                            <label for="win_amount" class="col-md-4 control-label">Winning Amount</label>

                            <div class="col-md-6">
                                <input id="win_amount" type="number" class="form-control" name="win_amount" value="{{ old('win_amount') }}" required autofocus>

                                @if ($errors->has('win_amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('win_amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="type" class="col-md-4 control-label">Type</label>

                            <div class="col-md-6">
                                <select id="type" class="form-control" name="type">
                                <option value="weekly" @if (old('type') == "weekly") {{ 'selected' }} @endif>Weekly</option>
                                <option value="big"  @if (old('type') == "big") {{ 'selected' }} @endif>Big</option>
                                <option value="daily"  @if (old('type') == "daily") {{ 'selected' }} @endif>Daily</option>
                                
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}">
                            <label for="start" class="col-md-4 control-label">Start Date</label>

                            <div class="col-md-6">
                                <input id="start" type="datetime-local" class="form-control" name="start" value="{{ old('start') }}" required autofocus>

                                @if ($errors->has('start'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('end') ? ' has-error' : '' }}">
                            <label for="end" class="col-md-4 control-label">End Date</label>

                            <div class="col-md-6">
                                <input id="end" type="datetime-local" class="form-control" name="end" value="{{ old('end') }}" required autofocus>

                                @if ($errors->has('end'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                            <label for="color" class="col-md-4 control-label">Color</label>

                            <div class="col-md-6">
                                <input id="color" type="text" class="form-control" name="color" value="{{ old('color') }}" required autofocus>

                                @if ($errors->has('color'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('color') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-body pal">
                            <div class="form-group"><label for="inputdescription" class="col-md-4 control-label">Description</label>
                              <div class="col-md-6">
                                  <div class="input-icon"><textarea  class="form-control" name="detail"></textarea></div>
                               @if ($errors->has('detail'))
                                <span class="help-block">
                                 <strong>{{ $errors->first('detail') }}</strong>
                                 </span>
                                @endif
                              </div>
                            </div>
                          </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Card
                                </button>
                                <div style="float: left; margin-right:3px;">
                                  <a href="{{ url('cards/list') }}" title="Back" class="btn btn-primary">Back</a>  
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
