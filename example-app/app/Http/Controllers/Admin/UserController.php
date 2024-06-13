<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;
class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.users.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'studentId' => 'nullable|string|max:255',
            'birth' => 'nullable|date',
            'gender' => 'nullable|string|max:10',
            'course' => 'nullable|string|max:255',
            'major' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'permissions' => 'nullable|array',
        ]);

        $user = User::create([
            'name' => $request->name,
            'studentId' => $request->studentId,
            'birth' => $request->birth,
            'gender' => $request->gender,
            'class' => $request->class,
            'course' => $request->course,
            'major' => $request->major,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($request->permissions) {
            $user->givePermissionTo($request->permissions);
        }

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }
    
    public function edit(Request $request, User $user)
    {
        

        $permissions = Permission::all();
        return view('admin.users.edit', compact('user', 'permissions'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'studentId' => 'nullable|string|max:255',
            'birth' => 'nullable|date',
            'gender' => 'nullable|string|max:10',
            'course' => 'nullable|string|max:255',
            'major' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'permissions' => 'nullable|array',
        ]);
    
        $user->update([
            'name' => $request->name,
            'studentId' => $request->studentId,
            'birth' => $request->birth,
            'gender' => $request->gender,
            'class' => $request->class,
            'course' => $request->course,
            'major' => $request->major,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);
    
        if ($request->permissions) {
            $user->syncPermissions($request->permissions);
        }
    
        return redirect()->route('users.show', $user->id)->with('success', 'User updated successfully!');
    }
    
    

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}
