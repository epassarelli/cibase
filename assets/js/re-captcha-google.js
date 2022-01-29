grecaptcha.ready(function() {
    let siteKey = $('#g-recaptcha').data('siteKey');
    grecaptcha.execute(siteKey, {action: 'login'}).then(function(token) { //DONDE DICE LOGIN SEGUN EL TIPO DE FORMULARIO LE PONES UNA DESCRIPCION EJEMPLO REGISTRO,LOGIN,CONTACTO, ESTO TE SACA ESTADISTICAS DSP EN EL ADMIN DE GOOGLE RECAPTCHA.
        $('#g-recaptcha').val(token);
    });
});