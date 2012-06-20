<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" class="no-js">
<head>
  <!--[if lt IE 9]> <style>
  @font-face {
    font-family: Exotic;
  src: url(./exotic.woff);
  }
  </style> <![endif]-->
  <!--<script src="http://code.angularjs.org/1.0.0rc7/angular-1.0.0rc7.min.js"></script>-->
  <meta name="viewport" content="width=device-width">
  <meta name = "viewport" content = "initial-scale = 1.0,
  maximum-scale=1,
  minimum-scale=1">
  <link rel="shortcut icon" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/Icon.png">
<link rel="apple-touch-icon" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/Icon.png">
  <link rel="prefetch" href="<?php echo $this->baseurl ?>/index.php"> <!-- Firefox -->
  <link rel="prerender" href="<?php echo $this->baseurl ?>/index.php"> <!-- Chrome -->
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template.css" type="text/css" />
  <meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<jdoc:include type="head" />
 <script src="http://code.jquery.com/jquery-latest.js"></script>
<style>
#nav fieldset p label {
  font-size: 0px;
  padding-top: 40px;
  width: 20px; 
}

</style>
  
</head>

<body>
  
    <div id="nav">
      <button class="getmenu"><svg ><path style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); " fill="#ffffff" stroke="none" d="M21.871,9.814 15.684,16.001 21.871,22.188 18.335,25.725 8.612,16.001 18.335,6.276z" transform="matrix(1,0,0,1,4,4)"></path></svg></button>
      <jdoc:include type="modules" name="nav" />
      <jdoc:include type="modules" name="login-menu" />
    </div>
  <div class="bar"></div>
  
  <div class="unten"> 
    <jdoc:include type="modules" name="menu-left" />

    
    
    
    <div id="content" class="float">
      <jdoc:include type="component" />
    </div>
  </div> 
    
    <!-- still in work<a id="scroll-top" href="#">^</a>!-->
    
    <div id="footer">
      <jdoc:include type="modules" name="footer" />
      <div id="copyright">
        <p> Fehler gefunden? <a href="https://github.com/csicar/minimalist/issues">melde ihn!</a></p>
        <p>Copyright (c): </p>
      </div>
    </div>  
