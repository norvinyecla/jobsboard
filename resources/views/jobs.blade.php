@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                @if (count($jobs) > 0)
                    <div class="panel-heading">Jobs</div>
                    @if (session('sucess'))
                        <div class="alert alert-success">
                            {{ session('sucess') }}
                        </div>
                    @endif
                    @foreach ($jobs as $job)
                        <div class="panel-body">
                            <h3><a href="{{ url('jobs/show/'.$job->id)}}">{{ $job->title }}</a></h3>
                            <h4>{{ $job->employer->company }}</h4>
                            <p>PHP {{ $job->salary }} &nbsp; &nbsp;{{ $job->location }}</p>
                            <p>{{ substr($job->description, 0, 200) }}</p>
                            @if (!Auth::guest() and $job->employer_id == Auth::id())
                                <a href="{{ url('jobs/edit/'.$job->id) }}" class="btn btn-info">Edit this Job Post</a>
                            @endif
                        </div>
                    @endforeach
                @else
                    <div class="panel-body">
                        <h4>There are no jobs to display</h4>
                    </div>
                @endif
                <div class="panel-body">
                    {!! $jobs->render() !!}
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection