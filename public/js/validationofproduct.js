$(document).ready(function () {
  
    $("#form").validate({

        rules: {
            club_id: {
                required: true,
            },
            title: {
                required: true,
                minlength: 5,
            },
            product_title: {
                required: true,
                minlength: 5,
            },
            type: {
                required: true,
                minlength: 5,
            },
        },

        messages: {
            club_id: 'This Field Is Required',
            title: {
                required: "please fill this field",
                minlength: "please enter atleast 5 characters",
            },
            product_title: {
                required: "please fill this field",
                minlength: "please enter atleast 5 characters",
            },
            type: {
                required: "please fill this field",
                minlength: "please enter atleast 5 characters",
            },
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
    
    $("#formupdate").validate({

        rules: {
            club_id: {
                required: true,
            },
            title: {
                required: true,
                minlength: 5,
            },
            product_title: {
                required: true,
                minlength: 5,
            },
            type: {
                required: true,
                minlength: 5,
            },
        },

        messages: {
            club_id: 'This Field Is Required',
            title: {
                required: "please fill this field",
                minlength: "please enter atleast 5 characters",
            },
            product_title: {
                required: "please fill this field",
                minlength: "please enter atleast 5 characters",
            },
            type: {
                required: "please fill this field",
                minlength: "please enter atleast 5 characters",
            },
        },
        submitHandler: function (form) {
            form.submit();
        }
    });

});