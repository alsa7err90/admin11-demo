<?php
// database/seeders/AdminUserSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // تأكد من وجود دور الأدمن
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // تحقق مما إذا كان المستخدم موجودًا مسبقًا
        $user = User::where('email', 'admin@gmail.com')->first();

        if (!$user) {
            // إذا لم يكن موجودًا، قم بإنشائه
            $user = User::create([
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'), // تأكد من تغيير كلمة المرور
            ]);
        }

        // تعيين الدور للمستخدم إذا لم يكن لديه بالفعل
        if (!$user->hasRole($adminRole)) {
            $user->assignRole($adminRole);
        }
    }
}
