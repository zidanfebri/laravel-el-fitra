<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordsToBcrypt extends Migration
{
    public function up()
    {
        $users = User::all();
        foreach ($users as $user) {
            // Assuming the current password is MD5, convert it to the original plain text
            // Note: This is a security risk if you don't know the plain text. Use with caution.
            $plainPassword = $this->reverseMd5($user->password); // Hypothetical reverse function
            $user->password = Hash::make($plainPassword);
            $user->save();
        }
    }

    public function down()
    {
        // Optionally revert to MD5 if needed (not recommended)
    }

    // This is a placeholder; reversing MD5 is not reliable due to collisions
    private function reverseMd5($md5)
    {
        // This is an example; in practice, you need the original password
        // You should ask users to reset their passwords
        return 'defaultpassword'; // Replace with actual logic or user input
    }
}