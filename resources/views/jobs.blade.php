@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">             
                @if (count($jobs) > 0)
                    <div class="panel-heading">Jobs</div>
                    @foreach ($jobs as $job)
                        <div class="panel-body">
                            <h3>{{ $job->title }}</h3>
                            <p>{{ $job->description }}</p>
                            @if ($job->employer_id == Auth::id())
                                <a href="{{ url('jobs/show/'.$job->id)}}">Show</a> | 
                                <a>Edit</a>
                            @endif
                        </div>
                    @endforeach


                @else
                    Goodbye!
                @endif
                <div class="panel-body">
                    {!! $jobs->render() !!}
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection