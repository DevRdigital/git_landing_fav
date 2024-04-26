(function(){
    $r.dom();
})();

/** Scrolling de links de header */
{
    let data_link = $r.select('a[data-link]');
    
    for (let links = 0; links < data_link.length; links++) {
        $r.evento('click', data_link[links], function(a) {
            a.preventDefault();
            
            _e.d.cnt_navegador_mobile.classList.add('no-active-nav');

            let ancla = $r.select(this.getAttribute('href'))[0];
    
                ancla.scrollIntoView({
                    behavior: "smooth",
                    block: "start",
                    inline: "center"
                });
        });
    }
}