<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
$total = ProductController::cartItem();
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">E-comm</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/order">Orders</a>
                </li>
                <li class="nav-item me-auto">
                    <a class="nav-link active" aria-current="page" href="#">
                        <form class="d-flex mb-0" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link cartLink " href="/cart">cart(<span
                            class='text-danger totalCart'>{{ $total[0] }}</span>)
                    </a>
                </li>
                @if (session()->has('user'))
                    <li class="nav-item dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ session()->get('user')['name'] }}
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/logout">LogOut</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                @endif --}}
            </ul>
            <ul class='navbar-nav mb-2 mb-lg-0'>
                {{-- @if (Auth::Check()) --}}
                @if (session()->has('user'))
                    <li class="nav-item dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ session()->get('user')['name'] }}
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/logout">LogOut</a></li>
                            <li><a class="dropdown-item" href="/Edit">Edit</a></li>
                        </ul>
                    </li>
                    {{-- <li class ="nav-item edit">
                        <a class="nav-link" href="/Edit">Edit</a>
                    </li> --}}
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/SignIn">SignIn</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link cartLink " href="/cart">cart(<span
                            class='text-danger totalCart'>{{ $total[0] }}</span>)
                    </a>
                </li>
            </ul>
            {{-- <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> --}}
        </div>
    </div>
</nav>
