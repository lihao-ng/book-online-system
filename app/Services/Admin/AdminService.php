<?php

namespace App\Services\Admin;

use App\User as Admin;
use Illuminate\Http\Request;
use App\Services\TransformerService;

class AdminService extends TransformerService {

  public function all(Request $request){
    $sort = $request->sort ? $request->sort : 'created_at';
    $order = $request->order ? $request->order : 'desc';
    $limit = $request->limit ? $request->limit : 10;
    $offset = $request->offset ? $request->offset : 0;
    $query = $request->search ? $request->search : '';

    // $admins = Admin::where('id', '!=', current_user()->id)->where('role', 1)->where('name', 'like', "%{$query}%")->orderBy($sort, $order);
    $admins = Admin::where('role', 0)->where('name', 'like', "%{$query}%")->orderBy($sort, $order);
    $listCount = $admins->count();

    $admins = $admins->limit($limit)->offset($offset)->get();

    return respond(['rows' => $this->transformCollection($admins), 'total' => $listCount]);
  }

  public function search(Request $request) {
    $admins = Admin::where('role', 0)->where('name', 'like', "%{$request->search}%");

    if($request->except) {
      $exceptQuery = $admins->whereNotIn('id', $request->except); 
    }
    
    return $admins->limit(10)->get();
  }

  public function transform($admin){
    return [
      'id' => $admin->id,
      'name' => $admin->name,
      'email' => $admin->email,
      'join_date' => date_to_human($admin->created_at)
    ];
  }
}
