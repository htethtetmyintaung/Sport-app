<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlayerRegisterRequest;
use App\Services\PlayerRegisterService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // public function store(Request $request){
    //       // Optionally, you can return a JSON response with the newly created resource
    //     return response()->json([
    //         'message' => 'Resource created successfully',
    //     ], 201); // 201 status code indicates resource creation
    // }

    protected $playerService;

    public function __construct(PlayerRegisterService $playerService)
    {
        $this->playerService = $playerService;
    }

    public function index(PlayerRegisterRequest $request)
    {
       // The request data has already been validated at this point
        // Call the service to process and store the data
        $result = $this->playerService->store($request->validated());

        // Optionally, return a response or perform other actions
        return response()->json(['message' => 'Data stored successfully', 'data' => $result], 201); // 201 Created status code
        
    }
}
