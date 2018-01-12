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

                @foreach($permissions as $permission)
                    <input type="checkbox" name="permission[]" value="{{$permission->name}}">
                     {{$permission->name}}<br>
                @endforeach


            <button>Save</button>
        </div>


    </div>
</form>

</body>
</html>
