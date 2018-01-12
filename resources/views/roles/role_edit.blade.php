    <!doctype html>
    <html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Roles</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->

    </head>
    <body>
    <h1>Users</h1>
    <ul>
        @foreach($users as $user)
            <li>{{$user->name}}     <form action="{{route('remove_role_user',['roleId'=>$role->id])}}" method="post">
                    <input type="hidden" value="{{$user->id}}" name="user"></input>
                    <button>Remove User</button>
                </form></li>
            @endforeach
    </ul>


        <form method="post" action="{{route('role_edit_store', ['role'=>$role])}}">
            {{csrf_field()}}
            <div >
                <div >
                    <label>Role</label>
                    <input name="name" type="text" value="{{$role->name}}">
                    <br><br>
                        @foreach($allPermissions as $permission)
                            <input @if($permissionsOfRole->contains($permission)) checked="checked" @endif
                                   type="checkbox" name="permission[]" value="{{$permission->name}}">
                            {{$permission->name}}<br>
                        @endforeach

                        <button>Save</button>
                    </div>


                </div>


    </form>





    </body>
    </html>
