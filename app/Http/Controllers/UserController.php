<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->roles == 1) {
            $user = User::where('roles', '!=', Auth::user()->roles == 1)->orWhere('id', '!=', 1)->latest()->get();
            return view('admin.user.index', compact('user'));
        } else {
            $user = User::findorfail(Auth::user()->id);
            return view('penulis.account', compact('user'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            'name' => ['required'],
            'email' => ['required', 'email'],
            'roles' => ['required']
        ]);

        if ($request->input('password')) {
            $password = bcrypt($request->password);
        } else {
            $password = bcrypt('blk-gorontalo');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'roles' => $request->roles,
            'password' => $password
        ]);
        
        session()->flash('success', 'User created successfully');

        return redirect('admin/user');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findorfail($id);
        return view('admin.user.edit', compact('user'));
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
        if (Auth::user()->roles == 1) {
            $request->validate([
                'name' => ['required'],
                'roles' => ['required']
            ]);
    
            if ($request->input('password')) {
                $user_data = [
                    'name' => $request->name,
                    'roles' => $request->roles,
                    'password' => bcrypt($request->password)
                ];
            } else {
                $user_data = [
                    'name' => $request->name,
                    'roles' => $request->roles
                ];
            }
        } else {
            $request->validate([
                'name' => ['required']
            ]);
    
            if ($request->input('password')) {
                $user_data = [
                    'name' => $request->name,
                    'password' => bcrypt($request->password)
                ];
            } else {
                $user_data = [
                    'name' => $request->name
                ];
            }
        }

        $user = User::findorfail($id);
        $user->update($user_data);

        session()->flash('success', 'User updated successfully');

        if (Auth::user()->roles == 1) {
            return redirect()->route('user.index');
        } else {
            return redirect()->route('penulis.account');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findorfail($id);
        $user->delete();

        session()->flash('success', 'User deleted successfully');

        return redirect('admin/user');
    }

    public function account()
    {
        $user = User::findorfail(Auth::user()->id);
        return view('admin.account', compact('user'));
    }

    public function accountUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => ['required']
        ]);

        if ($request->input('password')) {
            $user_data = [
                'name' => $request->name,
                'password' => bcrypt($request->password)
            ];
        } else {
            $user_data = [
                'name' => $request->name
            ];
        }

        $user = User::findorfail($id);
        $user->update($user_data);

        session()->flash('success', 'Account updated successfully');
        
        return redirect()->route('admin.account');
    }
}
