<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kontrak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MultiUserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Redirect the application roles.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function dashboard()
    {
        $role = auth()->user()->getRoleNames();
        
        return view("dashboard", compact('role'));         
        
    }

    public function actAs(User $user)
    {
        Auth::login($user);

        return redirect()->to('dashboard');
    }
}
