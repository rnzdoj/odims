<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
    <div class="container-fluid d-flex flex-column p-0">
        <ul class="nav navbar-nav text-light font-weight-bold mt-4 ml-3" id="accordionSidebar">
            <li class="nav-item" role="presentation"><a class="nav-link text-white" href="{{ route('manager.dashboard') }}"><span><h3>སྟོན་སྟེགས།</h3></span></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link text-white" href="{{ route('manager.monks')}}"><span><h3>དགེ་སློང་།</h3></span></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link text-white" href="{{ route('manager.rabdey')}}"><span><h3>རབ་སྡེ།</h3></span></a></li>
        </ul>
        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
    </div>
</nav>