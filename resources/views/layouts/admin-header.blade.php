<header class="main-header">
    <a href="{{ url('admin/dashboard') }}" class="logo">
        <span class="logo-mini">{{ config('app.name') }}</span>
        <span class="logo-lg">{{ config('app.name') }}</span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}" target="_blank"><i class="fa fa-eye"></i> Lihat Web</a></li>
            </ul>
        </div>
    </nav>
</header>