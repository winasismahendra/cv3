
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
                                       
                                     
                                        <h4 class="header-title">Detail Pemesan</h4>

                                    <form>
                                            <fieldset disabled="">
                                                <div class="form-group">
                                                    <label for="disabledTextInput">Nama </label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="{{$data[0]->pembeli}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="disabledTextInput">Email</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="{{$data[0]->email}}">
                                                </div>
                                                 <div class="form-group">
                                                    <label for="disabledTextInput">No.Hp</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="{{$data[0]->phone}}">
                                                </div>
                                                 <div class="form-group">
                                                    <label for="disabledTextInput">Kota</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="{{$data[0]->kota}}">
                                                </div>
                                                 <div class="form-group">
                                                    <label for="disabledTextInput">Alamat</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="{{$data[0]->address}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="disabledTextInput">Catatan</label>
                                                    @if($data[0]->note == null)
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="Tidak ada catatan">
                                                    @else
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="{{$data[0]->note}}">
                                                    @endif
                                                </div>
                                                
                                            </fieldset>
                                        </form> 

                                <br><br>
                                <h4 class="header-title">Katalog yang Dipesan</h4>

                                    <form>
                                            <fieldset disabled="">
                                                <div class="form-group">
                                                    <label for="disabledTextInput">Nama </label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="{{$data[0]->product_name}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="disabledTextInput">Harga</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="@uang($data[0]->amount)">
                                                </div>
                                                 <div class="form-group">
                                                    <label for="disabledTextInput">Status</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="{{$data[0]->status}}">
                                                </div>
                                                 <div class="form-group">
                                                    <label for="disabledTextInput">Jumlah</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input">
                                                </div>
                                                 
                                                
                                            </fieldset>
                                        </form> 
                            </div>
                        </div>
                    </div>
    

    @endsection