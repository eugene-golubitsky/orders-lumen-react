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
        /**
         * TODO
         * use bcrypt for passwords_hash
         */
        $user = DB::table('users')
            ->where('email', '=', $request->input('email'))
            ->where('password_hash', '=', sha1($request->input('password')))
            ->get();

        if(count($user) === 1) {
            $user = User::find($user[0]->id);
            $user->remember_token = bin2hex(openssl_random_pseudo_bytes(40));
            $user->save();
        } else {
            return response('Unauthorized', 401);
        }
        return response()->json(['access_token'=>$user->remember_token]);
    }
}
