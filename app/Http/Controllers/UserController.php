<?php

namespace App\Http\Controllers;

use App\Enums\UserPosition;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Propaganistas\LaravelPhone\PhoneNumber;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(\App\Enums\UserPosition::HR()->getDescriptionx());
        $users = User::with('roles', 'permissions')->get();
        // dd($users);
        $roles = Role::all();
        return view('backend.users.index', compact('roles', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'identifier' => 'required',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string',
            'role_permission' => 'required|array',
            'mobile' => 'phone'
        ], [
            'mobile.phone' => 'Mobile number is not valid'
        ]);

        $user = User::create([
            'identifier' => $request->identifier,
            'name' => $request->first_name . ' ' . $request->last_name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'contacts' => [
                'mobile' => [
                    'working' => PhoneNumber::make($request->mobile, Str::upper($request->mobile_country))->formatE164(),
                ]
            ],
            'position' => $request->role
        ]);

        $permissions = Permission::whereIn('name', $request->role_permission)->get()->toArray();
        $user->attachRole(UserPosition::getRole($request->role));
        $user->attachPermissions($permissions);

        return response()->json(['success' => 'User created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
