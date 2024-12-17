<?php

namespace App\Console\Commands;

use App\Enums\TodoStatus;
use App\Models\Todo;
use Illuminate\Console\Command;

class CompleteTodo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:complete-todo {id}';

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
        $id = $this->argument('id');

        $todo = Todo::find($id);

        $todo->status = TodoStatus::COMPLETED;
        $todo->update();

        $this->info("Todo $todo->id is completed");
    }
}
