<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CheckSeedCommand extends Command
{
    // 命令名字，终端执行 php artisan check:seed
    protected $signature = 'check:seed';

    protected $description = 'Check if the database needs seeding by checking users table count';

    public function handle()
    {
        $count = DB::table('users')->count();

        if ($count === 0) {
            $this->info('need_seed');
            return 0;
        }

        $this->info('no_seed');
        return 1;
    }
}
