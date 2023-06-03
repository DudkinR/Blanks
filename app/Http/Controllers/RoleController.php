<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Auth\Access\Gate;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = \App\Models\Role::all();
        return view("roles.index", compact("roles"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("roles.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $role = new \App\Models\Role();
        $role->name = $request->name;
        $role->save();
        return redirect()->route("roles.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $role = \App\Models\Role::find($id);
        return view("roles.show", compact("role"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = \App\Models\Role::find($id);
        return view("roles.edit", compact("role"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate name
        $validate = request()->validate([
            "name" => "required",
        ]);
        $role = \App\Models\Role::find($id);
        //
        $role->name = $validate["name"];
        $role->save();
        return redirect()->route("roles.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /* if (Gate::denies('delete-role')) {
            abort(403, 'Unauthorized action.');
        } */
        $role = \App\Models\Role::find($id);
        $role->delete();
        return redirect()->route("roles.index");
    }
    public function users()
    {
        $users = \App\Models\User::all();
        return view("roles.users", compact("users"));
    }
    public function userShow($id)
    {
        $user = \App\Models\User::find($id);
        return view("roles.usershow", compact("user"));
    }
    public function userEdit($id)
    {
        $user = \App\Models\User::find($id);
        return view("roles.useredit", compact("user"));
    }
    public function userUpdate(Request $request, $id)
    {
        //    return $request->all();
        $validate = request()->validate([
            "role_id" => "required",
        ]);
        $user = \App\Models\User::find($id);
        // attach role to user
        $user->roles()->detach();
        $user->roles()->attach($validate["role_id"]);
        return redirect()->route("role.user.show", $user->id);
    }
}
