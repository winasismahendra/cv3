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
                              <h2>Cart List</h2>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!--================Cart Area =================-->
      <section class="cart_area section_padding">
        <div class="container">
          <div class="cart_inner">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col" colspan="2" class="text-center">Action</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($cartItems as $items)
                  <form action="{{route('order.updateCart', $items->rowId)}}" method="post">
                    {{ csrf_field() }}
                     {{ method_field('PUT') }}
                      <tr id="item-{{$items->rowId}}">
                        <td>
                          <div class="media">
                            <div class="d-flex">
                              <img src="{{ url('gambar/cover/'.$items->cover) }}" alt="" />
                            </div>
                            <div class="media-body">
                              <p>{{$items->name}}</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <h5>{{ number_format($items->price, 0, ',','.') }}</h5>
                        </td>
                        <td>
                            <div class="input-group">
                                <input value="{{$items->qty}}" type="number" name="qty" class="" max="10" min="1">
                                    <input type="hidden" name="id" value="{{$items->rowId}}">
                            </div>
                        </td>
                        
                        <td width="5%"> <button type="submit" style=" border-radius: 20px; cursor: pointer; color: black; background-color: #5cb85c; border-color: #5cb85c;">Update</button></td>
                  </form>
                        <td width="5%"> <button class="delete-cart" style="border-radius: 20px; cursor: pointer; margin-right: 20px; color: black; background-color: #d9534f; border-color: #d9534f;" value="{{$items->rowId}}">Delete</button></td>

                        <td>
                          @php $hargaBarangTotal =  $items->price * $items->qty @endphp
                          <h5>{{ number_format($hargaBarangTotal, 0, ',','.') }}</h5>
                        </td>
                      </tr>
                  @endforeach
                  <tr class="bottom_button">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    @if($cartItems->count() > 0)
                      <td>
                        <div class="cupon_text float-right">
                          <a class="btn_1" href="#">Delete All Cart Items</a>
                        </div>
                      </td>
                    @else
                      <td></td>
                    @endif
                    
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                      <h5>Subtotal (Rp.)</h5>
                    </td>
                    <td>
                      <h5 id="sub_total">{{ number_format(Cart::subtotal(), 2, ',','.') }}-</h5>
                    </td>
                  </tr>
{{--                   <tr class="shipping_area">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                      <h5>Shipping</h5>
                    </td>
                    <td>
                      <div class="shipping_box">
                        <ul class="list">
                          <li>
                            Flat Rate: $5.00
                            <input type="radio" aria-label="Radio button for following text input">
                          </li>
                          <li>
                            Free Shipping
                            <input type="radio" aria-label="Radio button for following text input">
                          </li>
                          <li>
                            Flat Rate: $10.00
                            <input type="radio" aria-label="Radio button for following text input">
                          </li>
                          <li class="active">
                            Local Delivery: $2.00
                            <input type="radio" aria-label="Radio button for following text input">
                          </li>
                        </ul>
                        <h6>
                          Calculate Shipping
                          <i class="fa fa-caret-down" aria-hidden="true"></i>
                        </h6>
                        <select class="shipping_select">
                          <option value="1">Bangladesh</option>
                          <option value="2">India</option>
                          <option value="4">Pakistan</option>
                        </select>
                        <select class="shipping_select section_bg">
                          <option value="1">Select a State</option>
                          <option value="2">Select a State</option>
                          <option value="4">Select a State</option>
                        </select>
                        <input class="post_code" type="text" placeholder="Postcode/Zipcode" />
                        <a class="btn_1" href="#">Update Details</a>
                      </div>
                    </td>
                  </tr> --}}
                </tbody>
              </table>
              <div class="checkout_btn_inner float-right">
                <a class="btn_1" href="#">Continue Shopping</a>
                @if($cartItems->count() > 0)
                  <a class="btn_1 checkout_btn_1" href="{{route('cek_out')}}">Proceed to checkout</a>
                @else
                  <a class="btn_1 checkout_btn_1" style="color: white; cursor: not-allowed; opacity: 0.75;">Proceed to checkout</a>
                @endif
              </div>
            </div>
          </div>
      </section>
      <!--================End Cart Area =================-->
  </main>>
	
@endsection