<script>
var cStyle = {
  /*****************************************************/
  menuNavicationHider: function(){
     $(".deeper .deeper > ul").addClass("hidden");
     $(".deeper .deeper > a").before('<button class="hider"></button>');
     makeK();
     $(".deeper .deeper > button").click(function(e){
         var menu = $(e.currentTarget).parent().find("> ul");
         var button = $(e.currentTarget);
         console.log(e)
         if(menu.hasClass("hidden")){
             $(menu)
                 .addClass("shown")
                 .removeClass("hidden");
             $(button)
                 .addClass("shown")
                 .removeClass("hidden");        
                
         }
         else{      
             console.log("else: "+menu.hasClass("hidden"))
             $(menu)
                 .addClass("hidden")
                 .removeClass("shown");
             $(button)
                 .addClass("hidden")
                 .removeClass("shown");
         }
         updateK() 
     });
     function updateK(){
         $(".deeper .deeper > ul").each(function(i, elem){
              localStorage[i] = $(this).hasClass("shown")
         });
     }
     function makeK(){
         $(".deeper .deeper > ul").each(function(i, elem){
             if(localStorage[i] == "true"){ 
                 $(this)
                     .addClass("shown")
                     .removeClass("hidden")
                 $(this).parent().find("button")
                     .addClass("shown")
                     .removeClass("hidden")
             }
             console.log("a")
         });
     }
  },
  /*****************************************************/
  easterEggs: {
      rischtisch: function(){
          $("#nav #modlgn-username").keyup(function(e){
              if(e.target.value == "hbgbs"){
                  alert("Rischtisch!");
              }
          })
      },
  },
  /*****************************************************/
  contentBoxes: function(){
      if($("#nav .current").text() == "Home" && $("#nav .login-greeting").length != 0){
          $('#content').addClass("inbox")  
      }
  },
  /*****************************************************/
  mobileScroll: function(){
      function scrollLeft(){    
          $(".unten .menu").removeClass("selected")
          $(".unten #content").removeClass("unselected")
          $(".getmenu").addClass("right")
          $(".getmenu").removeClass("left")
          localStorage["selection"] = "menu" 
      }
      function scrollRight(){
          $(".getmenu").removeClass("right")
          $(".getmenu").addClass("left")  
          $(".unten .menu").addClass("selected")
          $(".unten #content").addClass("unselected")
          localStorage["selection"] = "content"    
      }
      $(".getmenu").click(function(){
          console.log("click")
          if($(".unten .menu").hasClass("selected")){
              scrollLeft()
          }else{
              scrollRight()
          }    
      })      
      function chooseScroll() {
          var left = $(".unten").scrollLeft();
          var total = $(".unten").width();
          var right = total - left
          if(left > right){
              scrollLeft();
          }else{
              scrollRight();
          }
      }
      
  },
  /*****************************************************/
  winReziser: function(){
    function update(){
        var h = $(window).height()
        var fh = $("#footer").height()    
        console.log(h)
        $(".unten").css("min-height", (h-fh-1))      
    }
    $(window).resize(update)
    $(window).ready(update)
  },
  /*****************************************************/
  style: function(){
    $("modlgn_username").attr("placeholder", "Nutzername");
    $("modlgn_passwd").attr("placeholder","Passwort");  
    $('form fieldset input[type="submit"]').val("Login >>");
    $('form fieldset input[type="submit"]').addClass("login-submit");
    $('mod-search-searchword');
    $('#nav form div.search label').remove();
  },
};
$(function(){

  function handleFunction(f){
    f()
  }
  function handleObj(o){
    for(i in o){
      check(o[i])
    }
  }
  function check(d){
    if(typeof d == "function"){
      handleFunction(d)
    }
    else if(typeof d == "object"){
      handleObj(d)
    }
  }
  check(cStyle)
});
/* /* /* /*
  $(".deeper .deeper > ul").addClass("hidden");
  
  $(".deeper .deeper > a").before('<button class="hider"></button>');
   makeK();
  $(".deeper .deeper > button").click(function(e){
    var menu = $(e.currentTarget).parent().find("> ul");
    var button = $(e.currentTarget);
    console.log(e)
    if(menu.hasClass("hidden")){
         $(menu)
           .addClass("shown")
           .removeClass("hidden");
      $(button).addClass("shown")
           .removeClass("hidden");
      console.log("if")        
                  
    }else{      
      console.log("else: "+menu.hasClass("hidden"))
      $(menu)
        .addClass("hidden")
        .removeClass("shown");
      $(button).addClass("hidden")
        .removeClass("shown");
    }
     updateK() 
  });
  function updateK(){
    $(".deeper .deeper > ul").each(function(i, elem){
      localStorage[i] = $(this).hasClass("shown")
    });
  }
  function makeK(){
    $(".deeper .deeper > ul").each(function(i, elem){
      if(localStorage[i] == "true"){ 
        $(this)
          .addClass("shown")
          .removeClass("hidden")
        $(this).parent().find("button").addClass("shown")
          .removeClass("hidden")
     }
      console.log("a")
    });
  }
  $("#nav #modlgn-username").keyup(function(e){
    if(e.target.value == "hbgbs"){
      alert("Rischtisch!");
    }
  })
   
    if($("#nav .current").text() == "Home" && $("#nav .login-greeting").length != 0){
      $('#content').addClass("inbox")  
    }
  
  function scrollLeft(){    
      $(".unten .menu").removeClass("selected")
      $(".unten #content").removeClass("unselected")
      $(".getmenu").addClass("right")
      $(".getmenu").removeClass("left")
      localStorage["selection"] = "menu" 
  }
  function scrollRight(){
      $(".getmenu").removeClass("right")
      $(".getmenu").addClass("left")  
      $(".unten .menu").addClass("selected")
      $(".unten #content").addClass("unselected")
      localStorage["selection"] = "content"    
  }
  $(".getmenu").click(function(){
    console.log("click")
    if($(".unten .menu").hasClass("selected")){
      scrollLeft()
    }else{
      scrollRight()
    }    
  })
/* ==================================================================================================================== 
/**
 * jQuery.ScrollTo - Easy element scrolling using jQuery.
 * Copyright (c) 2007-2009 Ariel Flesler - aflesler(at)gmail(dot)com | http://flesler.blogspot.com
 * Dual licensed under MIT and GPL.
 * Date: 5/25/2009
 * @author Ariel Flesler
 * @version 1.4.2
 *
 * http://flesler.blogspot.com/2007/10/jqueryscrollto.html
 */
