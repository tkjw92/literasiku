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
@endsection
