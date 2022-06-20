<header>
    <div class="container d-flex align-items-center justify-content-between">
        <!-- <a class="navbar-brand" href="#">DeliveBoo</a> -->
        <div class="align-self-start logo">
            <a href="@if(Auth::check()) {{ route('user.index') }} @else {{ route('homepage') }} @endif">
                <h1 class="text-white">DeliveBoo</h1>
                <h4 class="text-white">Ordina, Mangia, Ama!</h4>
            </a>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid justify-content-end">
                <button class=" navbar-toggler custom-toggler text-white" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class=" custom-toggler navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav text-end">
                        @if(Auth::check())
                        <li class="nav-item">
                            <span class="nav-link text-white">{{ Auth::user()->name }}</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('user.index') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="#">Ordini</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('user.dishes.create') }}">Crea un nuovo piatto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <strong>{{ __('LOGOUT') }}</strong>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        
                        @else
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>