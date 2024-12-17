<?php

namespace App\Console\Commands;

use App\Enums\TodoStatus;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Console\Command;

class CreateTodo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-todo {title}';

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
        $user  = User::find(1);
        $title = $this->argument('title');

        $todo = $user->todos()->create([
            'title'  => $title,
            'status' => TodoStatus::PENDING,
        ]);

        $this->info("Todo {$todo->id} was created!");
    }
}
