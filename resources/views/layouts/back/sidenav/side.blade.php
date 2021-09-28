<div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item {{ Request::is('rumpadms') ? 'active':''; }}">
        <a class="nav-link" href="{{ route('dash')}}">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('users') ? 'active':''; }}">
        <a class="nav-link" href="{{ url('users')}}">
          <i class="material-icons">person</i>
          <p>Registered Users</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('orders') ? 'active':''; }}">
        <a class="nav-link" href="{{ url('orders')}}">
          <i class="material-icons">content_paste</i>
          <p>Orders</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('products') ? 'active':''; }}">
        <a class="nav-link" href="{{ url('products')}}">
          <i class="material-icons">store</i>
          <p>Products</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('add-product') ? 'active':''; }}">
        <a class="nav-link" href="{{ url('add-product')}}">
          <i class="material-icons">store</i>
          <p>Add Products</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('categories') ? 'active':''; }}">
        <a class="nav-link" href="{{ url('categories')}}">
          <i class="material-icons">category</i>
          <p>Categories</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('add-category') ? 'active':''; }}">
        <a class="nav-link" href="{{ route('addcate')}}">
          <i class="material-icons">category</i>
          <p>Add Categories</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('brands') ? 'active':''; }}">
        <a class="nav-link" href="{{ url('brands')}}">
          <i class="material-icons">polymer</i>
          <p>Brands</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('add-brand') ? 'active':''; }}">
        <a class="nav-link" href="{{ url('add-brand')}}">
          <i class="material-icons">polymer</i>
          <p>Add Brands</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('sizes') ? 'active':''; }}">
        <a class="nav-link" href="{{url('sizes')}}">
          <i class="material-icons">extension</i>
          <p>Sizes</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('add-size') ? 'active':''; }}">
        <a class="nav-link" href="{{url('add-size')}}">
          <i class="material-icons">extension</i>
          <p>Add Sizes</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="./tables.html">
          <i class="material-icons">create</i>
          <p>Posts</p>
        </a>
      </li>

      <li class="nav-item ">
        <a class="nav-link" href="{{ route('logout') }}">
          <i class="material-icons">lock</i>
          <p>Signout</p>
        </a>
      </li>
    </ul>
  </div>
