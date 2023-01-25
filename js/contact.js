(function ($) {
	"use strict"; 
    // ajax contact form
    $('.alert').hide();
    $(".contactform").submit(function(e){
        e.preventDefault();
        $('.submit').prop('disabled', true);

        $.ajax({
            type: "POST",
            url: "contact.php",
            data: $('.contactform').serialize(),
            success: function(data){

                var result = JSON.parse(data);

                if (result.success==1) {
                    $('.alert').show();
                    $('.alert').removeClass('alert-danger');
                    $('.alert').addClass('alert-success');
                    $('.alert').html(result.message);
                    $(".contactform").trigger('reset');
                    $('.submit').prop('disabled', false);
                }else{
                    $('.alert').show();
                    $('.alert').removeClass('alert-success');
                    $('.alert').addClass('alert-danger');
                    $('.alert').html(result.message);
                    $('.submit').prop('disabled', false);
                }
            }
        });

    });
}(jQuery));
