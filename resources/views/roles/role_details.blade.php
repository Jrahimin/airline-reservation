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

<h1>Permissions </h1>
   <ul>
       @foreach($permissions as $permission)
           <li>{{$permission->name}}</li>
           @endforeach
   </ul>
<h1>Users</h1>
   <ul>
       @foreach($users as $user)
           <li>{{$user->name}}</li>
       @endforeach
   </ul>





</body>
</html>
