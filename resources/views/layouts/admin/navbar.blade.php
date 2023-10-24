<div class="top-bar-boxed h-[70px] z-[51] relative border-b border-white/[0.08] mt-12 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 md:pt-0 mb-12">
    <div class="h-full flex items-center">
        <!-- BEGIN: Logo -->
        <a href="#" class="-intro-x hidden md:flex">
            <img class="w-6" src="/assets/dist/images/logo.svg">
            <span class="text-white text-lg ml-3"> Literasiku </span>
        </a>
        <!-- END: Logo -->
        <!-- BEGIN: Breadcrumb -->
        <nav aria-label="breadcrumb" class="-intro-x h-full mr-auto">
            <ol class="breadcrumb breadcrumb-light">
                <li class="breadcrumb-item"><a href="#">Application</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
        <!-- END: Breadcrumb -->

        <!-- BEGIN: Account Menu -->
        <div class="intro-x dropdown w-8 h-8">
            <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                <img class="rounded-full" src="https://www.mcdelivery.com.tw/tw/static/1644907353001/assets/00/img/icon_profile_gray.png">
            </div>

            <div class="dropdown-menu w-56">
                <ul class="dropdown-content bg-primary/80 before:block before:absolute before:bg-black before:inset-0 before:rounded-md before:z-[-1] text-white">
                    <li class="p-2">
                        <div class="font-medium">{{ session('cred')['name'] }}</div>
                        <div class="text-xs text-white/60 mt-0.5 dark:text-slate-500">{{ session('cred')['username'] != 'admin' ? 'Students' : 'Administrator' }}</div>
                    </li>
                    <li>
                        <hr class="dropdown-divider border-white/[0.08]">
                    </li>
                    <li>
                        <a href="#" class="dropdown-item hover:bg-white/5"> <i data-lucide="user" class="w-4 h-4 mr-2"></i> Profile </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider border-white/[0.08]">
                    </li>
                    <li>
                        <div class="dropdown-item form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                            <input id="switch-dark" class="form-check-input" type="checkbox" {{ session('theme') == 'dark' ? 'checked' : '' }}>
                            <label class="form-check-label ml-2" for="switch-dark">Dark Mode</label>
                        </div>
                    </li>
                    <li>
                        <a href="/logout" class="dropdown-item hover:bg-white/5"> <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- END: Account Menu -->
    </div>
</div>
