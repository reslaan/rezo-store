<header class="section-header">

    <nav class="navbar navbar-expand-lg navbar-dark border-bottom bg-primary text-white">
        <div class="container">
            <a href="{{ route('home') }}" class="app-header__logo bg-transparent  h2">Rezo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    {{-- admin link --}}
                    <li class="nav-item">
                        <a href="{{ route('admin.login') }}" class="active nav-link">
                            Admin
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="{{ route('cart') }}">
                            <i class="fa fa-shopping-cart fs-6  text-white ">
                                @auth
                                    <small id="cartCount">({{ auth()->user()->carts->count() ?? 0 }})</small>
                                @endauth
                            </i>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa fa-user  text-white"> </i>
                        </a>
                        <ul class="dropdown-menu ">

                            @auth
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile') }}"><i class="fa fa-user fa-lg"></i>
                                        Profile</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('settings') }}"><i class="fa fa-cog fa-lg "></i>
                                        Settings</a>
                                </li>
                                <li>
                                    <a class="dropdown-item " href="{{ route('logout') }}"><i
                                            class="fa fa-sign-out fa-lg "></i> Logout</a>
                                </li>

                            @endauth
                            @guest()
                                <li>
                                    <a class="dropdown-item" href="{{ route('login') }}"><i class="fa fa-sign-in fa-lg"></i>
                                        Login</a>
                                </li>
                            @endguest
                        </ul>
                    </li>

                    <!-- languages Menu-->
                    <li class="dropdown  nav-item">
                        <a class="nav-link active dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ app()->getLocale() == 'ar' ? 'AR' : 'EN' }} </a>

                        <ul class="dropdown-menu ">
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
            </div>
        </div>
    </nav>

    <!-- header-main .// -->
    @isset($categories)


        <nav class="navbar navbar-expand navbar-dark bg-secondary">
            <div class="container">
                {{-- <a href="#" class="app-header__logo bg-transparent  h2"></a> --}}

                <button class="navbar-toggler align-self-start" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
                    aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="main_nav">
                    <ul class="navbar-nav mx-auto">
                        @foreach ($categories as $category)
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </nav>

    @endisset

</header>
