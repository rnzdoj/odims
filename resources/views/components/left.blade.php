@auth    
<ul class="navbar-nav mr-auto">
    @can('admin')
        <li class="nav-item" role="presentation"><a class="nav-link text-dark" href="{{ route('home') }}"><span>Home</span></a></li>
        <li class="nav-item" role="presentation"><a class="nav-link text-dark" href="{{ route('budget.index') }}"><span>Budget</span></a></li>
        <li class="nav-item" role="presentation"><a class="nav-link text-dark" href="{{ route('dratshang.index') }}"><span>Dratshang</span></a></li>
        <li class="nav-item" role="presentation"><a class="nav-link text-dark" href="{{ route('monk.index') }}"><span>Monk</span></a></li>
        <li class="nav-item" role="presentation"><a class="nav-link text-dark" href="{{ route('rabdey.index') }}"><span>Rabdey</span></a></li>
        </li>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link text-dark dropdown-toggle text-capitalize" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre="">
                Others
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item text-dark" href="{{ route('education.index') }}">Education</a>
                <a class="dropdown-item text-dark" href="{{ route('group.index') }}">Group</a>
                <a class="dropdown-item text-dark" href="{{ route('position.index') }}">Position</a>
            </div>
        </li>
    @endcan
    @can('manager')
        <li class="nav-item" role="presentation"><a class="nav-link text-dark" href="{{ route('home') }}"><span>Home</span></a></li>
        {{-- <li class="nav-item" role="presentation"><a class="nav-link text-dark" href="{{ route('manager.dashboard') }}"><span>སྟོན་སྟེགས།</span></a></li> --}}
        <li class="nav-item" role="presentation"><a class="nav-link text-dark" href="{{ route('monk.index')}}"><span>དགེ་སློང་།</span></a></li>
        <li class="nav-item" role="presentation"><a class="nav-link text-dark" href="{{ route('rabdey.index')}}"><span>རབ་སྡེ།</span></a></li>
    @endcan

    @can('user')
        <li class="nav-item" role="presentation"><a class="nav-link text-dark" href="{{ route('home') }}"><span>ཟུར་གདོག།</span></a></li>
    @endcan

</ul>
@endauth
