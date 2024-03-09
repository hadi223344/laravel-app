@extends('master')
@section('content')
    <div class="container">
        <div class='row'>
            <div class="col-sm-6">
                {{-- <h3>product detail</h3> --}}
                <a class="d-block" href="{{$details['gallery']}}">
                    <img class='d-block detail-img mx-auto mt-5' src={{ $details['gallery'] }} alt="{{ $details['name'] }}">
                </a>
            </div>
            <div class="col-sm-6">
                <a href='/' class="d-block mt-4">Go Back</a>
                <h5>{{ $details['name'] }}</h5>
                <h5>category: {{ $details['category'] }}</h5>
                <h5>details: {{ $details['description'] }}</h5>
                <h6>price: {{ $details['price'] }}</h6><br><br>
                <form action='/add-to-cart' method="POST">
                    <input type="hidden" name='product_id' value={{ $details['id'] }}>
                    <label for="exampleFormControlInput1" class="form-label cart-array p-1">count:
                        </label>
                    <input type="number" class="form-control" name='count' placeholder="count" value=1 min="1"
                        oninput="this.value =  !!this.value && Math.abs(this.value) > 0 ? Math.abs(this.value) : null">
                    @csrf
                    <button type="submit" class="btn btn-primary addToCart">Add to cart</button><br><br>
                </form>
                <button class="btn btn-success">Buy Now</button><br><br>
            </div>
        </div>
    </div>
@endsection
