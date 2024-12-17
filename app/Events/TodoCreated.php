<?php

namespace App\Events;

use App\Enums\TodoStatus;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Thunk\Verbs\Event;

class TodoCreated extends Event
{

    public function __construct(
        public int $user_id,
        public string $title,
        public ?string $todo_id,
    ) {
        $this->todo_id ??= snowflake_id();
    }

    public function handle()
    {
        $user = User::find($this->user_id);
        Log::info("Creating ID -> $this->todo_id");
        $todo = Todo::updateOrCreate(['id' => $this->todo_id], [
            'id'      => $this->todo_id,
            'title'   => $this->title,
            'status'  => TodoStatus::PENDING,
            'user_id' => $this->user_id,
        ]);

        return $todo;
    }
}
