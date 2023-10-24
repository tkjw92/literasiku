@extends('layouts.public.main')

@section('content')
    <div class="p-5">
        <h2 class="intro-y text-lg font-medium mb-10 mt-5">
            {{ $modul->name }}
        </h2>

        <div id="topics-accordion" class="accordion accordion-boxed">
            @foreach ($topics as $topic)
                @php
                    $list = $subtopics->where('id_topic', $topic->id);
                    $submit = App\Models\SubmitModel::where('username', session('cred')['username'])
                        ->where('id_modul', $modul->id)
                        ->first();
                @endphp

                <div class="accordion-item">
                    <div id="faq-accordion-content-6" class="accordion-header flex">
                        <button class="accordion-button collapsed" type="button" data-tw-toggle="collapse" data-tw-target="#faq-accordion-collapse-6" aria-expanded="false" aria-controls="faq-accordion-collapse-6">
                            {{ $topic->name }}
                        </button>
                    </div>
                    <div id="faq-accordion-collapse-6" class="accordion-collapse collapse" aria-labelledby="faq-accordion-content-6" data-tw-parent="#topics-accordion">
                        <div class="accordion-body text-slate-600 dark:text-slate-500 leading-relaxed">
                            <ul class="ml-5">
                                @foreach ($list as $l)
                                    <hr>
                                    <li class="py-3 flex">
                                        <a href="/modul/{{ $modul->id }}/{{ $l->id }}" class="my-auto">
                                            <span>- {{ $l->name }}</span>
                                            @if ($l->id == $submit?->id_subtopic)
                                                @if ($submit->status == 'pending')
                                                    <span class="text-xs px-1 bg-warning text-white">Waiting to Approve</span>
                                                @endif
                                                @if ($submit->status == 'revisi')
                                                    <span class="text-xs px-1 bg-warning text-white">Revisi</span>
                                                @endif
                                                @if ($submit->status == 'approved')
                                                    <span class="text-xs px-1 bg-success text-white">Approved</span>
                                                @endif
                                            @endif
                                        </a>
                                    </li>
                                    <hr>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
