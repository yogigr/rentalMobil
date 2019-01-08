<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>

            <li class="{{ request()->segment(1) == 'admin' && request()->segment(2) == 'dashboard' ? 'active' : '' }}">
            <a href="{{ url('admin/dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

            <li class="{{ request()->segment(1) == 'admin' && request()->segment(2) == 'car' ? 'active' : '' }}">
            <a href="{{ url('admin/car') }}"><i class="fa fa-car"></i> <span>Paket Mobil</span></a></li>

            <li class="{{ request()->segment(1) == 'admin' && request()->segment(2) == 'why' ? 'active' : '' }}">
            <a href="{{ url('admin/why') }}"><i class="fa fa-question-circle"></i> <span>Kenapa Pilih Kami</span></a></li>

            <li class="{{ request()->segment(1) == 'admin' && request()->segment(2) == 'how' ? 'active' : '' }}">
            <a href="{{ url('admin/how') }}"><i class="fa fa-question-circle-o"></i> <span>Cara Order</span></a></li>

            <li class="{{ request()->segment(1) == 'admin' && request()->segment(2) == 'contact' ? 'active' : '' }}">
            <a href="{{ url('admin/contact') }}"><i class="fa fa-address-book-o"></i> <span>Kontak</span></a></li>

            <li class="{{ request()->segment(1) == 'admin' && request()->segment(2) == 'user' ? 'active' : '' }}">
            <a href="{{ url('admin/user') }}"><i class="fa fa-user"></i> <span>User</span></a></li>

            <li class="{{ request()->segment(1) == 'admin' && request()->segment(2) == 'config' ? 'active' : '' }}">
            <a href="{{ url('admin/config') }}"><i class="fa fa-cogs"></i> <span>Pengaturan</span></a></li>

            <li><a href="{{ url('logout') }}"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
        </ul>
    </section>
</aside>