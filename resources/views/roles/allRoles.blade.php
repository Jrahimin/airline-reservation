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
<table>
    <thead>
    <th>Role</th>
    <th>Details</th>
    <th>Edit</th>
    <th>Delete</th>
    </thead>
    <tbody>

      @foreach($roles as $role)
          <tr>
          <td>{{$role->name}}</td>
          <td><a href="{{route('role_details', ['roleId'=>$role->id])}}">Details</a></td>
          <td><a href="{{route('role_edit', ['roleId'=>$role->id])}}">Edit</a></td>
          <td>
              <form method="post" action="{{route('role_delete', ['roleId'=>$role->id])}}">
                  {{csrf_field()}}
                  <input type="hidden" value="delete" name="_method">
                      <button>Delete</button>
              </form>
          </td>
          </tr>
          @endforeach


    </tbody>
</table>

</body>
</html>
