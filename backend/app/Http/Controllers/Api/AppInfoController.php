<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AppInfo;

class AppInfoController extends Controller
{
    public function show(string $type)
    {
        $validTypes = ['terms', 'privacy'];

        if (!in_array($type, $validTypes)) {
            return response()->json([
                'success' => false,
                'message' => 'Tipe tidak valid. Gunakan: terms atau privacy',
            ], 422);
        }

        return response()->json([
            'success' => true,
            'data'    => AppInfo::where('type', $type)->get(),
        ]);
    }
}
