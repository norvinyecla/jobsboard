@extends('layouts.app')

@section('content')
<!--div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">             
                <div class="panel-heading">Edit a Job</div>
                <div class="panel-body">
                    {!! Form::open(array('action'=>'JobController@update', 'id'=>$job->id, 'class'=>'form-horizontal') ) !!} 
                    <?php //echo Form::model($job, array('route' => array('jobs.update', $job->id))) ?>
                        {{ csrf_field() }}
                          <!input type="hidden" name="id" value="{{ $job->id }}{{ old('id') }}">
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <?php echo Form::token(); ?>
                            <?php echo Form::label('title', 'Job Title', array('class' => 'col-md-4 control-label')); ?>

                            <div class="col-md-6">
                                
                                <?php echo Form::text('title'); ?>
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <?php echo Form::label('description', 'Description', array('class' => 'col-md-4 control-label')); ?>

                            <div class="col-md-6">
                                <?php echo Form::textarea('description'); ?>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            <?php echo Form::label('location', 'Location', array('class' => 'col-md-4 control-label')); ?>
                            <div class="col-md-6">
                                <?php echo Form::text('Location'); ?>

                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('salary') ? ' has-error' : '' }}">
                            <?php echo Form::label('salary', 'Salary', array('class' => 'col-md-4 control-label')); ?>
                            <div class="col-md-6">
                                <?php echo Form::text('Salary'); ?>

                                @if ($errors->has('salary'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('salary') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <?php echo Form::button('Save', array('class' => "btn btn-primary")); ?>
                            </div>
                        </div>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div-->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">             
                <div class="panel-heading">Edit a Job</div>
                <div class="panel-body">
                    {!! Form::model($job, array('route' => array('jobs.update', $job->id), 'class' => 'form-horizontal'))  !!} 
                    <?php //echo Form::model($job, array('route' => array('jobs.update', $job->id))) ?>
                        {{ csrf_field() }}
                          <!--input type="hidden" name="id" value="{{ $job->id }}{{ old('id') }}"-->
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <?php echo Form::token(); ?>
                            <?php echo Form::label('title', 'Job Title', array('class' => 'col-md-4 control-label')); ?>

                            <div class="col-md-6">
                                
                                <?php echo Form::text('title'); ?>
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <?php echo Form::label('description', 'Description', array('class' => 'col-md-4 control-label')); ?>

                            <div class="col-md-6">
                                <?php echo Form::textarea('description'); ?>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            <?php echo Form::label('location', 'Location', array('class' => 'col-md-4 control-label')); ?>
                            <div class="col-md-6">
                                <?php echo Form::text('location'); ?>

                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('salary') ? ' has-error' : '' }}">
                            <?php echo Form::label('salary', 'Salary', array('class' => 'col-md-4 control-label')); ?>
                            <div class="col-md-6">
                                <?php echo Form::text('salary'); ?>

                                @if ($errors->has('salary'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('salary') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <?php echo Form::button('Save', array('class' => "btn btn-primary")); ?>
                            </div>
                        </div>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection