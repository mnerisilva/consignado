var iframes = $('iframe')
var total_de_videos = iframes.length
console.log('Total de vídeos: ' + total_de_videos)


for(var i=0;i<=4;i++){
var iframe1 = iframes[i]
iframe1.closest('.pagina')
var div_class_pagina = iframe1.closest('.pagina')
var item = div_class_pagina.closest('.item')
var num_pagina = $(item).attr('data-page')
console.log('página: ' + num_pagina)    
}

