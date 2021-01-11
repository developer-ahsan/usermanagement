@extends('index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-default">
              <div class="panel-heading"> Spinner Management </div>
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
                <div class="row">
                  <div class="col-md-10">
                    <h1>Banners Data</h1>
                  </div>
                  <div class="col-md-2">
                    <div style="float: right; margin-left:3px;">
                      <a href="{{ url('home') }}" title="Back" class="btn btn-primary">Back</a>  
                    </div>
                    <div style="float: right;">
                      <a href="{{ url('banner') }}" title="Add" class="btn btn-primary">Add</a>  
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table cellpadding="10px" cellspacing="10px" class="table table-striped " >
                    <thead>
                     <tr>
                        <th><strong> Coupon Name </strong></th>
                        <th><strong> Spinner Title </strong></th>
                        <th><strong> Spinner Position </strong></th>
                        <th><strong> Action </strong></th>
                      </tr>
                    </thead>
                    <tbody style="overflow-x: scroll;"> 
                      @foreach($spinners as $spinner)
                        <tr>
                        </tr>
                      @endforeach
                    </tbody>      
                  </table>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
