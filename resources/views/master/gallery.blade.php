@extends('layout/master')

@section('isi')

	 <main>
       
        <!--================Single Product Area =================-->
        <div class="product_image_area">
            <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                <div class="product_img_slide owl-carousel">

                	@foreach($data as $data)
                    <div class="single_product_img">
                        <img src="{{ url('gambar/gallery/foto/'.$data->file) }}" alt="#" class="img-fluid">
                    </div>
                    @endforeach
                   
                </div>
                </div>
                <div class="col-lg-8">
                <div class="single_product_text text-center">
                    <h3>{{$data->judul}} </h3>
                    <p>
                        gfg
                    </p>
                    
                </div>
                </div>
            </div>
            </div>
        </div>
        <!--================End Single Product Area =================-->
        
    </main>


@endsection