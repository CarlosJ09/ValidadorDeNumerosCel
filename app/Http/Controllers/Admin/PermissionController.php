<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:permission list', ['only' => ['index', 'show']]);
        $this->middleware('can:permission create', ['only' => ['create', 'store']]);
        $this->middleware('can:permission edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:permission delete', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $permissions = (new Permission)->newQuery();
        $permissions->latest();
        $permissions = $permissions->paginate(100)->onEachSide(2)->appends(request()->query());

        return Inertia::render('Admin/Permission/Index', [
            'permissions' => $permissions,
            'can' => [
                'create' => Auth::user()->can('permission create'),
                'edit' => Auth::user()->can('permission edit'),
                'delete' => Auth::user()->can('permission delete'),
            ]
        ]);
    }

    public function create()
    {
        return inertia(component: 'Admin/Permission/Create');
    }

    public function store(Request $request)
    {
        Permission::create([
            'name' => $request->permission,
            'guard_name' => 'web',
        ]);

        return redirect()->route(route: 'permission.index');
    }

    public function edit(Permission $permission)
    {
        return inertia('Admin/Permission/Edit', compact('permission'));
    }

    public function update(Permission $permission, Request $request)
    {
        $permission->name = $request->input('name');

        $permission->guard_name = 'web';

        $permission->save();

        return redirect()->route('permission.index');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
    }
}
