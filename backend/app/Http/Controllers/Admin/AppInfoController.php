<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppInfo;
use Illuminate\Http\Request;

class AppInfoController extends Controller
{
    public function index()
    {
        $appInfos = AppInfo::all();
        return view('admin.app_infos.index', compact('appInfos'));
    }

    public function create()
    {
        return view('admin.app_infos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'version' => 'required|string'
        ]);

        AppInfo::create($data);

        return redirect()->route('admin.app_infos.index')->with('success', 'Info Aplikasi berhasil ditambahkan');
    }

    public function edit(AppInfo $appInfo)
    {
        return view('admin.app_infos.edit', compact('appInfo'));
    }

    public function update(Request $request, AppInfo $appInfo)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'version' => 'required|string'
        ]);

        $appInfo->update($data);

        return redirect()->route('admin.app_infos.index')->with('success', 'Info Aplikasi berhasil diupdate');
    }

    public function destroy(AppInfo $appInfo)
    {
        $appInfo->delete();
        return redirect()->route('admin.app_infos.index')->with('success', 'Info Aplikasi berhasil dihapus');
    }
}
