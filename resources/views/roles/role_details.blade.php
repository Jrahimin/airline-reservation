@extends('layouts.app')

@section('content')

    <div class="box box-primary" style="padding:40px">
        <div class = "row">
            <div class="col-md-12">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class = "pe-7s-info"></i>Permissions<br></h3>
                </div>
            <div class="col-md-offset-1">
                @foreach($groups as $group)
                    <h2>{{ $group->name }}</h2>
                        @foreach($group->permissions as $permission)
                            <ul>
                                <li>{{$permission->name}}</li>
                            </ul>
                        @endforeach

                @endforeach
            </div>

                <div class="panel-heading">
                    <h3 class="panel-title"><i class = "pe-7s-info"></i>Role assigned to users</h3>
                </div>
                <br>
            @if(!$users->isEmpty())
                <div class="col-md-offset-1">
                    @foreach($users as $user)
                        <ul>
                            <li>{{$user->name}}</li>
                        </ul>
                    @endforeach
            @else
                <span style="margin-left: 20px;">This role is not assigned to any user</span>
            @endif
                </div>
            </div>
        </div>
    </div>

@endsection