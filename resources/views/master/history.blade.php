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
                                                    <th scope="col">Order Id</th>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Nama Pemesan</th>
                                                    <th scope="col">Harga</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($payments as $payment)
                                                <tr>
                                                    <td>{{$payment->order_id}}</td>
                                                    <td>{{$payment->created_at}}</td>
                                                    <td>{{$payment->status}}</td>
                                                    <td>{{$payment->nama}}</td>
                                                    <td>{{$payment->amount}}</td>
                                                    
                                                    @if($payment->status == 'success')
                                                    <td>
                                                        <a href="{{route('order.history.detail', $payment->order_id)}}"><i title="Detail Pesanan" style="font-size: 25px;" class="fa fa-info-circle text-success"> </i></a> | 
                                                        <a href="#"><i title="Cetak Invoice" style="color:  #5cb85c; font-size: 25px;" class="fa fa-print text-info"> </i></a> | 
                                                        <a onclick="event.preventDefault();
                                                        document.getElementById('delete_history').submit();"><i title="Hapus History" style="color:  #5cb85c; cursor: pointer; font-size: 25px;" class="fa fa-trash text-danger"> </i></a>
                                                    </td>
                                                    @else
                                                    <td>
                                                        <a href="{{route('order.history.detail', $payment->order_id)}}"><i title="Detail Pesanan" style="color:  #5cb85c; font-size: 25px;" class="fa fa-info-circle"> </i></a> | 
                                                        <a title="Bayar Sekarang" onclick="snap.pay('{{$payment->snap_token}}')"><i title="Bayar Sekarang" style="color:  #5cb85c; font-size: 25px;" class="fa fa-credit-card text-info"></i></a> | 
                                                        <a onclick="event.preventDefault();
                                                        document.getElementById('delete_history').submit();"><i title="Hapus History" style="color:  #5cb85c; cursor: pointer; font-size: 25px;" class="fa fa-trash text-danger"> </i></a>
                                                    </td>
                                                    @endif
                                                </tr>

                                                <form action="{{route('order.deleteHistory', $payment->order_id)}}" method="post" id="delete_history" style="display: none;">
                                                        {{csrf_field()}}
                                                        {{method_field('DELETE')}}
                                                </form>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
        </div>

    @endsection