/*
*   Autor: Reiatsu Digital;
*   Lang prog: Js;
*   Proyecto: Reiatsu api| Reiatsu;
*/

if("document"in self){if(!("classList" in document.createElement("_"))||document.createElementNS&&!("classList"in document.createElementNS("http://www.w3.org/2000/svg","g"))){(function(t){"use strict";if(!("Element"in t))return;var e="classList",i="prototype",n=t.Element[i],s=Object,r=String[i].trim||function(){return this.replace(/^\s+|\s+$/g,"")},a=Array[i].indexOf||function(t){var e=0,i=this.length;for(;e<i;e++){if(e in this&&this[e]===t){return e}}return-1},o=function(t,e){this.name=t;this.code=DOMException[t];this.message=e},l=function(t,e){if(e===""){throw new o("SYNTAX_ERR","An invalid or illegal string was specified")}if(/\s/.test(e)){throw new o("INVALID_CHARACTER_ERR","String contains an invalid character")}return a.call(t,e)},c=function(t){var e=r.call(t.getAttribute("class")||""),i=e?e.split(/\s+/):[],n=0,s=i.length;for(;n<s;n++){this.push(i[n])}this._updateClassName=function(){t.setAttribute("class",this.toString())}},u=c[i]=[],f=function(){return new c(this)};o[i]=Error[i];u.item=function(t){return this[t]||null};u.contains=function(t){t+="";return l(this,t)!==-1};u.add=function(){var t=arguments,e=0,i=t.length,n,s=false;do{n=t[e]+"";if(l(this,n)===-1){this.push(n);s=true}}while(++e<i);if(s){this._updateClassName()}};u.remove=function(){var t=arguments,e=0,i=t.length,n,s=false,r;do{n=t[e]+"";r=l(this,n);while(r!==-1){this.splice(r,1);s=true;r=l(this,n)}}while(++e<i);if(s){this._updateClassName()}};u.toggle=function(t,e){t+="";var i=this.contains(t),n=i?e!==true&&"remove":e!==false&&"add";if(n){this[n](t)}if(e===true||e===false){return e}else{return!i}};u.toString=function(){return this.join(" ")};if(s.defineProperty){var h={get:f,enumerable:true,configurable:true};try{s.defineProperty(n,e,h)}catch(d){if(d.number===-2146823252){h.enumerable=false;s.defineProperty(n,e,h)}}}else if(s[i].__defineGetter__){n.__defineGetter__(e,f)}})(self)}else{(function(){"use strict";var t=document.createElement("_");t.classList.add("c1","c2");if(!t.classList.contains("c2")){var e=function(t){var e=DOMTokenList.prototype[t];DOMTokenList.prototype[t]=function(t){var i,n=arguments.length;for(i=0;i<n;i++){t=arguments[i];e.call(this,t)}}};e("add");e("remove")}t.classList.toggle("c3",false);if(t.classList.contains("c3")){var i=DOMTokenList.prototype.toggle;DOMTokenList.prototype.toggle=function(t,e){if(1 in arguments&&!this.contains(t)===!e){return e}else{return i.call(this,t)}}}t=null})()}}
Element.prototype.remove   = function() {this.parentElement.removeChild(this); }
NodeList.prototype.remove  = HTMLCollection.prototype.remove = function() {for(var i = this.length - 1; i >= 0; i--) {if(this[i] && this[i].parentElement) {this[i].parentElement.removeChild(this[i]); } } } 
!function(t){function e(o){if(n[o])return n[o].exports;var i=n[o]={exports:{},id:o,loaded:!1};return t[o].call(i.exports,i,i.exports,e),i.loaded=!0,i.exports}var n={};return e.m=t,e.c=n,e.p="",e(0)}([function(t,e,n){"use strict";n(1),window.Origami={fastclick:n(2),"o-autoinit":n(4)}},function(t,e){t.exports={name:"__MAIN__",dependencies:{fastclick:"fastclick#*","o-autoinit":"o-autoinit#^1.0.0"}}},function(t,e,n){t.exports=n(3)},function(t,e){"use strict";var n=!1;!function(){function e(t,n){function o(t,e){return function(){return t.apply(e,arguments)}}var r;if(n=n||{},this.trackingClick=!1,this.trackingClickStart=0,this.targetElement=null,this.touchStartX=0,this.touchStartY=0,this.lastTouchIdentifier=0,this.touchBoundary=n.touchBoundary||10,this.layer=t,this.tapDelay=n.tapDelay||200,this.tapTimeout=n.tapTimeout||700,!e.notNeeded(t)){for(var a=["onMouse","onClick","onTouchStart","onTouchMove","onTouchEnd","onTouchCancel"],c=this,s=0,u=a.length;s<u;s++)c[a[s]]=o(c[a[s]],c);i&&(t.addEventListener("mouseover",this.onMouse,!0),t.addEventListener("mousedown",this.onMouse,!0),t.addEventListener("mouseup",this.onMouse,!0)),t.addEventListener("click",this.onClick,!0),t.addEventListener("touchstart",this.onTouchStart,!1),t.addEventListener("touchmove",this.onTouchMove,!1),t.addEventListener("touchend",this.onTouchEnd,!1),t.addEventListener("touchcancel",this.onTouchCancel,!1),Event.prototype.stopImmediatePropagation||(t.removeEventListener=function(e,n,o){var i=Node.prototype.removeEventListener;"click"===e?i.call(t,e,n.hijacked||n,o):i.call(t,e,n,o)},t.addEventListener=function(e,n,o){var i=Node.prototype.addEventListener;"click"===e?i.call(t,e,n.hijacked||(n.hijacked=function(t){t.propagationStopped||n(t)}),o):i.call(t,e,n,o)}),"function"==typeof t.onclick&&(r=t.onclick,t.addEventListener("click",function(t){r(t)},!1),t.onclick=null)}}var o=navigator.userAgent.indexOf("Windows Phone")>=0,i=navigator.userAgent.indexOf("Android")>0&&!o,r=/iP(ad|hone|od)/.test(navigator.userAgent)&&!o,a=r&&/OS 4_\d(_\d)?/.test(navigator.userAgent),c=r&&/OS [6-7]_\d/.test(navigator.userAgent),s=navigator.userAgent.indexOf("BB10")>0;e.prototype.needsClick=function(t){switch(t.nodeName.toLowerCase()){case"button":case"select":case"textarea":if(t.disabled)return!0;break;case"input":if(r&&"file"===t.type||t.disabled)return!0;break;case"label":case"iframe":case"video":return!0}return/\bneedsclick\b/.test(t.className)},e.prototype.needsFocus=function(t){switch(t.nodeName.toLowerCase()){case"textarea":return!0;case"select":return!i;case"input":switch(t.type){case"button":case"checkbox":case"file":case"image":case"radio":case"submit":return!1}return!t.disabled&&!t.readOnly;default:return/\bneedsfocus\b/.test(t.className)}},e.prototype.sendClick=function(t,e){var n,o;document.activeElement&&document.activeElement!==t&&document.activeElement.blur(),o=e.changedTouches[0],n=document.createEvent("MouseEvents"),n.initMouseEvent(this.determineEventType(t),!0,!0,window,1,o.screenX,o.screenY,o.clientX,o.clientY,!1,!1,!1,!1,0,null),n.forwardedTouchEvent=!0,t.dispatchEvent(n)},e.prototype.determineEventType=function(t){return i&&"select"===t.tagName.toLowerCase()?"mousedown":"click"},e.prototype.focus=function(t){var e;r&&t.setSelectionRange&&0!==t.type.indexOf("date")&&"time"!==t.type&&"month"!==t.type?(e=t.value.length,t.setSelectionRange(e,e)):t.focus()},e.prototype.updateScrollParent=function(t){var e,n;if(e=t.fastClickScrollParent,!e||!e.contains(t)){n=t;do{if(n.scrollHeight>n.offsetHeight){e=n,t.fastClickScrollParent=n;break}n=n.parentElement}while(n)}e&&(e.fastClickLastScrollTop=e.scrollTop)},e.prototype.getTargetElementFromEventTarget=function(t){return t.nodeType===Node.TEXT_NODE?t.parentNode:t},e.prototype.onTouchStart=function(t){var e,n,o;if(t.targetTouches.length>1)return!0;if(e=this.getTargetElementFromEventTarget(t.target),n=t.targetTouches[0],r){if(o=window.getSelection(),o.rangeCount&&!o.isCollapsed)return!0;if(!a){if(n.identifier&&n.identifier===this.lastTouchIdentifier)return t.preventDefault(),!1;this.lastTouchIdentifier=n.identifier,this.updateScrollParent(e)}}return this.trackingClick=!0,this.trackingClickStart=t.timeStamp,this.targetElement=e,this.touchStartX=n.pageX,this.touchStartY=n.pageY,t.timeStamp-this.lastClickTime<this.tapDelay&&t.preventDefault(),!0},e.prototype.touchHasMoved=function(t){var e=t.changedTouches[0],n=this.touchBoundary;return Math.abs(e.pageX-this.touchStartX)>n||Math.abs(e.pageY-this.touchStartY)>n},e.prototype.onTouchMove=function(t){return!this.trackingClick||((this.targetElement!==this.getTargetElementFromEventTarget(t.target)||this.touchHasMoved(t))&&(this.trackingClick=!1,this.targetElement=null),!0)},e.prototype.findControl=function(t){return void 0!==t.control?t.control:t.htmlFor?document.getElementById(t.htmlFor):t.querySelector("button, input:not([type=hidden]), keygen, meter, output, progress, select, textarea")},e.prototype.onTouchEnd=function(t){var e,n,o,s,u,l=this.targetElement;if(!this.trackingClick)return!0;if(t.timeStamp-this.lastClickTime<this.tapDelay)return this.cancelNextClick=!0,!0;if(t.timeStamp-this.trackingClickStart>this.tapTimeout)return!0;if(this.cancelNextClick=!1,this.lastClickTime=t.timeStamp,n=this.trackingClickStart,this.trackingClick=!1,this.trackingClickStart=0,c&&(u=t.changedTouches[0],l=document.elementFromPoint(u.pageX-window.pageXOffset,u.pageY-window.pageYOffset)||l,l.fastClickScrollParent=this.targetElement.fastClickScrollParent),o=l.tagName.toLowerCase(),"label"===o){if(e=this.findControl(l)){if(this.focus(l),i)return!1;l=e}}else if(this.needsFocus(l))return t.timeStamp-n>100||r&&window.top!==window&&"input"===o?(this.targetElement=null,!1):(this.focus(l),this.sendClick(l,t),r&&"select"===o||(this.targetElement=null,t.preventDefault()),!1);return!(!r||a||(s=l.fastClickScrollParent,!s||s.fastClickLastScrollTop===s.scrollTop))||(this.needsClick(l)||(t.preventDefault(),this.sendClick(l,t)),!1)},e.prototype.onTouchCancel=function(){this.trackingClick=!1,this.targetElement=null},e.prototype.onMouse=function(t){return!this.targetElement||(!!t.forwardedTouchEvent||(!t.cancelable||(!(!this.needsClick(this.targetElement)||this.cancelNextClick)||(t.stopImmediatePropagation?t.stopImmediatePropagation():t.propagationStopped=!0,t.stopPropagation(),t.preventDefault(),!1))))},e.prototype.onClick=function(t){var e;return this.trackingClick?(this.targetElement=null,this.trackingClick=!1,!0):"submit"===t.target.type&&0===t.detail||(e=this.onMouse(t),e||(this.targetElement=null),e)},e.prototype.destroy=function(){var t=this.layer;i&&(t.removeEventListener("mouseover",this.onMouse,!0),t.removeEventListener("mousedown",this.onMouse,!0),t.removeEventListener("mouseup",this.onMouse,!0)),t.removeEventListener("click",this.onClick,!0),t.removeEventListener("touchstart",this.onTouchStart,!1),t.removeEventListener("touchmove",this.onTouchMove,!1),t.removeEventListener("touchend",this.onTouchEnd,!1),t.removeEventListener("touchcancel",this.onTouchCancel,!1)},e.notNeeded=function(t){var e,n,o,r;if("undefined"==typeof window.ontouchstart)return!0;if(n=+(/Chrome\/([0-9]+)/.exec(navigator.userAgent)||[,0])[1]){if(!i)return!0;if(e=document.querySelector("meta[name=viewport]")){if(e.content.indexOf("user-scalable=no")!==-1)return!0;if(n>31&&document.documentElement.scrollWidth<=window.outerWidth)return!0}}if(s&&(o=navigator.userAgent.match(/Version\/([0-9]*)\.([0-9]*)/),o[1]>=10&&o[2]>=3&&(e=document.querySelector("meta[name=viewport]")))){if(e.content.indexOf("user-scalable=no")!==-1)return!0;if(document.documentElement.scrollWidth<=window.outerWidth)return!0}return"none"===t.style.msTouchAction||"manipulation"===t.style.touchAction||(r=+(/Firefox\/([0-9]+)/.exec(navigator.userAgent)||[,0])[1],!!(r>=27&&(e=document.querySelector("meta[name=viewport]"),e&&(e.content.indexOf("user-scalable=no")!==-1||document.documentElement.scrollWidth<=window.outerWidth)))||("none"===t.style.touchAction||"manipulation"===t.style.touchAction))},e.attach=function(t,n){return new e(t,n)},"function"==typeof n&&"object"==typeof n.amd&&n.amd?n(function(){return e}):"undefined"!=typeof t&&t.exports?(t.exports=e.attach,t.exports.FastClick=e):window.FastClick=e}()},function(t,e,n){t.exports=n(5)},function(t,e){"use strict";function n(t){t in o||(o[t]=!0,document.dispatchEvent(new CustomEvent("o."+t)))}var o={};if(window.addEventListener("load",n.bind(null,"load")),window.addEventListener("load",n.bind(null,"DOMContentLoaded")),document.addEventListener("DOMContentLoaded",n.bind(null,"DOMContentLoaded")),document.onreadystatechange=function(){"complete"===document.readyState?(n("DOMContentLoaded"),n("load")):"interactive"!==document.readyState||document.attachEvent||n("DOMContentLoaded")},"complete"===document.readyState?(n("DOMContentLoaded"),n("load")):"interactive"!==document.readyState||document.attachEvent||n("DOMContentLoaded"),document.attachEvent){var i=!1,r=50;try{i=null==window.frameElement&&document.documentElement}catch(a){}i&&i.doScroll&&!function c(){if(!("DOMContentLoaded"in o)){try{i.doScroll("left")}catch(t){return r<5e3?setTimeout(c,r*=1.2):void 0}n("DOMContentLoaded")}}()}}]);

