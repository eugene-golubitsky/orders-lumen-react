<?php
namespace App\Http\Controllers;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller {
    public function index(Request $request) {
        $user = $request->user();
        $query = DB::table('products')
            ->select("inventory.*", "products.product_name")
            ->distinct()
            ->leftJoin('inventory', 'products.id', '=', 'inventory.product_id')
            ->where('products.admin_id', '=', $user->id);
        if($request->input('product_name')) {
            $query->where('product_name', '=', $request->input('product_name'));
        }
        if($request->input('product_id')) {
            $query->where('products.id', '=', $request->input('product_id'));
        }
        if($request->input('sku')) {
            $query->where('sku', '=', $request->input('sku'));
        }
        $offset = $request->input('offset') ?? 0;
        $limit = $request->input('limit') ?? 10;
        $products = $query
            ->offset($offset)
            ->limit($limit)
            ->get();
        return response()->json($products);
    }
}
