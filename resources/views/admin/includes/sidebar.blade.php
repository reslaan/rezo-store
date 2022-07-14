
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
        <li><a class="app-menu__item  {{ $activePage == 'dashboard' ? ' active' : ''  }}" href="{{ url('/admin') }}"><i class="app-menu__icon fa fa-tachometer-alt"></i><span class="app-menu__label">Dashboard</span></a></li>


        <li class="treeview"><a class="app-menu__item  {{ $activePage == 'categories' ? ' active' : '' }}" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-layer-group"></i>
                <span class="app-menu__label">{{__('sidebar.main-categories')}}
                </span>
                <span class=" badge badge-primary badge-pill float-right mr-2">{{App\Models\Category::categories()->count()}}</span>
                <i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{route('admin.categories','categories')}}"><i class=" fa fa-circle-o"></i>{{__('sidebar.all')}} </a></li>
                <li><a class="treeview-item" href="{{route('admin.new-category','categories')}}">  <i class="me-2 fa fa-plus"></i> {{__('sidebar.add-category')}}</a></li>
            </ul>
        </li>

        <li class="treeview"><a class="app-menu__item  {{ $activePage == 'subcategories' ? ' active' : '' }}" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-layer-minus"></i>
                <span class="app-menu__label">{{__('sidebar.subcategories')}}
                </span>
                <span class="badge badge badge-primary badge-pill float-right mr-2">{{App\Models\Category::subcategories()->count()}}</span>
                <i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{route('admin.categories','subcategories')}}"><i class=" fa fa-circle-o"></i>{{__('sidebar.all')}}  </a></li>
                <li><a class="treeview-item" href="{{route('admin.new-category','subcategories')}}"><i class="me-2 fa fa-plus"></i> {{__('sidebar.add-subcategory')}}</a></li>
            </ul>
        </li>


        <li class="treeview">
            <a class="app-menu__item {{ $activePage == 'brands' ? ' active' : '' }}" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-sparkles"></i>
                <span class="app-menu__label">{{__('sidebar.brands')}}
                </span>
                <span class="badge badge badge-primary badge-pill float-right mr-2">{{App\Models\Brand::count()}}</span>
                <i class="treeview-indicator fa  fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{route('admin.brands')}}"><i class="icon fa fa-circle-o"></i>{{__('sidebar.all')}}  </a></li>
                <li><a class="treeview-item" href="{{route('admin.new-brand')}}"><i class="icon fa fa-plus"></i> {{__('sidebar.add-brand')}}</a></li>
            </ul>
        </li>


        <li class="treeview">
            <a class="app-menu__item  {{ $activePage == 'tags' ? ' active' : '' }}" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-tags"></i>
                <span class="app-menu__label">{{__('sidebar.tags')}}
                </span>
                <span class="badge badge badge-primary badge-pill float-right mr-2">{{App\Models\Tag::count()}}</span>
                <i class="treeview-indicator fa  fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{route('admin.tags.index')}}"><i class="icon fa fa-circle-o"></i> {{__('sidebar.all')}}  </a></li>
                <li><a class="treeview-item" href="{{route('admin.tags.create')}}"><i class="icon fa fa-plus"></i> {{__('sidebar.add-tag')}}</a></li>
            </ul>
        </li>


        <li class="treeview">
            <a class="app-menu__item  {{ $activePage == 'products' ? ' active' : '' }}" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-archive"></i>
                <span class="app-menu__label">{{__('sidebar.products')}}
                </span>
                <span class="badge badge badge-primary badge-pill float-right mr-2">{{App\Models\Product::count()}}</span>
                <i class="treeview-indicator fa  fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{route('admin.products.index')}}"><i class="icon fa fa-circle-o"></i> {{__('sidebar.all')}}  </a></li>
                <li><a class="treeview-item" href="{{route('admin.attributes.index')}}"><i class="icon fa fa-sliders-h-square"></i> {{__('sidebar.attributes')}}  </a></li>
                <li><a class="treeview-item" href="{{route('admin.products.create')}}"><i class="icon fa fa-plus"></i> {{__('sidebar.add-product')}}</a></li>
            </ul>
        </li>


        <li class="treeview">
            <a class="app-menu__item  {{ $activePage == 'orders' ? ' active' : '' }}" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cabinet-filing"></i>
                <span class="app-menu__label">{{__('sidebar.orders')}}
                </span>
                <span class="badge badge badge-primary badge-pill float-right mr-2">{{App\Models\Product::count()}}</span>
                <i class="treeview-indicator fa  fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{route('admin.products.index')}}"><i class="icon fa fa-circle-o"></i> {{__('sidebar.all')}}  </a></li>

            </ul>
        </li>




        <li class="treeview">
            <a class="app-menu__item  {{ $activePage == 'settings' ? ' active' : '' }}" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">{{__('sidebar.settings')}}</span>
                <i class="treeview-indicator fa  fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{route('profile')}}"> Profile</a></li>
                <li class="subtreeview ">
                    <a class="app-menu__item" href="#submenu" data-toggle="collapse">
                        <span class="app-menu__label">{{__('sidebar.shipping-methods')}}</span>
                        <i class="subtreeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul id="submenu" class="treeview-menu collapse">
                        <li ><a class="treeview-item" href="{{route('edit.shipping.methods','free')}}"><i class="icon fa fa-circle-o"></i> {{__('sidebar.free-shipping')}} </a>
                        </li>
                        <li ><a class="treeview-item" href="{{route('edit.shipping.methods','local')}}"><i class="icon fa fa-circle-o"></i> {{__('sidebar.local-shipping')}}</a></li>
                        <li ><a class="treeview-item" href="{{route('edit.shipping.methods','outer')}}"><i class="icon fa fa-circle-o"></i> {{__('sidebar.outer-shipping')}}</a></li>
                    </ul>

                </li>
            </ul>
        </li>
    </ul>
</aside>