/* _________________________________________________________________________________________________________
   ___________________________    FUNCIONES GENERALES    ___________________________________________________
   _________________________________________________________________________________________________________ */
let $_cntotal   = 0;
const $r = {
      conf  :   {
                        "ruta": "https://sandbox.rdigital.me/clientes/fav/servicio/call/",
                        "url":{},
                        "metodo":{
                           "post":  "post",
                           "get":   "get"
                        }
                     },
      currenScript : null,
      precarga :  {
                     add: function(_el = document.getElementsByTagName('body')[0], icono = '<i class="las la-feather"></i>', texto='Aguarde...')
                     {
                        var _posibleprecarga = $r.select("*[data-precarga-rdigital]")[0];
                        if(_posibleprecarga)
                           _posibleprecarga.remove();

                        var   _aside = $r.create('aside');
                              _aside.setAttribute('data-precarga-rdigital','');
                              _aside.innerHTML = ' <span class="precarga_contenedor">\
                                                      <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>\
                                                   </span>';
                        _el.appendChild(_aside);
                     },
                     remove: function()
                     {
                        var _posibleprecarga = $r.select("*[data-precarga-rdigital]")[0];
                        if(_posibleprecarga)
                           _posibleprecarga.remove();
                     }
                  },
      normalize: {
         rango: function (val, max, min) { return (val - min) / (max - min); }
      },
      globales : {
         __fechas :  {
                        meses: [0, { largo: "Enero", corto  : "Ene" }, { largo: "Febrero", corto: "Feb" }, { largo: "Marzo", corto : "Mar" }, { largo: "Abril", corto    : "Abr" }, { largo: "Mayo", corto  : "May" }, { largo: "Junio", corto  : "Jun" }, { largo: "Julio", corto : "Jul" }, { largo: "Agosto", corto: "Ago" }, { largo: "Septiembre", corto: "Sep" }, { largo: "Octubre", corto: "Oct" }, { largo: "Noviembre", corto: "Nov" }, { largo: "Diciembre", corto: "Dic" }],
                        dias : [ { largo : "Domingo", corto: "Dom" }, { largo : "Lunes", corto  : "Lun" }, { largo: "Martes", corto: "Mar" }, { largo: "Miércoles", corto: "Mie" }, { largo: "Jueves", corto: "Jue" }, { largo: "Viernes", corto: "Vie" }, { largo: "Sábado", corto: "Sab" },{ largo : "Domingo", corto: "Dom" }],
                     },
         procesaFecha : function(f)
         {
               let fString         = ['','Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'];
               let fechaParseada   = f.split(" ");
               let fi              = fechaParseada[0].split("-");
      
               return {    strng: `${fi[2]} de ${fString[parseInt(fi[1])]} del ${fi[0]}`, 
                           compuesta: f, 
                           hora: fechaParseada[1],
                           mes: { strng: fString[parseInt(fi[1])], numb: parseInt(fi[1]) },
                           dia:fi[2],
                           anio: fi[0]
                     };
         },
         filtraTablas: function(tabla,b)
         {
               let trBusca = $r.select(`tbody[data-buscador="${tabla}"] tr`); // document.querySelectorAll("")
               if( trBusca.length )
               {
                  for (let tri = 0; tri < trBusca.length; tri++) 
                  {
                     let encuentra = false;
                     for (const k in trBusca[tri]._buscador) 
                     {                    
                           if(trBusca[tri]._buscador[k] != null)
                           {
                              // FIXME - Lean poner un replace de caracteres especiales.
                              if( trBusca[tri]._buscador[k].trim().toLowerCase().indexOf( b.trim().toLowerCase() ) > -1 )
                              {
                                 encuentra = true;
                                 break;
                              }
                           }
                     }
      
                     (!encuentra) ? trBusca[tri].style.display = "none" : trBusca[tri].removeAttribute("style");
                  }
                  
               }
         },
         ordenaObj : function(prop) 
         {
            return function(a, b) 
            {
              return  ( (prop.orden == "desc") ? ( (a[prop.que] <= b[prop.que]) ? 1 : -1 ) : ( (a[prop.que] >= b[prop.que]) ? 1 : -1 ) ) ;
            }
         }
      },
      precio   : function(l,k,h,f){var k=isNaN(k=Math.abs(k))?2:k,h=h==undefined?",":h,f=f==undefined?".":f,g=l<0?"-":"",e=String(parseInt(l=Math.abs(Number(l)||0).toFixed(k))),b=(b=e.length)>3?b%3:0; return g+(b?e.substr(0,b)+f:"")+e.substr(b).replace(/(\d{3})(?=\d)/g,"$1"+f)+(k?h+Math.abs(l-e).toFixed(k).slice(2):"");},
      evento   : function(cual = 'click', aquien, fnc)
      {
         if(typeof fnc == 'function')
            if(typeof aquien == 'object')
            {
               {
                  var eventos = cual.split(',');
                  for (let l = 0; l < eventos.length; l++)
                     aquien.addEventListener(eventos[l].trim(),fnc,false);
               }
            }
            else
               return 'No se encontró elemento DOM';
         else
            return 'No se encontro función para asociar';
      },
      eventoAll   : function(cual = 'click', aquien, fnc)
      {
         if(typeof fnc == 'function')
            if(typeof aquien == 'object')
            {
               var eventos = cual.split(',');

               if(typeof aquien.length != "undefined")
               {
                  for (let ll = 0; ll < aquien.length; ll++) 
                  {
                     for (let l = 0; l < eventos.length; l++)
                        aquien[ll].addEventListener(eventos[l].trim(),fnc,false);
                  }
               }
            }
            else
               return 'No se encontró elemento DOM';
         else
            return 'No se encontro función para asociar';
      },
      usaEvento   : function(cual = 'undefined', aquien)
      {
         if(aquien != null && aquien != undefined)
         {
            if(cual != 'undefined')
               if(typeof aquien == 'object')
                  aquien.dispatchEvent(new Event(cual));
               else
                  return 'No se encontró elemento DOM';
            else
               return 'No se encontro función para asociar';
         }
      },
      /* _________________________________________________________________________________________________________
         ___________________________    FUNCIONES PARA LOCALSTORAGES    __________________________________________
         _________________________________________________________________________________________________________ */
      storage : {
         crea     : function (nombre, contenido) { window.localStorage.setItem(nombre, contenido); },
         trae     : function (nombre) { return window.localStorage.getItem(nombre); },
         valida   : function (nombre) { var nm = window.localStorage.getItem(nombre); var vl = true; if (nm == undefined || nm == null || nm == "" || nm == "undefined" || nm == "null" || nm == " ") vl = false; return vl; },
         limpia   : function (nombre) { ((nombre == undefined) || (nombre == null)) ? window.localStorage.clear() : $r.storage.crea(nombre, ""); }
      },
      urlAObjeto : function(url) 
      {
         let parameters = {};
         
         if(url.indexOf("?") >-1)
         {
            let queryString = url.split("?")[1];
            let parameterPairs = queryString.split("&");
          
            parameterPairs.forEach(function(pair) {
              let parameter = pair.split("="); 
              let paramName = decodeURIComponent(parameter[0]);
              let paramValue = decodeURIComponent(parameter[1]);
              parameters[paramName] = paramValue;
            });
         }
       
         return parameters;
      },
      sec:{}
};
/* _________________________________________________________________________________________________________
   ___________________________    FUNCIONES RECIBE DATOS DE PHP    __________________________________________
   _________________________________________________________________________________________________________ */
   $r.ajax  = function(url, metodo, datos, _jsna ='')
   {
      var a = new XMLHttpRequest(); 
      a.open(metodo, url, true);

      if(typeof datos != "object")
         a.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
         a.setRequestHeader("RdigitalSeg", btoa($r.date("Ymd")));
      
      a.send(datos);
            if(typeof datos == "object")
            {
               _esp = datos.get("h");
            }
            else
            {
               var _esp = 0;
               if(datos.indexOf("&")>-1)
                  _esp = datos.split("&")[0].split("=")[1];
               else
                  _esp = datos.split("=")[1];
            }

      if(_jsna != '')
         var _jsn = _jsna;
      a.onreadystatechange = function () {
         if(a.readyState == 4 && a.status == 200)
         {
            if(((url.indexOf(".html") >-1) || (url.indexOf(".php") >-1)) && ((url.indexOf("funciones.php") == -1) && (url.indexOf("__chat.php") == -1)))
            {
               j = a.responseText
               _recibe_ajax_maquetado(j, _esp, _jsna)
            }
            else
            {
               try
               {
                  (url.indexOf("__chat.php") > -1) ? _recibe_ajax_chat(JSON.parse(a.responseText),_esp) : _recibe_ajax(JSON.parse(a.responseText),_esp);
               }
               catch(error)
               {
                  console.warn(error);
                  _recibe_errores_ajax(_esp, a.responseText);
               }
            }
         }
      };
   };

   $r.ajax2 = $r.api = function(_obd) 
   {
         var _psa = true;
         if(typeof _obd != "object")
         {
            _psa = false;
            console.error('0xErr-Se necesita un objeto para continuar',5000);
         }
         else if (typeof _obd.url == "undefined") 
         {
            _psa = false;
            console.error('1xErr-Se requiere una url ... ',5000);
         }
         else if (typeof _obd.datos == "undefined") 
         {
            _psa = false;
            console.error('1xErr-Se requiere al menos la dependencia de h ... ',5000);
         }
         else if (typeof _obd.datos != "object")
         {
            if (typeof _obd.datos.indexOf("h=") == -1 && typeof _obd.datos.indexOf('"h":') == -1 ) 
            {
               _psa = false;
               console.error('1xErr-Se requiere al menos la dependencia de h ... ',5000);
            }
         } 

         if(_psa == true)
         {
            var a = new XMLHttpRequest(); 
            if(typeof _obd.metodo == "undefined")
               _obd.metodo = "GET";
               
            a.open(_obd.metodo, _obd.url, true);

            // identificacion del content type
            if(typeof _obd.contentType == "undefined")
               a.setRequestHeader("Content-Type", "application/x-www-form-urlencoded") 
            else if(_obd.contentType != false) 
               a.setRequestHeader("Content-Type", _obd.contentType);
            
            if(typeof _obd.secure == "undefined") _obd.secure = true;
            if(_obd.secure == true)
               a.setRequestHeader("rdseg", $r.sec.sha256(`OneP1ece#`));
               
               // prepara el envio de datos.
               a.send(_obd.datos);
               if(typeof _obd.datos == "object")
                  _esp = _obd.datos.get("h");
               else
               {
                  var _esp = 0;
                  _esp = (_obd.datos.indexOf("&")>-1) ? _obd.datos.split("&")[0].split("=")[1] : _obd.datos.split("=")[1];
               }
            a.onreadystatechange = function () 
            {
               
               if(a.readyState == 4 && a.status == 200)
               {
                  {
                     try
                     {
                           if(typeof _obd.recibe == "undefined")
                              _recibe_ajax(JSON.parse(a.responseText),_esp);
                           if(typeof _obd.recibe == "function")
                           {
                              if(typeof _obd.responseType != "undefined")
                              {
                                 if(_obd.responseType == "html" || _obd.responseType == "text")
                                    _obd.recibe(a.responseText,_esp);
                                 else
                                    _obd.recibe(JSON.parse(a.responseText),_esp);
                              }
                              else
                              {
                                 let res
                                 try 
                                 {
                                    res =  JSON.parse(a.responseText);
                                 } 
                                 catch (error) 
                                 {
                                    res = a.responseText;
                                 }
                                 _obd.recibe(res,_esp);
                              }
                           }
                     }
                     catch(error)
                     {
                        console.error(error);
                     }
                  }
               }
            };
         }
   };

   $r.ajax_file = $r.apiFile = function(_obd)
   {
     var _esp;
     var _ipos = {};

     if(typeof _obd.datos == "string")
     {
         if(_obd.datos.indexOf('h=') != -1)
         {
            if(typeof _obd.datos == "object")
            {
               _esp = _obd.datos.get("h");
            }
            else
            {
               var _esp = 0;
               if(_obd.datos.indexOf("&")>-1)
                  _esp = _obd.datos.split("&")[0].split("=")[1];
               else
                  _esp = _obd.datos.split("=")[1];

               var prov = _obd.datos.split('&');
               for (var mm = 0; mm < prov.length; mm++) 
               {
                  var unavariable       = prov[mm].split('=');
                  _ipos[unavariable[0]] = unavariable[1];
               }
            } 
         }
         else
            return 'No se encontro el dato identificador';
     }
     else
      return 'Falta el item Datos en el objeto';
     
      if(typeof _obd.url == "undefined")
         return 'No se encontro url';

      if(typeof _obd.metodo == "undefined")
         _obd.metodo = 'post';
      else
         if(_obd.metodo != 'post')
            return 'El metodo de envio no es correcto';

      if(typeof _obd.fncP == 'undefined')
         _obd.fncP = function(prc){};
     // var file    = _obd.fileinput.files[0];
     // aca va el for
     if(typeof _obd.fileinput == "array" || typeof _obd.fileinput == "object")
     {
        for (var i = 0; i < _obd.fileinput.files.length; i++) 
        {
           var file = _obd.fileinput.files[i];
            var reader  = new FileReader();
                 reader.readAsBinaryString(file); // alternatively you can use readAsDataURL <input type="file" name="files" id="fileisto">
                 reader.onloadend = function(evt)
                 {
                    var   a = new XMLHttpRequest(); 
                          a.open(_obd.metodo, _obd.url, true);
                          a.setRequestHeader("RdigitalSeg", btoa($r.date("Ymd")));
                          
                          XMLHttpRequest.prototype.mySendAsBinary = function(text)
                          {
                             var data = new ArrayBuffer(text.length);
                             var ui8a = new Uint8Array(data, 0);
                             
                             for (var i = 0; i < text.length; i++) ui8a[i] = (text.charCodeAt(i) & 0xff);
                             
                             if(typeof window.Blob == "function")
                             {
                                var blob = new Blob([data]);
                             }
                             else
                             {
                                var   bb = new (window.MozBlobBuilder || window.WebKitBlobBuilder || window.BlobBuilder)();
                                      bb.append(data);
                                var   blob = bb.getBlob();
                             }
                             
                             this.send(blob);
                          }
                          
                          // let's track upload progress
                          var   eventSource = a.upload || a;
                                eventSource.addEventListener("progress", function(e)
                                {
                                   // get percentage of how much of the current file has been sent
                                   var position      = e.position   || e.loaded;
                                   var total         = e.totalSize  || e.total;
                                   var percentage    = Math.round((position/total)*100);
                                   // here you should write your own code how you wish to proces this
                                    _obd.fncP(percentage);
                                });
                          // state change observer - we need to know when and if the file was successfully uploaded
                          a.onreadystatechange = function()
                          {
                             if(a.readyState == 4)
                             {
                                if(a.status == 200)
                                {
                                   
                                   {
                                      try
                                      {
                                          /* Preparamos el objeto */
                                          
                                          var aa     = JSON.parse(a.responseText);
                                          _obd.datos = _obd.datos+'&aorig='+aa.archivo;
                                          var _obapi = {
                                                 "url": _obd.url, 
                                                 "metodo": _obd.metodo, 
                                                 "datos": _obd.datos,
                                                 "recibe": function(v)
                                                 {
                                                   var dt = {"po":aa, "caso":_esp, "enviado": _ipos, "v":v};
                                                   _obd.fncE(dt);
                                                 }
                                              }
                                          $r.api(_obapi);
                                          
                                      }
                                      catch(error)
                                      {
                                         console.error(error);
                                      }
                                   }
                                }
                                else
                                {
                                   console.warn(error);
                                }
                             }
                          };
                          // start sending
                          a.mySendAsBinary(evt.target.result);
                 };
        }
     }
     else
      return 'No se encontraron elementos para enviar';
   };

   $r.ajax_obj  = function(url, metodo, datos) 
   {
      var a = new XMLHttpRequest(); 
      a.open(metodo, url, true);
      a.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      a.send(datos);
      a.onreadystatechange = function (j) {
         if(a.readyState == 4 && a.status == 403)
            {
               
            }
         else if(a.readyState == 4 && a.status == 200)
         {
            
            j = JSON.parse(a.responseText);
            _recibe_ajax(j,j.termina);
         }
      };
   };
