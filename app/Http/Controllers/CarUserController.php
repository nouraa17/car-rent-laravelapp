<?php

namespace App\Http\Controllers;

use App\Models\CarUser;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class CarUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $columns= [
        'full_name',
        'user_name',
        'active',
        'email',
        'password',
        'email_verified_at',

    ];
    public function index()
    {
        $users = CarUser::get();
        $users = $users->map(function ($user) {
            $user->formatted_created_at = Carbon::parse($user->created_at)->format('j M Y');
            return $user;
        });
        return view('admin.users.listUsers',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.addUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->validate([
            'full_name' => 'required|string|max:50',
            'user_name' => 'required|string|max:50',
            'email' => 'required|string|max:50',
            'password' =>'required|string|max:50',
        ]);
        $user = $request->only($this->columns);
        $user['active'] = isset($request->active);
        $user['password'] = bcrypt($user['password']);
        $user['email_verified_at'] = now();
        CarUser::create($user);
        return redirect('admin/adduser')->with('success', 'User has been added successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = CarUser::findOrFail($id);
        return view('admin.users.editUser',compact('user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = $request->validate([
            'full_name' => 'required|string|max:50',
            'user_name' => 'required|string|max:50',
            'email' => 'required|string|max:50',
            'password' =>'required|string|max:50',
        ]);
        $user = CarUser::findOrFail($id);

        $user = $request->only($this->columns);
        $user['active'] = isset($request->active);
        $user['password'] = bcrypt($user['password']);
        $user['email_verified_at'] = now();
        CarUser::where('id', $id)->update($user); //where or findorfail
        return redirect('admin/edituser/'.$id)->with('success', 'User has been Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
