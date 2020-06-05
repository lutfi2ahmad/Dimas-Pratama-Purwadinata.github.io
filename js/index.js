

        /*$.validator.setDefaults({
         submitHandler: function() { alert("submitted!"); }
         });*/

        $(document).ready(function () {

            // validate signup form on keyup and submit
            $("#login-form").validate({
                rules: {
                    username: {
                        required: true,
                        minlength: 3
                    },
                    password: {
                        required: true,
                        minlength: 3
                    }
                },
                messages: {
                    username: {
                        required: "Silahkan masukan username",
                        minlength: "Gunakan minimal 3 huruf"
                    },
                    password: {
                        required: "Silahkan masukan password",
                        minlength: "Gunakan minimal 3 huruf"
                    }
                }
            });

        });
