<!DOCTYPE html>
<html>
<head>
	<title>Order Received | Alumunindo Jaya Steel</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<style type="text/css">
	
	html,
	body {
	  height: 100%;
	  display: flex;
	  align-items: center;
	  justify-content: center;
	}
	body {
	  overflow: hidden;
	  font-size: 15px;
	}
	.background {
	  position: absolute;
	  width: 100%;
	  height: 100%;
	  top: 0;
	  left: 0;
	  background: linear-gradient(transparent, rgba(0,0,0,0.5)), url("https://images.pexels.com/photos/4827/nature-forest-trees-fog.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260");
	  background-size: cover;
	  background-position: center;
	}
	.modalbox.success,
	.modalbox.error {
	  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
	  transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
	  -webkit-border-radius: 2px;
	  -moz-border-radius: 2px;
	  border-radius: 2px;
	  background: #fff;
	  padding: 25px 25px 15px;
	  text-align: center;
	}
	.modalbox.success.animate .icon,
	.modalbox.error.animate .icon {
	  -webkit-animation: fall-in 0.75s;
	  -moz-animation: fall-in 0.75s;
	  -o-animation: fall-in 0.75s;
	  animation: fall-in 0.75s;
	  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
	}
	.modalbox.success h1,
	.modalbox.error h1 {
	  font-family: 'Montserrat', sans-serif;
	}
	.modalbox.success p,
	.modalbox.error p {
	  font-family: 'Open Sans', sans-serif;
	}
	.modalbox.success button,
	.modalbox.error button,
	.modalbox.success button:active,
	.modalbox.error button:active,
	.modalbox.success button:focus,
	.modalbox.error button:focus {
	  -webkit-transition: all 0.1s ease-in-out;
	  transition: all 0.1s ease-in-out;
	  -webkit-border-radius: 30px;
	  -moz-border-radius: 30px;
	  border-radius: 30px;
	  margin-top: 15px;
	  width: 26%;
	  background: transparent;
	  color: #4caf50;
	  border-color: #4caf50;
	  outline: none;
	}
	.modalbox.success button:hover,
	.modalbox.error button:hover,
	.modalbox.success button:active:hover,
	.modalbox.error button:active:hover,
	.modalbox.success button:focus:hover,
	.modalbox.error button:focus:hover {
	  color: #fff;
	  background: #4caf50;
	  border-color: transparent;
	}
	.modalbox.success .icon,
	.modalbox.error .icon {
	  position: relative;
	  margin: 0 auto;
	  margin-top: -75px;
	  background: #4caf50;
	  height: 100px;
	  width: 100px;
	  border-radius: 50%;
	}
	.modalbox.success .icon span,
	.modalbox.error .icon span {
	  postion: absolute;
	  font-size: 4em;
	  color: #fff;
	  text-align: center;
	  padding-top: 20px;
	}
	.modalbox.error button,
	.modalbox.error button:active,
	.modalbox.error button:focus {
	  color: #f44336;
	  border-color: #f44336;
	}
	.modalbox.error button:hover,
	.modalbox.error button:active:hover,
	.modalbox.error button:focus:hover {
	  color: #fff;
	  background: #f44336;
	}
	.modalbox.error .icon {
	  background: #f44336;
	}
	.modalbox.error .icon span {
	  padding-top: 25px;
	}
	.center {
	  float: none;
	  margin-left: auto;
	  margin-right: auto;
	/* stupid browser compat. smh */
	}
	.center .change {
	  clearn: both;
	  display: block;
	  font-size: 10px;
	  color: #ccc;
	  margin-top: 10px;
	}
	@-webkit-keyframes fall-in {
	  0% {
	    -ms-transform: scale(3, 3);
	    -webkit-transform: scale(3, 3);
	    transform: scale(3, 3);
	    opacity: 0;
	  }
	  50% {
	    -ms-transform: scale(1, 1);
	    -webkit-transform: scale(1, 1);
	    transform: scale(1, 1);
	    opacity: 1;
	  }
	  60% {
	    -ms-transform: scale(1.1, 1.1);
	    -webkit-transform: scale(1.1, 1.1);
	    transform: scale(1.1, 1.1);
	  }
	  100% {
	    -ms-transform: scale(1, 1);
	    -webkit-transform: scale(1, 1);
	    transform: scale(1, 1);
	  }
	}
	@-moz-keyframes fall-in {
	  0% {
	    -ms-transform: scale(3, 3);
	    -webkit-transform: scale(3, 3);
	    transform: scale(3, 3);
	    opacity: 0;
	  }
	  50% {
	    -ms-transform: scale(1, 1);
	    -webkit-transform: scale(1, 1);
	    transform: scale(1, 1);
	    opacity: 1;
	  }
	  60% {
	    -ms-transform: scale(1.1, 1.1);
	    -webkit-transform: scale(1.1, 1.1);
	    transform: scale(1.1, 1.1);
	  }
	  100% {
	    -ms-transform: scale(1, 1);
	    -webkit-transform: scale(1, 1);
	    transform: scale(1, 1);
	  }
	}
	@-o-keyframes fall-in {
	  0% {
	    -ms-transform: scale(3, 3);
	    -webkit-transform: scale(3, 3);
	    transform: scale(3, 3);
	    opacity: 0;
	  }
	  50% {
	    -ms-transform: scale(1, 1);
	    -webkit-transform: scale(1, 1);
	    transform: scale(1, 1);
	    opacity: 1;
	  }
	  60% {
	    -ms-transform: scale(1.1, 1.1);
	    -webkit-transform: scale(1.1, 1.1);
	    transform: scale(1.1, 1.1);
	  }
	  100% {
	    -ms-transform: scale(1, 1);
	    -webkit-transform: scale(1, 1);
	    transform: scale(1, 1);
	  }
	}
	@-webkit-keyframes plunge {
	  0% {
	    margin-top: -100%;
	  }
	  100% {
	    margin-top: 25%;
	  }
	}
	@-moz-keyframes plunge {
	  0% {
	    margin-top: -100%;
	  }
	  100% {
	    margin-top: 25%;
	  }
	}
	@-o-keyframes plunge {
	  0% {
	    margin-top: -100%;
	  }
	  100% {
	    margin-top: 25%;
	  }
	}
	@-moz-keyframes fall-in {
	  0% {
	    -ms-transform: scale(3, 3);
	    -webkit-transform: scale(3, 3);
	    transform: scale(3, 3);
	    opacity: 0;
	  }
	  50% {
	    -ms-transform: scale(1, 1);
	    -webkit-transform: scale(1, 1);
	    transform: scale(1, 1);
	    opacity: 1;
	  }
	  60% {
	    -ms-transform: scale(1.1, 1.1);
	    -webkit-transform: scale(1.1, 1.1);
	    transform: scale(1.1, 1.1);
	  }
	  100% {
	    -ms-transform: scale(1, 1);
	    -webkit-transform: scale(1, 1);
	    transform: scale(1, 1);
	  }
	}
	@-webkit-keyframes fall-in {
	  0% {
	    -ms-transform: scale(3, 3);
	    -webkit-transform: scale(3, 3);
	    transform: scale(3, 3);
	    opacity: 0;
	  }
	  50% {
	    -ms-transform: scale(1, 1);
	    -webkit-transform: scale(1, 1);
	    transform: scale(1, 1);
	    opacity: 1;
	  }
	  60% {
	    -ms-transform: scale(1.1, 1.1);
	    -webkit-transform: scale(1.1, 1.1);
	    transform: scale(1.1, 1.1);
	  }
	  100% {
	    -ms-transform: scale(1, 1);
	    -webkit-transform: scale(1, 1);
	    transform: scale(1, 1);
	  }
	}
	@-o-keyframes fall-in {
	  0% {
	    -ms-transform: scale(3, 3);
	    -webkit-transform: scale(3, 3);
	    transform: scale(3, 3);
	    opacity: 0;
	  }
	  50% {
	    -ms-transform: scale(1, 1);
	    -webkit-transform: scale(1, 1);
	    transform: scale(1, 1);
	    opacity: 1;
	  }
	  60% {
	    -ms-transform: scale(1.1, 1.1);
	    -webkit-transform: scale(1.1, 1.1);
	    transform: scale(1.1, 1.1);
	  }
	  100% {
	    -ms-transform: scale(1, 1);
	    -webkit-transform: scale(1, 1);
	    transform: scale(1, 1);
	  }
	}
	@keyframes fall-in {
	  0% {
	    -ms-transform: scale(3, 3);
	    -webkit-transform: scale(3, 3);
	    transform: scale(3, 3);
	    opacity: 0;
	  }
	  50% {
	    -ms-transform: scale(1, 1);
	    -webkit-transform: scale(1, 1);
	    transform: scale(1, 1);
	    opacity: 1;
	  }
	  60% {
	    -ms-transform: scale(1.1, 1.1);
	    -webkit-transform: scale(1.1, 1.1);
	    transform: scale(1.1, 1.1);
	  }
	  100% {
	    -ms-transform: scale(1, 1);
	    -webkit-transform: scale(1, 1);
	    transform: scale(1, 1);
	  }
	}
	@-moz-keyframes plunge {
	  0% {
	    margin-top: -100%;
	  }
	  100% {
	    margin-top: 15%;
	  }
	}
	@-webkit-keyframes plunge {
	  0% {
	    margin-top: -100%;
	  }
	  100% {
	    margin-top: 15%;
	  }
	}
	@-o-keyframes plunge {
	  0% {
	    margin-top: -100%;
	  }
	  100% {
	    margin-top: 15%;
	  }
	}
	@keyframes plunge {
	  0% {
	    margin-top: -100%;
	  }
	  100% {
	    margin-top: 15%;
	  }
	}

