<?php

namespace App\Http\Controllers;

use App\Models\SubtopicModel;
use Illuminate\Http\Request;

class SubtopicController extends Controller
{
    public function insertSubtopic(Request $request)
    {
        SubtopicModel::insert([$request->except('_token')]);
        return back()->with('notification', 'Berhasil menambahkan subtopic baru');
    }

    public function updateSubtopic(Request $request)
    {
        SubtopicModel::find($request->id)->update([
            'name' => $request->name
        ]);
        return back()->with('notification', 'Berhasil update subtopic');
    }

    public function removeSubtopic($id)
    {
        SubtopicModel::find($id)->delete();
        return back()->with('notification', 'Berhasil menghapus subtopic');
    }
}
