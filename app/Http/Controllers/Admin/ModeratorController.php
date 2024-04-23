<?php

namespace App\Http\Controllers\Admin;

use App\Models\Moderator;

use Illuminate\Http\Request;


use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ModeratorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $moderators = Moderator::orderBy('id', 'DESC')->paginate(5);
        return view('admin.moderators.index', compact('moderators'));
    }

    public function create()
    {
        return view('admin.moderators.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:moderators,email',
            'password' => 'required',
        ]);


        $moderator = Moderator::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);
        return redirect()->route('admin.moderator.index')
            ->with('success', "Create  Successfully" );
    }

    public function show($id)
    {
        $moderator = Moderator::findOrFail($id);
        return view('admin.moderators.show', compact('moderator'));
    }

    public function edit($id)
    {
        $moderator = Moderator::findOrFail($id);
        
        return view('admin.moderators.edit', compact('moderator'));
    }

    public function update(Request $request , $id)
    {
        $request->validate([
            'name' => 'required',
            // 'email' => 'required|email|unique:moderators,email', 
        ]);
        $moderator = Moderator::findOrFail($id);
        $moderator->update([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);
        return redirect()->route('admin.moderator.index')->with('success', "Update Successfully" );
    }

    public function destroy(Request $request)
    {
        Moderator::find($request->id)->delete();
        return redirect()->route('admin.moderator.index')->with('success', 'Delete Successfully');
    }
}
