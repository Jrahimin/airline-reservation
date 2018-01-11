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
<form method="post" action="{{route('role_create')}}">
    {{csrf_field()}}
    <div >
        <div >
            <label>Role</label>
            <input name="name" type="text">
            <br><br>
            <select name="permission">
                <option>Select permission</option>
                @foreach($permissions as $permission)
                    <option value="{{$permission->id}}">{{$permission->name}}</option>
                @endforeach
            </select>

            <button>Save</button>
        </div>


    </div>
</form>

</body>
</html>
