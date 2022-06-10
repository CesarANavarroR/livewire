<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profiles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Role::all()->where('name','!=','root');
        return view('admin.profiles.create',compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newUser = $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed|min:6',
            'type' => 'required'
        ]);
    
        User::created($newUser);
        
        return view('admin.profiles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $profile)
    {
        return view('admin.profiles.show',compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $profile)
    {
        $categorys = Role::all()->where('name','!=','root');
        return view('admin.profiles.edit',compact(['profile','categorys']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $profile)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => "required|unique:users,email,$profile->id",
            'password' => 'required|confirmed|min:6',
            'type' => 'required'
        ]);
        $profile->update($request->all());
        return redirect('profiles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $profile)
    {
        User::where('id',$profile->id)->delete();
        return view('admin.profiles.index');
    }
}
