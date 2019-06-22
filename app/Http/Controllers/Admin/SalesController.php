<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\SaleService;

class SalesController extends Controller{
  protected $path = 'admin.sales.';

  public function __construct(SaleService $saleService) {
    $this->saleService = $saleService;
  }

  public function index(Request $request) {
    if ($request->wantsJson()) {
      return $this->saleService->all($request);
    }

    return view($this->path . 'index');
  }
}
