$(document).ready(function(){
    $('#myform').validate({
    rules:{
    first_name:{
        required: true,
    },
    last_name:{
        required: true,
    },
    email:{
        required: true,
        email: true,
    },
    password:{
        required: true,
        minlength:3,
        
    },
    confirm_password:{
        required: true,
        minlength:3,
    },
    image:{
        required: true,
    },
    },
    messages:{
        first_name:{
            required: "please enter first name",
        },
        last_name:{
            required: 'please enter last name',
        },
        email:{
            required: "please enter email",
            email: "please enter valid Email Id",
        },
        password:{
            required: "please enter password",
            minlength: "passsword should be minimum 3 chracters",
        },
        confirm_password:{
            required: "please enter conform password",
            minlength:  "confirm passsword should be minimum 3 chracters",

        },
        image:{
            required: "",
        }
    },
    submitHandler:function(form){
    form.submit();
    }
    });
    });