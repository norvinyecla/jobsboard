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
                    <h3>{{ $job->title}}</h3>
                    <h4>{{ $job->location }}</h4>

                    <h4>Salary</h4>
                    <p>{{ $job->salary }}</p>

                    <h4>Description</h4>
                    <p>{{ $job->description }}</p>
                    @if (!Auth::guest() && $job->employer_id == Auth::id())
                        <a href="{{ route('jobs.edit',    array($job->id)) }}">Edit this Job Post</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection