(function(t,I,d,w){var l=d(t),u=d(I),C=d("html"),b=d.fancybox=function(){b.open.apply(this,arguments)},y=b.isTouch=I.createTouch!==w||t.ontouchstart!==w,D=function(a){return a&&a.hasOwnProperty&&a instanceof d},v=function(a){return a&&"string"===d.type(a)},E=function(a){return v(a)&&0<a.indexOf("%")},p=function(a,c){var e=parseFloat(a,10)||0;c&&E(a)&&(e*=b.getViewport()[c]/100);return Math.ceil(e)},q=function(a,b){return p(a,b)+"px"},G=Date.now||function(){return+new Date},H=function(a){var c=v(a)?
    d(a):a;if(c&&c.length){c.removeClass("fancybox-wrap").stop(!0).trigger("onReset").hide().unbind();try{c.find("iframe").unbind().attr("src",y?"":"//about:blank"),setTimeout(function(){c.empty().remove();if(b.lock&&!b.coming&&!b.current){var a,h;d(".fancybox-margin").removeClass("fancybox-margin");a=l.scrollTop();h=l.scrollLeft();C.removeClass("fancybox-lock");b.lock.remove();b.lock=null;l.scrollTop(a).scrollLeft(h)}},150)}catch(e){}}};d.extend(b,{version:"3.0.0",defaults:{theme:"default",padding:15,
    margin:[30,55,30,55],loop:!0,arrows:!0,closeBtn:!0,expander:!y,caption:{type:"outside"},overlay:{closeClick:!0,speedIn:0,speedOut:250,showEarly:!0,css:{}},helpers:{},width:800,height:450,minWidth:100,minHeight:100,maxWidth:99999,maxHeight:99999,aspectRatio:!1,fitToView:!0,autoHeight:!0,autoWidth:!0,autoResize:!0,autoCenter:!y,topRatio:.5,leftRatio:.5,openEffect:"elastic",openSpeed:350,openEasing:"easeOutQuad",closeEffect:"elastic",closeSpeed:350,closeEasing:"easeOutQuad",nextEffect:"elastic",nextSpeed:350,
    nextEasing:"easeOutQuad",prevEffect:"elastic",prevSpeed:350,prevEasing:"easeOutQuad",autoPlay:!1,playSpeed:3E3,onCancel:d.noop,beforeLoad:d.noop,afterLoad:d.noop,beforeShow:d.noop,afterShow:d.noop,beforeClose:d.noop,afterClose:d.noop,ajax:{dataType:"html",headers:{"X-fancyBox":!0}},iframe:{scrolling:"auto",preload:!0},swf:{wmode:"transparent",allowfullscreen:"true",allowscriptaccess:"always"},keys:{next:{13:"left",34:"up",39:"left",40:"up"},prev:{8:"right",33:"down",37:"right",38:"down"},close:[27],
        play:[32],toggle:[70]},direction:{next:"left",prev:"right"},tpl:{wrap:'<div class="fancybox-wrap" tabIndex="-1"><div class="fancybox-inner"></div></div>',iframe:'<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen allowtransparency="true"></iframe>',error:'<p class="fancybox-error">{{ERROR}}</p>',closeBtn:'<a title="{{CLOSE}}" class="fancybox-close" href="javascript:;"></a>',
        next:'<a title="{{NEXT}}" class="fancybox-nav fancybox-next" href="javascript:;"><span></span></a>',prev:'<a title="{{PREV}}" class="fancybox-nav fancybox-prev" href="javascript:;"><span></span></a>'},locale:"en",locales:{en:{CLOSE:"Close",NEXT:"Next",PREV:"Previous",ERROR:"The requested content cannot be loaded. <br/> Please try again later.",EXPAND:"Display actual size",SHRINK:"Fit to the viewport",PLAY_START:"Start slideshow",PLAY_STOP:"Pause slideshow"},de:{CLOSE:"Schliessen",NEXT:"Vorw\u00e4rts",
        PREV:"Zur\u00fcck",ERROR:"Die angeforderten Daten konnten nicht geladen werden. <br/> Bitte versuchen Sie es sp\u00e4ter nochmal.",EXPAND:"",SHRINK:"",PLAY_START:"",PLAY_STOP:""}},index:0,content:null,href:null,wrapCSS:"ord_form",modal:!1,locked:!0,preload:3,mouseWheel:!0,scrolling:"auto",scrollOutside:!0},current:null,coming:null,group:[],index:0,isActive:!1,isOpen:!1,isOpened:!1,isMaximized:!1,player:{timer:null,isActive:!1},ajaxLoad:null,imgPreload:null,helpers:{},open:function(a,c){a&&!1!==b.close(!0)&&
(d.isPlainObject(c)||(c={}),b.opts=d.extend(!0,{},b.defaults,c),b.populate(a),b.group.length&&b._start(b.opts.index))},populate:function(a){var c=[];d.isArray(a)||(a=[a]);d.each(a,function(e,h){var f=d.extend(!0,{},b.opts),g,k;if(d.isPlainObject(h))g=h;else if(v(h))g={href:h};else if(D(h)||"object"===d.type(h)&&h.nodeType)k=d(h),g=d(k).get(0),g.href||(g={href:h}),g=d.extend({href:k.data("fancybox-href")||k.attr("href")||g.href,title:k.data("fancybox-title")||k.attr("title")||g.title,type:k.data("fancybox-type"),
    element:k},k.data("fancybox-options"));else return;g.type||!g.content&&!g.href||(g.type=g.content?"html":b.guessType(k,g.href));k=g.type||b.opts.type;if("image"===k||"swf"===k)f.autoWidth=f.autoHeight=!1,f.scrolling="visible";"image"===k&&(f.aspectRatio=!0);"iframe"===k&&(f.autoWidth=!1,f.scrolling=y?"scroll":"visible");2>a.length&&(f.margin=30);g=d.extend(!0,{},f,g);f=g.margin;k=g.padding;"number"===d.type(f)&&(g.margin=[f,f,f,f]);"number"===d.type(k)&&(g.padding=[k,k,k,k]);g.modal&&d.extend(!0,
    g,{closeBtn:!1,closeClick:!1,nextClick:!1,arrows:!1,mouseWheel:!1,keys:null,overlay:{closeClick:!1}});g.autoSize!==w&&(g.autoWidth=g.autoHeight=!!g.autoSize);"auto"===g.width&&(g.autoWidth=!0);"auto"===g.height&&(g.autoHeight=!0);c.push(g)});b.group=b.group.concat(c)},cancel:function(){var a=b.coming;a&&!1!==b.trigger("onCancel")&&(b.hideLoading(),b.ajaxLoad&&b.ajaxLoad.abort(),b.imgPreload&&(b.imgPreload.onload=b.imgPreload.onerror=null),a.wrap&&H(a.wrap),b.ajaxLoad=b.imgPreload=b.coming=null,b.current||
b._afterZoomOut(a))},close:function(a){a&&"object"===d.type(a)&&a.preventDefault();b.cancel();b.isActive&&!b.coming&&!1!==b.trigger("beforeClose")&&(b.unbind(),b.isClosing=!0,b.lock&&b.lock.css("overflow","hidden"),b.isOpen&&!0!==a?(b.isOpen=b.isOpened=!1,b.transitions.close()):b._afterZoomOut())},prev:function(a){var c=b.current;c&&b.jumpto(c.index-1,v(a)?a:c.direction.prev)},next:function(a){var c=b.current;c&&b.jumpto(c.index+1,v(a)?a:c.direction.next)},jumpto:function(a,c){var e=b.current;b.coming&&
b.coming.index===a||(b.cancel(),e.index==a?c=null:c||(c=e.direction[a>e.index?"next":"prev"]),b.direction=c,b._start(a))}});d.extend(b,{guessType:function(a,b){var e=a&&a.prop("class")?a.prop("class").match(/fancybox\.(\w+)/):0,h=!1;if(e)return e[1];v(b)?b.match(/(^data:image\/.*,)|(\.(jp(e|g|eg)|gif|png|bmp|webp)((\?|#).*)?$)/i)?h="image":b.match(/\.(swf)((\?|#).*)?$/i)?h="swf":"#"===b.charAt(0)&&(h="inline"):v(a)&&(h="html");return h},trigger:function(a,c){var e,h=c||b.coming||b.current;if(h){d.isFunction(h[a])&&
(e=h[a].apply(h,Array.prototype.slice.call(arguments,1)));if(!1===e||"afterClose"===a&&b.isActive)return!1;h.helpers&&d.each(h.helpers,function(c,e){var k=b.helpers[c],n;e&&k&&d.isFunction(k[a])&&(n=d.extend(!0,{},k.defaults,e),k.opts=n,k[a](n,h))});d.event.trigger(a)}},reposition:function(a,c){var e=c||b.current,h=e&&e.wrap;b.isOpen&&h&&(e=b._getPosition(e),!1===a||a&&"scroll"===a.type?h.stop(!0).animate(e,200).css("overflow","visible"):h.css(e))},update:function(a){var c=a&&a.type;G();var e=b.current;
    e&&b.isOpen&&("scroll"===c?b.wrap.outerHeight(!0)>b.getViewport().h||(b.didUpdate&&clearTimeout(b.didUpdate),b.didUpdate=setTimeout(function(){b.reposition(a);b.didUpdate=null},50)):(b.lock&&b.lock.css("overflow","hidden"),b._setDimension(),b.reposition(a),b.lock&&b.lock.css("overflow","auto"),"float"===e.caption.type&&(c=b.getViewport().w-(b.wrap.outerWidth(!0)-b.inner.width()),e.caption.wrap.css("width",c).css("marginLeft",-1*(.5*c-.5*b.inner.width()))),e.expander&&(e.canShrink?d(".fancybox-expand").show().attr("title",
        e.locales[e.locale].SHRINK):e.canExpand?d(".fancybox-expand").show().attr("title",e.locales[e.locale].EXPAND):d(".fancybox-expand").hide()),b.trigger("onUpdate")))},toggle:function(a){b.current&&b.isOpen&&(b.current.fitToView="boolean"===d.type(a)?a:!b.current.fitToView,b.update(!0))},hideLoading:function(){d("#fancybox-loading").remove()},showLoading:function(){var a,c;b.hideLoading();a=d('<div id="fancybox-loading"></div>').click(b.cancel).appendTo("body");b.defaults.fixed||(c=b.getViewport(),a.css({position:"absolute",
    top:.5*c.h+c.y,left:.5*c.w+c.x}))},getViewport:function(){return b.lock?{x:b.lock.scrollLeft(),y:b.lock.scrollTop(),w:b.lock[0].clientWidth,h:b.lock[0].clientHeight}:{x:l.scrollLeft(),y:l.scrollTop(),w:y&&t.innerWidth?t.innerWidth:l.width(),h:y&&t.innerHeight?t.innerHeight:l.height()}},unbind:function(){D(b.wrap)&&b.wrap.unbind(".fb");D(b.inner)&&b.inner.unbind(".fb");u.unbind(".fb");l.unbind(".fb")},rebind:function(){var a=b.current,c;b.unbind();a&&b.isOpen&&(l.bind("orientationchange.fb"+(y?"":
        " resize.fb")+(a.autoCenter&&!a.locked?" scroll.fb":""),b.update),(c=a.keys)&&u.bind("keydown.fb",function(e){var h=e.which||e.keyCode,f=e.target||e.srcElement;if(27===h&&b.coming)return!1;e.ctrlKey||e.altKey||e.shiftKey||e.metaKey||f&&(f.type||d(f).is("[contenteditable]"))||d.each(c,function(c,f){if(f[h]!==w){e.preventDefault();if(1<a.group.length)b[c](f[h]);return!1}if(-1<d.inArray(h,f)){e.preventDefault();if("play"===c)b.slideshow.toggle();else b[c]();return!1}})}),b.lastScroll=G(),a.mouseWheel&&
1<b.group.length&&b.wrap.bind("DOMMouseScroll.fb mousewheel.fb MozMousePixelScroll.fb",function(a){a=a.originalEvent;var c=a.target||0,f=a.wheelDelta||a.detail||0,g=a.wheelDeltaX||0,d=a.wheelDeltaY||0,n=G();c&&c.style&&(!c.style.overflow||"hidden"!==c.style.overflow)&&(c.clientWidth&&c.scrollWidth>c.clientWidth||c.clientHeight&&c.scrollHeight>c.clientHeight)||0===f||b.current&&b.current.canShrink||(a.stopPropagation(),b.lastScroll&&80>n-b.lastScroll?b.lastScroll=n:(b.lastScroll=n,a.axis&&(a.axis===
a.HORIZONTAL_AXIS?g=-1*f:a.axis===a.VERTICAL_AXIS&&(d=-1*f)),0===g?0<d?b.prev("down"):b.next("up"):0<g?b.prev("right"):b.next("left")))}),b.touch.init())},rebuild:function(){var a=b.current;a.wrap.find(".fancybox-nav, .fancybox-close, .fancybox-expand").remove();a.arrows&&1<b.group.length&&((a.loop||0<a.index)&&d(b._translate(a.tpl.prev)).appendTo(b.inner).bind("click.fb",b.prev),(a.loop||a.index<b.group.length-1)&&d(b._translate(a.tpl.next)).appendTo(b.inner).bind("click.fb",b.next));a.closeBtn&&
d(b._translate(a.tpl.closeBtn)).appendTo(b.wrap).bind("click.fb",b.close);a.expander&&"image"===a.type&&d('<a title="Expand image" class="fancybox-expand" href="javascript:;"></a>').appendTo(b.inner).bind("click.fb",b.toggle)},_start:function(a){var c;b.opts.loop&&(0>a&&(a=b.group.length+a%b.group.length),a%=b.group.length);c=b.group[a];if(!c)return!1;c=d.extend(!0,{},b.opts,c);c.group=b.group;c.index=a;b.coming=c;!1===b.trigger("beforeLoad")?b.coming=null:(b.isActive=!0,b._build(),u.bind("keydown.loading",
    function(a){27===(a.which||a.keyCode)&&(u.unbind(".loading"),a.preventDefault(),b.cancel())}),c.overlay&&c.overlay.showEarly&&b.overlay.open(c.overlay),a=c.type,"image"===a?b._loadImage():"ajax"===a?b._loadAjax():"iframe"===a?b._loadIframe():"inline"===a?b._loadInline():"html"===a||"swf"===a?b._afterLoad():b._error())},_build:function(){var a=b.coming,c=a.caption.type,e;a.wrap=e=d('<div class="fancybox-wrap"></div>').appendTo(a.parent||"body").addClass("fancybox-"+a.theme);a.inner=d('<div class="fancybox-inner"></div>').appendTo(e);
    a["outside"===c||"float"===c?"inner":"wrap"].addClass("fancybox-skin fancybox-"+a.theme+"-skin");if(a.locked&&a.overlay&&b.defaults.fixed){b.lock||(b.lock=d('<div id="fancybox-lock"></div>').appendTo(e.parent()));b.lock.unbind().append(e);a.overlay.closeClick&&b.lock.click(function(a){d(a.target).is(b.lock)&&b.close()});if(u.height()>l.height()||"scroll"===C.css("overflow-y"))d("*:visible").filter(function(){return"fixed"===d(this).css("position")&&!d(this).hasClass("fancybox-overlay")&&"fancybox-lock"!==
        d(this).attr("id")}).addClass("fancybox-margin"),C.addClass("fancybox-margin");a=l.scrollTop();c=l.scrollLeft();C.addClass("fancybox-lock");l.scrollTop(a).scrollLeft(c)}b.trigger("onReady")},_error:function(a){b.coming&&(d.extend(b.coming,{type:"html",autoWidth:!0,autoHeight:!0,closeBtn:!0,minWidth:0,minHeight:0,padding:[15,15,15,15],scrolling:"visible",hasError:a,content:b._translate(b.coming.tpl.error)}),b._afterLoad())},_loadImage:function(){var a=b.imgPreload=new Image;a.onload=function(){this.onload=
    this.onerror=null;d.extend(b.coming,{width:this.width,height:this.height,content:d(this).addClass("fancybox-image")});b._afterLoad()};a.onerror=function(){this.onload=this.onerror=null;b._error("image")};a.src=b.coming.href;(!0!==a.complete||1>a.width)&&b.showLoading()},_loadAjax:function(){var a=b.coming,c=a.href,e,h;e=c.split(/\s+/,2);c=e.shift();h=e.shift();b.showLoading();b.ajaxLoad=d.ajax(d.extend({},a.ajax,{url:a.href,error:function(a,c){b.coming&&"abort"!==c?b._error("ajax",a):b.hideLoading()},
    success:function(c,e){"success"===e&&(h&&(c=d("<div>").html(c).find(h)),a.content=c,b._afterLoad())}}))},_loadIframe:function(){var a=b.coming,c;a.content=c=d(a.tpl.iframe.replace(/\{rnd\}/g,(new Date).getTime())).attr("scrolling",y?"auto":a.iframe.scrolling);a.iframe.preload&&(b.showLoading(),b._setDimension(a),a.wrap.addClass("fancybox-tmp"),c.one("load.fb",function(){a.iframe.preload&&(d(this).data("ready",1),d(this).bind("load.fb",b.update),b._afterLoad())}));c.attr("src",a.href).appendTo(a.inner);
    a.iframe.preload?1!==c.data("ready")&&b.showLoading():b._afterLoad()},_loadInline:function(){var a=b.coming,c=a.href;a.content=d(v(c)?c.replace(/.*(?=#[^\s]+$)/,""):c);a.content.length?b._afterLoad():b._error()},_preloadImages:function(){var a=b.group,c=b.current,e=a.length,h=c.preload?Math.min(c.preload,e-1):0,f,g;for(g=1;g<=h;g+=1)(f=a[(c.index+g)%e])&&"image"===f.type&&f.href&&((new Image).src=f.href)},_afterLoad:function(){var a=b.coming,c=b.current;u.unbind(".loading");a&&!1!==b.isActive&&!1!==
b.trigger("afterLoad",a,c)?(d.extend(b,{wrap:a.wrap.addClass("fancybox-type-"+a.type+" fancybox-"+(y?"mobile":"desktop")+" fancybox-"+a.theme+"-"+(y?"mobile":"desktop")+" "+a.wrapCSS),inner:a.inner,current:a,previous:c}),b._prepare(),b.trigger("beforeShow",a,c),b.isOpen=!1,b.coming=null,b._setDimension(),b.hideLoading(),a.overlay&&!b.overlay.el&&b.overlay.open(a.overlay),b.transitions.open()):(b.hideLoading(),a&&a.wrap&&H(a.wrap),c||b._afterZoomOut(a),b.coming=null)},_prepare:function(){var a=b.current,
    c=a.content||"",e=a.wrap,h=a.inner,f=a.margin,g=a.padding,k=a.href,n=a.type,r=a.title,m=a.caption.type,p;"iframe"!==n&&D(c)&&c.length&&(c.data("fancybox-placeholder")||c.data("fancybox-display",c.css("display")).data("fancybox-placeholder",d('<div class="fancybox-placeholder"></div>').insertAfter(c).hide()),c=c.show().detach(),a.wrap.bind("onReset",function(){d(this).find(c).length&&c.css("display",c.data("fancybox-display")).replaceAll(c.data("fancybox-placeholder")).data("fancybox-placeholder",
    !1).data("fancybox-display",!1)}));"swf"===n&&(c='<object id="fancybox-swf" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="100%" height="100%"><param name="movie" value="'+k+'"></param>',p="",d.each(a.swf,function(a,b){c+='<param name="'+a+'" value="'+b+'"></param>';p+=" "+a+'="'+b+'"'}),c+='<embed src="'+k+'" type="application/x-shockwave-flash" width="100%" height="100%"'+p+"></embed></object>");D(c)&&c.parent().is(a.inner)||(a.inner.append(c),a.content=a.inner.children(":last"));d.each(["Top",
    "Right","Bottom","Left"],function(a,b){f[a]&&e.css("margin"+b,q(f[a]));g[a]&&("Bottom"===b&&"outside"===m||e.css("padding"+b,q(g[a])),"outside"===m||"float"===m)&&(h.css("border"+b+"Width",q(g[a])),"Top"!==b&&"Left"!==b||h.css("margin"+b,q(-1*g[a])))});d.isFunction(r)&&(r=r.call(a.element,a));v(r)&&""!==d.trim(r)&&(a.caption.wrap=d('<div class="fancybox-title fancybox-title-'+m+'-wrap">'+r+"</div>").appendTo(a["over"===m?"inner":"wrap"]),"float"===m&&a.caption.wrap.width(b.getViewport().w-(b.wrap.outerWidth(!0)-
    b.inner.width())).wrapInner("<div></div>"))},_setDimension:function(a){var c=b.getViewport();a=a||b.current;var e=a.wrap,h=a.inner,f=a.width,g=a.height,d=a.minWidth,n=a.minHeight,r=a.maxWidth,m=a.maxHeight,l=a.margin,u=a.scrollOutside?a.scrollbarWidth:0,l=a.margin,z=a.padding,x=a.scrolling,y=1,v,B,t,w,A,F,x=x.split(",");v=x[0];x=x[1]||v;a.inner.css("overflow-x","yes"===v?"scroll":"no"===v?"hidden":v).css("overflow-y","yes"===x?"scroll":"no"===x?"hidden":x);x=l[1]+l[3]+z[1]+z[3];B=l[0]+l[2]+z[0]+z[2];
    d=p(E(d)?p(d,"w")-x:d);r=p(E(r)?p(r,"w")-x:r);n=p(E(n)?p(n,"h")-B:n);m=p(E(m)?p(m,"h")-B:m);l=p(E(f)?p(f,"w")-x:f);z=p(E(g)?p(g,"h")-B:g);a.fitToView&&(r=Math.min(r,p("100%","w")-x),m=Math.min(m,p("100%","h")-B));B=c.w;c=c.h;if("iframe"===a.type){if(w=a.content,e.removeClass("fancybox-tmp"),(a.autoWidth||a.autoHeight)&&w&&1===w.data("ready"))try{w[0].contentWindow&&w[0].contentWindow.document.location&&(A=w.contents().find("body"),h.addClass("fancybox-tmp"),h.width(screen.width-x).height(99999),u&&
    A.css("overflow-x","hidden"),a.autoWidth&&(l=A.outerWidth(!0)),a.autoHeight&&(z=A.outerHeight(!0)),h.removeClass("fancybox-tmp"))}catch(C){}}else(a.autoWidth||a.autoHeight)&&"image"!==a.type&&"swf"!==a.type&&(h.addClass("fancybox-tmp"),a.autoWidth?h.width("auto"):h.width(r),a.autoHeight?h.height("auto"):h.height(m),a.autoWidth&&(l=h[0].scrollWidth||h.width()),a.autoHeight&&(z=h[0].scrollHeight||h.height()),h.removeClass("fancybox-tmp"));f=l;g=z;t=l/z;if(a.autoResize){a.aspectRatio?(f>r&&(f=r,g=f/
        t),g>m&&(g=m,f=g*t),f<d&&(f=d,g=f/t),g<n&&(g=n,f=g*t)):(f=Math.max(d,Math.min(f,r)),a.autoHeight&&"iframe"!==a.type&&(h.width(f),z=g=h[0].scrollHeight),g=Math.max(n,Math.min(g,m)));e.css({width:q(f),height:"auto"});h.css({width:q(f),height:q(g)});A=p(e.outerWidth(!0));F=p(e.outerHeight(!0));if(a.fitToView)if(a.aspectRatio)for(;(A>B||F>c)&&f>d&&g>n&&!(30<y++);)g=Math.max(n,Math.min(m,g-10)),f=p(g*t),f<d&&(f=d,g=p(f/t)),f>r&&(f=r,g=p(f/t)),e.css({width:q(f)}),h.css({width:q(f),height:q(g)}),A=p(e.outerWidth(!0)),
        F=p(e.outerHeight(!0));else f=Math.max(d,Math.min(f,f-(A-B))),g=Math.max(n,Math.min(g,g-(F-c)));u&&"auto"===v&&(g<h[0].scrollHeight||D(a.content)&&a.content[0]&&g<a.content[0].offsetHeight)&&f+x+u<r&&(f+=u);e.css({width:f});h.css({width:q(f),height:q(g)});A=p(e.outerWidth(!0));F=p(e.outerHeight(!0));e=(A<B||F<c)&&(a.aspectRatio?f<r&&g<m&&f<l&&g<z:(f<r||g<m)&&(f<l||g<z));a.canShrink=(A>B||F>c)&&f>d&&g>n;a.canExpand=e;!w&&a.autoHeight&&g>n&&g<m&&!e&&h.height("auto")}else e.css({width:q(f),height:"auto"}),
        h.css({width:q(f),height:q(g)})},_getPosition:function(a){a=a||b.current;var c=a.wrap,e=b.getViewport(),d={},d=e.y,f=e.x;return d={top:q(Math.max(d,d+(e.h-c.outerHeight(!0))*a.topRatio)),left:q(Math.max(f,f+(e.w-c.outerWidth(!0))*a.leftRatio)),width:q(c.width()),height:q(c.height())}},_afterZoomIn:function(){var a=b.current;a&&(b.lock&&b.lock.css("overflow","auto"),b.isOpen=b.isOpened=!0,b.rebuild(),b.rebind(),a.caption&&a.caption.wrap&&a.caption.wrap.show().css({visibility:"visible",opacity:0,left:0}).animate({opacity:1},
    "fast"),b.update(),b.wrap.css("overflow","visible").addClass("fancybox-open").focus(),b[b.wrap.hasClass("fancybox-skin")?"wrap":"inner"].addClass("fancybox-"+a.theme+"-skin-open"),a.caption&&a.caption.wrap&&a.caption.wrap.show().css("left",0).animate({opacity:1},"fast"),0<a.margin[2]&&d('<div class="fancybox-spacer"></div>').css("height",q(a.margin[2]-2)).appendTo(b.wrap),b.trigger("afterShow"),b._preloadImages(),a.autoPlay&&!b.slideshow.isActive&&b.slideshow.start())},_afterZoomOut:function(a){var c=
    function(){H(".fancybox-wrap")};b.hideLoading();(a=a||b.current)&&a.wrap&&a.wrap.hide();d.extend(b,{group:[],opts:{},coming:null,current:null,isActive:!1,isOpened:!1,isOpen:!1,isClosing:!1,wrap:null,skin:null,inner:null});b.trigger("afterClose",a);b.coming||b.current||(a.overlay?b.overlay.close(a.overlay,c):c())},_translate:function(a){var c=b.coming||b.current,e=c.locales[c.locale];return a.replace(/\{\{(\w+)\}\}/g,function(a,b){var c=e[b];return c===w?a:c})}});b.transitions={_getOrig:function(a){a=
    a||b.current;var c=a.wrap,e=a.element,d=a.orig,f=b.getViewport(),g={},k=50,n=50;!d&&e&&e.is(":visible")&&(d=e.find("img:first:visible"),d.length||(d=e));!d&&a.group[0].element&&(d=a.group[0].element.find("img:visible:first"));D(d)&&d.is(":visible")?(g=d.offset(),d.is("img")&&(k=d.outerWidth(),n=d.outerHeight()),b.lock&&(g.top-=l.scrollTop(),g.left-=l.scrollLeft())):(g.top=f.y+(f.h-n)*a.topRatio,g.left=f.x+(f.w-k)*a.leftRatio);return g={top:q(g.top-.5*(c.outerHeight(!0)-c.height())),left:q(g.left-
    .5*(c.outerWidth(!0)-c.width())),width:q(k),height:q(n)}},_getCenter:function(a){a=a||b.current;var c=a.wrap,e=b.getViewport(),d={},d=e.y,f=e.x;return d={top:q(Math.max(d,d+(e.h-c.outerHeight(!0))*a.topRatio)),left:q(Math.max(f,f+(e.w-c.outerWidth(!0))*a.leftRatio)),width:q(c.width()),height:q(c.height())}},_prepare:function(a,c){var d=a||b.current,h=d.wrap,d=d.inner;h.height(h.height());d.css({width:100*d.width()/h.width()+"%",height:Math.floor(100*d.height()/h.height()*100)/100+"%"});!0===c&&h.find(".fancybox-title, .fancybox-spacer, .fancybox-close, .fancybox-nav").remove();
    d.css("overflow","hidden")},fade:function(a,b){var e=this._getCenter(a),h={opacity:0};return"open"===b||"changeIn"===b?[d.extend(e,h),{opacity:1}]:[{},h]},drop:function(a,c){var e=d.extend(this._getCenter(a),{opacity:1}),h=d.extend({},e,{opacity:0,top:q(Math.max(b.getViewport().y-a.margin[0],p(e.top)-200))});return"open"===c||"changeIn"===c?[h,e]:[{},h]},elastic:function(a,c){var e=a.wrap,h=a.margin,f=b.getViewport(),g=b.direction,k=this._getCenter(a),n=d.extend({},k),k=d.extend({},k),l,m;"open"===
c?n=this._getOrig(a):"close"===c?(n={},k=this._getOrig(a)):g&&(l="up"===g||"down"===g?"top":"left",m="up"===g||"left"===g?200:-200,"changeIn"===c?(m=p(n[l])+m,m="left"===g?Math.min(m,f.x+f.w-h[3]-e.outerWidth()-1):"right"===g?Math.max(m,f.x-h[1]):"up"===g?Math.min(m,f.y+f.h-h[0]-e.outerHeight()-1):Math.max(m,f.y-h[2]),n[l]=m):(m=p(e.css(l))-m,n={},m="left"===g?Math.max(m,f.x-h[3]):"right"===g?Math.min(m,f.x+f.w-h[1]-e.outerWidth()-1):"up"===g?Math.max(m,f.y-h[0]):Math.min(m,f.y+f.h-h[2]-e.outerHeight()-
    1),k[l]=m));"open"===c||"changeIn"===c?(n.opacity=0,k.opacity=1):k.opacity=0;return[n,k]},open:function(){var a=b.current,c=b.previous,e,h,f,g;c&&c.wrap.stop(!0).removeClass("fancybox-opened");b.isOpened?(e=a.nextEffect,f=a.nextSpeed,g=a.nextEasing,h="changeIn"):(e=a.openEffect,f=a.openSpeed,g=a.openEasing,h="open");"none"===e?b._afterZoomIn():(h=this[e](a,h),"elastic"===e&&this._prepare(a),a.wrap.css(h[0]),a.wrap.animate(h[1],f,g,b._afterZoomIn));c&&(b.isOpened&&"none"!==c.prevEffect?(c.wrap.stop(!0).removeClass("fancybox-opened"),
    h=this[c.prevEffect](c,"changeOut"),this._prepare(c,!0),c.wrap.animate(h[1],c.prevSpeed,c.prevEasing,function(){H(c.wrap)})):H(d(".fancybox-wrap").not(a.wrap)))},close:function(){var a=b.current,c=a.wrap.stop(!0).removeClass("fancybox-opened"),d=a.closeEffect;if("none"===d)return b._afterZoomOut();this._prepare(a,!0);d=this[d](a,"close");c.addClass("fancybox-animating").animate(d[1],a.closeSpeed,a.closeEasing,b._afterZoomOut)}};b.slideshow={_clear:function(){this._timer&&clearTimeout(this._timer)},
    _set:function(){this._clear();b.current&&this.isActive&&(this._timer=setTimeout(b.next,this._speed))},_timer:null,_speed:null,isActive:!1,start:function(a){var c=b.current;c&&(c.loop||c.index<c.group.length-1)&&(this.stop(),this.isActive=!0,this._speed=a||c.playSpeed,u.bind({"beforeLoad.player":d.proxy(this._clear,this),"onUpdate.player":d.proxy(this._set,this),"onCancel.player beforeClose.player":d.proxy(this.stop,this)}),this._set(),b.trigger("onPlayStart"))},stop:function(){this._clear();u.unbind(".player");
        this.isActive=!1;this._timer=this._speed=null;b.trigger("onPlayEnd")},toggle:function(){this.isActive?this.stop():this.start.apply(this,arguments)}};b.overlay={el:null,theme:"",open:function(a){var c=this,e=this.el,h=b.defaults.fixed,f;a=d.extend({},b.defaults.overlay,a);e?e.stop(!0).removeAttr("style").unbind(".overlay"):e=d('<div class="fancybox-overlay'+(h?" fancybox-overlay-fixed":"")+'"></div>').appendTo(a.parent||"body");a.closeClick&&e.bind("click.overlay",function(a){if(b.lastTouch&&300>G()-
    b.lastTouch)return!1;b.isActive?b.close():c.close();return!1});f=a.theme||(b.coming?b.coming.theme:"default");f!==this.theme&&e.removeClass("fancybox-"+this.theme+"-overlay");this.theme=f;e.addClass("fancybox-"+f+"-overlay").css(a.css);f=e.css("opacity");!this.el&&1>f&&a.speedIn&&e.css({opacity:0,filter:"alpha(opacity=0)"}).fadeTo(a.speedIn,f);this.el=e;h||(l.bind("resize.overlay",d.proxy(this.update,this)),this.update())},close:function(a,c){a=d.extend({},b.defaults.overlay,a);this.el&&this.el.stop(!0).fadeOut(a.speedOut,
    function(){l.unbind("resize.overlay");d(".fancybox-overlay").remove();b.overlay.el=null;d.isFunction(c)&&c()})},update:function(){this.el.css({width:"100%",height:"100%"});this.el.width(u.width()).height(u.height())}};b.touch={startX:0,wrapX:0,dx:0,isMoving:!1,_start:function(a){var c=a.originalEvent.touches?a.originalEvent.touches[0]:a,e=G();if(b.isOpen&&!b.wrap.is(":animated")&&(d(a.target).is(b.inner)||d(a.target).parent().is(b.inner))){if(b.lastTouch&&300>e-b.lastTouch)return a.preventDefault(),
    b.lastTouch=e,this._cancel(!0),b.toggle(),!1;b.lastTouch=e;b.wrap&&b.wrap.outerWidth()>b.getViewport().w||(a.preventDefault(),c&&b.wrap&&b.wrap.outerWidth()<b.getViewport().w&&(this.startX=c.pageX,this.wrapX=b.wrap.position().left,this.isMoving=!0,b.inner.bind("touchmove.fb",d.proxy(this._move,this)).one("touchend.fb touchcancel.fb",d.proxy(this._cancel,this))))}},_move:function(a){var c=this.startX-(a.originalEvent.touches?a.originalEvent.touches[0]:a).pageX;this.isMoving&&b.isOpen&&(this.dx=c,b.current.wrap.outerWidth(!0)<=
l.width()&&(50<=Math.abs(c)?(a.preventDefault(),this.last=0,this._cancel(!0),0<c?b.next("left"):b.prev("right")):3<Math.abs(c)&&(a.preventDefault(),this.last=0,b.wrap.css("left",this.wrapX-c))))},_clear:function(){this.startX=this.wrapX=this.dx=0;this.isMoving=!1},_cancel:function(a){b.inner&&b.inner.unbind("touchmove.fb");b.isOpen&&3<Math.abs(this.dx)&&b.reposition(!1);this._clear()},init:function(){b.inner&&b.touch&&(this._cancel(!0),b.inner.bind("touchstart.fb",d.proxy(this._start,this)))}};d.easing.easeOutQuad||
(d.easing.easeOutQuad=function(a,b,d,h,f){return-h*(b/=f)*(b-2)+d});u.ready(function(){var a,c,e,h;d.scrollbarWidth===w&&(d.scrollbarWidth=function(){var a=d('<div style="width:50px;height:50px;overflow:auto"><div/></div>').appendTo("body"),b=a.children(),b=b.innerWidth()-b.height(99).innerWidth();a.remove();return b});d.support.fixedPosition===w&&(d.support.fixedPosition=function(){var a=d('<div style="position:fixed;top:20px;padding:0;margin:0;border:0;"></div>').appendTo("body"),b="fixed"===a.css("position")&&
    (18<a[0].offsetTop&&22>a[0].offsetTop||15===a[0].offsetTop);a.remove();return b}());d.extend(b.defaults,{scrollbarWidth:d.scrollbarWidth(),fixed:d.support.fixedPosition,parent:d("body")});e=l.scrollTop();h=l.scrollLeft();a=d(t).width();C.addClass("fancybox-lock-test");c=d(t).width();C.removeClass("fancybox-lock-test");l.scrollTop(e).scrollLeft(h);b.lockMargin=c-a;d("<style type='text/css'>.fancybox-margin{margin-right:"+b.lockMargin+"px;}</style>").appendTo("head")});d.fn.fancybox=function(a){var c=
    this,e=this.length?this.selector:!1,h=e&&0>e.indexOf("()")&&!(a&&!1===a.live),f=function(f){var k=h?d(e):c,n=d(this).blur(),l=a.groupAttr||"data-fancybox-group",m=n.attr(l),p=this.rel;!m&&p&&"nofollow"!==p&&(l="rel",m=p);m&&(n=k.filter("["+l+'="'+m+'"]'),a.index=n.index(this));n.length&&(f.preventDefault(),b.open(n.get(),a))};a=a||{};h?u.undelegate(e,"click.fb-start").delegate(e+":not('.fancybox-close,.fancybox-nav,.fancybox-wrap')","click.fb-start",f):c.unbind("click.fb-start").bind("click.fb-start",
    f);return this}})(window,document,jQuery);