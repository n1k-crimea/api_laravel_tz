<?php

namespace App\Interfaces;

use App\Http\Requests\TaskRequest;

interface TaskInterface
{
    public function getAllTasks();

    public function getTaskById(int $id);

    public function requestTask(TaskRequest $request, ?int $id = null);

    public function deleteTask(int $id);
}
