@extends('index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-default">
              <div class="panel-heading"> Contacts Data </div>
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
                    <h1>Contacts Data</h1>
                  </div>
                  <div class="col-md-2">
                    <div style="float: right; margin-left:3px;">
                      <a href="{{ url('home') }}" title="Back" class="btn btn-primary">Back</a>  
                    </div>
                    <div style="float: right;">
                      <a href="{{ url('contact/create') }}" title="Add" class="btn btn-primary">Add</a>  
                    </div>
                  </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table cellpadding="10px" cellspacing="10px" class="table table-striped" id="orderTable">
                    <thead>
                     <tr>
                        <th> Id </th>
                        <th> Email</th>
                        <th> Phone </th>
                        <th> Created_at </th>
                      </tr>
                    </thead>
                    <tbody> 
                      @foreach($contact as $contact)
                        <tr>
                          <td><strong> {{$contact->id}} </strong></td>
                          <td><strong> {{$contact->contact_email}}</strong></td>
                          <td><strong> {{$contact->contact_phone}}</strong></td>
                          <td><strong> {{$contact->created_at}}</strong></td>
                          <td>
                            <a href="{{ url('contact/update/'.$contact->id)}}"><button type="submit" title="Edit" class="btn btn-primary fa fa-edit"></button></a>
                            <a href="{{ url('contact/delete/'.$contact->id)}}"><button type="submit" title="Delete" class="btn btn-danger fa fa-trash-o"></button></a>
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


@section('scripts')
$('#orderTable').DataTable();
@endsection