@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Add Role</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('role_create') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-2 control-label">Role Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="panel-heading">
                                <h3 class="panel-title"><i class = "pe-7s-info"></i>Permissions and Access<br></h3>
                            </div>


                            <div style="padding: 30px;">
                            <div class="form-group">

                                <div class="col-md-6">
                                    @foreach($groups as $group)
                                        <input type="checkbox" name="permissions_group[]" value="{{$group->name}}" id="{{$group->id}}" class="module_checkboxes" onchange="groupSelect(this);">
                                        <label><span></span></label>
                                        <span class="text-success">{{$group->name}}</span>

                                        <li style="list-style: none">
                                            <ul class="list-unstyled list-permission-actions">
                                                @foreach($group->permissions as $permission)
                                                    <li>
                                                        <input type="checkbox" name="permissions[]" value="{{$permission->name}}"  class="permissions_group_{{$group->id}}">
                                                        <span class="text-info">{{$permission->name}}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>


                                        {{--<input type="checkbox" name="permission_group[]" value="{{$permission->name}}">
                                        {{$permission->name}}<br>--}}
                                    @endforeach
                                </div>
                            </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-1">
                                    <button type="submit" class="btn btn-primary">
                                        Add
                                    </button>
                                    <a class="btn btn-default" href="{{ route('view_all_port') }}">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function groupSelect(checkBox){
        selectClass = ".permissions_group_"+checkBox.id;
        if(checkBox.checked == true){
            $(selectClass).prop('checked', 'checked');
        }else{
            $(selectClass).prop('checked', '');
        }
    }
</script>