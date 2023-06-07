<?php
namespace App\Http\Controllers;
use App\Product;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * TODO
 * use separate table for access tokens
 */
class AuthController extends Controller {
    public function index(Request $request) {
        $user = DB::table('users')
            ->where('email', '=', $request->input('email'))
            ->get();

        if(count($user) === 1) {
            if(password_verify($request->input('password'), $user[0]->password_hash)) {
                $user = User::find($user[0]->id);
                $user->remember_token = bin2hex(openssl_random_pseudo_bytes(40));
                $user->save();
                return response()->json(['access_token'=>$user->remember_token]);
            }
        }
        return response('Unauthorized', 401);
    }
}
