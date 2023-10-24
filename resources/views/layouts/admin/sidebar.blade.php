<nav class="side-nav">
    <ul>
        <li>
            <a href="/admin" class="side-menu {{ Request::is('admin') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon">
                    <i data-lucide="home"></i>
                </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>

        <li>
            <a href="/admin/user" class="side-menu {{ Request::is('admin/user*') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon">
                    <i data-lucide="users"></i>
                </div>
                <div class="side-menu__title"> User </div>
            </a>
        </li>

        <li>
            <a href="/admin/modul" class="side-menu {{ Request::is('admin/modul*') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon">
                    <i data-lucide="book"></i>
                </div>
                <div class="side-menu__title"> Modul </div>
            </a>
        </li>
    </ul>
</nav>
