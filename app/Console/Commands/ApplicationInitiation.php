<?php

namespace App\Console\Commands;

use App\Enums\UserPosition;
use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;

class ApplicationInitiation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Application initiation';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Artisan::call('migrate:fresh');

        $super_admin = Role::create([
            'name' => 'super_admin',
            'display_name' => 'Super Admin', // optional
            // 'description' => 'User is the owner of a given project', // optional
        ]);

        Role::create([
            'name' => 'admin',
            'display_name' => 'Project Owner', // optional
            // 'description' => 'User is the owner of a given project', // optional
        ]);

        Role::create([
            'name' => 'employee',
            'display_name' => 'Employee', // optional
            // 'description' => 'User is the owner of a given project', // optional
        ]);

        Role::create([
            'name' => 'hr_admin',
            'display_name' => 'HR Admin', // optional
            // 'description' => 'User is the owner of a given project', // optional
        ]);

        $setting_permission_read = Permission::create([
            'name' => 'read',
            'display_name' => 'Read', // optional
        ]);

        $setting_permission_write = Permission::create([
            'name' => 'write',
            'display_name' => 'Write', // optional
        ]);

        $setting_permission_delete = Permission::create([
            'name' => 'delete',
            'display_name' => 'Delete', // optional
        ]);

        $user = User::create([
            "identifier" => get_identifier(),
            'name' => config('app.name'),
            'username' => Str::kebab(config('app.name')),
            'email' => 'super@app.com',
            'contacts' => [
                'mobile' => [
                    'working' => [
                        'number' => '0123456789',
                        'country_iso' => 'BD',
                    ],
                ]
            ],
            'position' => UserPosition::CEO_AND_FOUNDER()->key,
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('secret')
        ]);

        // $user->attachPermission([$setting_permission_read, ]);

        $user->attachRole($super_admin);

        $this->alert("All Good");
        return 0;
    }
}
