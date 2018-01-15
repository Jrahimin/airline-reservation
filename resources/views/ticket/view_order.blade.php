@extends('layouts.app')

@section('additionalCSS')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}">
@stop

@section('content')
    <div class="box box-primary" style="padding: 20px;">
        <div class="row">

                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Email</th>
                        <th>Contact No</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>{{ $ticket->order->id }}</td>
                            <td>{{ $ticket->order->email }}</td>
                            <td>{{ $ticket->order->contact_no }}</td>

                            <td class="text-right">
                                <div class="dropdown">
                                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                        <li><a href="{{ route('view_ticket', ['orderId' => $ticket->order->id]) }}">View Tickets</a></li>
                                        <li><a href="{{ route('order_print', ['orderId' => $ticket->order->id]) }}">Print Order</a></li>
                                        <li><a class="delete" data-id="{{ $ticket->order->id }}" data-toggle="modal" data-target="#deleteModal">Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
    <script type="text/javascript" src="{{ asset('js/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script type="text/javascript">
        $(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': '{!! csrf_token() !!}'
                }
            });

            $('#start_date').datetimepicker({
                format: 'YYYY-MM-DD'
            });

            $('#end_date').datetimepicker({
                useCurrent: false, //Important! See issue #1075
                format: 'YYYY-MM-DD'
            });

            $("#start_date").on("dp.change", function (e) {
                $('#end_date').data("DateTimePicker").minDate(e.date);
            });

            $("#end_date").on("dp.change", function (e) {
                $('#start_date').data("DateTimePicker").maxDate(e.date);
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
                    url: "{{ route('delete_order') }}",
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

        })
    </script>
@stop