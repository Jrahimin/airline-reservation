<?php use App\Enumeration\RoleType; ?>
@extends('layouts.app')

@section('content')
<div class="filter-box">
	<div class="row">
		<div class="col-md-6">
			<div class="input-group pull-left" style="width: 30%;">
				<input type="text" id="global_filter" class="form-control pull-right global_filter" placeholder="Search">

				<div class="input-group-btn">
					<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="pull-right">
				@role('Admin')
					<a href="{{route('add_user')}}" class="btn btn-primary hidden-sm hidden-xs" title="New Item"><span class=""><i class="fa fa-plus-circle" aria-hidden="true"></i> Add User</span></a>
				@endrole
			</div>
		</div>
	</div>

</div>

<div class="box box-primary" style="padding:20px">
	<div class = "row">
		<div class="col-md-12 table-responsive">

			<table class="table table-hover table-striped" >
				<thead>
				<tr >
					<th></th>
					<th>Actions</th>
					<th>Name</th>
					<th>Email</th>
					<th>Assigned Role</th>
				</tr>
				</thead>
				<tbody>
				@foreach($users as $user)
					<?php
                    $roleName = $user->getRoleNames()->first();
					?>
					<tr data-id="{{ $user->id }}">
						<td></td>
						<td>
							<div class="dropdown">
								<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="pe-7s-pen"></i>
									<span class="caret"></span></button>
								<ul class="dropdown-menu">
									@role('Admin')
										<li><a href="{{route('edit_user',['user'=>$user->id])}}">Edit User</a></li>
										<li><a class="delete" data-id="{{ $user->id }}" data-toggle="modal" data-target="#deleteModal">Delete</a></li>
									@endrole
								</ul>
							</div>
						</td>

						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $roleName }}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Delete</h4>
			</div>
			<div class="modal-body">
				<p>Are you sure want to delete?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button id="btnDelete" type="button" class="btn btn-danger">Delete</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@section('additionalJS')
<script type="text/javascript">
	$(function(){
		$.ajaxSetup({
	        headers: {
	            'X-CSRF-Token': '{!! csrf_token() !!}'
	        }
	    });

        function filterGlobal () {
            $('.table').DataTable().search(
                $('#global_filter').val(),
                $('#global_regex').prop('checked'),
                $('#global_smart').prop('checked')
            ).draw();
        }

        $(document).ready(function(){
            table = $('.table').DataTable({
                pageLength:10,
                buttons: [
                    'copy', 'csv', 'excel', 'print','colvis'
                ],
            });

            $('.delete').click(function(){
                var id = $(this).data('id');
                var index = $(this).closest('tr').index();

                $("#btnDelete").attr("data-id", id);
                $("#btnDelete").attr("data-index", index);
            });

            $('#btnDelete').click(function(){
                //alert($(this).attr('data-id'));\
                var id = $(this).attr('data-id');
                var index = parseInt($(this).attr('data-index'))+1;

                $.ajax({
                    method: "POST",
                    url: "{{ route('delete_user') }}",
                    data: { id: id }
                }).done(function( data ) {
                    if (data.success == false) {
                        alert(data.message);
                    } else {
                        $('#deleteModal').modal('toggle');
                        $( 'tr:eq( '+index+' )' ).remove();
                    }
                });
            });

        });

        $('input.global_filter').on( 'keyup click', function () {
            filterGlobal();
        })
	})
</script>
@stop