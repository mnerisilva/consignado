
clear()
var iframes = $('body iframe.embed-responsive-item')
var total_de_videos = iframes.length
console.log('Total de vídeos: ' + total_de_videos)

for(var i=0;i<total_de_videos;i++){
var iframe1 = iframes[i]
//iframe1.closest('.pagina') 
var div_class_pagina = iframe1.closest('.pagina')
       
        if(div_class_pagina != null || div_class_pagina == 'undefined' || div_class_pagina == ''){             
            var item = div_class_pagina.closest('.item')              
            var num_pagina = $(item).attr('data-page')
            console.log((i+1)+' - página: ' + num_pagina) 
       }
   
}

var quant_videos_popups = $('.popup-holders iframe');
console.log('quant_videos_popups: '+quant_videos_popups.length)

var quant_videos_popups_atividades = $('.popup-atividades iframe')
console.log('quant_videos_popups_atividades: '+quant_videos_popups_atividades.length)