<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    private $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
        ]);
        $response = $this->taskService->create([
            'title' => $validated['title'],
            'is_completed' => false,
        ]);
        try {
            if (is_array($response)) {
                return response(['success' => true, 'error' => null, 'data' => $response], Response::HTTP_OK);
            } else {
                return response(['success' => false, 'error' => $response], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        } catch (\Exception $exception) {
            return response(['success' => false, 'error' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'is_completed' => 'required|boolean',
        ]);
        $response = $this->taskService->update($id, ['is_completed' => $validated['is_completed']]);
        try {
            if (is_object($response)) {
                return response(['success' => true, 'error' => null, 'data' => $response], Response::HTTP_OK);
            } else {
                return response(['success' => false, 'error' => $response], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        } catch (\Exception $exception) {
            return response(['success' => false, 'error' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function pending()
    {
        $response = $this->taskService->getPending();
        try {
            if (is_object($response)) {
                return response(['success' => true, 'error' => null, 'data' => $response], Response::HTTP_OK);
            } else {
                return response(['success' => false, 'error' => $response], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        } catch (\Exception $exception) {
           return response(['success' => false, 'error' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}