  @extends('layouts.app')

  @section('content')
  <div class="container text-center">
    <a href="{{route('new')}}" class="btn btn-primary">Create New Topic</a>
  </div>
  @if($user=== $topic->user_id)
  <div class="container text-center" style="margin-top:3px">
    <a href="{{route('delete-topic', ['id' => $topic->id])}}" class="btn btn-success">Delete</a>
  </div>
  @endif
  <div class="container">

  <h1>{{ $topic->name }}</h1>
  <h3>{{ $topic->description }}</h3>

  </div>
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="panel panel-default">
                  <div class="panel-heading">Share an Idea</div>

                 <div class="panel-body">
              <form method="post" action="{{ route('new-idea', ['id' => $topic->id]) }} ">
               {{csrf_field()}}
               <div class="form-group">
                 <textarea name="body" id="body" class="form-control" rows="3" placeholder="Wrie your Idea"></textarea>
               </div>
               <div class="pull-right">
                 <button type="submit" class="btn btn-primary">Share</button>
               </div>
             </form>



                </div>
                </div>
                </div>
               <hr>
               
              <div class="col-md-12">
              <div class="panel panel-default  shared">
                  <div class="panel-heading bg-info">Idea Discussion</div>
                  <div class="panel-body">
            @if($ideas->isEmpty())

                    <div class="text-center">No Idea has posted yet.</div>

              @else
                 
                 <ul class="list-group">
                   @foreach($ideas as $idea)
                   <li class="list-group-item">
                     {{ $idea->body }}
                      <span class="pull-right label label-pill label-danger ">
                      {{ $idea->author}}:{{date('d-m-Y', strtotime($idea->created_at))}}
                      </span>
                   </li>
                   @endforeach
                 </ul>
                </div>
                </div>
        </div>
        @endif

          </div>
      </div>


  @endsection