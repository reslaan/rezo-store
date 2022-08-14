<header class="section-header">

    <section class="header-main border-bottom bg-primary text-white">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-3">
                    <div class="navbar-brand">
                        {{-- <img class="img-fluid w-25" src="{{asset('images/logo_default.png')}}" width="80" > --}}
                        <a href="{{ route('home') }}" class="app-header__logo bg-transparent  h2">Rezo</a>
                    </div>
                    <!-- brand-wrap.// -->
                </div>
                <div class="col-6 ">
                    <form action="#" class="search-wrap text-primary">
                        <div class="input-group">
                            <input type="text" class="form-control bg-primary text-light" placeholder="Search">
                            <div class="input-group-append">
                                <button class="btn btn-light" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- search-wrap .end// -->
                </div>
                <!-- col.// -->
                <div class=" col-3  ">
                    <ul class="list-unstyled d-flex align-items-center justify-content-evenly mb-0 text-white">

                        <li class="nav-item">
                            <a href="{{ route('cart') }}" class="position-relative text-center">
                                <i class="fa fa-shopping-cart fs-5  text-white ">
                                    @auth
                                        <small id="cartCount">({{ auth()->user()->carts->count() ?? 0 }})</small>
                                    @endauth


                                </i>
                            </a>
                        </li>


                        <li class="dropdown nav-item">
                            <a class="nav-link" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                                <i class="fa fa-user fa-lg text-white"> </i> @auth
                                    {{Auth::user()->name}}
                                @endauth</a>
                            <ul class="dropdown-menu ">

                                @auth
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile') }}"><i
                                                class="fa fa-user fa-lg"></i> Profile</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"><i
                                                class="fa fa-sign-out fa-lg "></i> Logout</a>
                                    </li>
                                @endauth
                                @guest()
                                    <li>
                                        <a class="dropdown-item" href="{{ route('login') }}"><i
                                                class="fa fa-sign-in fa-lg"></i> Login</a>
                                    </li>
                                @endguest
                            </ul>
                        </li>


                        <!-- languages Menu-->
                        <li class="dropdown align-middle nav-item">
                            <a class="" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                                <span class="user-name text-bold-700 text-white">
                                    {{ app()->getLocale() == 'ar' ? 'AR' : 'EN' }}
                                </span>
                            </a>
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

                </div>
                <!-- col.// -->
            </div>
            <!-- row.// -->
        </div>
        <!-- container.// -->
    </section>
    <!-- header-main .// -->
    @isset($categories)
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                    aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="main_nav">
                    <ul class="navbar-nav">
                        {{-- <li class="nav-item"> --}}
                        {{-- <a class="nav-link pl-0" href="#"> <strong>{{__('app.all_categories')}}</strong></a> --}}
                        {{-- </li> --}}

                        @foreach ($categories as $category)
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach

                    </ul>
                </div>
                <!-- collapse .// -->
            </div>
            <!-- container .// -->
        </nav>
    @endisset
</header>
