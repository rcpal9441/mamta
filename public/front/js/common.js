class Common
{
  URL=location.protocol + '//' + location.host;

    addToCart=function(id){
      var csrf=$('input[name="_token"]').val();
      $.ajax({
           url: this.URL+"/add-to-cart",
           method: "post",
           dataType:"json",
           data: {_token: csrf, id: id},
           success: function (response) {
               $('.item-count').text(response.cartItem);
               $('#addCartItems').html(response.cartview);
               $('#covers').html('$'+response.total);
               $('#subtotal').html('$'+response.total);
               $('#total').html('$'+response.subtotal);
           }
        });
    }

    customLogin=function(){
       var csrf=$('input[name="_token"]').val();
       var email=$('#login-email').val();
       var password=$('#login-password').val();
      $.ajax({
           url: this.URL+"/custom/login",
           method: "post",
           dataType:"json",
           data: {_token: csrf, password: password,email:email},
           success: function (response) {
               if(response.success=='1'){
                $('.item-count').text(response.cartItem);
                $('#addCartItems').html(response.cartview);
                $('#subtotal').html('$'+response.total);
                $('#total').html('$'+response.subtotal);
                $('#payamount').html('Pay $'+response.subtotal);
                $('#collapseTwo').show();
                $('#collapseOne').hide();
                $('#emailId').text(email);
               }else{
                $('#login-error').text(response.msg);
               }
           }
        });
    }

    popUpLogin(){
      var csrf=$('input[name="_token"]').val();
       var email=$('#login-email-popup').val();
       var password=$('#login-password-popup').val();
       var baseUrl=this.URL;
      $.ajax({
           url: baseUrl+"/custom/login",
           method: "post",
           dataType:"json",
           data: {_token: csrf, password: password,email:email},
           success: function (response) {
               if(response.success=='1'){
                let headerMenu='<a class="dropdown-item" href="#">'
                        +'<i class="far fa-user"></i>Your Account</a>'
                        +'<a class="dropdown-item" href="#">'
                        +'<i class="fas fa-shopping-bag"></i>Your Orders </a>'
                        +'<a class="dropdown-item" href="#">'
                        +'<i class="fa fa-heart"></i>Shortlist</a>'
                        +'<a class="dropdown-item" href="'+baseUrl+'/logout">'
                        +'<i class="fa fa-heart"></i>Logout</a>';
                $('#header-menu').html(headerMenu);
                $('.item-count').text(response.cartItem);
                $('#login-error-popup').text('Logged in successfully.').css('color','green');
                setTimeout(function(){$('#exampleModalCenter').find('.close').click();
                $('#login-error-popup').text('');},500);
               }else{
                $('#login-error-popup').text(response.msg);
               }
           }
        });
    }

    removeCart=function(id){
      var csrf=$('input[name="_token"]').val();
      if(!confirm('Are you sure to remove item from cart.')){
        return false;
      }
      $.ajax({
           url: this.URL+"/remove-cart",
           method: "DELETE",
           dataType:"json",
           data: {_token: csrf, id: id},
           success: function (response) {
              $('.item-count').text(response.cartItem);
               $('#addCartItems').html(response.cartview);
               $('#subtotal').html('$'+response.total);
               $('#total').html('$'+response.subtotal);
           }
        });
    }

    updateCart=function(id,that,page){
      var csrf=$('input[name="_token"]').val();
      if(that.value=='' || that.value<1){
        that.value=1;
      }

      $.ajax({
           url: this.URL+"/update-cart",
           method: "patch",
           dataType:"json",
           data: {_token: csrf, id: id,quantity:that.value,page:page},
           success: function (response) {
              $('.item-count').text(response.cartItem);
               $('#addCartItems').html(response.cartview);
               $('#subtotal').html('$'+response.total);
               $('#total').html('$'+response.subtotal);
               if(page=='cart-items'){
                $('#covers').html('$'+response.total);
               }else{
                $('#payamount').html('Pay $'+response.subtotal);
               }
           }
        });
    }

    paymentMethod=function(){
      let paymetType=$('.paymentMethod:checked').val();
      if(paymetType=='paypal'){
        $('#paypal-submit').submit();
      }
    }

    checkAddTocartItem=function(that){
      e.preventDefault();
      if(!$('#addCartItems .item-added').length){
       alert('Add atleast one item in the cart before going to checkout.');
       return false;
      }
      return true;
    }
 
}

const commn=new Common();


$(document).ready(function(){

  $('#checkout').click(function(e){
    e.preventDefault();
    if(!$('#addCartItems .item-added').length){
       alert('Add atleast one item in the cart before going to checkout.');
       return false;
      }
      window.location.href=$(this).attr('href');
  });

        $('#covers').text($('#subtotal').text()); //set subtotal value of cart price
        $(".update-cart").click(function (e) {
           e.preventDefault();
 
           var ele = $(this);
 
            $.ajax({
               url: "{{ url('update-cart') }}",
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });
 
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
 
            var ele = $(this);
 
            if(confirm("Are you sure")) {
                $.ajax({
                    url: "{{ url('remove-from-cart') }}",
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });

});


