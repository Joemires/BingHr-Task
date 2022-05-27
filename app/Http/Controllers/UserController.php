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
                    'working' => [
                        'number' => PhoneNumber::make($request->mobile, Str::upper($request->mobile_country))->formatE164(),
                        'country_iso' => $request->mobile_country,
                    ],
                ]
            ],
            'position' => $request->role
        ]);

        $permissions = Permission::whereIn('name', $request->role_permission)->get()->toArray();
        $user->attachRole(UserPosition::getRole($request->role));
        $user->attachPermissions($permissions);

        return response()->json(['success' => 'Hurray! User have been created successfully.']);
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
        $roles = Role::all();
        if(request()->__modal) {
            $view = view('backend.users.edit', compact('user', 'roles'))->render();
            return response()->json(['html' => $view]);
        }
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
        $request->validate([
            // 'identifier' => 'required',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'password' => Str::length($request->password) > 0 ? 'required|string|min:6|confirmed' : 'sometimes',
            'role' => 'required|string',
            'role_permission' => 'required|array',
            'mobile' => 'phone'
        ], [
            'mobile.phone' => 'Mobile number is not valid'
        ]);

        if($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->fill([
            // 'identifier' => $request->identifier,
            'name' => $request->first_name . ' ' . $request->last_name,
            'contacts' => [
                'mobile' => [
                    'working' => [
                        'number' => PhoneNumber::make($request->mobile, Str::upper($request->mobile_country))->formatE164(),
                        'country_iso' => $request->mobile_country,
                    ],
                ]
            ],
            'position' => $request->role
        ]);

        $user->save();

        $permissions = Permission::whereIn('name', $request->role_permission)->get()->toArray();
        $user->syncRoles([UserPosition::getRole($request->role)]);
        $user->syncPermissions($permissions);

        return response()->json(['success' => 'Hurray! User have been updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->is(auth()->user())) {
            return response()->json(['error' => 'You can not delete yourself.'], 422);
        }

        if(! $user->hasRole('super_admin')) {
            return response()->json(['success' => 'Hurray! User have been deleted successfully.'], 422);
        }

        // $user->delete();
        return response()->json(['success' => 'Hurray! User have been deleted successfully.']);
    }
}
