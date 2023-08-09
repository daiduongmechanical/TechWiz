<div class="bg-light shadow-sm" id="navbar_top">

    <div class="container ">

        <nav class="navbar navbar-expand-lg " aria-label="Seventh navbar example">
            <div class="container-fluid">

                <div class="shrink-0 flex items-center "style="padding-right:2rem">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <div>

                            <x-application-logo />
                        </div>
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarsExampleXxl" aria-controls="navbarsExampleXxl" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExampleXxl">
                    <ul class="navbar-nav me-auto mb-2 mb-xl-0" role="tablist">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('dashboard2')" :active="request()->routeIs('dashboard2')">
                            {{ __('Dashboard2') }}
                        </x-nav-link>
                        {{-- <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownXxl"
                                data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownXxl">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li> --}}
                    </ul>
                    <form>
                        <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                    </form>
                    @if (Auth::user() == null)
                        <a href="{{ route('login') }}" class="nav-link link-body-emphasis px-2">Login</a>
                    @else
                        <div class="dropdown p-2">
                            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle"
                                id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32"
                                    class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu text-small dropdown-menu-end" aria-labelledby="dropdownUser1"
                                style="right: 0">
                                @if (Auth::user()->is_admin == 1)
                                    <li><a class="dropdown-item"href="{{route('admin.home')}}">Manager</a></li>
                                @endif


                                <li><a class="dropdown-item" href="{{route('profile.edit')}}">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form></li>
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </nav>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                document.getElementById('navbar_top').classList.add('fixed-top');
                // add padding top to show content behind navbar
                navbar_height = document.querySelector('.navbar').offsetHeight;
                document.body.style.paddingTop = navbar_height + 'px';
            } else {
                document.getElementById('navbar_top').classList.remove('fixed-top');
                // remove padding top from body
                document.body.style.paddingTop = '0';
            }
        });
    });
</script>
