@extends('layouts.public.main')

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        Modul List
    </h2>

    <div class="grid grid-cols-12 gap-6 mt-8">
        <div class="col-span-12 2xl:col-span-10">
            <!-- BEGIN: Directory & Files -->
            <div class="intro-y grid grid-cols-12 gap-3 sm:gap-6 mt-5">
                @foreach ($moduls as $modul)
                    <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                        <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                            <a href="/modul/{{ $modul->id }}" class="w-3/5 file__icon file__icon--image mx-auto">
                                <div class="file__icon--image__preview image-fit">
                                    <img alt="" src="/{{ $modul->thumbnail }}">
                                </div>
                            </a>
                            <a href="/modul/{{ $modul->id }}" class="block font-medium mt-4 text-center truncate">{{ $modul->name }}</a>
                            <div class="text-slate-500 text-xs text-center mt-0.5">{{ DB::table('tb_topic')->where('id_modul', $modul->id)->count() }} Topics</div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- END: Directory & Files -->
        </div>
    </div>
@endsection
