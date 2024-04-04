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
});

