<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::all();
        $users = User::paginate(5);
        return view('users', compact(('users')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        // METHOD - 1
        // $user = new User;
        // $user->name = $request->user_name;
        // $user->email = $request->user_email;
        // $user->age = $request->user_age;
        // $user->state_code = $request->user_state_code;
        // $user->save();

        // METHOD - 2
        User::create([
            'name' => $request->user_name,
            'email' => $request->user_email,
            'age' => $request->user_age,
            'state_code' => $request->user_state_code,
        ]);

        return redirect()->route('users.index')->with('status', 'New User Data added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('view', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        // METHOD - 1
        // $user = User::find($id);
        // $user->name = $request->user_name;
        // $user->email = $request->user_email;
        // $user->age = $request->user_age;
        // $user->state_code = $request->user_state_code;
        // $user->save();

        // METHOD - 2
        User::find($id)->update([
            'name' => $request->user_name,
            'email' => $request->user_email,
            'age' => $request->user_age,
            'state_code' => $request->user_state_code,
        ]);

        return redirect()->route('users.index')->with('status', 'User Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // METHOD - 1
        $user = User::find($id);
        $user->delete();

        // METHOD - 2
        // User::destroy($id);
        return redirect()->route('users.index')->with('status', 'User Data Deleted Successfully');
    }
}
