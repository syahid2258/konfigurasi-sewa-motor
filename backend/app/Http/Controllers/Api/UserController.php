<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // GET /api/user — Ambil profil user berdasarkan X-User-Id header
    public function show(Request $request)
    {
        $userId = $request->header('X-User-Id', 1);
        $user   = User::find($userId);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $user,
        ]);
    }

    // PUT /api/user — Update profil user
    public function update(Request $request)
    {
        $userId = $request->header('X-User-Id', 1);
        $user   = User::find($userId);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak ditemukan.',
            ], 404);
        }

        $validated = $request->validate([
            'name'       => 'sometimes|string|max:255',
            'phone'      => 'sometimes|string|max:20',
            'avatar'     => 'sometimes|string',
            'birth_date' => 'sometimes|string',
            'gender'     => 'sometimes|string',
            'occupation' => 'sometimes|string',
            'address'    => 'sometimes|string',
        ]);

        $user->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Profil berhasil diperbarui.',
            'data'    => $user->fresh(),
        ]);
    }

    // POST /api/user/change-password
    public function changePassword(Request $request)
    {
        $userId = $request->header('X-User-Id', 1);
        $user   = User::find($userId);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak ditemukan.',
            ], 404);
        }

        $request->validate([
            'current_password'      => 'required|string',
            'new_password'          => 'required|string|min:6',
            'new_password_confirm'  => 'required|same:new_password',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Kata sandi saat ini tidak cocok.',
            ], 422);
        }

        $user->update(['password' => Hash::make($request->new_password)]);

        return response()->json([
            'success' => true,
            'message' => 'Kata sandi berhasil diubah.',
        ]);
    }
}
