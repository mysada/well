<div class="drawer-side" style="padding-right: 50px; background-color: #66CC8A">
    <div class="menu text-base-content min-h-full w-40 p-4 gap-8">
        <div class="top-0 z-20 flex items-center gap-2 px-4 py-2">
            <a href="{{route('admin.home')}}">
                <img src="/images/logo/header_logo.png" alt="Brand Logo">
            </a>
        </div>
        <ul class="text-lg" style="font-size:15px">
            <li><a class="menu-item {{ request()->is('admin') ? 'link' : '' }}"
                   href="{{route('admin.home')}}">Home</a></li>
            <li><a class="menu-item {{ request()->is('admin/products') ? 'link' : '' }}"
                   href="{{route('AdminProductList')}}">Products</a></li>
            <li><a class="menu-item {{ request()->is('admin/user') ? 'link' : '' }}" href="{{route("AdminUserList")}}">Users</a>
            </li>
            <li><a class="menu-item {{ request()->is('admin/orders') ? 'link' : '' }}"
                   href="{{route('AdminOrderList')}}">Orders</a></li>
            <li><a class="menu-item {{ request()->is('admin/payments') ? 'link' : '' }}"
                   href="{{route('AdminPaymentList')}}">Payments</a></li>
            <li><a class="menu-item {{ request()->is('admin/categories') ? 'link' : '' }}"
                   href="{{route('AdminCategoryList')}}">Categories</a></li>
            <li><a class="menu-item {{ request()->is('admin/reviews') ? 'link' : '' }}"
                   href="{{route('AdminReviewList')}}">Reviews</a></li>
            <li><a class="menu-item {{ request()->is('admin/queries') ? 'link' : '' }}"
                   href="{{route('admin.queries')}}">Queries</a></li>
        </ul>
    </div>

</div>
