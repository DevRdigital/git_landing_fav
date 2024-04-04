(function(){
    $r.dom();

    $r.evento('submit', _e.d.form_ingreso_bin, function(a){
        a.preventDefault();

        var error = false;
        if (_e.d.bin_digitos.value.length < 6) {
            error = true;
            _e.d.bin_digitos_p.classList.add('active');
        }

        else if ( $r.valida.numero(_e.d.bin_digitos.value) ) {
            error = true;
            _e.d.bin_digitos_p.classList.add('active');
        }

        if (error == false) {
            _e.d.bin_digitos_p.classList.remove('active');
            console.log('Puede cargar');
            
        }
        else
            _e.d.bin_digitos_p.classList.add('active');
    });

    $r.evento('change', _e.d.bin_digitos, function() {
        if (_e.d.bin_digitos.value != '')
            ocultarTexto();
        else
            mostrarTexto();
    });

    $r.evento('mousedown', _e.d.bin_digitos, function() {
        ocultarTexto();
    });

    function ocultarTexto() { _e.d.bin_digitos_p.setAttribute('style', 'display:none;'); }

    function mostrarTexto() { _e.d.bin_digitos_p.removeAttribute('style'); }

    $r.evento('click', _e.d.restaurante_like, function() {
        _e.d.restaurante_like.classList.toggle('active')
    })
})();