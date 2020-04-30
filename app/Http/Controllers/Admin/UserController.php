<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Roles;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        return View('admin.user.index')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(Gate::denies('for-admin')){
            return redirect(route('admin.user.index'));
        }
        $roles = Roles::all();
        return View('admin.user.edit')->with([
            'user' => $user,
            'roles' => $roles
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if(Gate::denies('for-admin')){
            return redirect(route('admin.user.index'));
        }
       $user->role()->sync($request->roles);
       return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(Gate::denies('for-admin')){
            return redirect(route('admin.user.index'));
        }
        $user->role()->detach();
        $user->delete();
        return redirect()->route('admin.user.index');
    }
}
