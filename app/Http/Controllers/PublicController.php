<?php

namespace App\Http\Controllers;

use App\Models\CommentModel;
use App\Models\ModulModel;
use App\Models\SubmitModel;
use App\Models\SubtopicModel;
use App\Models\TopicModel;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function dashboard()
    {
        $approved = SubmitModel::where('username', session('cred')['username'])->where('status', 'approved')->count();
        $pending = SubmitModel::where('username', session('cred')['username'])->where('status', 'pending')->count();
        $revisi = SubmitModel::where('username', session('cred')['username'])->where('status', 'revisi')->count();

        return view('pages.public.dashboard', compact('revisi', 'pending', 'approved'));
    }

    public function modul()
    {
        $moduls = ModulModel::where('status', '!=', 'draft')->get();

        return view('pages.public.modul', compact('moduls'));
    }

    public function topic($id)
    {
        $modul = ModulModel::find($id);

        if ($modul->status == 'draft') {
            return redirect('/');
        }

        $topics = TopicModel::where('id_modul', $modul->id)->get();
        $subtopics = SubtopicModel::all();

        return view('pages.public.topic', compact('modul', 'topics', 'subtopics'));
    }

    public function submit($idmodul, $id)
    {
        $modul = ModulModel::find($idmodul);
        $modulName = $modul->name;
        $subtopic = SubtopicModel::find($id);
        $topic = TopicModel::find($subtopic->id_topic);

        if (ModulModel::find($idmodul)->status == 'draft') {
            return redirect('/modul');
        }

        $submit = SubmitModel::where('username', session('cred')['username'])->where('id_subtopic', $id)->first();

        if ($submit) {
            $comment = CommentModel::where('id_submit', $submit->id)->first()?->comment;

            if (isset($comment)) {
                $comment = base64_decode($comment);
            }

            if ($submit->status == 'approved') {
                $topics = TopicModel::all();
                $subtopics = SubtopicModel::all();

                return view('pages.public.review', compact('modul', 'submit', 'topics', 'subtopics'));
            }

            session()->flashInput([
                'pendapat1' => base64_decode($submit->pendapat1),
                'pendapat2' => base64_decode($submit->pendapat2),
                'sumber1' => base64_decode($submit->sumber1),
                'sumber2' => base64_decode($submit->sumber2),
                'kesimpulan' => base64_decode($submit->kesimpulan),
                'penulis1' => $submit->penulis1,
                'penulis2' => $submit->penulis2,
                'tahun1' => $submit->tahun1,
                'tahun2' => $submit->tahun2,
            ]);
        } else {
            $comment = null;
        }

        return view('pages.public.submit', compact('modulName', 'topic', 'idmodul', 'subtopic', 'comment'));
    }
}
