<?php

use App\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $users = User::all();
        foreach($users as $user) {
            $user = User::find($user->id);
            $user->password_hash = password_hash($user->password_plain, PASSWORD_BCRYPT, ['cost'=>12]);
            $user->save();

        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
