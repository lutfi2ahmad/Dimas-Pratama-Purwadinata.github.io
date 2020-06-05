

        /*$.validator.setDefaults({
         submitHandler: function() { alert("submitted!"); }
         });*/

        $(document).ready(function () {

            // validate signup form on keyup and submit
            $("#login-form").validate({
                rules: {
                    host: {
                        required: true,
                        minlength: 3
                    },
                    username: {
                        required: true,
                        minlength: 3
                    }
                },
                messages: {
                    host: {
                        required: "Masukkan nama lokal host anda",
                        minlength: "Gunakan minimal 3 huruf"
                    },
                    username: {
                        required: "Masukkan username lokal host anda",
                        minlength: "Gunakan minimal 3 huruf"
                    }
                }
            });

        });
