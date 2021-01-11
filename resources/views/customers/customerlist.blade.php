@extends('index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-default">
              <div class="panel-heading"> Customers Data </div>
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
                    <h1>Customers Data</h1>
                  </div>
                  <div class="col-md-2">
                    <div style="float: right; margin-left:3px;">
                      <a href="{{ url('home') }}" title="Back" class="btn btn-primary">Back</a>  
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table cellpadding="10px" cellspacing="10px" class="table table-striped " >
                    <thead>
                     <tr>
                        <th><strong> User Name </strong></th>
                        <th><strong> Email </strong></th>
                        <th><strong> Create Date </strong></th>
                        <th><strong> Action </strong></th>
                      </tr>
                    </thead>
                    <tbody style="overflow-x: scroll;"> 
                      @foreach($users as $user)
                       <tr>
                          <td><strong> {{$user->name}} </strong></td>
                          <td><strong> {{$user->email}} </strong></td>
                          <td><strong> {{$user->created_at}} </strong></td>
                          
                          <td>
                            <a href="{{ url('deletecustomer/'.$user->id)}}"><button type="submit" title="Delete" class="btn btn-danger fa fa-trash-o"></button></a>
                          </td>
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
