@extends('layouts.app')

@section('content')

    <div class="box box-primary" style="padding:40px">
        <div class = "row">
            <div class="col-md-12">
            <h1>Permissions </h1>
            <ul>
                @foreach($permissions as $permission)
                    <li>{{$permission->name}}</li>
                @endforeach
            </ul>
            <h1>Users</h1>
            @if(!$users->isEmpty())
                <ul>
                    @foreach($users as $user)
                        <li>{{$user->name}}</li>
                    @endforeach
                </ul>
            @else
                <span style="margin-left: 20px;">This role is not assigned to any user</span>
            @endif
            </div>
        </div>
    </div>

@endsection