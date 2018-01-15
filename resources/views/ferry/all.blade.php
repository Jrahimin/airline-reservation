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
					@role('admin')
					<a href="{{route('add_ferry')}}" class="btn btn-primary hidden-sm hidden-xs" title="New Item"><span class=""><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Airplane</span></a>
					@endrole
				</div>
			</div>
		</div>

		<div class="row hidden" id="selectButtonHolder" style="margin-top:10px">
			<div class="col-md-12">
				<div class="input-group">
					<button style="margin-right:5px" class="btn btn-danger" id="deleteButton">Delete Row(s)</button>
					<button style="margin-right:5px" class="btn btn-default" id="selectAllButton">Select All</button>
					<button class="btn btn-default" id="clearAllButton">Clear All</button>
				</div>
			</div>
		</div>
	</div>

	<div class="box box-primary" style="padding:20px">
		<div class = "row">
			<div class="col-md-12 table-responsive">

				<table class="table table-hover " >
					<thead>
					<tr >
						<th></th>
						<th></th>
						<th>Actions</th>
						<th>Name</th>
						<th>Captain Name</th>
						<th>Nummber Of Seat</th>
						<th>Number Of Crew</th>
						<th>Status</th>
					</tr>
					</thead>
					<tbody>
					@foreach($airplanes as $airplane)
						<tr data-id="{{ $airplane->id }}">
							<td></td>
							<td><img class="img-circle" src="{{ asset($airplane->image_url) }}" height="50px" width="50px"></td>
							<td>
								<div class="dropdown">
									<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="pe-7s-pen"></i>
										<span class="caret"></span></button>
									<ul class="dropdown-menu">
										@role('admin')
										<li><a href="{{route('edit_ferry',['airplane'=>$airplane->id])}}">Edit Airplane</a></li>
										<li><a href="{{route('delete_ferry',['airplane'=>$airplane->id])}}">Delete</a></li>
										@endrole
									</ul>
								</div>
							</td>

							<td>{{ $airplane->name }}</td>
							<td>{{ $airplane->captain_name }}</td>
							<td>{{ $airplane->number_of_seat }}</td>
							<td>{{ $airplane->number_of_crew }}</td>
							<td>
								@if($airplane->status == 1)
									<span class="label label-success">Active</span>
								@else
									<span class="label label-danger">Deactive</span>
								@endif
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection

<div class="modal modal-danger fade" id="deleteModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Delete</h4>
			</div>
			<div class="modal-body">
				<p>Are you sure want to delete?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
				<button id="confirmDelete" type="button" class="btn btn-outline">Delete</button>
			</div>
		</div>
	</div>
</div>

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
                    columnDefs: [{
                        orderable: false,
                        className: 'select-checkbox',
                        targets:   0
                    }],
                    select: {
                        style:    'multi',
                        selector: 'td:first-child'
                    },
                    dom:"Bt<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-4'l><'col-sm-8'p>>",
                    buttons: [
                        'copy', 'csv', 'excel', 'print','colvis'
                    ],

                });

                table.on( 'select', function ( e, dt, type, indexes ) {
                    if ( type === 'row' ) {
                        $('#selectButtonHolder').removeClass('hidden');
                    }

                });

                table.on( 'deselect', function ( e, dt, type, indexes ) {
                    var count_rows =  table.rows('.selected').data().length;
                    if(count_rows==0){
                        $('#selectButtonHolder').addClass('hidden');
                    }
                } );

                $('#selectAllButton').click( function () {

                    table.rows({ page: 'current' }).select();

                });

                $('#clearAllButton').click( function () {

                    table.rows({ page: 'current' }).deselect();

                } );

                $('#deleteButton').click( function () {
                    $("#deleteModal").modal('toggle');
                });

                $('#confirmDelete').click(function(){

                    var id = $.map(table.rows('.selected').nodes(), function (item) {
                        return $(item).attr("data-id");
                    });

                    //console.log(id);
                    $.ajax({
                        url: "{{route('delete_ferry')}}",
                        type: "post",
                        data: {id:id},
                        success: function(response){
                            if(response.success)
                                table.rows('.selected').remove().draw( false );
                            $("#deleteModal").modal('toggle');
                            $('#selectButtonHolder').addClass('hidden');
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