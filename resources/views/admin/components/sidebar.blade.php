<div class="drawer-side">
    <div class="menu text-base-content min-h-full w-40 p-4 gap-8">
        <div class="top-0 z-20 flex items-center gap-2 px-4 py-2">
            <a href="{{route('admin.home')}}">
                <img src="/images/logo/header_logo.png" alt="Brand Logo" style="height: 40px;">
            </a>
        </div>
        <ul class="text-lg">
            <li><a class="menu-item" href="{{route('AdminProductList')}}">Products</a></li>
            <li><a class="menu-item" href="{{route("AdminUserList")}}">Users</a></li>
            <li><a class="menu-item" href="{{route('AdminOrderList')}}">Orders</a></li>
            <li><a class="menu-item" href="{{route('AdminPaymentList')}}">Payments</a></li>
            <li><a class="menu-item" href="{{route('AdminCategoryList')}}">Categories</a></li>
            <li><a class="menu-item" href="{{route('AdminReviewList')}}">Reviews</a></li>
            <li><a class="menu-item" href="{{route('admin.queries')}}">Queries</a></li>
        </ul>
    </div>

</div>
