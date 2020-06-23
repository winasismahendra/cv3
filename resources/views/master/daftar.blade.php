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
                                <h2>Register</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End-->
        <!--================login_part Area =================-->
        <section class="login_part section_padding ">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_text text-center">
                            <div class="login_part_text_iner">
                                <h2>Sudah Punya Akun ?</h2>
                                <p>Jika sudah punya akun dapat login melalui ini</p>
                                <a href="#" class="btn_3">Login</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_form">
                            <div class="login_part_form_iner">
                                <h3>Selamat Datang <br>
                                    Lengkapi data dibawah ini</h3>


                                <form class="row contact_form" method="POST" action="{{ route('register') }}" > @csrf
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="name" name="name" value=""
                                            placeholder="Username">
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="name" name="email" value=""
                                            placeholder="Email">
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input id="password"  type="password" class="form-control  @error('password') is-invalid @enderror" id="name" name="password"  value=""
                                            placeholder="password" required autocomplete="new-password">
                                             @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                             @endif
                                    </div>
                                     <div class="col-md-12 form-group p_star">
                                        <input  id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="konfirmasi password" >
                                             
                                    </div>


                                     
                                    <input type="hidden" name="role" value="1">
                                    <div class="col-md-12 form-group">
                                        
                                        <button type="submit" value="submit" class="btn_3">
                                           daftar
                                        </button>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================login_part end =================-->
    </main>

@endsection