<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserManagementController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::all();
            return Datatables::of($users)->make(true);
        }
        return view('admin.users.user-list');
    }

    public function createUser()
    {
        return view('admin.users.create-user');
    }

    public function storeUser(Request $request)
    {
        $request['role'] = 'user';
        User::create($request->all());

        return redirect()->back()->with('status', 'New User created successfully!');

    }

    public function show($id)
    {
        dd($id);
    }
}