;(function(d){var k=d.scrollTo=function(a,i,e){d(window).scrollTo(a,i,e)};k.defaults={axis:'xy',duration:parseFloat(d.fn.jquery)>=1.3?0:1};k.window=function(a){return d(window)._scrollable()};d.fn._scrollable=function(){return this.map(function(){var a=this,i=!a.nodeName||d.inArray(a.nodeName.toLowerCase(),['iframe','#document','html','body'])!=-1;if(!i)return a;var e=(a.contentWindow||a).document||a.ownerDocument||a;return d.browser.safari||e.compatMode=='BackCompat'?e.body:e.documentElement})};d.fn.scrollTo=function(n,j,b){if(typeof j=='object'){b=j;j=0}if(typeof b=='function')b={onAfter:b};if(n=='max')n=9e9;b=d.extend({},k.defaults,b);j=j||b.speed||b.duration;b.queue=b.queue&&b.axis.length>1;if(b.queue)j/=2;b.offset=p(b.offset);b.over=p(b.over);return this._scrollable().each(function(){var q=this,r=d(q),f=n,s,g={},u=r.is('html,body');switch(typeof f){case'number':case'string':if(/^([+-]=)?\d+(\.\d+)?(px|%)?$/.test(f)){f=p(f);break}f=d(f,this);case'object':if(f.is||f.style)s=(f=d(f)).offset()}d.each(b.axis.split(''),function(a,i){var e=i=='x'?'Left':'Top',h=e.toLowerCase(),c='scroll'+e,l=q[c],m=k.max(q,i);if(s){g[c]=s[h]+(u?0:l-r.offset()[h]);if(b.margin){g[c]-=parseInt(f.css('margin'+e))||0;g[c]-=parseInt(f.css('border'+e+'Width'))||0}g[c]+=b.offset[h]||0;if(b.over[h])g[c]+=f[i=='x'?'width':'height']()*b.over[h]}else{var o=f[h];g[c]=o.slice&&o.slice(-1)=='%'?parseFloat(o)/100*m:o}if(/^\d+$/.test(g[c]))g[c]=g[c]<=0?0:Math.min(g[c],m);if(!a&&b.queue){if(l!=g[c])t(b.onAfterFirst);delete g[c]}});t(b.onAfter);function t(a){r.animate(g,j,b.easing,a&&function(){a.call(this,n,b)})}}).end()};k.max=function(a,i){var e=i=='x'?'Width':'Height',h='scroll'+e;if(!d(a).is('html,body'))return a[h]-d(a)[e.toLowerCase()]();var c='client'+e,l=a.ownerDocument.documentElement,m=a.ownerDocument.body;return Math.max(l[h],m[h])-Math.min(l[c],m[c])};function p(a){return typeof a=='object'?a:{top:a,left:a}}})(jQuery);

