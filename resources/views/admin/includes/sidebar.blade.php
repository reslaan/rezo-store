<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        {{--        <img class="app-sidebar__user-avatar w-25" src="{{asset('assets/admin/images/logo/logo.png')}}" alt="User Image">--}}
        <div>
            <p class="app-sidebar__user-name">Reslaan Alobeidi</p>
            <p class="app-sidebar__user-designation">Full Stack Develeoper</p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item  {{ $activePage == 'dashboard' ? ' active' : ''  }}" href="{{ url('/admin') }}"><i
                    class="app-menu__icon fa fa-tachometer-alt"></i><span class="app-menu__label">Dashboard</span></a>
        </li>


        <li class="treeview"><a class="app-menu__item  {{ $activePage == 'categories' ? ' active' : '' }}" href="#"
                                data-toggle="treeview"><i class="app-menu__icon fa fa-layer-group"></i>
                <span class="app-menu__label">{{__('sidebar.categories')}}
                </span>
                <span
                    class=" badge badge-primary badge-pill float-right mr-2">{{App\Models\Category::count() - 1}}</span>
                <i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{route('admin.categories.index')}}"><i
                            class=" fa fa-circle-o"></i>{{__('sidebar.all')}} </a></li>
                <li><a class="treeview-item" href="{{route('admin.categories.create')}}"> <i
                            class="me-2 fa fa-plus"></i> {{__('sidebar.add-category')}}</a></li>
            </ul>
        </li>



        <li class="treeview">
            <a class="app-menu__item {{ $activePage == 'brands' ? ' active' : '' }}" href="#" data-toggle="treeview"><i
                    class="app-menu__icon fa fa-sparkles"></i>
                <span class="app-menu__label">{{__('sidebar.brands')}}
                </span>
                <span class="badge badge badge-primary badge-pill float-right mr-2">{{App\Models\Brand::count()}}</span>
                <i class="treeview-indicator fa  fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{route('admin.brands.index')}}"><i
                            class="icon fa fa-circle-o"></i>{{__('sidebar.all')}}  </a></li>
                <li><a class="treeview-item" href="{{route('admin.brands.create')}}"><i
                            class="icon fa fa-plus"></i> {{__('sidebar.add-brand')}}</a></li>
            </ul>
        </li>


        <li class="treeview">
            <a class="app-menu__item  {{ $activePage == 'tags' ? ' active' : '' }}" href="#" data-toggle="treeview"><i
                    class="app-menu__icon fa fa-tags"></i>
                <span class="app-menu__label">{{__('sidebar.tags')}}
                </span>
                <span class="badge badge badge-primary badge-pill float-right mr-2">{{App\Models\Tag::count()}}</span>
                <i class="treeview-indicator fa  fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{route('admin.tags.index')}}"><i
                            class="icon fa fa-circle-o"></i> {{__('sidebar.all')}}  </a></li>
                <li><a class="treeview-item" href="{{route('admin.tags.create')}}"><i
                            class="icon fa fa-plus"></i> {{__('sidebar.add-tag')}}</a></li>
            </ul>
        </li>

        <li class="treeview">
            <a class="app-menu__item  {{ $activePage == 'attributes' ? ' active' : '' }}" href="{{route('admin.attributes.index')}}"><i
                    class="app-menu__icon fa fa-tags"></i>
                <span class="app-menu__label">{{__('sidebar.attributes')}}
                </span>
                <span class="badge badge badge-primary badge-pill me-3">{{App\Models\Attribute::count()}}</span>
                </a>
        </li>


        <li class="treeview">
            <a class="app-menu__item  {{ $activePage == 'products' ? ' active' : '' }}" href="#" data-toggle="treeview"><i
                    class="app-menu__icon fa fa-archive"></i>
                <span class="app-menu__label">{{__('sidebar.products')}}
                </span>
                <span
                    class="badge badge badge-primary badge-pill float-right mr-2">{{App\Models\Product::count()}}</span>
                <i class="treeview-indicator fa  fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{route('admin.products.index')}}"><i
                            class="icon fa fa-circle-o"></i> {{__('sidebar.all')}}  </a></li>
                {{--                <li><a class="treeview-item" href="{{route('admin.attributes.index')}}"><i class="icon fa fa-sliders-h-square"></i> {{__('sidebar.attributes')}}  </a></li>--}}
                <li><a class="treeview-item" href="{{route('admin.products.create')}}"><i
                            class="icon fa fa-plus"></i> {{__('sidebar.add-product')}}</a></li>
            </ul>
        </li>


        {{--        <li class="treeview">--}}
        {{--            <a class="app-menu__item  {{ $activePage == 'orders' ? ' active' : '' }}" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cabinet-filing"></i>--}}
        {{--                <span class="app-menu__label">{{__('sidebar.orders')}}--}}
        {{--                </span>--}}
        {{--                <span class="badge badge badge-primary badge-pill float-right mr-2">{{App\Models\Product::count()}}</span>--}}
        {{--                <i class="treeview-indicator fa  fa-angle-right"></i></a>--}}
        {{--            <ul class="treeview-menu">--}}
        {{--                <li><a class="treeview-item" href="{{route('admin.products.index')}}"><i class="icon fa fa-circle-o"></i> {{__('sidebar.all')}}  </a></li>--}}

        {{--            </ul>--}}
        {{--        </li>--}}


        <li class="treeview">
            <a class="app-menu__item  {{ $activePage == 'settings' ? ' active' : '' }}"
               href="{{ route('admin.settings') }}" >
                <i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">{{__('sidebar.settings')}}</span>
            </a>

        </li>
    </ul>
</aside>

