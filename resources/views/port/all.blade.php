@extends('layouts.app')

@section('content')
<div class="filter-box">
	<div class="row">
		<div class="col-md-12 text-right">
			<a href="{{ route('add_port') }}" class="btn btn-primary">Add New City</a>
		</div>
	</div>
</div>

	<hr>

<div class="box box-primary" style="padding:20px">
	<div class = "row">
		<div class="col-md-12 table-responsive">
        	<table class="table table-hover table-striped">
        		<thead>
        			<tr>
						<th>Name</th>
						<th>Country</th>
						<th>City</th>
						<th></th>
					</tr>
        		</thead>
				
				<tbody>
					@foreach ($ports as $port)
						<tr>
							<td>{{ $port->name }}</td>
							<td>{{ $countries[$port->country_code] or '' }}</td>
							<td>{{ $port->city_name }}</td>
							<td class="text-right">
								<div class="dropdown">
									<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										<span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span>
									</button>
									<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
										<li><a href="{{ route('edit_port', ['port' => $port->id]) }}">Edit</a></li>
										<li><a class="delete" data-id="{{ $port->id }}" data-toggle="modal" data-target="#deleteModal">Delete</a></li>
									</ul>
								</div>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
			<div class="pagination"> {{ $ports->links() }} </div>
        </div>
    </div>
</div>


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
@endsection

@section('additionalJS')
<script type="text/javascript">
	$(function(){
		$.ajaxSetup({
	        headers: {
	            'X-CSRF-Token': '{!! csrf_token() !!}'
	        }
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
			  url: "{{ route('delete_port') }}",
			  data: { id: id }
			})
			  .done(function( msg ) {
			    $('#deleteModal').modal('toggle');
			    $( 'tr:eq( '+index+' )' ).remove();
			  });
		});
	})
</script>
@stop