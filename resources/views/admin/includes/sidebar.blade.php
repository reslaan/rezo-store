
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar w-25" src="{{asset('assets/admin/images/logo/logo.png')}}" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">John Doe</p>
            <p class="app-sidebar__user-designation">Frontend Developer</p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item  {{ $activePage == 'dashboard' ? ' active' : '' }}" href="{{ url('/admin') }}"><i class="app-menu__icon fa fa-tachometer-alt"></i><span class="app-menu__label">Dashboard</span></a></li>


        <li class="treeview"><a class="app-menu__item  {{ $activePage == 'categories' ? ' active' : '' }}" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-layer-group"></i>
                <span class="app-menu__label">{{__('admin/sidebar.main-categories')}}
                </span>
                <span class=" badge badge-primary badge-pill float-right mr-2">{{App\Models\Category::categories()->count()}}</span>
                <i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{route('admin.categories','categories')}}"><i class=" fa fa-circle-o"></i>{{__('admin/sidebar.all')}} </a></li>
                <li><a class="treeview-item" href="{{route('admin.new-category','categories')}}">  <i class="me-2 fa fa-plus"></i> {{__('admin/sidebar.add-category')}}</a></li>
            </ul>
        </li>

        <li class="treeview"><a class="app-menu__item  {{ $activePage == 'subcategories' ? ' active' : '' }}" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-layer-minus"></i>
                <span class="app-menu__label">{{__('admin/sidebar.subcategories')}}
                </span>
                <span class="badge badge badge-primary badge-pill float-right mr-2">{{App\Models\Category::subcategories()->count()}}</span>
                <i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{route('admin.categories','subcategories')}}"><i class=" fa fa-circle-o"></i>{{__('admin/sidebar.all')}}  </a></li>
                <li><a class="treeview-item" href="{{route('admin.new-category','subcategories')}}"><i class="me-2 fa fa-plus"></i> {{__('admin/sidebar.add-subcategory')}}</a></li>
            </ul>
        </li>


        <li class="treeview">
            <a class="app-menu__item {{ $activePage == 'brands' ? ' active' : '' }}" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-sparkles"></i>
                <span class="app-menu__label">{{__('admin/sidebar.brands')}}
                </span>
                <span class="badge badge badge-primary badge-pill float-right mr-2">{{App\Models\Brand::count()}}</span>
                <i class="treeview-indicator fa  fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{route('admin.brands')}}"><i class="icon fa fa-circle-o"></i>{{__('admin/sidebar.all')}}  </a></li>
                <li><a class="treeview-item" href="{{route('admin.new-brand')}}"><i class="icon fa fa-plus"></i> {{__('admin/sidebar.add-brand')}}</a></li>
            </ul>
        </li>


        <li class="treeview">
            <a class="app-menu__item  {{ $activePage == 'tags' ? ' active' : '' }}" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-tags"></i>
                <span class="app-menu__label">{{__('admin/sidebar.tags')}}
                </span>
                <span class="badge badge badge-primary badge-pill float-right mr-2">{{App\Models\Tag::count()}}</span>
                <i class="treeview-indicator fa  fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{route('admin.tags.index')}}"><i class="icon fa fa-circle-o"></i> {{__('admin/sidebar.all')}}  </a></li>
                <li><a class="treeview-item" href="{{route('admin.tags.create')}}"><i class="icon fa fa-plus"></i> {{__('admin/sidebar.add-tag')}}</a></li>
            </ul>
        </li>


        <li class="treeview">
            <a class="app-menu__item  {{ $activePage == 'products' ? ' active' : '' }}" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-archive"></i>
                <span class="app-menu__label">{{__('admin/sidebar.products')}}
                </span>
                <span class="badge badge badge-primary badge-pill float-right mr-2">{{App\Models\Product::count()}}</span>
                <i class="treeview-indicator fa  fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{route('admin.products.index')}}"><i class="icon fa fa-circle-o"></i> {{__('admin/sidebar.all')}}  </a></li>
                <li><a class="treeview-item" href="{{route('admin.attributes.index')}}"><i class="icon fa fa-sliders-h-square"></i> {{__('admin/sidebar.attributes')}}  </a></li>
                <li><a class="treeview-item" href="{{route('admin.options.index')}}"><i class="icon fa fa-sliders-h"></i> {{__('admin/sidebar.options')}}  </a></li>
                <li><a class="treeview-item" href="{{route('admin.products.create')}}"><i class="icon fa fa-plus"></i> {{__('admin/sidebar.add-product')}}</a></li>
            </ul>
        </li>


        <li class="treeview">
            <a class="app-menu__item  {{ $activePage == 'offers' ? ' active' : '' }}" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-percent"></i>
                <span class="app-menu__label">{{__('Offers')}}
                </span>
                <span class="badge badge badge-primary badge-pill float-right mr-2">{{App\Models\Product::count()}}</span>
                <i class="treeview-indicator fa  fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{route('admin.products.index')}}"><i class="icon fa fa-circle-o"></i> {{__('admin/sidebar.all')}}  </a></li>
                <li><a class="treeview-item" href="{{route('admin.attributes.index')}}"><i class="icon fa fa-sliders-h-square"></i> {{__('admin/sidebar.attributes')}}  </a></li>
                <li><a class="treeview-item" href="{{route('admin.options.index')}}"><i class="icon fa fa-sliders-h"></i> {{__('admin/sidebar.options')}}  </a></li>
                <li><a class="treeview-item" href="{{route('admin.products.create')}}"><i class="icon fa fa-plus"></i> {{__('admin/sidebar.add-product')}}</a></li>
            </ul>
        </li>




        <li class="treeview">
            <a class="app-menu__item  {{ $activePage == 'settings' ? ' active' : '' }}" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">{{__('admin/sidebar.settings')}}</span>
                <i class="treeview-indicator fa  fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="subtreeview ">
                    <a class="app-menu__item" href="#submenu" data-toggle="collapse">
                        <span class="app-menu__label">{{__('admin/sidebar.shipping-methods')}}</span>
                        <i class="subtreeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul id="submenu" class="treeview-menu collapse">
                        <li ><a class="treeview-item" href="{{route('edit.shipping.methods','free')}}"><i class="icon fa fa-circle-o"></i> {{__('admin/sidebar.free-shipping')}} </a>
                        </li>
                        <li ><a class="treeview-item" href="{{route('edit.shipping.methods','local')}}"><i class="icon fa fa-circle-o"></i> {{__('admin/sidebar.local-shipping')}}</a></li>
                        <li ><a class="treeview-item" href="{{route('edit.shipping.methods','outer')}}"><i class="icon fa fa-circle-o"></i> {{__('admin/sidebar.outer-shipping')}}</a></li>
                    </ul>
                </li>
                <li><a class="treeview-item" href="{{route('admin.new-category','subcategories')}}"><i class="icon fa fa-circle-o"></i> إضافة  ماركة جديدة</a></li>
            </ul>
        </li>

        <li><a class="app-menu__item" href="{{ url('/' . $page='docs') }}"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Docs</span></a></li>
    </ul>
</aside>

