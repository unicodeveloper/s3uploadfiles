@extends('layouts.master')

@section('content')
    <div class="main-container">

        @include('layouts.partials.alerts')

        <div class="page-header">
            <h3>Manage Your Audio Files Here</h3>
        </div>

        <form role="form" method="POST" action="{{ url('/upload') }}"  enctype="multipart/form-data" class="form-horizontal">

            <div class="form-group{{ $errors->has('file_name') ? ' has-error' : '' }}">
                <label for="gravatar" class="col-sm-2 control-label"></label>
                <div class="col-sm-4">
                    <input type="file" name="file_name" id="file_name">
                    @if ($errors->has('file_name'))
                        <span class="help-block">{{ $errors->first('file_name') }}</span>
                    @endif
                </div>
            </div>
             <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Upload Audio File</button>
                </div>
            </div>
            {!! csrf_field() !!}
        </form>

    </div>
@stop