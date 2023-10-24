@extends('layouts.admin.main');

@section('content')
    <h2 class="intro-y text-lg font-medium mb-3 mt-5">
        {{ $modul->name }}
    </h2>
    <h3 class="intro-y text-md mb-10">
        Student > {{ $submit->username }} > {{ $topics->where('id', $submit->id_topic)->first()->name }} > {{ $subtopics->where('id', $submit->id_subtopic)->first()->name }}
    </h3>

    <div class="box p-5">
        <h1 class="text-lg font-medium">{{ $subtopics->where('id', $submit->id_subtopic)->first()->name }}</h1>

        <p>
            Menurut {{ $submit->penulis1 }} {{ base64_decode($submit->pendapat1) }}
        </p>

        <p class="mt-5">
            Menurut {{ $submit->penulis2 }} {{ base64_decode($submit->pendapat2) }}
        </p>

        <div class="mt-5">
            @php
                echo base64_decode($submit->kesimpulan);
            @endphp
        </div>

        <h1 class="text-lg font-medium mt-5">Sumber Artikel</h1>
        <p class="mb-1">
            <i>
                {{ $submit->penulis1 }}. {{ $submit->tahun1 }}. {{ $submit->judul1 }}. {{ base64_decode($submit->sumber1) }}
            </i>
        </p>
        <p>
            <i>
                {{ $submit->penulis2 }}. {{ $submit->tahun2 }}. {{ $submit->judul2 }}. {{ base64_decode($submit->sumber2) }}
            </i>
        </p>

    </div>
    <div class="mt-10 text-right">
        <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#comment" class="btn btn-warning text-white">Revisi</a>
        <a href="/admin/modul/{{ $modul->id }}/review/{{ $submit->id }}/approve" class="btn btn-primary">Approve</a>
    </div>

    <div id="comment" class="modal" data-tw-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content"> <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Comment</h2>
                </div> <!-- END: Modal Header --> <!-- BEGIN: Modal Body -->
                <form action="" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="flex flex-col">
                            <div>
                                <label for="regular-form-1" class="form-label">Comment</label>
                                <textarea name="comment" id="regular-form-1" cols="30" rows="10" class="form-control">{{ isset($comment) ? base64_decode($comment->comment) : '' }}</textarea>
                            </div>
                        </div>
                    </div> <!-- END: Modal Body --> <!-- BEGIN: Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                        <button type="submit" class="btn btn-primary w-20">Save</button>
                    </div> <!-- END: Modal Footer -->
                </form>
            </div>
        </div>
    </div>
@endsection
