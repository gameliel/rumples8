$(document).ready(function () {
    $('.payWithPaystack').click(function (e) {
        e.preventDefault();

        var firstname = $('.firstname').val();
        var lastname = $('.lastname').val();
        var email = $('.email').val();
        var phone = $('.phone').val();
        var address = $('.address').val();
        var address2 = $('.address2').val();
        var city = $('.city').val();
        var state = $('.state').val();
        var country = $('.country').val();
        var postcode = $('.postcode').val();

        if(!firstname)
        {
            fname_error = "First name is required";
            $('#fname_error').html('');
            $('#fname_error').html(fname_error);
        }
        else
        {
            fname_error = "";
            $('#fname_error').html('');
        }

        if(!lastname)
        {
            lname_error = "last name is required";
            $('#lname_error').html('');
            $('#lname_error').html(lname_error);
        }
        else
        {
            lname_error = "";
            $('#lname_error').html('');
        }

        if(!email)
        {
            email_error = "email field is required";
            $('#email_error').html('');
            $('#email_error').html(email_error);
        }
        else
        {
            email_error = "";
            $('#email_error').html('');
        }

        if(!phone)
        {
            phone_error = "phone field is required";
            $('#phone_error').html('');
            $('#phone_error').html(phone_error);
        }
        else
        {
            phone_error = "";
            $('#phone_error').html('');
        }

        if(!address)
        {
            address_error = "address field is required";
            $('#address_error').html('');
            $('#address_error').html(address_error);
        }
        else
        {
            address_error = "";
            $('#address_error').html('');
        }

        if(!address2)
        {
            address2_error = "second address field is required";
            $('#address2_error').html('');
            $('#address2_error').html(address2_error);
        }
        else
        {
            address2_error = "";
            $('#address2_error').html('');
        }

        if(!city)
        {
            city_error = "city field is required";
            $('#city_error').html('');
            $('#city_error').html(city_error);
        }
        else
        {
            city_error = "";
            $('#city_error').html('');
        }

        if(!state)
        {
            state_error = "state field is required";
            $('#state_error').html('');
            $('#state_error').html(state_error);
        }
        else
        {
            state_error = "";
            $('#state_error').html('');
        }

        if(!country)
        {
            country_error = "country field is required";
            $('#country_error').html('');
            $('#country_error').html(country_error);
        }
        else
        {
            country_error = "";
            $('#country_error').html('');
        }

        if(!postcode)
        {
            postcode_error = "postcode field is required";
            $('#postcode_error').html('');
            $('#postcode_error').html(postcode_error);
        }
        else
        {
            postcode_error = "";
            $('#postcode_error').html('');
        }

        if(fname_error != '' || lname_error != '' || email_error != '' || phone_error != '' || address_error != '' || address2_error != '' || city_error != '' || state_error != '' || country_error != '' || postcode_error != '')
        {
            return false;
        }
        else
        {
            var data = {
                ' firstname': firstname,
                ' lastname': lastname,
                ' email': email,
                ' phone': phone,
                ' address': address,
                ' address2': address2,
                ' city': city,
                ' state': state,
                ' country': country,
                ' postcode': postcode,
            }

            // var url = "{{ ('/proceed-to-pay')}}";
            // let url = "{{route('proceed_to_cart')}}"
            // var token =  document.head.querySelector('meta[name="csrf-token"]');

            // fetch(url, {
            //     method: 'POST',
            //     headers: {
            //         'Content-Type': 'application/json',
            //     },
            //     body: JSON.stringify(data)
            // }).then(res => res.json()).then((item) => alert(item.message));
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "POST",
                url: "/proceed-to-pay ",
                data: data,
                success: function (response) {
                    // alert(response.total_price);

                    var paymentForm = document.getElementById('paymentForm');
                        // paymentForm.addEventListener('submit', false);
                        // function (e) {
                            e.preventDefault();
                            var handler = PaystackPop.setup({
                                key: 'pk_test_1f58ab1ee3fe3f82fb694283906171afc7e72a84', // Replace with your public key
                                name: document.getElementById('first-name') + document.getElementById('last-name').value,
                                email: document.getElementById('email').value,
                                amount: document.getElementById('amount').value * 100, // the amount value is multiplied by 100 to convert to the lowest currency unit
                                currency: 'NGN', // Use GHS for Ghana Cedis or USD for US Dollars
                                ref: 'rumplesandco'+(Math.random() + 42421), // Replace with a reference you generated
                                callback: function(responsea) {
                                //this happens after the payment is completed successfully
                                var reference = responsea.reference;
                                alert('Payment complete! Reference: ' + reference);
                                $.ajax({
                                    method: "POST",
                                    url: "/place-order",
                                    data: {
                                        'fname':response.firstname,
                                        'lastname':response.lastname,
                                        'email':Math.random()+"test@mail.com",
                                        'phone':response.phone,
                                        'address':response.address,
                                        'address2':response.address2,
                                        'city':response.city,
                                        'state':response.state,
                                        'country':response.country,
                                        'postcode':response.postcode,
                                        'payment_mode':"Paid by paystack",
                                        'payment_id':responsea.reference,
                                    },
                                    success: function (responseb) {
                                        alert(responseb.status)
                                        window.location.href = "/";
                                    }
                                });
                                // Make an AJAX call to your server with the reference to verify the transaction
                                },
                                onClose: function() {
                                alert('Transaction was not completed, window closed.');
                                },
                        });
                        handler.openIframe();
                    // }
                }
            });
        }
    });
});
