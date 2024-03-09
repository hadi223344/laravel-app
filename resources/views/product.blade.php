@extends('master')
@section('content')
    @if (session()->has('purchase'))
        <h6 class='text-success text-center successfull-purchase'> purchase successfull </h6>
    @endif
    <div class='customer-conduct'>
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                    aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"
                    aria-label="Slide 5"></button>
            </div>
            <div class="container carousel-inner">
                @foreach ($products as $product)
                    <div class="carousel-item {{ $product['id'] == 1 ? 'active' : '' }}">
                        <a href="/detail/{{ $product['id'] }}">
                            <img class='slider-img' src={{ $product['gallery'] }} alt="...">
                            <div class="carousel-caption d-none d-md-block text-dark slider-text">
                                <h5>{{ $product['name'] }}</h5>
                                <p>{{ $product['description'] }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="container-fluid text-bg-dark">
        <div class="row px-1">
            <h3 class='d-block ps-5'>trending products</h3>
            @foreach ($products as $product)
                <div class="col-sm-3 px-1 mb-4 ">
                    <div class = 'cart-img-tending'>
                        <a href="detail/{{ $product['id'] }}" class="d-block mt-3">
                            <img class='trending-img d-block mx-auto rounded' src={{ $product['gallery'] }} class=""
                                alt="...">
                            <div class="trending-text text-white">
                                <h5 class="pt-2 ">{{ $product['name'] }}</h5>
                                <h4 class="pt-2 ">price:{{ $product['price'] }}$</h5>
                            </div>
                        </a>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
