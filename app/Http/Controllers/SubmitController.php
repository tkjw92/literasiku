<?php

namespace App\Http\Controllers;

use App\Models\CommentModel;
use App\Models\SubmitModel;
use Illuminate\Http\Request;
use Goutte\Client;

use function Laravel\Prompts\text;

class SubmitController extends Controller
{
    public function check(Request $request)
    {
        // cek sumber 1
        $client = new Client();
        $sumber1 = $client->request('GET', $request->sumber1);
        $sumber2 = $client->request('GET', $request->sumber2);

        $content1 = '';
        $content2 = '';
        $judul1 = '';
        $judul2 = '';

        $sumber1->filter('html')->each(function ($node) use (&$content1) {
            $content1 .= $node->text() . ' ';
        });
        $sumber2->filter('html')->each(function ($node) use (&$content2) {
            $content2 .= $node->text() . ' ';
        });

        $sumber1->filter('title')->each(function ($node) use (&$judul1) {
            $judul1 = $node->text();
        });
        $sumber2->filter('title')->each(function ($node) use (&$judul2) {
            $judul2 = $node->text();
        });

        $content1 = str_replace(chr(194) . chr(160), ' ', $content1);
        $content2 = str_replace(chr(194) . chr(160), ' ', $content2);

        $fail = [
            'penulis1' => 'fail',
            'penulis2' => 'fail',
            'pendapat1' => 'fail',
            'pendapat2' => 'fail',
        ];

        if (strpos($content1, $request->penulis1) !== false) {
            $fail['penulis1'] = 'success';
        }
        if (strpos($content1, $request->pendapat1) !== false) {
            $fail['pendapat1'] = 'success';
        }
        if (strpos($content2, $request->penulis2) !== false) {
            $fail['penulis2'] = 'success';
        }
        if (strpos($content2, $request->pendapat2) !== false) {
            $fail['pendapat2'] = 'success';
        }

        if (!in_array('fail', $fail)) {
            $submit = SubmitModel::where('id_subtopic', $request->id_subtopic);
            if ($submit->count() > 0) {
                $submit->update([
                    'pendapat1' => base64_encode($request->pendapat1),
                    'pendapat2' => base64_encode($request->pendapat2),
                    'sumber1' => base64_encode($request->sumber1),
                    'sumber2' => base64_encode($request->sumber2),
                    'kesimpulan' => base64_encode($request->kesimpulan),
                    'penulis1' => $request->penulis1,
                    'penulis2' => $request->penulis2,
                    'judul1' => $judul1,
                    'judul2' => $judul2,
                    'tahun1' => $request->tahun1,
                    'tahun2' => $request->tahun2,
                    'status' => 'pending',
                ]);
            } else {
                SubmitModel::insert([
                    'username' => session('cred')['username'],
                    'id_modul' => $request->id_modul,
                    'id_topic' => $request->id_topic,
                    'id_subtopic' => $request->id_subtopic,
                    'pendapat1' => base64_encode($request->pendapat1),
                    'pendapat2' => base64_encode($request->pendapat2),
                    'sumber1' => base64_encode($request->sumber1),
                    'sumber2' => base64_encode($request->sumber2),
                    'kesimpulan' => base64_encode($request->kesimpulan),
                    'penulis1' => $request->penulis1,
                    'penulis2' => $request->penulis2,
                    'judul1' => $judul1,
                    'judul2' => $judul2,
                    'tahun1' => $request->tahun1,
                    'tahun2' => $request->tahun2,
                    'status' => 'pending',
                ]);
            }

            return redirect('/modul/' . $request->id_modul);
        } else {
            return back()
                ->withInput()
                ->with('fail', $fail);
        }
    }

    public function revisi(Request $request, $idmodul, $id)
    {
        SubmitModel::find($id)->update(['status' => 'revisi']);
        $comment = CommentModel::where('id_submit', $id);
        if ($comment->count() > 0) {
            $comment->update(['comment' => base64_encode($request->comment)]);
        } else {
            CommentModel::insert(['comment' => base64_encode($request->comment), 'id_submit' => $id]);
        }

        return redirect('/admin/modul/' . $idmodul)->with('notification', 'Berhasil melakukan update status menjadi revisi');
    }
}
