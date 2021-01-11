@extends('index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-default">
              <div class="panel-heading"> Winners Data </div>
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
                    <h1>Winners Data</h1>
                  </div>
                  <div class="col-md-2">
                    <div style="float: right; margin-left:3px;">
                      <a href="{{ url('home') }}" title="Back" class="btn btn-primary">Back</a>  
                    </div>
                  </div>
                  </div>
                </div>
                <div class="table-responsive">
                  
                  <table cellpadding="10px" cellspacing="10px" class="table table-striped" id='userTable'>
                    <thead>
                     <tr>
                        <th> Id </th>
                        <th> Name</th>
                        <th> Participate_Amount </th>
                        <th> Winning Price </th>
                        <th> Created_at </th>
                      </tr>
                    </thead>
                    <tbody> 
                      @foreach($winners as $winner)
                        <tr>
                          <td><strong> {{$winner->id}} </strong></td>
                          <td><strong> {{$winner->participant->customer->name}}</strong></td>
                          <td><strong> {{$winner->participant->card->amount}}</strong></td>
                          <td><strong> {{$winner->participant->card->win_amount}}</strong></td>
                          <td><strong> {{$winner->created_at}}</strong></td>
                          <!-- <td>
                            <a href="{{ url('winner/update/'.$winner->id)}}"><button type="submit" title="Edit" class="btn btn-primary">Choose a Winner</button></a>
                          </td> -->
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