/* ====================================================================================================================
/*             
$(".unten")[0].addEventListener("touchstart", function(e){
    alert("s")
    e.preventDefault()
});
function chooseScroll() {
     var left = $(".unten").scrollLeft();
     var total = $(".unten").width();
     var right = total - left
     if(left > right){
         scrollLeft();
     }else{
         scrollRight();
     }
}
$(function(){   
    $("modlgn_username").attr("placeholder", "Nutzername");
    $("modlgn_passwd").attr("placeholder","Passwort");  
    $('form fieldset input[type="submit"]').val("Login >>");
    $('form fieldset input[type="submit"]').addClass("login-submit");
    $('mod-search-searchword');
    $('#nav form div.search label').remove();
  update();
});
  function update(){
    var h = $(window).height()
    var fh = $("#footer").height()    
    console.log(h)
    $(".unten").css("min-height", (h-fh-1))      
  }
  $(window).resize(update)*/
    </script>
  <script>
    /* Modernizr 2.5.3 (Custom Build) | MIT & BSD
 * Build: http://www.modernizr.com/download/#-fontface-backgroundsize-borderimage-borderradius-boxshadow-flexbox-flexbox_legacy-hsla-multiplebgs-opacity-rgba-textshadow-cssanimations-csscolumns-generatedcontent-cssgradients-cssreflections-csstransforms-csstransforms3d-csstransitions-inlinesvg-svg-svgclippaths-touch-shiv-mq-cssclasses-teststyles-testprop-testallprops-hasevent-prefixes-domprefixes-load
 */
