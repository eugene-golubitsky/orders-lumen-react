<?php
namespace App\Http\Controllers;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller {
    public function index(Request $request) {
        $user = $request->user();
        $products = Product::find(['admin_id' => $user->id]);
        return response()->json($products);
    }

    public function getProduct($id){
        $product = Product::find($id);
        return response()->json($product);
    }

    public function getProducts(Request $request) {
        $user = $request->user();
        $query = DB::table('products')
            ->select("products.*"
                , DB::raw('GROUP_CONCAT(inventory.sku) as skus')
                , DB::raw("CONCAT('$',ROUND(SUM((inventory.quantity*inventory.price_cents)/100),2)) total_price")
            )
            ->distinct()
            ->leftJoin('inventory', 'products.id', '=', 'inventory.product_id')
            ->where('products.admin_id', '=', $user->id);
        if($request->input('product_name')) {
            $query->where('product_name', '=', $request->input('product_name'));
        }
        if($request->input('brand')) {
            $query->where('brand', '=', $request->input('brand'));
        }
        if($request->input('brand')) {
            $query->where('brand', '=', $request->input('brand'));
        }
        if($request->input('style')) {
            $query->where('style', '=', $request->input('style'));
        }
        if($request->input('sku')) {
            $query->where('sku', '=', $request->input('sku'));
        }
        $offset = $request->input('offset') ?? 0;
        $limit = $request->input('limit') ?? 10;
        $products = $query
            ->groupBy('products.id')
            ->offset($offset)
            ->limit($limit)
            ->get();
        return response()->json($products);
    }

    public function createProduct(Request $request){
        $product = Product::create($request->all());
        return response()->json($product);
    }

    public function deleteProduct ($id){
        $product= Product::find($id);
        $product->delete();
        return response()->json('deleted');
    }

    public function updateProduct (Request $request,$id){
        $product = Product::find($id);
        $product->brand = $request->input('brand');
        $product->style = $request->input('style');
        $product->save();
        return response()->json($product);
    }
}
