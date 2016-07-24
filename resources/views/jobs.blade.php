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
                        </div>
                    @endforeach

                @else
                    Goodbye!
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection