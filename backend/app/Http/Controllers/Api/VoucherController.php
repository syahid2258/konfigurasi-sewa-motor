<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Voucher;

class VoucherController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data'    => Voucher::where('is_active', true)->get(),
        ]);
    }
}
