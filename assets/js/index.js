(function(){
    $r.dom();

    if ($r.valida.mobile()) {
        _e.d.navegador_fav.classList.add('d-none');
        _e.d.navegador_fav_mobile.classList.remove('d-none');
    }

    $r.evento('click', $r.select('.btnHam')[0], function(){
        _e.d.cnt_navegador_mobile.classList.add('active-nav');
    });

    $r.evento('click', $r.select('.btnHam-invertido')[0], function(){
        _e.d.cnt_navegador_mobile.classList.remove('active-nav');
    });
})();

$r.evento('submit', _e.d.form_contacto, function(a) {
    a.preventDefault();

    _e.d.btn_submit_contacto.classList.add('loading');

    var error = false

    if (_e.d.contacto_nombre.value.trim().length < 3) {
        error = true
        alert('Nombre inválido',2500);
    }
    else if (_e.d.contacto_email.value == '')
    {
        error = true
        alert('E-mail inválido',2500);
    }
    else if (!$r.valida.email(_e.d.contacto_email.value))
    {
        error = true
        alert('E-mail inválido',2500);
    }
    else if (_e.d.contacto_establecimiento.value.trim().length < 3)
    {
        error = true
        alert('Establecimiento inválido',2500);
    }
    else if (_e.d.contacto_ciudad.value.trim().length < 3)
    {
        error = true
        alert('Ciudad inválida',2500);
    }
    else if (_e.d.contacto_tel.value.trim().length < 3)
    {
        error = true
        alert('Teléfono inválido',2500);
    }

    if (error == false) {
        $r.conf.url.mailUnete = 'mailing/unete'
        $r.api({
            url     : `${$r.conf.ruta}${$r.conf.url.mailUnete}`,
            metodo  : 'POST',
            datos   : `h=api&${$r.serialize(_e.d.form_contacto)}`,
            secure  : true,
            cabecera: [{h  : "token",c: "MTg3ZjU2OTNkNmZjYWI3ZjE2NzA3MWU0Mjk0NTc1ODM6MjAyNS0wMS0wMSAwMDowMDowMA=="}],
            recibe  : function(v)
            {
                if (v.aviso == true) {
                    alert('Formulario enviado con éxito',4000);
                    _e.d.form_contacto.reset();
                }
                else {
                    alert('Connection error',3500);
                }
                _e.d.btn_submit_contacto.classList.remove('loading');
            }
        });
    }
    else {
        _e.d.btn_submit_contacto.classList.remove('loading');
    }
});

