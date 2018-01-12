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
<form method="post" action="{{route('role_assignment_store')}}">
    {{csrf_field()}}
    <div >
        <div >
            <label>Role</label>
            <select name="user">
                <option>Select user</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            <br><br>
            <label>Role</label>
            <select name="role">
                <option>Select role</option>
                @foreach($roles as $role)
                    <option value="{{$role->name}}">{{$role->name}}</option>
                @endforeach
            </select>



            <button>Save</button>
        </div>


    </div>
</form>

</body>
</html>
