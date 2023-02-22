<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserBioController extends Controller
{
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
}
