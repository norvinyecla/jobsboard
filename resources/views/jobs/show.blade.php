@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">             
                <div class="panel-body">
				<h3>{{ $job->title}}</h3>
                <h4>{{ $job->location }}</h4>

				<p>{{ $job->salary }}</p>

               	<p>{{ $job->description }}</p>

               	

               	
                </div>   
            </div>
        </div>
    </div>
</div>
@endsection