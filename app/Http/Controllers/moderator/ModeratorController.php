<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;

use App\Models\Moderator;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ModeratorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.type:admin');
    }
    public function index()
    {
        $moderators = User::where('type' , 'moderator')->orderBy('id', 'DESC')->paginate(5);
        return view('admin.moderators.index', compact('moderators'));
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();

        return view('admin.moderators.create' , compact('roles'));
    }

// Cample
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:moderators,email',
            'password' => 'required',
            'roles_name' => 'required'

        ]);

        $moderator = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "roles_name" => $request->roles_name,
        ]);
        $moderator->assignRole($request->input('roles_name'));

        return redirect()->route('moderator.index')
            ->with('success', "Create  Successfully" );
    }

    public function show($id)
    {
        $moderator = User::findOrFail($id);
        return view('admin.moderators.show', compact('moderator'));
    }

    public function edit($id)
    {
        $moderator = User::findOrFail($id);
        
        return view('admin.moderators.edit', compact('moderator'));
    }

    public function update(Request $request , $id)
    {
        $request->validate([
            'name' => 'required',
            // 'email' => 'required|email|unique:moderators,email', 
        ]);
        $moderator = User::findOrFail($id);
        $moderator->update([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);
        return redirect()->route('moderator.index')->with('success', "Update Successfully" );
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('moderator.index')->with('success', 'Delete Successfully');
    }
}
