<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="/">Student administration application</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/courses">Courses</a>
                </li>
                {{--                Will only show for admin authenticated users. --}}
                @auth
                    @if(auth()->user()->admin)
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/programmes">Programmes</a>
                        </li>
                    @endif
                @endauth
            </ul>
            {{--  Auth navigation  --}}
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="/login"><i class="fas fa-sign-in-alt"></i>Login</a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#!" data-toggle="dropdown">
                            {{ auth()->user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">

                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>Logout</button>
                            </form>

                        </div>
                    </li>
            @endauth
        </div>
    </div>
</nav>
