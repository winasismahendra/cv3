@extends('layout/master')

@section('isi')

	<main>
        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Checkout</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================Checkout Area =================-->
        <section class="checkout_area section_padding" style="margin-top: -7.5%;">
          
          <div class="cart-main-area ptb-100">
            <div class="container">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <h1 class="cart-heading">Your Order:</h4>
                  <div class="row">
                    <div class="col-xl-4 col-lg-4">
                      <p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Billing Address</p>
                      <address>
                        {{ $dataCustomers['nama'] }}
                        <br> {{ $dataCustomers['address'] }}
                        <br> Email: {{ $dataCustomers['email'] }}
                        <br> Phone: {{ $dataCustomers['phone'] }}
                        <br> Note: {{ $dataCustomers['note'] }}
                      </address>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                      <p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Shipment Address</p>
                      <address>
                        {{ $dataCustomers['nama'] }}
                        <br> {{ $dataCustomers['address'] }}
                        <br> Email: {{ $dataCustomers['email'] }}
                        <br> Phone: {{ $dataCustomers['phone'] }}
                        <br> Note: {{ $dataCustomers['note'] }}
                      </address>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                      <p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Details</p>
                      <address>
                        Invoice ID:

                          <?php
                            $date = new DateTime( 'now', new DateTimeZone('Asia/Jakarta') );
                            $now = $date->format('d-m-Y ; H:i:s');
                          ?>

                        <br> {{$now}}
                        <br> Status: Pending
                        <br> Payment Status: Pending
                        <br> Shipped by: Alumunindo Jaya Steel
                      </address>
                    </div>
                  </div>
                  <div id="payment_section" class="table-content table-responsive" style="padding: 20px;">
                    <table class="table table-striped table-responsive" style="width:100%;">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Item</th>
                          <th>Quantity</th>
                          <th>price</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($cartItems as $item)
                          <tr>
                            <td>{{ $item->rowId }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->qty }} Barang</td>
                            <td>Rp. {{ number_format($item->price, 2, ',','.') }}</td>
                            <td>Rp. {{ number_format(($item->qty * $item->price), 2, ',','.') }}</td>
                          </tr>
                        @empty
                          <tr>
                            <td colspan="6">Order item not found!</td>
                          </tr>
                        @endforelse
                      </tbody>
                    </table>
                  </div>
                  <div class="row">
                    <div class="col-md-9" id="btn_payment">
                    </div>
                  </div>
                  <div class="row" id="total_payment">
                    <div class="col-md-3 ml-auto">
                      <div class="cart-page-total">
                        <ul>
                          <li> Subtotal
                            <span>Rp. {{ number_format(Cart::subtotal(), 2, ',','.') }}</span>
                          </li>
                          <li>Tax (0%)
                            <span> - </span>
                          </li>
                          <li>Total
                            <span>Rp. {{ number_format(Cart::total(), 2, ',','.') }}</span>
                          </li>
                        </ul>

                          <form id="payment" onsubmit="return submitFormPayment();">
                              @csrf
                              <input type="hidden" name="total" id="total" value="{{Cart::total()}}">
                              <input type="hidden" name="subtotal" id="subtotal" value="{{Cart::subtotal()}}">

                              <button type="submit" class="btn-normal btn">Pay Now</button>
                          </form>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </section>
        <!--================End Checkout Area =================-->
    </main>

@endsection