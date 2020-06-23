
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
                                <h4 class="header-title">Data Barang</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-striped text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">No.</th>
                                                    <th scope="col">Judul</th>
                                                    <th scope="col">Cover</th>
                                                    <!-- <th scope="col">Admin</th> -->
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach($data as $datas)

                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td> <a href="{{route ('galleryadmindet' , $datas->id)}} ">{{$datas->judul}}</a>  </td>
                                                    <td><img src="{{ url('gambar/gallery/cover/'.$datas->cover) }}" width="100px"></td>
                                                  
                                                  <td><!-- <a href="#" class="btn btn-green">  <i class="fa fa-edit"> </i>   edit</a> -->
                                                    <a href="" class="btn btn-red">  <i class="fa fa-trash-o"> </i>   hapus</a>
                                                    
                                                 </td>
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