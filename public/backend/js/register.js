$(function () {

    var $registrationForm = $("#form");

    if ($registrationForm.length) {
        $registrationForm.validate({
            rules: {
                username: {
                    required: true,
                    minlength: 3,
                    maxlength: 15,
                    alphanumeric: true
                },
                email: {
                    required: true
                },
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 15
                },
                cpassword: {
                    required: true,
                    equalTo: '#password'
                },
                cpassword: {
                    required: true
                },
                city: {
                    required: true,
                    minlength: 3,
                    maxlength: 20
                },
                country: {
                    required: true,
                    minlength: 3,
                    maxlength: 20
                },
                activity: {
                    required: true
                },
            },

            messages: {
                username: {
                    required: 'Name is required',
                    minlength: 'Name should be at least 3 character long',
                    maxlength: 'Name not more then 15',
                    alphanumeric: 'Please enter alphabets and underscore only'
                },
                email: {
                    required: 'Please enter your email'
                },
                password: {
                    required: 'Password is mandatory',
                    minlength: 'Password must be at least 8 character long',
                    maxlength: 'Password lenght not more then 10',
                },
                cpassword: {
                    required: 'Password confirmation is mandatory',
                    equalTo: 'Please enter the same password'
                },
                dateofbirth: {
                    required: 'Enter your date of birth',
                },
                city: {
                    required: 'Enter your city',
                    minlength: 'City name should be at least 3 character long',
                    maxlength: 'City name not more then 20'
                },
                country: {
                    required: 'Enter your Country',
                    minlength: 'Country name must be at least 3 character long',
                    maxlength: 'Country name not more then 20'
                },
                checkbox: {
                    required: 'Check the activity box?'
                },
            },
            errorPlacement: function (error, element) {
                if (element.is(":checkbox")) {
                    error.appendTo(element.parents(".checkbox"));
                } else {
                    error.insertAfter(element);
                }
            }
        })
    }

})