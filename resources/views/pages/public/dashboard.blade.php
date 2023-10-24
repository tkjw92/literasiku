@extends('layouts.public.main')

@section('content')
    <div class="box grid grid-cols-12 gap-5 mt-5">
        <div class="col-span-12 sm:col-span-4 2xl:col-span-3 box p-5 cursor-pointer zoom-in">
            <div class="font-medium text-base">Approved</div>
            <div class="text-slate-500">{{ $approved }} Topics</div>
        </div>

        <div class="col-span-12 sm:col-span-4 2xl:col-span-3 box p-5 cursor-pointer zoom-in">
            <div class="font-medium text-base">Revisi</div>
            <div class="text-slate-500">{{ $revisi }} Topics</div>
        </div>

        <div class="col-span-12 sm:col-span-4 2xl:col-span-3 box p-5 cursor-pointer zoom-in">
            <div class="font-medium text-base">Pending</div>
            <div class="text-slate-500">{{ $pending }} Topics</div>
        </div>
    </div>

    <div class="box p-5 mt-3">
        <p class="mb-5">
            Tingkatkan pengalaman dan pengetahuanmu dengan melakukan literasi, pada website ini kita akan belajar mengumpulkan sebuah data yang valid dan dapat di pertanggung jawabkan kebenarannya.
            Dengan begitu kita juga akan terbiasa mengumpulkan sebuah informasi yang valid dan akurat serta tidak gampang terpengaruh dengan informasi yang tidak valid (hoax).
        </p>

        <p class="mb-5">
            Pada setiap modul terdapat beberapa topic dan subtopic yang dapat dikerjakan, coba cari informasi mengenai subtopic tersebut. Kamu harus mencari dua pendapat dari orang yang berbeda
            serta mencantumkan sumber dan penulis dari informasi tersebut. Sistem akan melakukan verifikasi secara otomatis pada artikel atau informasi yang kamu inputkan. Jika informasi yang kamu inputkan
            tidak valid maka sistem akan melakukan penolakan, pada bagian input selain mencari kedua pendapat dari sumber yang berbeda kamu juga diminta untuk menuliskan kesimpulan dari subtopic tersebut.
        </p>

        <p>
            Setelah melakukan input kamu dapat menunggu literasi mu di tinjau oleh admin dan jika dirasa oleh admin sudah sesuai maka literasi yang kamu inputkan akan mendapatkan label approve.
            Tunggu apa lagi yuk mulai literasi sekarang :)
        </p>
    </div>
@endsection
