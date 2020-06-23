@extends('layout/master')
	
    @section('isi')
    @if($pesan = Session::get('sukses'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">X</button>
        <strong>{{$pesan}} </strong>
    </div>
    @endif
    @if($pesan = Session::get('gagal'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">X</button>
            <strong>{{$pesan}} </strong>
        </div>
    @endif
    @if($pesan = Session::get('del'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">X</button>
            <strong>{{$pesan}} </strong>
        </div>
    @endif
    	<div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Status Pemesanan</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-striped text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">No.</th>
                                                    <th scope="col">Nama barang</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Harga Satuan</th>
                                                    <th scope="col">Total Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            @php $no= 1 @endphp
                                            @foreach($orders as $order)
                                                <tr>
                                                    <td>{{$no++}}</td>
                                                    <td><a href="{{route('tokodet', $order->id)}}" style="text-decoration: none; color: black;">{{$order->product_name}}<a href=""></a></td>
                                                    <td>{{$order->product_qty}}</td>
                                                    <td>{{$order->product_price}}</td>
                                                    <td>{{$order->total}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
        </div>

    @endsection