
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
                
    	<div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                       
                                     
                                        <h4 class="header-title">{{$data2[0]->nama}}</h4>

                                    <form action="{{route ('katalog_edit' , $data2[0]->id_katalog)}}  " method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    
                                        <img src="{{ url('gambar/cover/'.$data2[0]->cover) }}" width="200px"> 
                                        <br><br>
                                        <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload Cover</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" name="cover" class="custom-file-input" id="inputGroupFile01">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                </div>
                                                <input type="hidden" name="cover2" value="{{$data2[0]->cover}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Judul</label>
                                            <input class="form-control" type="text" value="{{$data2[0]->nama}} " name="judul" value="" id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Deskripsi</label>
                                            <input class="form-control" type="text" value="{{$data2[0]->deskripsi}} " name="deskripsi" value="" id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Harga</label>
                                            <input class="form-control" type="text" value="{{$data2[0]->harga}} " name="harga" value="" id="example-text-input">
                                        </div>
                                        <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload Foto</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" name="image[]" multiple="true" class="custom-file-input" id="inputGroupFile01">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                </div>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>

                                    </form>

                                <br><br>
                                <h4 class="header-title">Data Foto</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-striped text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">Gambar</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                    @foreach($data2 as $image)
                                    <tr>
                                       <td><img src="{{ url('gambar/foto/'.$image->file) }}" width="200px"> </td>
                                       <td>
                                            <a onclick="return confirm('Yakin Mau Hapus?');" href="{{route('hapus_foto', $image->id) }}" class="btn btn-red">  <i class="fa fa-trash-o"> </i>   hapus</a>

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
     }

    @endsection