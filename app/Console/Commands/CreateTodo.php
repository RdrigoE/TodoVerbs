<?php

namespace App\Console\Commands;

use App\Enums\TodoStatus;
use App\Events\TodoCreated;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Console\Command;

class CreateTodo extends Command
{
    protected $signature = 'app:create-todo {title}';

    public function handle()
    {
        $user  = User::find(1);
        $title = $this->argument('title');

        $todo = TodoCreated::commit(user_id: $user->id, title: $title);

        $this->info("Todo {$todo->id} was created!");
    }
}
