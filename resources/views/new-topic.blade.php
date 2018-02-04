@extends('layouts.app')

@section('content')
<div class="container">
      <div class="row">
          <div class="col-md-6 col-md-offset-3">
              <div class="panel panel-default">
                  <div class="panel-heading">New Topic Details</div>

                 <div class="panel-body">

            <form role="form" class="form-horizontal" method="post" action="{{route('process-new-topic')}}">
                {{ csrf_field() }}
                   
                    <div class="form-group">
                      <label for="name" class="control-label col-md-3">Name:</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Topic Name">
                      </div>
                      
                    </div>
                    <div class="form-group">
                      <label for="description" class="control-label col-md-3">Description:</label>
                      <div class="col-md-6">
                        <textarea class="form-control" rows="4" name="description" id="description" placeholder="Topic Description"></textarea>
                      </div>
                      
                    </div>
                    
                    
                 <div class="form-group">
                   <div class=" col-md-4 col-md-offset-3">
                     <button type="submit" class="btn btn-primary">Create</button>
                   </div>
                    
                  </div>
                   
                
              </form>
                </div>
            </div>
            
      </div>
  </div>
</div>
@endsection