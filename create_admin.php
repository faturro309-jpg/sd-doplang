<?php
use App\Models\User;
use Illuminate\Support\Facades\Hash;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$user = User::updateOrCreate(
    ['email' => 'admin@sddoplang.sch.id'],
    [
        'name' => 'Admin SDN Doplang',
        'password' => Hash::make('password123'),
    ]
);
echo "Admin created/updated successfully.\n";
