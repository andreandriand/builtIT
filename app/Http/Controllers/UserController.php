<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', ['users' => $users, 'title' => 'Data User']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.insert', ['title' => 'Tambah User']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {

        $user = $request->validate(
            [
                'nama' => 'required|min:3|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:5|max:255',
                'role' => 'required|max:255',
            ]
        );
        $user['password'] = bcrypt($user['password']);

        User::create($user);
        return redirect()->route('admin.user.index')->with('success', 'Data User berhasil ditambahkan');
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
        return view('admin.user.edit', ['user' => $user, 'title' => 'Edit User']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $rules = [
            'nama' => 'required|min:3|max:255',
            'password' => 'required|min:5|max:255',
            'role' => 'required|max:255',
        ];

        if ($request->email != $user->email) {
            $rules['email'] = 'required|email|max:255|unique:users';
        }

        $request['password'] = bcrypt($request['password']);

        $user->update($request->validate($rules));
        return redirect()->route('admin.user.index')->with('success', 'Data User berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->destroy($user->id);
        return redirect()->route('admin.user.index')->with('success', 'Data User berhasil dihapus');
    }
}
