<nav class="side-nav">
    <ul>
        <li>
            <a href="/" class="side-menu {{ Request::is('/') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon">
                    <i data-lucide="home"></i>
                </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>

        <li>
            <a href="/modul" class="side-menu {{ Request::is('modul*') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon">
                    <i data-lucide="book"></i>
                </div>
                <div class="side-menu__title"> Modul </div>
            </a>
        </li>
    </ul>
</nav>
