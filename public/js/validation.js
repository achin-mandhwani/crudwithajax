// $("form").validate({
//     errorClass: "error",

// });
$(document).ready(function () {
  
    $("#form").validate({

        rules: {
            group_id: {
                required: true,

            },
            business_name: {

                required: true,
                minlength: 5,
            },
            club_number: {
                required: true,
                minlength: 10,
            },
            club_name: {
                required: true,
                minlength: 6,
            },
            club_state: {
                required: true,
                minlength: 3,
            },
            club_description: {
                required: true,
                minlength: 15,
            },


            club_slug: {
                required: true,
                minlength: 5,
            },
            website_title: {
                required: true,
                minlength: 5,
            },
            website_link: {
                required: true,
               url:true,
            },
            club_logo: {
                required: true,
                extension: "png|jpe?g|gif",
            },
            club_banner: {
                required: true,
                extension: "png|jpe?g|gif",
            }
        },
        messages: {
            group_id: 'This Field Is Required',
            business_name: {
                required: "please fill this field",
                minlength: "please enter atleast 5 characters",
            },
            club_number: {
                required: "please fill this field",
                minlength: "please enter atleast 10 numbers",
            },
            club_name: {
                required: 'this field is compulsory to fill',
                minlength: 'please enter atleast 6 characters',
            },
            club_state: {
                required: 'this field is compulsory to fill',
                minlength: 'please enter atleast 3 characters',
            },
            club_description: {
                required: 'this field is mandatory',
                minlength: 'please enter atleast 15 characters',
            },
            club_slug: {
                required: 'this field is mandatory',
                minlength: 'please enter atleast 5 characters',
            },
            website_title: {
                required: 'this field is mandatory',
                minlength: 'please enter atleast 5 characters',
            },
            website_link: {
                required: 'please enter website_link',
               url:'please provide valid url',
            },
            club_logo: {
                required: "it,s compulsory to upload logo",
                extension: "File must be JPG, GIF or PNG",
            },

            club_banner: {
                required: "it,s compulsory to upload banner",
                extension: "File must be JPG, GIF or PNG",
            }


        },
        submitHandler: function(form) {
            form.submit();
        }
    });
    $("#formupdate").validate({

        rules: {
            group_id: {
                required: true,

            },
            business_name: {

                required: true,
                minlength: 5,
            },
            club_number: {
                required: true,
                minlength: 10,
            },
            club_name: {
                required: true,
                minlength: 6,
            },
            club_state: {
                required: true,
                minlength: 3,
            },
            club_descriptions: {
                required: true,
                minlength: 15,
            },


            club_slug: {
                required: true,
                minlength: 5,
            },
            website_title: {
                required: true,
                minlength: 5,
            },
            website_link: {
                required: true,
               url:true,
            },
            club_logo: {
                required: true,
                extension: "png|jpe?g|gif",
            },
            club_banner: {
                required: true,
                extension: "png|jpe?g|gif",
            }
        },
        messages: {
            group_id: 'This Field Is Required',
            business_name: {
                required: "please fill this field",
                minlength: "please enter atleast 5 characters",
            },
            club_number: {
                required: "please fill this field",
                minlength: "please enter atleast 10 numbers",
            },
            club_name: {
                required: 'this field is compulsory to fill',
                minlength: 'please enter atleast 6 characters',
            },
            club_state: {
                required: 'this field is compulsory to fill',
                minlength: 'please enter atleast 3 characters',
            },
            club_descriptions: {
                required: 'this field is mandatory',
                minlength: 'please enter atleast 15 characters',
            },
            club_slug: {
                required: 'this field is mandatory',
                minlength: 'please enter atleast 5 characters',
            },
            website_title: {
                required: 'this field is mandatory',
                minlength: 'please enter atleast 5 characters',
            },
            website_link: {
                required: 'please enter website_link',
               url:'please provide valid url',
            },
            club_logo: {
                required: "it,s compulsory to upload logo",
                extension: "File must be JPG, GIF or PNG",
            },

            club_banner: {
                required: "it,s compulsory to upload banner",
                extension: "File must be JPG, GIF or PNG",
            }


        },
        submitHandler: function(form) {
            form.submit();
        }
    });

});