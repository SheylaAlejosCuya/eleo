function login(csrf, url) {

    let button_login = $('#button_login');
    let username = $('#email').val();
    let password = $('#password').val();
    
    button_login.prop("disabled", true);

    if(username == '') {
        showMessage("warning", "Correo electrónico requerido");
        button_login.prop("disabled", false);
        return;
    }

    if(password == ''){
        showMessage("warning", "Contraseña requerida");
        button_login.prop("disabled", false);
        return;
    }

    $.ajax({
        type : "POST",
        url: url,
        data: {
            '_token': csrf,
            'email': username,
            'password': password
        },
        success: function(data) { 
            showMessage("success", "Acceso correcto")
            console.log(data)
            button_login.prop("disabled", false);
        },
        error: function(data) {
            if(data.message = 'Unauthorized') {
                showMessage("warning", "Usuario y/o Contraseña incorrectos")
            } else {
                showMessage("error", "Ha ocurrido un error")
            }
            console.log(data)
            button_login.prop("disabled", false);
        },
        dataType: 'json'
    });

  }

    function showMessage(type, message) {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "timeOut": "2000",
            "extendedTimeOut": "2000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr[type](message);
    }