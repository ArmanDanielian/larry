<?php

namespace App\Http\Controllers;

use App\Models\UserBio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserBioController extends Controller
{
    public function index()
    {
        $data = UserBio::all();
        return response()->json([
            'data' => $data
        ], 200);
    }

    public function show(UserBio $userBio)
    {
        $result = [];
        $this->extractArray($userBio->bio, $result);
        return response()->json([
            'data' => $result
        ], 200);
    }

    private function extractArray($array, &$result, $prefix = '')
    {
        foreach ($array as $key => $value) {
            $name = $prefix . $key;
            $type = gettype($value);
            if ($type == 'array') {
                $this->extractArray($value, $result, $name . '.');
            } else {
                $result[] = [
                    'name' => $name,
                    'type' => $type,
                    'value' => $value
                ];
            }
        }
    }

    public function destroy()
    {
        return response()->json([
            'message' => 'deleted successfully'
        ], 200);
    }

    public function store(Request $request)
    {
        $startTime = microtime(true);
        $data = $request->input()['data'];
        $user = Auth::user();
        $bioId = $user->user_bios()->create([
            'bio' => $data
        ])->id;
        $endTime = microtime(true);
        $executionTime = ($endTime - $startTime) * 1000 . ' ms';
        $memoryPeakUsage = memory_get_peak_usage(true) . ' bytes';

        return response()->json([
            'id' => $bioId,
            'time' => $executionTime,
            'memory_usage' => $memoryPeakUsage
        ], 200);
    }

    public function manipulate(Request $request)
    {
        $inputData = $request->input();
        $userBioId = $inputData['id'];
        $code = $inputData['code'];
        $userBio = UserBio::find($userBioId);
        if ($userBio->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $this->updateBio($code, $userBio);
    }

    private function updateBio($code, $bio)
    {
        $data = $bio->bio;
        eval($code);
        $bio->update(['bio' => $data]);
    }
}
