@extends('layouts.admin.main')

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        Modul List
    </h2>

    <div class="grid grid-cols-12 gap-6 mt-8">
        <div class="col-span-12 2xl:col-span-10">
            <!-- BEGIN: File Manager Filter -->
            <div class="intro-y flex flex-col-reverse sm:flex-row items-center">
                <div class="w-full sm:w-auto flex">
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#addModul" class="btn btn-primary shadow-md mr-2">Add New Modul</a>
                </div>
            </div>
            <!-- END: File Manager Filter -->
            <!-- BEGIN: Directory & Files -->
            <div class="intro-y grid grid-cols-12 gap-3 sm:gap-6 mt-5">
                @foreach ($moduls as $modul)
                    <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                        <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                            @if ($modul->status == 'draft')
                                <span class="absolute top-0 bg-pending/80 text-white text-xs m-5 px-2 py-1 rounded z-10">Draft</span>
                            @endif
                            <a href="/admin/modul/{{ $modul->id }}" class="w-3/5 file__icon file__icon--image mx-auto">
                                <div class="file__icon--image__preview image-fit">
                                    <img alt="" src="/{{ $modul->thumbnail }}">
                                </div>
                            </a>
                            <a href="/admin/modul/{{ $modul->id }}" class="block font-medium mt-4 text-center truncate">{{ $modul->name }}</a>
                            <div class="text-slate-500 text-xs text-center mt-0.5">{{ DB::table('tb_topic')->where('id_modul', $modul->id)->count() }} Topics</div>
                            <div class="absolute top-0 right-0 mr-2 mt-3 dropdown ml-auto">
                                <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-5 h-5 text-slate-500"></i> </a>
                                <div class="dropdown-menu w-40">
                                    <ul class="dropdown-content">
                                        <li>
                                            <a href="/admin/modul/{{ $modul->id }}" class="dropdown-item"> <i data-lucide="edit" class="w-4 h-4 mr-2"></i> Edit </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-modul-{{ $modul->id }}" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- END: Directory & Files -->
        </div>
    </div>

    <div id="addModul" class="modal" data-tw-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content"> <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Add New Modul Literasi</h2>
                </div> <!-- END: Modal Header --> <!-- BEGIN: Modal Body -->
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="flex flex-col">
                            <div class="border-2 w-40 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5 mb-5 mx-auto">
                                <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                    <img class="rounded-md" id="preview-img">
                                </div>
                                <div class="mx-auto cursor-pointer relative mt-5">
                                    <button type="button" class="btn btn-primary w-full">Change Photo</button>
                                    <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0" id="input-img" name="thumbnail" required>
                                </div>
                            </div>

                            <div>
                                <label for="regular-form-1" class="form-label">Modul Name</label>
                                <input id="regular-form-1" type="text" class="form-control" name="name" required>
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

    @foreach ($moduls as $modul)
        <div id="delete-modul-{{ $modul->id }}" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center"> <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Are you sure?</div>
                            <div class="text-slate-500 mt-2">Do you really want to delete these records? <br>This process cannot be undone.</div>
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                            <a href="/admin/modul/delete/{{ $modul->id }}" class="btn btn-danger w-24">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('script')
    <script>
        document.getElementById('input-img').addEventListener('change', () => {
            document.getElementById('preview-img').src = URL.createObjectURL(document.getElementById('input-img').files[0]);
        })
    </script>
@endsection
