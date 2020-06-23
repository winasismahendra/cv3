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
                                <h2>Detail Barang</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End-->
        <!--================Single Product Area =================-->
        <div class="product_image_area">
            <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                <div class="product_img_slide owl-carousel">

                	@foreach($katalog as $data)
                    <div class="single_product_img">
                        <img src="{{ url('gambar/foto/'.$data->file) }}" alt="#" class="img-fluid">
                    </div>
                    @endforeach
                   
                </div>
                </div>
                <div class="col-lg-8">
                <div class="single_product_text text-center">
                    <h3>{{$katalog[0]->nama}} </h3>
                    <p>
                        {{$katalog[0]->deskripsi}} 
                    </p>
                    <div class="card_area">
                        <div class="product_count_area">
                            <p>Quantity</p>
                            <div class="product_count d-inline-block">
                                <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
                                <input class="product_count_item input-number" type="text" value="1" min="0" max="10">
                                <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
                            </div>
                            <p>@uang($katalog[0]->harga)</p>
                        </div>
                    <div class="add_to_cart">
                        <a href="#" class="btn_3">add to cart</a>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <!--================End Single Product Area =================-->
        
    </main>


@endsection