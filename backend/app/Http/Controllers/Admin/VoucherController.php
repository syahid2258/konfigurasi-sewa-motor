<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::all();
        return view('admin.vouchers.index', compact('vouchers'));
    }

    public function create()
    {
        return view('admin.vouchers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:vouchers,code',
            'discount' => 'required|string',
            'valid_until' => 'required|date'
        ]);

        Voucher::create($data);

        return redirect()->route('admin.vouchers.index')->with('success', 'Voucher berhasil ditambahkan');
    }

    public function edit(Voucher $voucher)
    {
        return view('admin.vouchers.edit', compact('voucher'));
    }

    public function update(Request $request, Voucher $voucher)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:vouchers,code,' . $voucher->id,
            'discount' => 'required|string',
            'valid_until' => 'required|date'
        ]);

        $voucher->update($data);

        return redirect()->route('admin.vouchers.index')->with('success', 'Voucher berhasil diupdate');
    }

    public function destroy(Voucher $voucher)
    {
        $voucher->delete();
        return redirect()->route('admin.vouchers.index')->with('success', 'Voucher berhasil dihapus');
    }
}
