<?php use App\Enumeration\RoleType; ?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Edit User</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('edit_user_post', ['user' => $user->id]) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $user->name }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') ? old('email') : $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                            <label for="role" class="col-md-4 control-label">User Type</label>

                            <div class="col-md-6">
                            	<select class="form-control" name="role" id="role">
                            		<option value="">Select User Type</option>

                                    @if (Auth::user()->role == RoleType::$ADMIN)
                                		<option value="{{ RoleType::$ADMIN }}" {{ $user->role == RoleType::$ADMIN ? 'selected' : '' }}>Admin</option>
                                        <option value="{{ RoleType::$CUSTOMER }}" {{ $user->role == RoleType::$CUSTOMER ? 'selected' : '' }}>Customer</option>
                                    @endif

                            		<option value="{{ RoleType::$COMPANY_ADMIN }}" {{ $user->role == RoleType::$COMPANY_ADMIN ? 'selected' : '' }}>Company User</option>
                            		<option value="{{ RoleType::$COMPANY_STAFF }}" {{ $user->role == RoleType::$COMPANY_STAFF ? 'selected' : '' }}>Company Staff</option>
                            		
                            	</select>

                                @if ($errors->has('role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        @if (Auth::user()->role == RoleType::$ADMIN)
                            <div id="form-group-company" class="form-group{{ $errors->has('company') ? ' has-error' : '' }} hide">
                                <label for="company" class="col-md-4 control-label">Select Company</label>

                                <div class="col-md-6">
                                	<select class="form-control" name="company">
                                		<option value="">Select Company</option>
                                		
                                		@foreach($companies as $company)
                                			<option value="{{ $company->id }}" {{ $user->company_id == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                                		@endforeach
                                	</select>

                                    @if ($errors->has('company'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('company') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endif

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                                <a class="btn btn-default" href="{{ route('view_all_user') }}">Cancel</a>
                            </div>
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
        @if (Auth::user()->role == RoleType::$ADMIN)
            $('#role').change(function() {
            	var val = $(this).val();

            	if (val == '{{ RoleType::$COMPANY_ADMIN }}' || val == '{{ RoleType::$COMPANY_STAFF }}') {

            		$('#form-group-company').removeClass('hide');
            	} else {
            		$('#form-group-company').addClass('hide');
            	}
            });

            $('#role').trigger('change');
        @endif
    });
</script>
@stop