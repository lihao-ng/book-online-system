<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\AdminService;
use App\User as Admin;

class AdminsController extends Controller {
  protected $path = 'admin.admins.';
  protected $adminService;

  public function __construct(AdminService $adminService) {
    $this->adminService = $adminService;
  }

  public function index(Request $request) {
    if ($request->isJson()) {
      return $this->adminService->all($request);
    }

    return view($this->path . 'index');
  }

  public function create() {
        //
  }

  public function store(Request $request) {
        //
  }

  public function show(Admin $admin) {
        //
  }

  public function edit(Admin $admin) {
        //
  }

  public function update(Request $request, Admin $admin) {
        //
  }

  public function destroy(Admin $admin) {
    return success();
  }
}
