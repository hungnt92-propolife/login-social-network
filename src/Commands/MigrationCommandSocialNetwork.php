<?php

namespace HungNguyen\LoginSocialNetwork\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrationCommandSocialNetwork extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'runMigration:table {tableName} {status}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add field social_id in table target, status is up/down';


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
        $this->info('Running migration');
        $model = $this->argument('tableName');
        $status = $this->argument('status');
        if (!Schema::hasTable($model)) {
            $this->error("There is no table for run migration command!");
            return false;
        }

        try {
            if ($status == 'up') {
                if (!Schema::hasColumn($model, 'social_id')) {
                    Schema::table($model, function (Blueprint $table) {
                        $table->string('social_id')->nullable();
                    });
                }
                $this->info('Add field success');
            } elseif ($status == 'down') {
                if (Schema::hasColumn($model, 'social_id')) {
                    Schema::table($model, function (Blueprint $table) {
                        $table->dropColumn('social_id');
                    });
                }
                $this->info('Remove field success');
            } else {
                $this->error("Status incorrect!");
            }
            return true;
        } catch (Exception $e) {
            $this->error($e->getMessage());
            return false;
        }
    }
}
