<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Role\RoleStoreRequest;
use App\Http\Requests\Role\RoleUpdateRequest;

class RoleController extends Controller
{
    public function __construct() 
    {
        $this->middleware('role:Super Admin');
        $this->middleware('permission:admin_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:admin_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:admin_view', ['only' => ['show', 'index']]);
        $this->middleware('permission:admin_delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::whereNotIn('name', ['Super Admin'])->orderBy('name')->paginate();

        

        return view('roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\RoleStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleStoreRequest $request)
    {
        $data = $request->validated();

        Role::create($data);

        return redirect()->route('roles.index')
            ->withStatus('Atribuição cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Spatie\Permission\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $permissions = $role->getAllPermissions();

        return view('roles.show', [
            'role' => $role,
            'permissions' => $permissions
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Spatie\Permission\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::orderBy('name')->get();
        $roles = $role->getAllPermissions();
        
        return view('roles.edit', [
            'role' => $role,
            'roles' => $roles,
            'permissions' => $permissions
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\RoleUpdateRequest  $request
     * @param  \Spatie\Permission\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdateRequest $request, Role $role)
    {
        $data = $request->validated();
        $role->update($data);
        $role->syncPermissions($request->permissions);

        return redirect()->route('roles.index')
            ->withStatus('Atribuição atualizado com sucesso!');
    }

    public function delete($id)
    {
        $role = Permission::findById($id);
        return view('roles.delete', ['role' => $role]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Spatie\Permission\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        try {
            $role->delete();
            return redirect()->route('roles.index')
                ->withStatus('Atribuição deletado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('roles.index')
                ->withStatus('Registro vinculado á outra tabela, somente poderá ser excluído se retirar o vinculo.');
        }
    }
}
