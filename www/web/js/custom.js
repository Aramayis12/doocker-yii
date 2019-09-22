jQuery(function(e){
    // Subscriptions
    $('#mc4wp-form-1').on("submit", function (e) {
        e.preventDefault();
        var _this = $(this);
        var email = _this.find('input[name=EMAIL]').val().trim();

        var submit = _this.find('input[type=submit]');

        submit.prop('disabled', true);
        submit.val('Սպասեք․․․');

        var csrfToken = $(this).find('input[name=_csrf]').val();

        $.ajax({
         url: subscription_ajax.url,
         type: 'post',
         dataType: 'json',
         data: {
           Subscriptions: {
             email: email,
           },
           _csrf : csrfToken
         },
       }).done( function(response){
         var blockAlert = $('#subscriptionsFormError');
         var successAlert = $('#subscriptionsFormSuccess');
         blockAlert.html('');

         var html = '';
         var emailErrors = response['subscriptions-email'];

         if(typeof emailErrors !== 'undefined'){
           emailErrors.forEach(function (value, index, array) {
             html = html + value + '<br>';
           });
         }

         if(html.trim() == ''){
           successAlert.show();
           _this.hide();
         } else {
           blockAlert.html(html);
         }

         submit.val('Հետևել');
         submit.prop('disabled', false);

       } ).fail( function(){} );

        console.log('email: ',email);
    });

    // Cart Gift
    $('#quantity_input').bind("keyup change",function(){
      var _this = $(this);
      var qty = _this.val();
      var price = $('.woocommerce-Price-calc').data('val');

      var calc = qty * price;
      $('.woocommerce-Price-calc').text(calc);
    });

    $('#price_input').bind("keyup change",function(){
      var _this = $(this);
      var price = _this.val();
      var qty = $('#quantity_input').val();

      $('.woocommerce-Price-calc').attr('data-val', price*qty);

      $('.woocommerce-Price-calc').text(price*qty);
    });
    // Carts Products 
    $('.quantity_input_carts').bind("keyup change",function(){
      var _this = $(this);
      var qty = _this.val();
      var price = _this.closest('tr').find('.product-price').data('price');

      var calc = qty * price;
      _this.closest('tr').find('.woocommerce-Price-calc').text(calc);
      _this.closest('tr').find('.woocommerce-Price-calc').attr('data-val', calc);

      let totalPrice = 0;

      $('.woocommerce-Price-calc').each(function(value, key){
        const product_price = parseInt(key.innerText);
        totalPrice += product_price;
      });

      $('.total-price').text(totalPrice);
    });


    $('#gift_for_attrib_extended .trx_addons_attrib_button').click(function(){
      var _this = $(this);
      _this.siblings().removeClass('trx_addons_attrib_selected');
      _this.addClass('trx_addons_attrib_selected');

      // $('.cart-button').prop('disabled', '');
      console.log('attribute_gift_for: ', _this.data('value'));

      $('select[name=attribute_gift_for]').val(_this.data('value'));
    });

    //
    $('#pay_type_attrib_extended .trx_addons_attrib_button').click(function(){
      var _this = $(this);
      _this.siblings().removeClass('trx_addons_attrib_selected');
      _this.addClass('trx_addons_attrib_selected');

      // $('.cart-button').prop('disabled', '');
      console.log('attribute_pay_type: ', _this.data('value'));

      $('select[name=attribute_pay_type]').val(_this.data('value'));
    });

    //

    $(document).on("click","a.showlogin",function(e){
      e.preventDefault();
      return $("form.login, form.woocommerce-form--login").slideToggle();
    });


    // Login open dialog
    $('.trx_addons_popup_link').on('click', function(e){
      e.preventDefault();

      // Open login panel
      if($('#trx_addons_login_popup').hasClass('mfp-hide')){
        $('#trx_addons_login_popup').removeClass('mfp-hide').css({
          'position': 'fixed',
          'top': '50%',
          'left': '50%',
          'transform': "translate(-50%, -50%)",
          'z-index': '9999'
        });
      }
    });

    $('.mfp-close').on('click', function(e){
      e.preventDefault();
      if(!$('#trx_addons_login_popup').hasClass('mfp-hide')){
        $('#trx_addons_login_popup').addClass('mfp-hide');
        $('#trx_addons_login_popup').attr('style', '');
      }
    });

    // Login form login-form

    $('#login-form').on("submit", function (e) {
        e.preventDefault();
        var csrfToken = $(this).find('input[name=_csrf]').val();
        var email = $(this).find('input[name=email]').val();
        var password = $(this).find('input[name=password]').val();

        if(typeof csrfToken == 'undefined') return false;

        // send data to actionSave by ajax request.

        $.ajax({
         url: login_ajax.url,
         type: 'post',
         dataType: 'json',
         data: {
           LoginForm: {
             email: email,
             password: password,
           },
           _csrf : csrfToken
         },
       }).done( function(response){
         var emailErrors = response['loginform-email'];
         var passErrors = response['loginform-password'];
         var blockAlert = $('#loginFormError');
         blockAlert.html('');

         var html = '';
          if(typeof emailErrors !== 'undefined'){
            emailErrors.forEach(function (value, index, array) {
              console.log(value);
              html = html + value + '<br>';
            });
          }

          if(typeof passErrors !== 'undefined'){
            passErrors.forEach(function (value, index, array) {
              console.log(value);
              html = html + value + '<br>';
            });
          }

           blockAlert.html(html);

           if(html == ''){
             location.reload();
           }
       } ).fail( function(){} );

        return false; // Cancel form submitting.
    });

    // Sign Up Form
    $('#signup-form').on("submit", function (e) {
        e.preventDefault();
        csrfToken = $(this).find('input[name=_csrf]').val();

        username = $(this).find('input[name=username]').val();
        email = $(this).find('input[name=email]').val();
        password = $(this).find('input[name=password]').val();
        retypePassword = $(this).find('input[name=retypePassword]').val();

        if(typeof csrfToken == 'undefined') return false;

        // send data to actionSave by ajax request.

        $.ajax({
         url: signup_ajax.url,
         type: 'post',
         dataType: 'json',
         data: {
           Signup: {
             username: username,
             email: email,
             password: password,
             retypePassword: retypePassword,
           },
           _csrf : csrfToken
         },
       }).done( function(response){
         console.log('response: ', response);

         //signup-username
         var usernameErrors = response['signup-username'];
         var emailErrors = response['signup-email'];
         var passErrors = response['signup-password'];
         var retypepassErrors = response['signup-retypepassword'];

         var blockAlert = $('#signupFormError');
         blockAlert.html('');

         var html = '';
         if(typeof usernameErrors !== 'undefined'){
           usernameErrors.forEach(function (value, index, array) {
             console.log(value);
             html = html + value + '<br>';
           });
         }

          if(typeof emailErrors !== 'undefined'){
            emailErrors.forEach(function (value, index, array) {
              console.log(value);
              html = html + value + '<br>';
            });
          }

          if(typeof passErrors !== 'undefined'){
            passErrors.forEach(function (value, index, array) {
              console.log(value);
              html = html + value + '<br>';
            });
          }

          if(typeof retypepassErrors !== 'undefined'){
            retypepassErrors.forEach(function (value, index, array) {
              console.log(value);
              html = html + value + '<br>';
            });
          }

           blockAlert.html(html);

           if(html == ''){
             location.reload();
           }
       } ).fail( function(){} );

        return false; // Cancel form submitting.
    });
});
