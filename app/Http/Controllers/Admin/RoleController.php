<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:role list', ['only' => ['index', 'show']]);
        $this->middleware('can:role create', ['only' => ['create', 'store']]);
        $this->middleware('can:role edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:role delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = (new Role)->newQuery();
        $roles->latest();
        $roles = $roles->paginate(100)->onEachSide(2)->appends(request()->query());

        return Inertia::render('Admin/Role/Index', [
            'roles' => $roles,
            'can' => [
                'create' => Auth::user()->can('role create'),
                'edit' => Auth::user()->can('role edit'),
                'delete' => Auth::user()->can('role delete'),
            ]
        ]);
    }

    public function create()
    {
        return inertia(component: 'Admin/Role/Create');
    }

    public function store(Request $request)
    {
        Role::create([
            'name' => $request->role,
            'guard_name' => 'web',
            'permissions' => $request->permission,
        ]);

        return redirect()->route(route: 'role.index');
    }

    public function edit(Role $role)
    {
        return inertia('Admin/Role/Edit', compact('role'));
    }

    public function update(Role $role, Request $request)
    {
        $role->name = $request->input('name');

        $role->guard_name = 'web';

        $role->save();

        return redirect()->route('role.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();
    }
}
