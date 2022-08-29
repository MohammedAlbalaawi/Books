<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            Auth::logout();
        }

        return view('userOperations.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Department $department
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Department $department
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('userOperations.edit');
    }

    public function editPass()
    {
        return view('userOperations.editPass');
    }

    public function update(Request $request)
    {
        $request->user()->update($request->all());

        return redirect()
            ->route('welcome')
            ->with('success', 'User Info Edited SUCCESSFULLY');
    }

    public function updatePass(Request $request)
    {

        if (Hash::check($request->old_pass, $request->user()->password)) {
            if ($request->new_pass === $request->confirm_pass) {

                $request->user()->update([
                    'password' => Hash::make($request->new_pass)
                ]);
            }
            return redirect()
                ->route('welcome')
                ->with('changed', 'Password Changed SUCCESSFULLY');
        }

        return redirect()
            ->route('userOperations.updatePass', $request->user()->id)
            ->with('error', 'Old Password is NOT correct!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Department $department
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }

    public function check(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3',
        ]);


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/');
        } else {
            return view('userOperations.login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('userOperations.index');
    }

}
