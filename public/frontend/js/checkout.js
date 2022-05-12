$(document).ready(function(){
    $('.razorpay_btn').click(function(e){
        e.preventDefault();

        var first_name = $('.first_name').val();
        var last_name = $('.last_name').val();
        var email = $('.email').val();
        var phone_number = $('.phone_number').val();
        var address_1 = $('.address_1').val();
        var address_2 = $('.address_2').val();
        var city = $('.city').val();
        var state = $('.state').val();
        var country = $('.country').val();
        var pin_code = $('.pin_code').val();

        if(!first_name)
        {
            fname_error = "First Name is required";
            $('#fname_error').html('');
            $('#fname_error').html(fname_error);
        }
        else
        {
            fname_error = "";
            $('#fname_error').html('');
        }

        if(!last_name)
        {
            lname_error = "Last Name is required";
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
            email_error = "Email is required";
            $('#email_error').html('');
            $('#email_error').html(email_error);
        }
        else
        {
            email_error = "";
            $('#email_error').html('');
        }

        
        if(!phone_number)
        {
            phone_error = "Phone Number is required";
            $('#phone_error').html('');
            $('#phone_error').html(phone_error);
        }
        else
        {
            phone_error = "";
            $('#phone_error').html('');
        }

        
        if(!address_1)
        {
            address1_error = "Address 1 is required";
            $('#address1_error').html('');
            $('#address1_error').html(address1_error);
        }
        else
        {
            address1_error = "";
            $('#address1_error').html('');
        }

        
        if(!address_2)
        {
            address2_error = "Address 2 is required";
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
            city_error = "City is required";
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
            state_error = "State is required";
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
            country_error = "Country is required";
            $('#country_error').html('');
            $('#country_error').html(country_error);
        }
        else
        {
            country_error = "";
            $('#country_error').html('');
        }

        
        if(!pin_code)
        {
            pincode_error = "Pin Code is required";
            $('#pincode_error').html('');
            $('#pincode_error').html(pincode_error);
        }
        else
        {
            pincode_error = "";
            $('#pincode_error').html('');
        }

        if( fname_error != '' || 
        lname_error != '' || 
        email_error != '' || 
        phone_error != '' || 
        address1_error != '' || 
        address2_error != '' || 
        city_error != '' || 
        state_error != '' || 
        country_error != '' || 
        pincode_error != '' || 
        pincode_error != '')
        {
            return false;
        }
        else
        {	
            var data = 
            {
                'first_name':first_name,
                'last_name':last_name,
                'email':email,
                'phone_number':phone_number,
                'address_1':address_1,
                'address_2':address_2,
                'city':city,
                'state':state,
                'country':country,
                'pin_code':pin_code
            }

            $.ajax({
                method: "POST",
                url: "/proceed-to-pay",
                data: data,
                success: function (response){
                    var options = {
                        "key": "rzp_test_haQk5MyvB2FZyB", // Enter the Key ID generated from the Dashboard
                        "amount": response.total_price*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                        "currency": "INR",
                        "name": response.first_name+' '+response.last_name,
                        "description": "Thank You for choosing Us",
                        "image": "https://example.com/your_logo",
                        //"order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                        "handler": function (responsea){
                            //alert(responsea.razorpay_payment_id);
                            $.ajax({
                                method: "POST",
                                url: "/place-order",
                                data: {
                                'first_name':response.first_name,
                                    'last_name':response.last_name,
                                    'email':response.email,
                                'phone_number':response.phone_number,
                                    'address_1':response.address_1,
                                    'address_2':response.address_2,
                                    'city':response.city,
                                    'state':response.state,
                                    'country':response.country,
                                    'pin_code':response.pin_code,
                                    'payment_mode':"Paid by Razorpay",
                                    'payment_id':responsea.razorpay_payment_id,
                                },
                                success: function (responseb){
                                //alert(responseb.status);
                                swal(responseb.status);
                                window.location.href = "/my-orders";
                                }
                            });
                        },
                        "prefill": {
                        "name": response.first_name+' '+response.last_name,
                        "email": response.email,
                        "contact": response.phone_number
                        },
                        "theme": {
                        "color": "#3399cc"
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
                }
            });
    }
    });
});