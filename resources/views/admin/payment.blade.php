
@extends('layout/admin')
	
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
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Pemesan</th>
                                                    <th scope="col">Harga</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @for($i=0; $i<count($payments); $i++)
                                              
                                                <tr>
                                                    <td>{{$i+1}}</td>
                                                    <td> <a href=""></a>{{$payments[$i]->created_at}} </td>
                                                    <td>{{$payments[$i]->status}}</td>
                                                    <td>{{$payments[$i]->nama}}</td>
                                                    <td>@uang($payments[$i]->amount)</td>
                                                      
                                                  <td><a href="{{route ('history_det',$payments[$i]->order_id)}} " class="btn btn-green">  <i class="fa fa-edit"> </i>   Detail</a>
                                                   
                                                    
                                                 </td>
                                                </tr>
                                                @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
        </div>

    @endsection