@extends('layouts.admin.main')

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        User List
    </h2>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="javascript:;" class="btn btn-primary shadow-md mr-2" data-tw-toggle="modal" data-tw-target="#addUser">Add New User</a>
            <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="search"
                        class="lucide lucide-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap"></th>
                        <th class="whitespace-nowrap">Name</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="intro-x">
                            <td class="w-10">
                                <div class="flex">
                                    <div class="w-10 h-10 image-fit zoom-in">
                                        <img class="rounded-full" src="https://www.mcdelivery.com.tw/tw/static/1644907353001/assets/00/img/icon_profile_gray.png">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="font-medium whitespace-nowrap capitalize">{{ $user->first_name }} {{ $user->last_name }}</p>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="javascript:;" data-tw-toggle="modal" data-tw-target="#edit-user-{{ $user->id }}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1">
                                            <polyline points="9 11 12 14 22 4"></polyline>
                                            <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                        </svg> Edit </a>
                                    <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-user-{{ $user->id }}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2" class="lucide lucide-trash-2 w-4 h-4 mr-1">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                        </svg> Delete </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevrons-left"
                                class="lucide lucide-chevrons-left w-4 h-4" data-lucide="chevrons-left">
                                <polyline points="11 17 6 12 11 7"></polyline>
                                <polyline points="18 17 13 12 18 7"></polyline>
                            </svg> </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                icon-name="chevron-left" class="lucide lucide-chevron-left w-4 h-4" data-lucide="chevron-left">
                                <polyline points="15 18 9 12 15 6"></polyline>
                            </svg> </a>
                    </li>
                    <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                    <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                    <li class="page-item active"> <a class="page-link" href="#">2</a> </li>
                    <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                    <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                    <li class="page-item">
                        <a class="page-link" href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                icon-name="chevron-right" class="lucide lucide-chevron-right w-4 h-4" data-lucide="chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg> </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                icon-name="chevrons-right" class="lucide lucide-chevrons-right w-4 h-4" data-lucide="chevrons-right">
                                <polyline points="13 17 18 12 13 7"></polyline>
                                <polyline points="6 17 11 12 6 7"></polyline>
                            </svg> </a>
                    </li>
                </ul>
            </nav>
            <select class="w-20 form-select box mt-3 sm:mt-0">
                <option>10</option>
                <option>25</option>
                <option>35</option>
                <option>50</option>
            </select>
        </div>
        <!-- END: Pagination -->
    </div>

    <div id="addUser" class="modal" data-tw-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content"> <!-- BEGIN: Modal Header -->
                <form action="" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Add New User</h2>
                    </div> <!-- END: Modal Header --> <!-- BEGIN: Modal Body -->
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-6">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" name="first_name" required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="last_name">
                        </div>

                        <div class="col-span-12 sm:col-span-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label class="form-label">Phone</label>
                            <input type="number" class="form-control" name="phone" required>
                        </div>

                        <div class="col-span-12 sm:col-span-6">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label class="form-label">Password</label>
                            <input type="text" class="form-control" name="password" required>
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

    @foreach ($users as $user)
        <div id="delete-user-{{ $user->id }}" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center"> <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Are you sure?</div>
                            <div class="text-slate-500 mt-2">Do you really want to delete these records? <br>This process cannot be undone.</div>
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                            <a href="/admin/user/delete/{{ $user->id }}" class="btn btn-danger w-24">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="edit-user-{{ $user->id }}" class="modal" data-tw-backdrop="static" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content"> <!-- BEGIN: Modal Header -->
                    <form action="" method="POST">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="modal-header">
                            <h2 class="font-medium text-base mr-auto">Edit User</h2>
                        </div> <!-- END: Modal Header --> <!-- BEGIN: Modal Body -->
                        <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                            <div class="col-span-12 sm:col-span-6">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" name="first_name" required value="{{ $user->first_name }}">
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}">
                            </div>

                            <div class="col-span-12 sm:col-span-6">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" required value="{{ $user->email }}">
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <label class="form-label">Phone</label>
                                <input type="number" class="form-control" name="phone" required value="{{ $user->phone }}">
                            </div>

                            <div class="col-span-12 sm:col-span-6">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" required value="{{ $user->username }}">
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <label class="form-label">Password</label>
                                <input type="text" class="form-control" name="password" required value="{{ $user->password }}">
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
    @endforeach
@endsection
