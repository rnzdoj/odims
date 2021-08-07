<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MigrateInOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $migrations = [
            '2021_07_1_000000_create_roles_table.php',
            '2021_07_2_000000_create_users_table.php',
            '2021_07_3_000001_create_failed_jobs_table.php',
            '2021_07_4_100000_create_password_resets_table.php',
            '2021_07_5_101451_create_educations_table.php',
            '2021_07_6_113706_create_positions_table.php',
            '2021_07_7_061933_create_groups_table.php',
            '2021_07_8_101507_create_rabdeys_table.php',
            '2021_07_9_101519_create_dratshangs_table.php',
            '2021_07_10_054607_create_dzongkhags_table.php',
            '2021_07_11_054703_create_gewogs_table.php',
            '2021_07_12_054712_create_villages_table.php',
            '2021_07_13_101058_create_monks_table.php',
            '2021_07_14_101353_create_addresses_table.php',
            '2021_07_15_101405_create_mothers_table.php',
            '2021_07_16_101443_create_fathers_table.php',
            '2021_07_17_101536_create_stipends_table.php',
        ];
        foreach($migrations as $migration){

            $basePath = 'database/migrations/';
            $path = $basePath.$migration;
            $this->call('migrate', [
                '--path' => $path
            ]);
        }
        return 0;
    }
}
