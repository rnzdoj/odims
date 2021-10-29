<ul class="navbar-nav ml-auto">
    <!-- Authentication Links -->
        <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle text-capitalize" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre="">
            {{auth()->user()->name}}
            @can ('user')
                @if (auth()->user()->monk != null)
                    <img style ="verticalAlign: middle;width: 25px;height: 25px;borderRadius: 50%;"class="image rounded-circle" src="/storage/avater/{{ auth()->user()->monk->image }}"></a>
                @endif
            @endcan
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            @can('admin')
                <a class="dropdown-item text-dark" href="{{ route('admin.user.role.index') }}">User Role</a>
            @endcan
            <a id="logout" class="dropdown-item" href="{{ route('logout') }}">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
    <script>
        $(function(){
            $('#logout').click(function(e){
                e.preventDefault();
                $('#logout-form').submit();
            });
        });
    </script>
</ul>