;window.Modernizr=function(a,b,c){function D(a){j.cssText=a}function E(a,b){return D(n.join(a+";")+(b||""))}function F(a,b){return typeof a===b}function G(a,b){return!!~(""+a).indexOf(b)}function H(a,b){for(var d in a)if(j[a[d]]!==c)return b=="pfx"?a[d]:!0;return!1}function I(a,b,d){for(var e in a){var f=b[a[e]];if(f!==c)return d===!1?a[e]:F(f,"function")?f.bind(d||b):f}return!1}function J(a,b,c){var d=a.charAt(0).toUpperCase()+a.substr(1),e=(a+" "+p.join(d+" ")+d).split(" ");return F(b,"string")||F(b,"undefined")?H(e,b):(e=(a+" "+q.join(d+" ")+d).split(" "),I(e,b,c))}var d="2.5.3",e={},f=!0,g=b.documentElement,h="modernizr",i=b.createElement(h),j=i.style,k,l=":)",m={}.toString,n=" -webkit- -moz- -o- -ms- ".split(" "),o="Webkit Moz O ms",p=o.split(" "),q=o.toLowerCase().split(" "),r={svg:"http://www.w3.org/2000/svg"},s={},t={},u={},v=[],w=v.slice,x,y=function(a,c,d,e){var f,i,j,k=b.createElement("div"),l=b.body,m=l?l:b.createElement("body");if(parseInt(d,10))while(d--)j=b.createElement("div"),j.id=e?e[d]:h+(d+1),k.appendChild(j);return f=["&#173;","<style>",a,"</style>"].join(""),k.id=h,(l?k:m).innerHTML+=f,m.appendChild(k),l||(m.style.background="",g.appendChild(m)),i=c(k,a),l?k.parentNode.removeChild(k):m.parentNode.removeChild(m),!!i},z=function(b){var c=a.matchMedia||a.msMatchMedia;if(c)return c(b).matches;var d;return y("@media "+b+" { #"+h+" { position: absolute; } }",function(b){d=(a.getComputedStyle?getComputedStyle(b,null):b.currentStyle)["position"]=="absolute"}),d},A=function(){function d(d,e){e=e||b.createElement(a[d]||"div"),d="on"+d;var f=d in e;return f||(e.setAttribute||(e=b.createElement("div")),e.setAttribute&&e.removeAttribute&&(e.setAttribute(d,""),f=F(e[d],"function"),F(e[d],"undefined")||(e[d]=c),e.removeAttribute(d))),e=null,f}var a={select:"input",change:"input",submit:"form",reset:"form",error:"img",load:"img",abort:"img"};return d}(),B={}.hasOwnProperty,C;!F(B,"undefined")&&!F(B.call,"undefined")?C=function(a,b){return B.call(a,b)}:C=function(a,b){return b in a&&F(a.constructor.prototype[b],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(b){var c=this;if(typeof c!="function")throw new TypeError;var d=w.call(arguments,1),e=function(){if(this instanceof e){var a=function(){};a.prototype=c.prototype;var f=new a,g=c.apply(f,d.concat(w.call(arguments)));return Object(g)===g?g:f}return c.apply(b,d.concat(w.call(arguments)))};return e});var K=function(c,d){var f=c.join(""),g=d.length;y(f,function(c,d){var f=b.styleSheets[b.styleSheets.length-1],h=f?f.cssRules&&f.cssRules[0]?f.cssRules[0].cssText:f.cssText||"":"",i=c.childNodes,j={};while(g--)j[i[g].id]=i[g];e.touch="ontouchstart"in a||a.DocumentTouch&&b instanceof DocumentTouch||(j.touch&&j.touch.offsetTop)===9,e.csstransforms3d=(j.csstransforms3d&&j.csstransforms3d.offsetLeft)===9&&j.csstransforms3d.offsetHeight===3,e.generatedcontent=(j.generatedcontent&&j.generatedcontent.offsetHeight)>=1,e.fontface=/src/i.test(h)&&h.indexOf(d.split(" ")[0])===0},g,d)}(['@font-face {font-family:"font";src:url("https://")}',["@media (",n.join("touch-enabled),("),h,")","{#touch{top:9px;position:absolute}}"].join(""),["@media (",n.join("transform-3d),("),h,")","{#csstransforms3d{left:9px;position:absolute;height:3px;}}"].join(""),['#generatedcontent:after{content:"',l,'";visibility:hidden}'].join("")],["fontface","touch","csstransforms3d","generatedcontent"]);s.flexbox=function(){return J("flexOrder")},s["flexbox-legacy"]=function(){return J("boxDirection")},s.touch=function(){return e.touch},s.rgba=function(){return D("background-color:rgba(150,255,150,.5)"),G(j.backgroundColor,"rgba")},s.hsla=function(){return D("background-color:hsla(120,40%,100%,.5)"),G(j.backgroundColor,"rgba")||G(j.backgroundColor,"hsla")},s.multiplebgs=function(){return D("background:url(https://),url(https://),red url(https://)"),/(url\s*\(.*?){3}/.test(j.background)},s.backgroundsize=function(){return J("backgroundSize")},s.borderimage=function(){return J("borderImage")},s.borderradius=function(){return J("borderRadius")},s.boxshadow=function(){return J("boxShadow")},s.textshadow=function(){return b.createElement("div").style.textShadow===""},s.opacity=function(){return E("opacity:.55"),/^0.55$/.test(j.opacity)},s.cssanimations=function(){return J("animationName")},s.csscolumns=function(){return J("columnCount")},s.cssgradients=function(){var a="background-image:",b="gradient(linear,left top,right bottom,from(#9f9),to(white));",c="linear-gradient(left top,#9f9, white);";return D((a+"-webkit- ".split(" ").join(b+a)+n.join(c+a)).slice(0,-a.length)),G(j.backgroundImage,"gradient")},s.cssreflections=function(){return J("boxReflect")},s.csstransforms=function(){return!!J("transform")},s.csstransforms3d=function(){var a=!!J("perspective");return a&&"webkitPerspective"in g.style&&(a=e.csstransforms3d),a},s.csstransitions=function(){return J("transition")},s.fontface=function(){return e.fontface},s.generatedcontent=function(){return e.generatedcontent},s.svg=function(){return!!b.createElementNS&&!!b.createElementNS(r.svg,"svg").createSVGRect},s.inlinesvg=function(){var a=b.createElement("div");return a.innerHTML="<svg/>",(a.firstChild&&a.firstChild.namespaceURI)==r.svg},s.svgclippaths=function(){return!!b.createElementNS&&/SVGClipPath/.test(m.call(b.createElementNS(r.svg,"clipPath")))};for(var L in s)C(s,L)&&(x=L.toLowerCase(),e[x]=s[L](),v.push((e[x]?"":"no-")+x));return D(""),i=k=null,function(a,b){function g(a,b){var c=a.createElement("p"),d=a.getElementsByTagName("head")[0]||a.documentElement;return c.innerHTML="x<style>"+b+"</style>",d.insertBefore(c.lastChild,d.firstChild)}function h(){var a=k.elements;return typeof a=="string"?a.split(" "):a}function i(a){var b={},c=a.createElement,e=a.createDocumentFragment,f=e();a.createElement=function(a){var e=(b[a]||(b[a]=c(a))).cloneNode();return k.shivMethods&&e.canHaveChildren&&!d.test(a)?f.appendChild(e):e},a.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+h().join().replace(/\w+/g,function(a){return b[a]=c(a),f.createElement(a),'c("'+a+'")'})+");return n}")(k,f)}function j(a){var b;return a.documentShived?a:(k.shivCSS&&!e&&(b=!!g(a,"article,aside,details,figcaption,figure,footer,header,hgroup,nav,section{display:block}audio{display:none}canvas,video{display:inline-block;*display:inline;*zoom:1}[hidden]{display:none}audio[controls]{display:inline-block;*display:inline;*zoom:1}mark{background:#FF0;color:#000}")),f||(b=!i(a)),b&&(a.documentShived=b),a)}var c=a.html5||{},d=/^<|^(?:button|form|map|select|textarea)$/i,e,f;(function(){var a=b.createElement("a");a.innerHTML="<xyz></xyz>",e="hidden"in a,f=a.childNodes.length==1||function(){try{b.createElement("a")}catch(a){return!0}var c=b.createDocumentFragment();return typeof c.cloneNode=="undefined"||typeof c.createDocumentFragment=="undefined"||typeof c.createElement=="undefined"}()})();var k={elements:c.elements||"abbr article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output progress section summary time video",shivCSS:c.shivCSS!==!1,shivMethods:c.shivMethods!==!1,type:"default",shivDocument:j};a.html5=k,j(b)}(this,b),e._version=d,e._prefixes=n,e._domPrefixes=q,e._cssomPrefixes=p,e.mq=z,e.hasEvent=A,e.testProp=function(a){return H([a])},e.testAllProps=J,e.testStyles=y,g.className=g.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(f?" js "+v.join(" "):""),e}(this,this.document),function(a,b,c){function d(a){return o.call(a)=="[object Function]"}function e(a){return typeof a=="string"}function f(){}function g(a){return!a||a=="loaded"||a=="complete"||a=="uninitialized"}function h(){var a=p.shift();q=1,a?a.t?m(function(){(a.t=="c"?B.injectCss:B.injectJs)(a.s,0,a.a,a.x,a.e,1)},0):(a(),h()):q=0}function i(a,c,d,e,f,i,j){function k(b){if(!o&&g(l.readyState)&&(u.r=o=1,!q&&h(),l.onload=l.onreadystatechange=null,b)){a!="img"&&m(function(){t.removeChild(l)},50);for(var d in y[c])y[c].hasOwnProperty(d)&&y[c][d].onload()}}var j=j||B.errorTimeout,l={},o=0,r=0,u={t:d,s:c,e:f,a:i,x:j};y[c]===1&&(r=1,y[c]=[],l=b.createElement(a)),a=="object"?l.data=c:(l.src=c,l.type=a),l.width=l.height="0",l.onerror=l.onload=l.onreadystatechange=function(){k.call(this,r)},p.splice(e,0,u),a!="img"&&(r||y[c]===2?(t.insertBefore(l,s?null:n),m(k,j)):y[c].push(l))}function j(a,b,c,d,f){return q=0,b=b||"j",e(a)?i(b=="c"?v:u,a,b,this.i++,c,d,f):(p.splice(this.i++,0,a),p.length==1&&h()),this}function k(){var a=B;return a.loader={load:j,i:0},a}var l=b.documentElement,m=a.setTimeout,n=b.getElementsByTagName("script")[0],o={}.toString,p=[],q=0,r="MozAppearance"in l.style,s=r&&!!b.createRange().compareNode,t=s?l:n.parentNode,l=a.opera&&o.call(a.opera)=="[object Opera]",l=!!b.attachEvent&&!l,u=r?"object":l?"script":"img",v=l?"script":u,w=Array.isArray||function(a){return o.call(a)=="[object Array]"},x=[],y={},z={timeout:function(a,b){return b.length&&(a.timeout=b[0]),a}},A,B;B=function(a){function b(a){var a=a.split("!"),b=x.length,c=a.pop(),d=a.length,c={url:c,origUrl:c,prefixes:a},e,f,g;for(f=0;f<d;f++)g=a[f].split("="),(e=z[g.shift()])&&(c=e(c,g));for(f=0;f<b;f++)c=x[f](c);return c}function g(a,e,f,g,i){var j=b(a),l=j.autoCallback;j.url.split(".").pop().split("?").shift(),j.bypass||(e&&(e=d(e)?e:e[a]||e[g]||e[a.split("/").pop().split("?")[0]]||h),j.instead?j.instead(a,e,f,g,i):(y[j.url]?j.noexec=!0:y[j.url]=1,f.load(j.url,j.forceCSS||!j.forceJS&&"css"==j.url.split(".").pop().split("?").shift()?"c":c,j.noexec,j.attrs,j.timeout),(d(e)||d(l))&&f.load(function(){k(),e&&e(j.origUrl,i,g),l&&l(j.origUrl,i,g),y[j.url]=2})))}function i(a,b){function c(a,c){if(a){if(e(a))c||(j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}),g(a,j,b,0,h);else if(Object(a)===a)for(n in m=function(){var b=0,c;for(c in a)a.hasOwnProperty(c)&&b++;return b}(),a)a.hasOwnProperty(n)&&(!c&&!--m&&(d(j)?j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}:j[n]=function(a){return function(){var b=[].slice.call(arguments);a&&a.apply(this,b),l()}}(k[n])),g(a[n],j,b,n,h))}else!c&&l()}var h=!!a.test,i=a.load||a.both,j=a.callback||f,k=j,l=a.complete||f,m,n;c(h?a.yep:a.nope,!!i),i&&c(i)}var j,l,m=this.yepnope.loader;if(e(a))g(a,0,m,0);else if(w(a))for(j=0;j<a.length;j++)l=a[j],e(l)?g(l,0,m,0):w(l)?B(l):Object(l)===l&&i(l,m);else Object(a)===a&&i(a,m)},B.addPrefix=function(a,b){z[a]=b},B.addFilter=function(a){x.push(a)},B.errorTimeout=1e4,b.readyState==null&&b.addEventListener&&(b.readyState="loading",b.addEventListener("DOMContentLoaded",A=function(){b.removeEventListener("DOMContentLoaded",A,0),b.readyState="complete"},0)),a.yepnope=k(),a.yepnope.executeStack=h,a.yepnope.injectJs=function(a,c,d,e,i,j){var k=b.createElement("script"),l,o,e=e||B.errorTimeout;k.src=a;for(o in d)k.setAttribute(o,d[o]);c=j?h:c||f,k.onreadystatechange=k.onload=function(){!l&&g(k.readyState)&&(l=1,c(),k.onload=k.onreadystatechange=null)},m(function(){l||(l=1,c(1))},e),i?k.onload():n.parentNode.insertBefore(k,n)},a.yepnope.injectCss=function(a,c,d,e,g,i){var e=b.createElement("link"),j,c=i?h:c||f;e.href=a,e.rel="stylesheet",e.type="text/css";for(j in d)e.setAttribute(j,d[j]);g||(n.parentNode.insertBefore(e,n),m(c,0))}}(this,document),Modernizr.load=function(){yepnope.apply(window,[].slice.call(arguments,0))};

</script>
</body>  
</html>