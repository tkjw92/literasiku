@extends('layouts.admin.main')

@section('content')
    <div class="p-5">
        <h2 class="intro-y text-lg font-medium mb-10 mt-5">
            {{ $modul->name }}
        </h2>

        <ul class="nav nav-boxed-tabs" role="tablist">
            <li id="topic-tab" class="nav-item flex-1" role="presentation">
                <button class="nav-link w-full py-2 active" data-tw-toggle="pill" data-tw-target="#topic-tab" type="button" role="tab" aria-controls="topic-tab" aria-selected="true"> Topics </button>
            </li>
            <li id="setting-tab" class="nav-item flex-1" role="presentation">
                <button class="nav-link w-full py-2" data-tw-toggle="pill" data-tw-target="#setting-tab" type="button" role="tab" aria-controls="setting-tab" aria-selected="false"> Setting </button>
            </li>
            <li id="response-tab" class="nav-item flex-1" role="presentation">
                <button class="nav-link w-full py-2" data-tw-toggle="pill" data-tw-target="#response-tab" type="button" role="tab" aria-controls="response-tab" aria-selected="false"> Response </button>
            </li>
        </ul>

        <div class="tab-content mt-5">
            <div id="topic-tab" class="tab-pane leading-relaxed active" role="tabpanel" aria-labelledby="topic-tab">
                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#addTopic" class="btn btn-primary w-24 mt-2 mb-3">Add Topic</a>

                <div id="topics-accordion" class="accordion accordion-boxed">
                    @foreach ($topics as $topic)
                        @php
                            $list = $subtopics->where('id_topic', $topic->id);
                        @endphp

                        <div class="accordion-item">
                            <div id="faq-accordion-content-6" class="accordion-header flex">
                                <button class="accordion-button collapsed" type="button" data-tw-toggle="collapse" data-tw-target="#faq-accordion-collapse-6" aria-expanded="false" aria-controls="faq-accordion-collapse-6">
                                    {{ $topic->name }}
                                </button>

                                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#editTopic-{{ $topic->id }}" class="btn btn-sm btn-warning mr-1 mb-2"> <i data-lucide="edit" class="w-5 h-5"></i> </a>
                                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#deleteTopic-{{ $topic->id }}" class="btn btn-sm btn-danger mr-1 mb-2"> <i data-lucide="trash" class="w-5 h-5"></i> </a>
                            </div>
                            <div id="faq-accordion-collapse-6" class="accordion-collapse collapse" aria-labelledby="faq-accordion-content-6" data-tw-parent="#topics-accordion">
                                <div class="accordion-body text-slate-600 dark:text-slate-500 leading-relaxed">
                                    <ul class="ml-5">
                                        @foreach ($list as $l)
                                            <hr>
                                            <li class="py-3 flex">
                                                <span class="my-auto">
                                                    - {{ $l->name }}
                                                </span>
                                                <div class="my-auto ml-auto mr-10">
                                                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#editSubTopic-{{ $l->id }}" class="btn btn-sm btn-warning mr-1 mb-2"> <i data-lucide="edit" class="w-5 h-5"></i> </a>
                                                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#deleteSubTopic-{{ $l->id }}" class="btn btn-sm btn-danger mr-1 mb-2"> <i data-lucide="trash" class="w-5 h-5"></i> </a>
                                                </div>
                                            </li>
                                            <hr>

                                            <div id="editSubTopic-{{ $l->id }}" class="modal" data-tw-backdrop="static" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content"> <!-- BEGIN: Modal Header -->
                                                        <div class="modal-header">
                                                            <h2 class="font-medium text-base mr-auto">Edit Topic</h2>
                                                        </div> <!-- END: Modal Header --> <!-- BEGIN: Modal Body -->
                                                        <form action="/admin/modul/{{ $modul->id }}/topic" method="post">
                                                            @csrf
                                                            @method('put')
                                                            <input type="hidden" name="id" value="{{ $l->id }}">
                                                            <div class="modal-body">
                                                                <div>
                                                                    <label for="regular-form-1" class="form-label">Sub Topic Name</label>
                                                                    <input id="regular-form-1" type="text" class="form-control" name="name" required value="{{ $l->name }}">
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

                                            <div id="deleteSubTopic-{{ $l->id }}" class="modal" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body p-0">
                                                            <div class="p-5 text-center"> <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                                                <div class="text-3xl mt-5">Are you sure?</div>
                                                                <div class="text-slate-500 mt-2">Do you really want to delete these records? <br>This process cannot be undone.</div>
                                                            </div>
                                                            <div class="px-5 pb-8 text-center">
                                                                <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                                                <a href="/admin/modul/subtopic/delete/{{ $l->id }}" class="btn btn-danger w-24">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </ul>
                                </div>

                                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#addSubTopic-{{ $topic->id }}" class="btn btn-outline-primary w-full inline-block mt-5">Add Sub-topic</a>
                            </div>
                        </div>

                        <div id="addSubTopic-{{ $topic->id }}" class="modal" data-tw-backdrop="static" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content"> <!-- BEGIN: Modal Header -->
                                    <div class="modal-header">
                                        <h2 class="font-medium text-base mr-auto">Add New Topic</h2>
                                    </div> <!-- END: Modal Header --> <!-- BEGIN: Modal Body -->
                                    <form action="/admin/modul/{{ $modul->id }}/topic" method="post">
                                        @csrf
                                        <input type="hidden" name="id_topic" value="{{ $topic->id }}">
                                        <div class="modal-body">
                                            <div>
                                                <label for="regular-form-1" class="form-label">Sub Topic Name</label>
                                                <input id="regular-form-1" type="text" class="form-control" name="name" required>
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

                        <div id="editTopic-{{ $topic->id }}" class="modal" data-tw-backdrop="static" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content"> <!-- BEGIN: Modal Header -->
                                    <div class="modal-header">
                                        <h2 class="font-medium text-base mr-auto">Edit Topic</h2>
                                    </div> <!-- END: Modal Header --> <!-- BEGIN: Modal Body -->
                                    <form action="" method="post">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="id" value="{{ $topic->id }}">
                                        <div class="modal-body">
                                            <div>
                                                <label for="regular-form-1" class="form-label">Topic Name</label>
                                                <input id="regular-form-1" type="text" class="form-control" name="name" required value="{{ $topic->name }}">
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

                        <div id="deleteTopic-{{ $topic->id }}" class="modal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body p-0">
                                        <div class="p-5 text-center"> <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                            <div class="text-3xl mt-5">Are you sure?</div>
                                            <div class="text-slate-500 mt-2">Do you really want to delete these records? <br>This process cannot be undone.</div>
                                        </div>
                                        <div class="px-5 pb-8 text-center">
                                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                            <a href="/admin/modul/topic/delete/{{ $topic->id }}" class="btn btn-danger w-24">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div id="setting-tab" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="setting-tab">
                <p class="pt-5">Current: {{ $modul->status }}</p>
                <a href="/admin/modul/{{ $modul->id }}/{{ $modul->status == 'draft' ? 'public' : 'draft' }}" class="btn btn-primary mt-2">Toggle Status</a>
            </div>

            <div id="response-tab" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="response-tab">
                <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                    <table class="table table-report -mt-2">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap"></th>
                                <th class="whitespace-nowrap">Name</th>
                                <th class="whitespace-nowrap">Topic</th>
                                <th class="whitespace-nowrap"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($submit as $s)
                                <tr class="intro-x">
                                    <td class="w-10">
                                        <div class="flex">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <img class="rounded-full" src="https://www.mcdelivery.com.tw/tw/static/1644907353001/assets/00/img/icon_profile_gray.png">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="font-medium whitespace-nowrap capitalize">{{ $users->where('username', $s->username)->first()->first_name }} {{ $users->where('username', $s->username)->first()->last_name }}</p>
                                    </td>
                                    <td>
                                        <p class="font-medium whitespace-nowrap">{{ $topics->where('id', $s->id_topic)->first()->name }} > {{ $subtopics->where('id', $s->id_subtopic)->first()->name }}</p>
                                    </td>
                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3" data-tw-toggle="modal" href="/admin/modul/{{ $modul->id }}/review/{{ $s->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square"
                                                    data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1">
                                                    <polyline points="9 11 12 14 22 4"></polyline>
                                                    <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                                </svg> Review
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="addTopic" class="modal" data-tw-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content"> <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Add New Topic</h2>
                </div> <!-- END: Modal Header --> <!-- BEGIN: Modal Body -->
                <form action="" method="post">
                    @csrf
                    <input type="hidden" name="id_modul" value="{{ $modul->id }}">
                    <div class="modal-body">
                        <div>
                            <label for="regular-form-1" class="form-label">Topic Name</label>
                            <input id="regular-form-1" type="text" class="form-control" name="name" required>
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
