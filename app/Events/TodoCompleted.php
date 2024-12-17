<?php

namespace App\Events;

use App\Enums\TodoStatus;
use App\Models\Todo;
use App\Models\User;
use Thunk\Verbs\Event;

class TodoCompleted extends Event
{

    public function __construct(
        public int $user_id,
        public int $todo_id,
    ) {
    }
    public function handle()
    {
        $user = User::find($this->user_id);
        $todo = Todo::find($this->todo_id);
        $todo->update([
            'status' => TodoStatus::COMPLETED,
        ]);
        return $todo;
    }
}
