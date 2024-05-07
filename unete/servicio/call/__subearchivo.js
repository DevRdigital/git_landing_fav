$r.evento('change', _e.d.btn_foto, function() {

    let nombreCompleto = _e.d.btn_foto.value.trim();
    let nombreAcortado = nombreCompleto.substring(12, nombreCompleto.length-4);

    for (var i = nombreAcortado.length - 1; i >= 0; i--) 
    {
        
        if(nombreAcortado.charAt(i)=='á')
            nombreAcortado.replace(/á/g,'-');

        if(nombreAcortado.charAt(i)=='é')
            nombreAcortado.replace(/é/g,'-');

        if(nombreAcortado.charAt(i)=='í')
            nombreAcortado.replace(/í/g,'-');

        if(nombreAcortado.charAt(i)=='ó')
            nombreAcortado.replace(/ó/g,'-');

        if(nombreAcortado.charAt(i)=='ú')
            nombreAcortado.replace(/ú/g,'-');

        if(nombreAcortado.charAt(i)=='Á')
            nombreAcortado.replace(/Á/g,'-');

        if(nombreAcortado.charAt(i)=='É')
            nombreAcortado.replace(/É/g,'-');

        if(nombreAcortado.charAt(i)=='Í')
            nombreAcortado.replace(/Í/g,'-');

        if(nombreAcortado.charAt(i)=='Ó')
            nombreAcortado.replace(/Ó/g,'-');

        if(nombreAcortado.charAt(i)=='Ú')
            nombreAcortado.replace(/Ú/g,'-');

        if(nombreAcortado.charAt(i)=='ñ')
            nombreAcortado.replace(/ñ/g,'-');
        
        if(nombreAcortado.charAt(i)=='Ñ')
            nombreAcortado.replace(/Ñ/g,'-');
        
        if(nombreAcortado.charAt(i)=='_')
            nombreAcortado.replace(/_/g,'-');

        if(nombreAcortado.charAt(i)=='ë')
            nombreAcortado.replace(/ë/g,'-');
        
        if(nombreAcortado.charAt(i)=='Ë')
            nombreAcortado.replace(/Ë/g,'-');

        if(nombreAcortado.charAt(i)=='"')
            nombreAcortado.replace(/"/g,'-');

        if(nombreAcortado.charAt(i)=="'")
            nombreAcortado.replace("'",'-');
        
        if(nombreAcortado.charAt(i)=='.')
            nombreAcortado.replace(/./g,'-');

        if(nombreAcortado.charAt(i)=='|')
            nombreAcortado.replace(/|/g,'-');

        if(nombreAcortado.charAt(i)==']')
            nombreAcortado.replace(/]/g,'-');

        if(nombreAcortado.charAt(i)=='{')
            nombreAcortado.replace(/{/g,'-');

        if(nombreAcortado.charAt(i)=='}')
            nombreAcortado.replace(/}/g,'-');

        if(nombreAcortado.charAt(i)=='ü')
            nombreAcortado.replace(/ü/g,'-');

        if(nombreAcortado.charAt(i)=='Ü')
            nombreAcortado.replace(/Ü/g,'-');

        if(nombreAcortado.charAt(i)==',')
            nombreAcortado.replace(/,/g,'-');

        if(nombreAcortado.charAt(i)=='/')
            nombreAcortado.replace('/','-');

        if(nombreAcortado.charAt(i)=='$')
            nombreAcortado.replace(/$/g,'-');

        if(nombreAcortado.charAt(i)=='@')
            nombreAcortado.replace(/@/g,'-');

        if(nombreAcortado.charAt(i)=='%')
            nombreAcortado.replace(/%/g,'-');

        if(nombreAcortado.charAt(i)=='&')
            nombreAcortado.replace(/&/g,'-');

        if(nombreAcortado.charAt(i)=='=')
            nombreAcortado.replace(/=/g,'-');
    }

    let _nombreArchivo = nombreAcortado;

    _obd = 
    { 
        url:$r.conf_ajax.url.archivo,
        metodo:'post',
        datos:'h=__subearchivo&ruta=../../../app/www/img/perfil/&nombre='+_nombreArchivo,
        fileinput: this,
        fncP: function(v)
        { 
            /* Esto tiene el porcentage en V */
            //_e.d.btn_foto_p.innerText = 'Subida al '+v+'%';                
            if (v != 100)
                alert('Error en archivo',3500);
        },
        fncE: function(v)
        {
            /* Esto ejecuta la funcion cuando termino de procesar todo */
            if (v.v.mensaje != '') {
                alert(v.v.mensaje, 3500);
            }
            else if (v.v.aviso == true)
            {
                var nombre = v.v.archivo;
                var ruta = 'https://clientes.rdigital.me/prod/guardiacubierta/app/www/img/perfil/';
    
                $r.api({
                    url:$r.conf_ajax.url.user,
                    metodo: $r.conf_ajax.metodo.post,
                    datos: `h=registroFoto&nombre=${nombre}&ruta=${ruta}&email=${ JSON.parse($r.tls('usuario')).email }&password=${ JSON.parse($r.tls('usuario')).pass }`,
                    recibe: function (v,b) 
                    {
                        if(v.aviso == true)
                        {
                            _e.d.imagen_perfil.setAttribute('src', 'https://clientes.rdigital.me/prod/guardiacubierta/app/www/img/perfil/'+v.nombre);
                        }
            
                        alert(v.mensaje, 4000);
                    }
                }, {hacer: function() {} });
            }
            else
                alert('Error en archivo',3500);
            
        },
        
    }

    $r.ajax_file(_obd), {hacer: function() {} };
    /*
    */
});