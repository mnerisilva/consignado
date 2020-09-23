var iframes = $('iframe')
var toral_videos = iframes.length
var iframe1 = iframes[0]
iframe1.closest('.pagina')
var div_class_pagina = iframe1.closest('.pagina')
var item = div_class_pagina.closest('.item')
var num_pagina = $(item).attr('data-page')
num_pagina