/* _________________________________________________________________________________________________________
   ___________________________    FUNCIONES UTILES DE USO DIARIO    ________________________________________
   _________________________________________________________________________________________________________ */
   $r.random      = function(min, max){return Math.floor(Math.random() * (max - min + 1)) + min;};
   $r.nl2br       = function(str, is_xhtml){var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br ' + '/>' : '<br>'; return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2'); }
   $r.utf8_decode = function(str_data){var tmp_arr = [], i = 0, ac = 0, c1 = 0, c2 = 0, c3 = 0, c4 = 0; str_data += ''; while (i < str_data.length) {c1 = str_data.charCodeAt(i); if (c1 <= 191) {tmp_arr[ac++] = String.fromCharCode(c1); i++; } else if (c1 <= 223) {c2 = str_data.charCodeAt(i + 1); tmp_arr[ac++] = String.fromCharCode(((c1 & 31) << 6) | (c2 & 63)); i += 2; } else if (c1 <= 239) {c2 = str_data.charCodeAt(i + 1); c3 = str_data.charCodeAt(i + 2); tmp_arr[ac++] = String.fromCharCode(((c1 & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63)); i += 3; } else {c2 = str_data.charCodeAt(i + 1); c3 = str_data.charCodeAt(i + 2); c4 = str_data.charCodeAt(i + 3); c1 = ((c1 & 7) << 18) | ((c2 & 63) << 12) | ((c3 & 63) << 6) | (c4 & 63); c1 -= 0x10000; tmp_arr[ac++] = String.fromCharCode(0xD800 | ((c1 >> 10) & 0x3FF)); tmp_arr[ac++] = String.fromCharCode(0xDC00 | (c1 & 0x3FF)); i += 4; } } return tmp_arr.join(''); }
   $r.serialize_node = function(elem_form, h) {_resu = '&'+$r.serialize(elem_form); _bscar      = ""; _bscar_tem  = _resu.split("&"); for(var i=1;i< _bscar_tem.length; i++) {_bscar_tem_1  = _bscar_tem[i].split("="); _bscar        += '"'+_bscar_tem_1[0] +'":"'+ _bscar_tem_1[1]+'",'; }; _bscar = _bscar.slice(0, -1); var _res = '{"h":"'+h+'",'+_bscar+'}'; delete _resu; delete _bscar; delete _bscar_tem; delete _bscar_tem_1; return _res; }
   $r.serialize   = function(form) 
   {
      if (!form || form.nodeName !== "FORM") 
         return; 
      var i, j, q = []; 
      for (i = form.elements.length - 1; i >= 0; i = i - 1) 
      {
         if (form.elements[i].name === "") 
            continue; 

         switch (form.elements[i].nodeName) 
         {
            case 'RANGE': 
            case 'INPUT': 
               switch (form.elements[i].type) 
               {
                  case 'text': 
                  case 'tel': 
                  case 'time': 
                  case 'email': 
                  case 'date': 
                  case 'number': 
                  case 'search': 
                  case 'hidden': 
                  case 'password': 
                  case 'button': 
                  case 'reset': 
                  case 'submit': 
                  case 'file': 
                  
                     (form.elements[i].type == "password") ? q.push(form.elements[i].name + "=" + btoa(encodeURIComponent(form.elements[i].value))) : q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value)); 
                  
                  break; 
                  case 'checkbox': 
                     if(form.elements[i].checked == true) 
                        q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value)); 
                     else
                        q.push(form.elements[i].name + "=" + encodeURIComponent("no"));
                  break;
                  case 'radio': 
                     if(form.elements[i].checked == true) 
                        q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value)); 
                  break; 

               } break; case 'TEXTAREA': q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value)); break; case 'SELECT': switch (form.elements[i].type) {case 'select-one': q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value)); break; case 'select-multiple': for (j = form.elements[i].options.length - 1; j >= 0; j = j - 1) {if (form.elements[i].options[j].selected) {q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].options[j].value)); } } break; } break; case 'BUTTON': switch (form.elements[i].type) {case 'reset': case 'submit': case 'button': q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value)); break; } break;
         }
      }
      return q.join("&");
   }
   $r.date        = function(format, timestamp){var that = this; var jsdate, f; var txt_words = ['Sun', 'Mon', 'Tues', 'Wednes', 'Thurs', 'Fri', 'Satur', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']; var formatChr = /\\?(.?)/gi; var formatChrCb = function(t, s) {return f[t] ? f[t]() : s; }; var _pad = function(n, c) {n = String(n); while (n.length < c) {n = '0' + n; } return n; }; f = {d: function() {return _pad(f.j(), 2); }, D: function() {return f.l() .slice(0, 3); }, j: function() {return jsdate.getDate(); }, l: function() {return txt_words[f.w()] + 'day'; }, N: function() {return f.w() || 7; }, S: function() {var j = f.j(); var i = j % 10; if (i <= 3 && parseInt((j % 100) / 10, 10) == 1) {i = 0; } return ['st', 'nd', 'rd'][i - 1] || 'th'; }, w: function() {return jsdate.getDay(); }, z: function() {var a = new Date(f.Y(), f.n() - 1, f.j()); var b = new Date(f.Y(), 0, 1); return Math.round((a - b) / 864e5); }, W: function() {var a = new Date(f.Y(), f.n() - 1, f.j() - f.N() + 3); var b = new Date(a.getFullYear(), 0, 4); return _pad(1 + Math.round((a - b) / 864e5 / 7), 2); }, F: function() {return txt_words[6 + f.n()]; }, m: function() {return _pad(f.n(), 2); }, M: function() {return f.F() .slice(0, 3); }, n: function() {return jsdate.getMonth() + 1; }, t: function() {return (new Date(f.Y(), f.n(), 0)) .getDate(); }, L: function() {var j = f.Y(); return j % 4 === 0 & j % 100 !== 0 | j % 400 === 0; }, o: function() {var n = f.n(); var W = f.W(); var Y = f.Y(); return Y + (n === 12 && W < 9 ? 1 : n === 1 && W > 9 ? -1 : 0); }, Y: function() {return jsdate.getFullYear(); }, y: function() {return f.Y() .toString() .slice(-2); }, a: function() {return jsdate.getHours() > 11 ? 'pm' : 'am'; }, A: function() {return f.a() .toUpperCase(); }, B: function() {var H = jsdate.getUTCHours() * 36e2; var i = jsdate.getUTCMinutes() * 60; var s = jsdate.getUTCSeconds(); return _pad(Math.floor((H + i + s + 36e2) / 86.4) % 1e3, 3); }, g: function() {return f.G() % 12 || 12; }, G: function() {return jsdate.getHours(); }, h: function() {return _pad(f.g(), 2); }, H: function() {return _pad(f.G(), 2); }, i: function() {return _pad(jsdate.getMinutes(), 2); }, s: function() {return _pad(jsdate.getSeconds(), 2); }, u: function() {return _pad(jsdate.getMilliseconds() * 1000, 6); }, e: function() {/*              return that.date_default_timezone_get(); */ throw 'Not supported (see source code of date() for timezone on how to add support)'; }, I: function() {var a = new Date(f.Y(), 0); var c = Date.UTC(f.Y(), 0); var b = new Date(f.Y(), 6); var d = Date.UTC(f.Y(), 6); return ((a - c) !== (b - d)) ? 1 : 0; }, O: function() {var tzo = jsdate.getTimezoneOffset(); var a = Math.abs(tzo); return (tzo > 0 ? '-' : '+') + _pad(Math.floor(a / 60) * 100 + a % 60, 4); }, P: function() {var O = f.O(); return (O.substr(0, 3) + ':' + O.substr(3, 2)); }, T: function() {return 'UTC'; }, Z: function() {return -jsdate.getTimezoneOffset() * 60; }, c: function() {return 'Y-m-d\\TH:i:sP'.replace(formatChr, formatChrCb); }, r: function() {return 'D, d M Y H:i:s O'.replace(formatChr, formatChrCb); }, U: function() {return jsdate / 1000 | 0; } }; this.date = function(format, timestamp) {that = this; jsdate = (timestamp === undefined ? new Date() : (timestamp instanceof Date) ? new Date(timestamp) : new Date(timestamp * 1000) ); return format.replace(formatChr, formatChrCb); }; return this.date(format, timestamp);};
   $r.dom         = function(){ if(typeof _e == 'object') delete _e; _e = {}; _alldm = document.querySelectorAll("*[id]"); _e.d = {}; for(var i=0; i<_alldm.length;i++) eval("_e.d."+ _alldm[i].getAttribute("id").replace(/-/g,'_') +' = _alldm[i]'); delete _alldm; };
   
   /* FUNCIONES PARA ELEMENTOS */
   $r.select      = function(q,t) {return document.querySelectorAll(q); };
   $r.create      = function(el){ return document.createElement(el);};
   
   /* FUNCIONES DE VALIDACION */
   $r.validacion,$r.valida = {
      numero:  function(n){return !isNaN(parseFloat(n)) && isFinite(n);},
      email:   function(n) { var _res = false; if(n.indexOf("@") > -1) if(n.indexOf("@.") == -1) if(n.split("@")[1].length > 3 ) if(n.split("@")[1].indexOf(".") > -1 ) _res = true; return  _res; },
      mobile:  function(ev){var check = false; (function(a) {if(/android|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(ad|hone|od)|iris|kindle|lge |maemo|meego.+mobile|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino|playbook|silk/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) {check = true } })(navigator.userAgent||navigator.vendor||window.opera); return check; },
      existe:  function(ev){ return (typeof ev != "undefined") ? {resp: true, type: typeof ev} : {resp:false} }
   }
   $r._mata_modal = 0;
   
   /* FUNCIONES CRYPTO */
   $r.sec.sha256 = function sha256(ascii) 
   {
      function rightRotate(value, amount) {
         return (value>>>amount) | (value<<(32 - amount));
      };
      
      var mathPow = Math.pow;
      var maxWord = mathPow(2, 32);
      var lengthProperty = 'length'
      var i, j; // Used as a counter across the whole file
      var result = ''
   
      var words = [];
      var asciiBitLength = ascii[lengthProperty]*8;

      var hash = sha256.h = sha256.h || [];
      var k = sha256.k = sha256.k || [];
      var primeCounter = k[lengthProperty];
      var isComposite = {};
      for (var candidate = 2; primeCounter < 64; candidate++) {
         if (!isComposite[candidate]) {
            for (i = 0; i < 313; i += candidate) {
               isComposite[i] = candidate;
            }
            hash[primeCounter] = (mathPow(candidate, .5)*maxWord)|0;
            k[primeCounter++] = (mathPow(candidate, 1/3)*maxWord)|0;
         }
      }
      
      ascii += '\x80' // Append Ƈ' bit (plus zero padding)
      while (ascii[lengthProperty]%64 - 56) ascii += '\x00' // More zero padding
      for (i = 0; i < ascii[lengthProperty]; i++) {
         j = ascii.charCodeAt(i);
         if (j>>8) return; // ASCII check: only accept characters in range 0-255
         words[i>>2] |= j << ((3 - i)%4)*8;
      }
      words[words[lengthProperty]] = ((asciiBitLength/maxWord)|0);
      words[words[lengthProperty]] = (asciiBitLength)
      
      // process each chunk
      for (j = 0; j < words[lengthProperty];) {
         var w = words.slice(j, j += 16); // The message is expanded into 64 words as part of the iteration
         var oldHash = hash;
         // This is now the undefinedworking hash", often labelled as variables a...g
         // (we have to truncate as well, otherwise extra entries at the end accumulate
         hash = hash.slice(0, 8);
         
         for (i = 0; i < 64; i++) {
            var i2 = i + j;
            // Expand the message into 64 words
            // Used below if 
            var w15 = w[i - 15], w2 = w[i - 2];
   
            // Iterate
            var a = hash[0], e = hash[4];
            var temp1 = hash[7]
               + (rightRotate(e, 6) ^ rightRotate(e, 11) ^ rightRotate(e, 25)) // S1
               + ((e&hash[5])^((~e)&hash[6])) // ch
               + k[i]
               // Expand the message schedule if needed
               + (w[i] = (i < 16) ? w[i] : (
                     w[i - 16]
                     + (rightRotate(w15, 7) ^ rightRotate(w15, 18) ^ (w15>>>3)) // s0
                     + w[i - 7]
                     + (rightRotate(w2, 17) ^ rightRotate(w2, 19) ^ (w2>>>10)) // s1
                  )|0
               );
            // This is only used once, so *could* be moved below, but it only saves 4 bytes and makes things unreadble
            var temp2 = (rightRotate(a, 2) ^ rightRotate(a, 13) ^ rightRotate(a, 22)) // S0
               + ((a&hash[1])^(a&hash[2])^(hash[1]&hash[2])); // maj
            
            hash = [(temp1 + temp2)|0].concat(hash); // We don't bother trimming off the extra ones, they're harmless as long as we're truncating when we do the slice()
            hash[4] = (hash[4] + temp1)|0;
         }
         
         for (i = 0; i < 8; i++) {
            hash[i] = (hash[i] + oldHash[i])|0;
         }
      }
      
      for (i = 0; i < 8; i++) {
         for (j = 3; j + 1; j--) {
            var b = (hash[i]>>(j*8))&255;
            result += ((b < 16) ? 0 : '') + b.toString(16);
         }
      }
      return result;
   };
   window.alert   = $r.alert = function(t,tiempo, elem)
   {
      if(typeof t == 'object')
         tiempo = t;

      if(typeof tiempo.cuerpo != 'undefined')
         t = tiempo.cuerpo;

      if(typeof tiempo == 'object')
         var attri = tiempo;
      else if(typeof tiempo == 'number')
         var attri = {"estilo":{"posicion":"br", "tipo":"neutro"}, "fnc": "", "vida":tiempo};
      else if(tiempo == undefined)
         var attri = {"estilo":{"posicion":"br", "tipo":"neutro"}, "fnc": "", "vida":3500};
      
      var _lib = {"error":new Array(), "success":new Array(), "warning":new Array()};
          
          _lib.error.push('error','problema');
          _lib.success.push('exito','correctamente');
          _lib.warning.push('ya existe','alerta');
      
      for (var ee = 0; ee < _lib.error.length; ee++) 
      {
         if(t.toLowerCase().indexOf(_lib.error[ee]) > -1)
         {
            attri.estilo.tipo = 'error';
            break;
         }
      }

      for (var ee = 0; ee < _lib.success.length; ee++) 
      {
         if(t.toLowerCase().indexOf(_lib.success[ee]) > -1)
         {
            attri.estilo.tipo = 'success';
            break;
         }
      }

      for (var ee = 0; ee < _lib.warning.length; ee++) 
      {
         if(t.toLowerCase().indexOf(_lib.warning[ee]) > -1)
         {
            attri.estilo.tipo = 'warning';
            break;
         }
      }

      
      if(elem == undefined)
         elem = {"donde":"body"};  // tl - tc - tr  bl - bc - br // neutro - warning - error - success

      var _td = document.querySelectorAll("dmalert");
      if(_td.length > 4)
      {
         if(_td[0]._fnc != "")
            _td[0]._fnc();
         _td[0].remove();
      };

            var _contenedor_modal   = document.createElement("dmalert");
                _contenedor_modal._fnc = attri.fnc;

            var _titulo_modal       = document.createElement("aside");
            _titulo_modal.innerHTML = t;

            _titulo_modal.classList.add('intra_modal');
            _contenedor_modal.setAttribute("data-dmalert",_td.length);
            _contenedor_modal.appendChild(_titulo_modal);

            _contenedor_modal.style.position = 'fixed';
            _contenedor_modal.style.width    = '100%';
            _contenedor_modal.style.maxWidth = 'unset';
            _contenedor_modal.style.zIndex   = '9999';
            _contenedor_modal.style.boxSizing= 'border-box';

            /* posiciones */
            switch (attri.estilo.posicion) 
            {
               case "br":
                  _contenedor_modal.style.bottom   = '0px';
                  _contenedor_modal.style.right    = '0px';
               break;
               case "bc":
                  _contenedor_modal.style.bottom    = '0px';
                  _contenedor_modal.style.left      = '50%';
                  _contenedor_modal.style.transform = 'translateX(-50%)';
               break;
               case "bl":
                  _contenedor_modal.style.bottom   = '0px';
                  _contenedor_modal.style.left     = '0px';
               break;
               case "tr":
                  _contenedor_modal.style.top      = '0px';
                  _contenedor_modal.style.right    = '0px';
               break;
               case "tc":
                  _contenedor_modal.style.top       = '0px';
                  _contenedor_modal.style.left      = '50%';
                  _contenedor_modal.style.transform = 'translateX(-50%)';
               break;
               case "tl":
                  _contenedor_modal.style.top      = '0px';
                  _contenedor_modal.style.left     = '0px';
               break;
               default:
                  _contenedor_modal.style.bottom   = '0px';
                  _contenedor_modal.style.right    = '0px';
               break;
            };

            /* colores */
            _contenedor_modal.style.margin       = "0";
            _contenedor_modal.style.height       = "fit-content";
            switch (attri.estilo.tipo) 
            {
               case "neutro":
                  _contenedor_modal.style.padding      = "1rem";
                  _contenedor_modal.style.fontSize     = "0.8rem";
                  _contenedor_modal.style.borderRadius = "2px";
                  _contenedor_modal.style.textAlign    = "center";
                  //_contenedor_modal.style.background   = "linear-gradient(-45deg, rgb(17 18 18) 0%, rgb(81 81 81) 100%)";
                  _contenedor_modal.style.background   = "linear-gradient(-45deg, var(--bk-rosa) 0%, var(--bk-rosa-obscuro) 100%)";
                  _contenedor_modal.style.color        = "#ffffff";
               break;
               case "error":
                  _contenedor_modal.style.padding      = "1rem";
                  _contenedor_modal.style.fontSize     = "0.8rem";
                  _contenedor_modal.style.borderRadius = "2px";
                  _contenedor_modal.style.textAlign    = "center";
                  _contenedor_modal.style.background   = "linear-gradient(135deg, rgb(247 29 29) 0%, rgb(101 10 13) 100%)";
                  _contenedor_modal.style.color        = "#ffffff";
               break;
               case "warning":
                  _contenedor_modal.style.padding      = "1rem";
                  _contenedor_modal.style.fontSize     = "0.8rem";
                  _contenedor_modal.style.borderRadius = "2px";
                  _contenedor_modal.style.textAlign    = "center";
                  _contenedor_modal.style.background   = "linear-gradient(135deg, rgb(227 218 53) 0%, rgb(99 90 11) 100%)";
                  _contenedor_modal.style.color        = "#ffffff";
               break;
               case "success":
                  _contenedor_modal.style.padding      = "1rem";
                  _contenedor_modal.style.fontSize     = "0.8rem";
                  _contenedor_modal.style.borderRadius = "2px";
                  _contenedor_modal.style.textAlign    = "center";
                  _contenedor_modal.style.background   = "linear-gradient(135deg, rgb(10 130 123) 0%, #43A047 100%)";
                  _contenedor_modal.style.color        = "#ffffff";
               break;
               case "personal":
                  _contenedor_modal.style.fontSize     = "0.9rem";
                  for( _a in attri.estilo.css)
                     _contenedor_modal.style[_a] = attri.estilo.css[_a];
               break;
            };
            
            _contenedor_modal.addEventListener('click',function(){
               if(this._fnc != "")
                  this._fnc();
               this.remove();
            
               clearTimeout(this._timeout);

               // funcion que se utiliza para acomodar la altura de los modals   
               var _td = document.querySelectorAll("dmalert");
               for (var l = 0; l < _td.length; l++) 
                     _td[l].style.bottom = (l==0) ? "0px" : Math.round( ((_td[l-1].offsetHeight + 6.5)*l) )+"px";
               delete _donde,_contenedor_modal, _titulo_modal;
            },false);
      
            document.querySelector(elem.donde).appendChild(_contenedor_modal);
            
      var _mata_modal = function(_t) 
      { 
         if(_t._fnc != "")
            _t._fnc();
         if(_t)
            _t.remove();

         var _td = document.querySelectorAll("dmalert");
         for (var l = 0; l < _td.length; l++) 
            _td[l].style.bottom = (l==0) ? "0px" : Math.round( ((_td[l-1].offsetHeight + 6.5)*l) )+"px";
      };
      $r._mata_modal  = setTimeout(_mata_modal, attri.vida, _contenedor_modal);
      
      _contenedor_modal._timeout = $r._mata_modal;

      // funcion que se utiliza para acomodar la altura de los modals   
      var _td = document.querySelectorAll("dmalert");
      for (var l = 0; l < _td.length; l++) 
            _td[l].style.bottom = (l==0) ? "0px" : Math.round( ((_td[l-1].offsetHeight + 6.5)*l) )+"px";
      delete _donde,_contenedor_modal, _titulo_modal;
   };
   
   /*
      texto.titulo
      texto.cuerpo
      btn[0].funcion
      btn[0].texto
      btn[0].clases
      btn[1].funcion
      btn[1].texto
      btn[1].clases
   */
   window.confirm = $r.confirm = function(texto, btn)
   {
      let   _idRand = `cnfrm_${$r.date("YmdHis")}`;
      let   eliminaModal = function(a)
      { 
         a.preventDefault();
         if(document.getElementById(this._idModal))
         {
            let _divMod = document.getElementById(this._idModal);
            _divMod.classList.remove("active");
            setTimeout(function(_divMod){ _divMod.remove(); },1000,_divMod);
         }
      };


      let   _divMod = $r.create("div");
            _divMod.classList.add("modal","active");
            _divMod.setAttribute("id",_idRand);

         let   _a = $r.create("a");
               _a.href = "#";
               _a.classList.add("modal-overlay");
               _a._idModal = _idRand;
               _a.addEventListener("click",eliminaModal,false);

         let   _divCon = $r.create("div");
               _divCon.classList.add("modal-container");
               _divCon.innerHTML = ``;
            
               let   _divMH = $r.create("div");
                     _divMH.classList.add("modal-header");

                     let   _aCross = $r.create("a");
                           _aCross.classList.add("btn", "btn-clear", "float-right");
                           _aCross._idModal = _idRand;
                           _aCross.addEventListener("click", eliminaModal, false);


                     _divMH.appendChild(_aCross);
                     _divMH.innerHTML +=`<div class="modal-title h5">${ (typeof texto.titulo != "undefined") ? texto.titulo : "" }</div>`;

               _divCon.appendChild(_divMH);
               _divCon.innerHTML += `<div class="modal-body">
                                       <div class="content">
                                         ${ (typeof texto.cuerpo != "undefined") ? texto.cuerpo : "" }
                                       </div>
                                     </div>`;

               let   _divMF = $r.create("div");
                     _divMF.classList.add("modal-footer","d-flex-linea");

               _divCon.appendChild(_divMF);
         for (let bti = 0; bti < btn.length; bti++) 
         {
            let _nbtn = $r.create("button");
                _nbtn.innerHTML = btn[bti].texto;
                _nbtn._idModal = _idRand;
                _nbtn.setAttribute("class",btn[bti].clases);
                _nbtn._datos = btn[bti]._datos;
                _nbtn.addEventListener("click",btn[bti].funcion,false);

            _divMF.appendChild(_nbtn);
         }

      _divMod.appendChild(_a);
      _divMod.appendChild(_divCon);

      document.getElementsByTagName("body")[0].appendChild(_divMod);
   };

   $r.cargando = function(fun)
   {
      $_cntotal++;
      var total = parseInt(document.querySelector("script[data-cargando]").getAttribute("data-cargando"));
      if(parseInt($_cntotal) == parseInt(total))
         fun();
   };
   


   /* SECTION . Carga el lenguaje de la aplicacion.
   {
      // prepara el menu
      $r.api({
         url     : `./../externos/lnges.json`,
         metodo  : 'GET',
         datos   : `h=api`,
         secure  : false,
         recibe  : function(v)
         {
            $r.lng = v
         }
      });
   }
   */