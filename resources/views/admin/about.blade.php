
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
                                        
                                        <h4 class="header-title">Input Halaman About</h4>

                                    <form action="{{route ('about_up')}} " method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                        
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Misi</label>
                                            <textarea class="form-control" name="misi">{{$data->misi}} </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Visi</label>
                                            <textarea class="form-control" name="visi">{{$data->visi}} </textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Alamat Youtube</label>
                                            <input class="form-control" type="text" name="alamat" value="{{$data->alamat}}" id="example-text-input">
                                        </div>
                                        <input type="hidden" name="id" value="">
                                        
                                        
                                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>

                                    </form>
                                    </div>
                                </div>
                            </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post" enctype="multipart/form-data">
                                      {{ csrf_field() }}
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Nama Kategori:</label>
              <input type="text" name="judul" class="form-control" id="recipient-name">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
          </form>
      </div>
    </div>
  </div>

    @endsection