</style>

</head>
<body>

	<div class="background"></div>
		<div class="container-fluid">
			@if($order->status == 'success')
			<div class="row">
				<div class="modalbox success col-sm-12 col-md-12 col-lg-12 center animate">
					<div class="icon">
						<span class="glyphicon glyphicon-ok"></span>
					</div>
					<!--/.icon-->
					<h1>Terima Kasih!</h1>
					<p>Pembayaran anda telah kami terima, order akan segera diproses.
						<br><br>Order id: #{{$order->order_id}}
						<br>Rp.</p>
					<a href="{{route('toko')}}"><button type="button" class="redo btn">Ok</button></a>
					<span class="change">-- Click to see opposite state --</span>
				</div>
				<!--/.success-->
			</div>
			@else
			<!--/.row-->
			<div class="row">
				<div class="modalbox error col-sm-12 col-md-12 col-lg-12 center animate" style="display: none;">
					<div class="icon">
						<span class="glyphicon glyphicon-thumbs-down"></span>
					</div>
					<!--/.icon-->
					<h1>Maaf!</h1>
					<p>Pembayaran anda gagal kami terima, order tidak dapat diproses.
						<br>silahkan coba kembali
						<br>Order id: Order id: #{{$order->order_id}}</p>
					<a href="#"><button type="button" class="redo btn">Pay now</button></a>
					<span class="change">-- Click to see opposite state --</span>
				</div>
				<!--/.success-->
			</div>
			@endif
			<!--/.row-->
		</div>
<!--/.container-->

<script src="{{asset('master/./assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('master/./assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript">
	
	$(document).ready(function() {
		$('.redo').click(function() {
			$('.success, .error').toggle();
		});
	});

</script>

</body>
</html>