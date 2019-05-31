<?php

namespace App\Services\Admin;

use App\User as Customer;
use Illuminate\Http\Request;
use App\Services\TransformerService;

class CustomerService extends TransformerService {

  public function all(Request $request){
    $sort = $request->sort ? $request->sort : 'created_at';
    $order = $request->order ? $request->order : 'desc';
    $limit = $request->limit ? $request->limit : 10;
    $offset = $request->offset ? $request->offset : 0;
    $query = $request->search ? $request->search : '';

    $customers = Customer::where('role', 0)->where('name', 'like', "%{$query}%")->orderBy($sort, $order);
    $listCount = $customers->count();

    $customers = $customers->limit($limit)->offset($offset)->get();

    return respond(['rows' => $this->transformCollection($customers), 'total' => $listCount]);
  }

  public function create(Request $request) {
    $request->validate([
      "name" => 'required|string|max:255',
      "email" => 'required|email|unique:users'
    ]);

    Customer::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => "secret",
      'role' => 0
    ]);

      return redirect()->route("admin.customers.index");
  }

  public function transform($customer){
    return [
      'id' => $customer->id,
      'name' => $customer->name,
      'email' => $customer->email,
      'join_date' => date_to_human($customer->created_at)
    ];
  }
}
