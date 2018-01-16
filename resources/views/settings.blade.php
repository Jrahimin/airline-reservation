<?php use App\Enumeration\RoleType; ?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('save_settings') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="company_name" class="col-md-4 control-label">Company Name</label>

                                <div class="col-md-6">
                                    <input id="company_name" type="text" class="form-control" name="company_name" value="{{ $settings['company_name'] }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control" name="description" value="{{ $settings['description'] }}">

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                                <label for="location" class="col-md-4 control-label">Location</label>

                                <div class="col-md-6">
                                    <input id="location" type="text" class="form-control" name="location" value="{{ $settings['location'] }}">

                                    @if ($errors->has('location'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                                <label for="telephone" class="col-md-4 control-label">Telephone</label>

                                <div class="col-md-6">
                                    <input id="telephone" type="text" class="form-control" name="telephone" value="{{ $settings['telephone'] }}">

                                    @if ($errors->has('telephone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('telephone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                                <label for="logo" class="col-md-4 control-label">Logo</label>
                                <div class="col-md-6" >
                                    <img id="logoPreview" src="{{ asset($settings['image_url']) }}" alt="Present Image" height="90px" width="90px"/>

                                    <button class="btn btn-default" type="button" id="get_file"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Change</button>

                                    <input name="logo" type="file" id="logo" style=" display: none;" accept="image/*">
                                    @if($errors->has('logo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('logo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                                <div class="form-actions pull-right">
                                    <input type="submit" value="Submit" id="submitf" class="btn floating-button btn-primary float_right">
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('additionalJS')
    <script type="text/javascript">
        $(function() {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#logoPreview').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#logo").change(function(){
                readURL(this);
            });

            $('#get_file').click(function(){
                $('#logo').click();
            });
        });
    </script>
@stop