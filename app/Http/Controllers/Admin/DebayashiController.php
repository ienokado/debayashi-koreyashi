<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Debayashi;
use App\Models\ComedianGroup;
use Http\Discovery\Exception\NotFoundException;
use Illuminate\Http\Request;

class DebayashiController extends Controller
{
    public function index(Request $request)
    {
        $query = Debayashi::query();

        $debayashis = $query->orderBy('created_at', 'desc')->get();

        return view('admin.debayashi.index', [
            'debayashis' => $debayashis,
        ]);
    }

    public function edit(Request $request, $id = null)
    {
        // 新規登録
        if (is_null($id)) {
            $debayashi = new Debayashi();
        // 編集
        } else {
            $debayashi = Debayashi::find($id);
            if (is_null($debayashi)) {
                throw new NotFoundException();
            }
        }

        // セレクトボックス
        $comedianGroups = ComedianGroup::select('id', 'name')->orderBy('name', 'asc')->get();
        $selectValues = $comedianGroups->pluck('name', 'id');

        return view('admin.debayashi.edit', [
            'debayashi' => $debayashi,
            'selectValues' => $selectValues,
        ]);
    }

    public function store(Request $request)
    {
        $id = $request->id;
        // 新規登録
        if (is_null($id)) {
            $debayashi = new Debayashi();
        // 編集
        } else {
            $debayashi = Debayashi::find($id);
            if (is_null($debayashi)) {
                session()->flash('error_message', '保存ができませんでした。');
                return redirect()->route('admin.debayashi.new');
            }
        }
        $debayashi->name = $request->name;
        $debayashi->artist_name = $request->artist_name;

        try {
            $debayashi->save();
            session()->flash('success_message', '保存しました。');
        } catch (\Exception $e) {
            session()->flash('error_message', '保存できませんでした。');
        }

        return redirect()->route('admin.debayashi.edit', ['id' => $debayashi->id]);
    }

    public function delete(Request $request)
    {
    }
}
