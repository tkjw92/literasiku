<?php

namespace App\Http\Controllers;

use App\Models\CommentModel;
use App\Models\ModulModel;
use App\Models\SubmitModel;
use App\Models\SubtopicModel;
use App\Models\TopicModel;
use App\Models\UserModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('pages.admin.dashboard');
    }

    public function user()
    {
        $users = UserModel::all();

        return view('pages.admin.user', compact('users'));
    }

    public function modul()
    {
        $moduls = ModulModel::all();

        return view('pages.admin.modul', compact('moduls'));
    }

    public function topic($id)
    {
        $modul = ModulModel::find($id);
        $topics = TopicModel::where('id_modul', $modul->id)->get();
        $subtopics = SubtopicModel::all();
        $submit = SubmitModel::where('status', 'pending')->get();
        $users = UserModel::all();
        return view('pages.admin.topic', compact('modul', 'topics', 'subtopics', 'submit', 'users'));
    }

    public function review($idmodul, $id)
    {
        $modul = ModulModel::find($idmodul);
        $submit = SubmitModel::find($id);
        $topics = TopicModel::all();
        $subtopics = SubtopicModel::all();
        $comment = CommentModel::where('id_submit', $id)->first();

        return view('pages.admin.review', compact('modul', 'submit', 'topics', 'subtopics', 'comment'));
    }
}
