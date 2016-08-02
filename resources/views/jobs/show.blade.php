@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if (session('sucess'))
                        <div class="alert alert-success">
                            {{ session('sucess') }}
                        </div>
                    @endif
                    <h3>{{ $job->title }}</h3> 
                    <h4>{{ $job->employer->company }}</h4>
                    <h4>{{ $job->location }}</h4>


                    <h4>Salary</h4>
                    <p>{{ $job->salary }}</p>

                    <h4>Description</h4>
                    <p>{{ $job->description }}</p>
                    @if (!Auth::guest() and $job->employer_id == Auth::id())
                        
                        {!! Form::open(['action' => ['JobController@destroy', $job->id], 'method' => 'delete', 'class' => 'delete-conf']) !!}
                            <a href="{{ route('jobs.edit', array($job->id)) }}" class="btn btn-info btn-mini">Edit this Job Post</a>
                          {!! Form::submit('Delete this Job', ['class'=>'btn btn-danger btn-mini']) !!}
                        {!! Form::close() !!}
                    @endif
                    <br>
                    @if (Auth::guest())
                        <p><a href="{{ route('jobs.index') }}" class="btn btn-warning">Go Back to Jobs</a></p>
                    @else
                        <p><a href="{{ route('jobs.myjobposts') }}" class="btn btn-warning">Go Back to My Jobs</a></p>
                    @endif

                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

