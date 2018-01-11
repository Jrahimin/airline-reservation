@extends('.layouts.app')

@section('content')

    <form class="form-horizontal" role="form"  method="GET" action="{{ route('order_print', ['orderId' => $tickets[0]->order->id]) }}">

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" id="submit" class="btn btn-primary">
                    Print Ticket
                </button>
            </div>
        </div>

    </form>

@endsection