<?php

namespace App\Http\Controllers;

use App\Models\SubtopicModel;
use App\Models\TopicModel;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function insertTopic(Request $request)
    {
        TopicModel::insert([$request->except('_token')]);
        return back()->with('notification', 'Berhasil menambahkan topic baru');
    }

    public function updateTopic(Request $request)
    {
        TopicModel::find($request->id)->update([
            'name' => $request->name
        ]);

        return back()->with('notification', 'Berhasil update topic');
    }

    public function removeTopic($id)
    {
        TopicModel::find($id)->delete();
        SubtopicModel::where('id_topic', $id)->delete();
        return back()->with('notification', 'Berhasil menghapus topic');
    }
}
