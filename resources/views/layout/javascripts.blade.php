<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
         $(document).ready(function() {
            $('.select2').select2();
        });
    </script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('sweet::alert')

<script type="text/javascript">

    $(".add_cart").on('click',function(){
        var id = $(this).val();    
            
           $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '/addToCart?id='+id,
                    data:{
                        '_token': '{{ csrf_token() }}',
                    },
                    success: function (response) {
                        swal(
                            {   
                                icon: 'success',
                                title: 'Barang anda berhasil ditambahkan kedalam cart',
                                text: 'Terima Kasih dan silahkan lanjutkan belanja anda.',
                                type: 'success',
                                showConfirmButton: false,
                                timer: 3000
                                // cancelButtonClass: 'btn btn-danger ml-2'
                            }
                        )
                    $('#cart_header').replaceWith(response);
                }
            });
        
    });

    $(".delete-cart").on('click',function(){
        var id = $(this).val();
        var obj = $(this);    
            
           $.ajax({
                    type: "DELETE",
                    url: "{{ url('/deleteCartItem')}}"+'/'+id,
                    data:{
                        '_token': '{{ csrf_token() }}',
                    },
                    success: function (response) {
                        swal(
                            {   
                                icon: 'success',
                                title: 'Barang anda berhasil dihapus dari cart',
                                text: 'Terima Kasih dan silahkan lanjutkan belanja anda.',
                                type: 'success',
                                showConfirmButton: false,
                                timer: 3000
                                // cancelButtonClass: 'btn btn-danger ml-2'
                            }
                        )
                        $(obj).closest('#item-' + id).css('background','tomato');
                         $(obj).closest('#item-' + id).fadeOut(800,function(){
                              $('#item-' + id).remove();
                         });

                    var subTotal = "<h5 id='sub_total'> "+ response.subTotal +" </h5>";
                    $('#sub_total').replaceWith(subTotal);

                    var cartCount = "<?php Cart::content()->count(); ?>";

                    var countCart = "<span id='nav-cart' class='flaticon-shopping-cart'><small class='badge badge-secondary'> "+ response.count +" </small></span>";
                    $('#nav-cart').replaceWith(countCart);
                }
            });
        
    });

</script>


<script type="text/javascript">
    
    $('#province_id').change(function(){
        var provID = $(this).val();    
        if(provID){
            $.ajax({
               type:"GET",
               url:"{{url('/get-city-list')}}?province_id="+provID,
               success:function(res){               
                if(res){
                    $("#city_id").empty();
                    $("#city_id").append('<option disabled selected>Select City</option>');
                    $.each(res,function(key,value){
                        $("#city_id").append('<option value="'+key+'">'+value+'</option>');
                    });
               
                }else{
                   $("#city_id").empty();
                }
               }
            });
        }else{
            $("#city_id").empty();
            $("#city_id").empty();
        }      
   });

</script>


<script src="{{ !config('services.midtrans.isProduction') ? 'https://app.sandbox.midtrans.com/snap/snap.js' : 'https://app.midtrans.com/snap/snap.js' }}" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
<script>
    function submitFormPayment() {
        // Kirim request ajax
        $.post("{{ route('order.payment') }}",
            {
                _method: 'POST',
                _token: '{{ csrf_token() }}',
                subtotal: $('input#subtotal').val(),
                amount: $('input#total').val(),
            },
            function (data, status) {
                snap.pay(data.snap_token, {
                    // Optional
                    onSuccess: function (result) {
                        location.reload();
                    },
                    // Optional
                    onPending: function (result) {
                        location.reload();
                    },
                    // Optional
                    onError: function (result) {
                        location.reload();
                    }
                });
            });

        var btn_payment = "<a class='btn-xs btn' href='{{route('toko')}}'>Silahkan Lanjutkan Pembayaran Disini</a>";
        $('#btn_payment').replaceWith(btn_payment);
        $('#payment_section').remove();
        $('#total_payment').remove();
        
        // swal(
        //         {
        //             title: 'Transaksi anda telah berhasil terekan!',
        //             text: 'Silahkan menuju menu history untuk dapat menyelesaikan pembayaran.',
        //             type: 'success',
        //             confirmButtonClass: 'btn btn-success',
        //             // cancelButtonClass: 'btn btn-danger ml-2'
        //         }
        //     )

        return false;
    }
</script>