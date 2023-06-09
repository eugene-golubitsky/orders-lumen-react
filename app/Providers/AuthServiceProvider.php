<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\GenericUser;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        $this->app['auth']->viaRequest('api', function ($request) {
            $token = $request->bearerToken();
            if(!$token) {
                return new GenericUser(['id' => 0, 'name' => 'Nobody']);
            }

            $user = DB::table('users')
                ->where('remember_token', '=', $token)
                ->get();
            if(count($user) && $user[0]->id) {
                return $user[0];
            }

            return new GenericUser(['id' => 0, 'name' => 'Nobody']);
        });
    }
}
