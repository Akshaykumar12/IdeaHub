@extends('layouts.app')

@section('content')
<div class="container text-center">
    <a href="{{route('new')}}" class="btn btn-primary">Create New Topic</a>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Topics</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                
                    
                    
                @if($topics->isEmpty())
                
                  <div class="text-center">No Topics yet.</div>
                
                
                @else
              
                <ul class="list-group">
                 @foreach($topics as $topic)
                 
                  <li class="list-group-item">
                  <a href="{{route('topic', ['id' => $topic->id]) }}">
                  <div class="post-item">
                  {{ $topic->name }}     
                  <span class="label label-pill label-success justify-content-center" style="color:#fff">{{$topic->author}}</span>
                  <span class="label label-pill label-danger pull-right" style="color:#fff">
                  {{date('d-m-Y', strtotime($topic->created_at))}}
                  </span>
                  </div>
                  </a> 
                  </li>
                
                  @endforeach 
                  </ul>
                  @endif
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
