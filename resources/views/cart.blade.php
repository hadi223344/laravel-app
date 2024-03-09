@extends('master')
@section('content')
    <?php
    use App\Http\Controllers\ProductController;
    $total = ProductController::cartItem();
    ?>
    <div class='container-fluid'>
        <div class="row">
            <div class="trending-wrapper col-sm-9">
                <h3 class='text-center'>cart products</h3>
                @foreach ($carts as $cart)
                    <div class="container row border rounded border-success mx-1 mb-4 p-1" style="--bs-border-opacity: .3;">
                        <div class="col-sm-4 pt-3">
                            <a class='d-block' href={{ $cart['gallery'] }}><img class='cart_img img-fluid'
                                    src={{ $cart['gallery'] }} alt="...">
                            </a>
                        </div>
                        <div class="col-sm-4 py-5">
                            <h5>{{ $cart['name'] }}</h5>
                            <h3>{{ $cart['description'] }}</h3>
                        </div>
                        <div class='col-sm-4'>
                            <div class="mt-5 mb-3">
                                <label for="exampleFormControlInput1" class="form-label totalOneCost">Price:
                                    {{ $cart['price'] }}$</label>
                                <form method="GET" class='updateForm'>
                                    @csrf
                                    {{-- <input type='hidden' name='counter_id' value='{{ $cart['id'] }} '> --}}
                                    <input type="text" name="counter" class="form-control counter_cart"
                                        id="exampleFormControlInput1" value={{ $cart['count'] }} min="1" max="5" step=1;
                                        fullArray='{{ $cart }}'>
                                    {{-- @if (session('invalid'))
                                        ab ghate
                                    @endif --}}
                                    {{-- min="1" oninput="validity.valid||(value='')" --}}

                                    <button type='button' class='btn btn-danger delete_cart mt-4'
                                        value="{{ json_encode($cart) }}">delete</button>
                                    <button type='button' class='btn btn-warning update_cart mt-4'
                                        value="{{ json_encode($cart) }}">Update</button>
                                </form>
                            </div>
                        </div>
                    </div> 
                @endforeach
            </div>
            <div class="col-sm-3" style="">
                <h3 class='text-center'> total Price</h3>
                <div class='border rounded border-success d-grid'>
                    <div class=" p-3 m-1 d-flex justify-content-between" style="--bs-border-opacity: .3;">
                        <div>total price </div>
                        <div class='total-cost'> {{ $total[1] }}$ </div>
                    </div>
                    <div class='px-2'>
                        <a href='order'>
                            <button type='button' class="btn btn-primary my-3 w-100">Countinue</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
