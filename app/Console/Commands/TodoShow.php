<?php

namespace App\Console\Commands;

use App\Models\Todo;
use Illuminate\Console\Command;

class TodoShow extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:todo-show';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->table(
            ['ID', 'Task', 'Status'],
            Todo::get(['id', 'title', 'status'])
        );
    }
}
