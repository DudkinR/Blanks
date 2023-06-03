@extends('layouts.app')
@section('title', 'Название страницы')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- create link to create new role -->
    <div class="col-md-12">
            <div class="card"><a href="{{route('roles.users')}}" class='btn'>back</a>
                <form action="{{route("role.user.update", $user->id)}}" method="post" >
                    @csrf
                    @method("PUT")
                    <div class="card-header">{{$user->name}}</div>
                    <div class="card-body">
                        <p>{{$user->email}}</p>
                        <?php
                        $myroles = [];
                        foreach ($user->roles as $role) {
                            $myroles[] = $role->id;
                        }
                        $all_roles = \App\Models\Role::all();
                        ?>
                    <DIV class="form-group">
                        <label for="role_id">Role</label>
                        <select name="role_id[]" id="role_id" class="form-control" multiple> 
                            @foreach ($all_roles as $role)
                                <option value="{{$role->id}}" {{in_array($role->id, $myroles) ? "selected" : ""}}>{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>    
            </form>
        </div>
    </div>
</div>
@endsection