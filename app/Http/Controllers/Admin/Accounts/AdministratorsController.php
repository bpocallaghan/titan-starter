<?php

namespace App\Http\Controllers\Admin\Accounts;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Role;
use App\Models\User;

class AdministratorsController extends AdminController
{
    /**
     * Show all the administrators
     *
     * @return mixed
     */
    public function index()
    {
        save_resource_url();

        $items = User::with('roles')->whereRole(Role::$ADMIN)->get();

        return $this->view('admin.accounts.administrators.index', compact('items'));
    }
}
