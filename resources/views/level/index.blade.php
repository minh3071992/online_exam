@extends('layouts.home')

@section('title','Levels')

@section('content')

    <!-- Display Alert Message if any Starts -->
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Bravo!</strong> {{ Session::get('success') }}
        </div>
        @endif
                <!-- Display Alert Message if any Ends -->

        <!-- Add New Department Starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add New Level</h3>
            </div>
            <div class="panel-body">
                {!! Form::open(['action'=>'LevelController@store','method'=>'post','role'=>'form','class'=>'form-horizontal']) !!}
                <div class="form-group">
                    {!! Form::label('name','Level Name',['class'=>'control-label col-sm-3']) !!}
                    <div class="col-sm-6">
                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('description','Description',['class'=>'control-label col-sm-3']) !!}
                    <div class="col-sm-6">
                        {!! Form::textarea('description',null,['class'=>'form-control','rows'=>5]) !!}
                        @if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                {{--<div class="form-group">--}}
                    {{--{!! Form::label('code','Subject Code',['class'=>'control-label col-sm-3']) !!}--}}
                    {{--<div class="col-sm-6">--}}
                        {{--{!! Form::text('code',null,['class'=>'form-control']) !!}--}}
                        {{--@if ($errors->has('code'))--}}
                            {{--<span class="help-block">--}}
                                {{--<strong>{{ $errors->first('code') }}</strong>--}}
                            {{--</span>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--{!! Form::label('short_name','Short Name',['class'=>'control-label col-sm-3']) !!}--}}
                    {{--<div class="col-sm-6">--}}
                        {{--{!! Form::text('short_name',null,['class'=>'form-control']) !!}--}}
                        {{--@if ($errors->has('short_name'))--}}
                            {{--<span class="help-block">--}}
                                {{--<strong>{{ $errors->first('short_name') }}</strong>--}}
                            {{--</span>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="form-group text-center">
                    {!! Form::submit('Add',['class'=>'btn btn-success']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <!--Add New Department Ends-->


        <!-- Display Available Department List Starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Subject List</h3>
            </div>
            <div class="panel-body">
                @foreach($levels as $level)
                    <div class="element-box col-md-3 col-sm-6 col-xs-6">
                        <div class="delete-form">
                            {!! Form::open(['action'=>['LevelController@destroy',$level->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) !!}
                            {!! Form::submit('X',['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
                        <div class="element">
                            {{ $level->name }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Display Available Department List Ends -->

@stop

@section('script')

    <script>
        function confirmDelete(){
            var x = confirm('Are you sure you want to delete this level?');
            return !!x;
        }
    </script>

@stop