@extends('Customer.layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Error Found !!!</div>
                <div class="panel-body">
@if ( count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if(Session::has('success'))
    <div class='alert alert-success'>
        {{Session::get('success')}}
    </div>
@endif
@if(Session::has('unsuccess'))
    <div class='alert alert-danger'>
        {{Session::get('unsuccess')}}
    </div>
@endif

					</div>
				</div>
			</div>
		</div>
	</div>			
@endsection