<?php

namespace App\Http\Controllers;

use App\Models\CommentModel;
use App\Models\ModulModel;
use App\Models\SubmitModel;
use App\Models\SubtopicModel;
use App\Models\TopicModel;
use Illuminate\Http\Request;

class ModulController extends Controller
{
    public function insertModul(Request $request)
    {
        $thumbnail = $request->file('thumbnail');
        $extFile = $thumbnail->getClientOriginalExtension();

        $allowedExt = ['png', 'jpg', 'jpeg'];

        if (in_array($extFile, $allowedExt)) {
            $fileName = uniqid() . '.' . $extFile;
            $thumbnail->storeAs('public', $fileName);

            ModulModel::insert([
                'name' => $request->name,
                'thumbnail' => 'storage/' . $fileName,
                'status' => 'draft',
            ]);

            return back()->with('notification', 'Berhasil menambahkan modul baru');
        } else {
            return back()->withErrors('File yang dapat di upload adalah png,jpg,jpeg !!!');
        }
    }

    public function removeModul($id)
    {
        $modul = ModulModel::find($id);
        try {
            unlink($modul->thumbnail);
        } catch (\ErrorException) {
        }
        $modul->delete();
        $topic = TopicModel::where('id_modul', $id);
        foreach ($topic->get() as $t) {
            SubtopicModel::where('id_topic', $t->id)->delete();
        }
        $topic->delete();
        return back()->with('notification', 'Berhasil menghapus modul');
    }

    public function toggle($id, $mode)
    {
        ModulModel::find($id)->update(['status' => $mode]);
        return back()->with('notification', 'Berhasil mengubah status modul menjadi ' . $mode);
    }

    public function approve($idmodul, $id)
    {
        SubmitModel::find($id)->update([
            'status' => 'approved'
        ]);
        CommentModel::where('id_submit', $id)->delete();

        return redirect('/admin/modul/' . $idmodul)->with('notification', 'Berhasil melakukan approve');
    }
}
