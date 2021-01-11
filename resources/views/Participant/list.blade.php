@extends('index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-default">
              <div class="panel-heading"> Particapants Data </div>
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
                    <h1>Particapants Data</h1>
                  </div>
                  <div class="col-md-2">
                    <div style="float: right; margin-left:3px;">
                      <a href="{{ url('home') }}" title="Back" class="btn btn-primary">Back</a>  
                    </div>
                  </div>
                  </div>
                   <form class="form-horizontal" method="GET" >
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">Display by Lottery Price</label>

                            <div class="col-md-6">
                                <select id="card_id" class="form-control" name="card_id" onchange="displayVals(this.value)">
                                <option value="0">Show All</option>
                                @foreach($cards as $card)
                                <option value="{{ $card->id }}"> Lottery Amount ${{ $card->amount }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="table-responsive">
                  
                  <table cellpadding="10px" cellspacing="10px" class="table table-striped" id='userTable'>
                    <thead>
                     <tr>
                        <th> Id </th>
                        <th> Name</th>
                        <th> Phone </th>
                        <th> Created_at </th>
                      </tr>
                    </thead>
                    <tbody> 
                      @foreach($participants as $participant)
                        <tr>
                          <td><strong> {{$participant->id}} </strong></td>
                          <td><strong> {{$participant->customer->name}}</strong></td>
                          <td><strong> {{$participant->customer->phone}}</strong></td>
                          <td><strong> {{$participant->created_at}}</strong></td>
                          <td>
                            <a href="{{ url('participant/update/'.$participant->id)}}"><button type="submit" title="Edit" class="btn btn-primary">Choose a Winner</button></a>
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
<script>
function displayVals(data)
{
    var val = data;
    var url = 'participants/list/' + data;
    window.location.href = "{{URL::to('participants/list/')}}" + "/" + val;

}
</script>
@section('scripts')

$('#orderTable').DataTable();
@endsection