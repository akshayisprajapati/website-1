$(document).ready(function() {
    $('select[name=category]').select2();

    $('form#contact_form').validate({
        rules: {
            name: {
                required: true
            },
            email: {
                required: true,
                email:true
            },
            subject: {
                required: true
            },
            message: {
                required: true
            }

        },
        messages: {
            name: {
                required: "Please enter your name."
            },
            email: {
                required: "Please enter your email."
            },
            subject: {
                required: "Please enter your subject."
            },
            message: {
                required: "Please enter your message."
            }

        },
        submitHandler: function(form) {
            form.reset();
            swal({
              title: "Good job!",
              text: "Form Submitted!",
              icon: "success",
              button: false,
              timer: 2000
            });
        }
    });

    if($('#table_id').length > 0){
        $('#table_id').DataTable();
    }
});