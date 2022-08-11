<!-- Navbar-->
<header class="app-header">
    <a class="app-header__logo" href="{{ url('/') }}">Rezo Store</a>
    <!-- Sidebar toggle button-->
    <a class="app-nav__item pb-0" href="#" data-toggle="sidebar" aria-label=" hide Sidebar"><i
            class="fa fa-bars fa-2x"></i>
    </a>




    <!-- Navbar Right Menu-->
    <ul class="app-nav">

        <!--Notification Menu-->
        <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i
                    class="fa fa-bell fs-5"></i></a>

        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item h-100" href="#" data-toggle="dropdown"
                aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"> {{ auth('admin')->user()->name }}</i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">

                <li><a class="dropdown-item" href="{{ route('profile') }}"><i class="fa fa-user fa-lg"></i> Profile</a>
                </li>
                <li><a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="fa fa-sign-out fa-lg"></i>
                        Logout</a></li>
            </ul>
        </li>

        <!-- languages Menu-->
        <li class="dropdown align-middle"><a class="app-nav__item h-100 " href="#" data-toggle="dropdown"
                aria-label="Open Profile Menu">
                <span class="user-name text-bold-700">
                    {{ app()->getLocale() == 'ar' ? 'AR' : 'EN' }}
                </span></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li class="dropdown dropdown-user nav-item w-100">
                        <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>

    </ul>
</header>
