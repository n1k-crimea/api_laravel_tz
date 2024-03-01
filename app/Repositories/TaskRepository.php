<?php

namespace App\Repositories;

use App\Http\Requests\TaskRequest;
use App\Interfaces\TaskInterface;
use App\Models\Task;
use App\Traits\ResponseAPI;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class TaskRepository implements TaskInterface
{
    use ResponseAPI;

    public function getAllTasks(): JsonResponse
    {
        try {
            $tasks = Task::filter()->get();

            return $this->success('All Tasks', $tasks->toArray());
        } catch (\Exception $e) {

            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function getTaskById(int $id): JsonResponse
    {
        try {
            $task = Task::find($id);
            if (! $task) {
                return $this->error("No task with ID $id", 404);
            }

            return $this->success('Task Detail', $task->toArray());
        } catch (\Exception $e) {

            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function requestTask(TaskRequest $request, ?int $id = null): JsonResponse
    {
        DB::beginTransaction();
        try {
            $task = $id ? Task::find($id) : new Task;
            if ($id && ! $task) {

                return $this->error("No task with ID $id", 404);
            }

            $task->fill($request->toArray());

            $task->save();
            DB::commit();

            return $this->success(
                $id ? 'Task updated' : 'Task created',
                $task->toArray(),
                $id ? 200 : 201);
        } catch (\Exception $e) {
            DB::rollBack();
            echo $e->getMessage();

            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function deleteTask(int $id): JsonResponse
    {
        DB::beginTransaction();
        try {
            $task = Task::find($id);
            if (! $task) {

                return $this->error("No task with ID $id", 404);
            }
            $task->delete();
            DB::commit();

            return $this->success('Task deleted', $task->toArray());

        } catch (\Exception $e) {
            DB::rollBack();

            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}
