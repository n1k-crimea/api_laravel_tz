<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Interfaces\TaskInterface;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    protected TaskInterface $taskInterface;

    public function __construct(TaskInterface $taskInterface)
    {
        $this->taskInterface = $taskInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->taskInterface->getAllTasks();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request): JsonResponse
    {
        return $this->taskInterface->requestTask($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse
    {
        return $this->taskInterface->getTaskById($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, int $id): JsonResponse
    {
        return $this->taskInterface->requestTask($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->taskInterface->deleteTask($id);
    }
}
