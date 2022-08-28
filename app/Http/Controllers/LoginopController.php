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
        if(Auth::check()){
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Department $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
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
            'user_email' => 'required|email',
            'user_pass' => 'required|alphaNum|min:3',
        ]);

        // $user = User::where('email','=',$request->user_email)->first();

        // if ($user) {
        //     $hashedPassword = $user->password;
        //     if (Hash::check($request->user_pass , $hashedPassword)) {
        //         return 'ok';
        //     }
        // }else{
        //     return redirect()->route('userOperations.index');
        // }


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/');
        } else {
            return view('userOperations.login');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('userOperations.index');
    }
}
