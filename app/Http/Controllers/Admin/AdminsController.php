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
    if ($request->wantsJson()) {
      return $this->adminService->all($request);
    }

    return view($this->path . 'index');
  }

  public function create() {
    return view($this->path . 'create');
  }

  public function store(Request $request) {
    return $this->adminService->create($request);
  }

  // public function edit(Admin $admin) {
  //   return view($this->path . 'edit', ['admin' => $admin]);
  // }

  // public function update(Request $request, Admin $admin) {
  //   return $this->adminService->update($request, $admin);
  // }

  public function destroy(Admin $admin) {
    $admin->delete();

    return success();
  }

  public function search(Request $request) {
    return $this->adminService->search($request);
  }
}
