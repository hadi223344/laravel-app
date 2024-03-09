<?php
use App\Http\Controllers\ProductController;
$total = ProductController::cartItem();
?>
@extends('master')
@section('content')
    <main class='container-fluid'>
        <form action='/buy' method='POST'>
            @csrf
            <div class="row pt-5">
                <div class="col-sm-3 " style="">
                    <div class='border rounded border-success p-3'>
                        <div class=" p-3 m-1 d-flex justify-content-between border-bottom">
                            <h6> transfer cost </h6>
                            <h6> 10$ </h6>
                        </div>
                        <div class=" p-3 m-1 d-flex justify-content-between border-bottom">
                            <h6> tax </h6>
                            <h6> free </h6>
                        </div>
                        <div class=" p-3 m-1 d-flex justify-content-between border-bottom" style="--bs-border-opacity: .3;">
                            <h6>total price </h6>
                            <h6 class=''> {{ $total[1] }}$ </h6>
                        </div>
                        <div class=" p-3 m-1 d-flex justify-content-between text-danger" style="--bs-border-opacity: .3;">
                            <h4>total cost </h4>
                            <h4 class=''> {{ $total[1] + 10 }}$ </h4>
                        </div>
                        {{-- <form action='/buy' method='POST'>
                        @csrf --}}
                        <button type='submit' class="order-button btn border-primary text-primary w-100">Fullfield all
                            field
                        </button>
                    </div>
                </div>
                <div class="trending-wrapper col-sm-9">
                    <div class="row border rounded me-1 mb-4 p-3" style="--bs-border-opacity: .3;">
                        <div class='py-2'> delivery Address </div>
                        <h6 class='col-sm-8 py-2'>Mashhad, emam khomeini 54, pelak 172</h6>
                        <a class='d-block col-sm-4 text-end pointer'> eddit </a>
                        {{-- <form action="/action_page.php"> --}}
                        <div class="my-3">
                            <label class='pb-2' for="comment">New Address:</label>
                            <textarea class="order-Address form-control" rows="2" id="comment" name="text"></textarea>
                        </div>
                        {{-- </form> --}}
                    </div>
                    <div class="row border rounded me-1 mb-4 p-3">

                        <div class="row py-2">
                            <div class='col-sm-8 mx-auto pt-3'>
                                <h6 class='pt-3'>pls choose a payment methode:</h6>
                            </div>
                            <div class='col-sm-4 p-1 text-end'>
                                {{-- <div class="form-check position-relative"> --}}
                                <input type="radio" class="form-check-input order-check position-absolute" id="radio1"
                                    name="optradio" value="PayPall">
                                <label class="form-check-label ps-4" for="radio1">PayPall</label><br>
                                {{-- </div> --}}
                                {{-- <div class="form-check position-relative"> --}}
                                <input type="radio" class="form-check-input order-check position-absolute " id="radio2"
                                    name="optradio" value="Cart">
                                <label class="form-check-label ps-4" for="radio2">Cart</label><br>
                                {{-- </div> --}}
                                {{-- <form class="form-check position-relative"> --}}
                                <input type="radio" class="form-check-input order-check position-absolute " id="radio3"
                                    name="optradio" value="Internet">
                                <label class="form-check-label ps-4" for="radio3">Internet</label>
                                {{-- </div> --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </main>
@endsection
