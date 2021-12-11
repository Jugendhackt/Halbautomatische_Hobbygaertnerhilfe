if(location.protocol!=="https:")location.protocol="https:"

  var ev1=detectMob()?'touchstart':'mousedown',
      ev2=detectMob()?'touchmove':'mousemove',
      ev3=detectMob()?'touchend':'mouseup'
    var sheet = (function() {var style = document.createElement("style");style.appendChild(document.createTextNode(""));document.head.appendChild(style);return style.sheet;})();
    function detectMob() {
    return ( ( window.innerWidth <= 600 ) && ( window.innerHeight <= 800 ) );
  }
  var dt=document.querySelector('.desktop');
  var tb=document.querySelector('.taskbar');
  
    if(detectMob()){dt.className='desktop-m';tb.className='taskbar-m'}else{
      var tl=dt.appendChild(document.createElement('table'))
      for(var i=0;i<10;i++){var tr=tl.appendChild(document.createElement('tr'));for(var o=0;o<10;o++){var td=tr.appendChild(document.createElement('td'));td.id=i*10+o;td.className='dt-icon';$(td).append($('<img alt="">'));}}
      
    }
    const createWindow=(me,name,content,w,h,icon)=>{
		icon=icon||["url('data:base64;')",""];content=content||"";
      var elem=$(document.body).append(`<div class='window'></div>`).children().last().css('width',w||"30%").css('height',h||'40%')
	  elem.append(`<div class="header"><span class="ui-icon" style="position:absolute;left:5px;background-image:${icon[0].replaceAll("\"","'")};background-position:${icon[1]}"></span><span class="title">${name}</span><button type="button" class="window-close-btn ui-btn" title="Close"><span class="ui-icon ui-icon-close"></span><span class="ui-button-icon-space"> </span>Close</button></div>`)
	  elem.append(`<div class="content">${content}<div>`)
      elem[0].drag();
	  elem[0].resizeable();
	  if($(".taskbar").html().indexOf(`<div type="button" class="ui-button" title="${name}">`)===-1){
		  $(".taskbar").append(`<div type="button" class="ui-button" title="${name}"><div class="ui-icon-home ui-icon" style="background-image:${icon[0].replaceAll("\"","'")};background-position:${icon[1]}"></div></div>`)
		  $(".taskbar").children().last().on("click",_=>(me.start||new Function()).call(me))
		  if(me.shattr){
			  for(var i of me.shattr){
				  $(".taskbar").children().last().append(`<attr data-value="${i}"></attr>`)
			  }			  
		  }
	  }
	  elem.children().first().children().last().on("click",(e)=>{((me.stop||function a(){}).call(this));elem[0].unresizeable();elem.remove();})
	  return elem;
    }

window.startmenu = (e) => {
    $(document.body).append(`<div class="startmenu"></div>`);
    var elem = $(".startmenu");
    var g = (e) => {
		var o = document.querySelector(".startmenu").children;
		for (var i = 0; i < o.length; i++) {
			if (e.target.isSameNode(o[i]) || e.target.parentElement.isSameNode(o[i])){(programs[i].start||new Function()).call(programs[i]);}
		}
		window.o=e.target;
        if (e.target.className !== "startmenu") elem.remove(), $(document.body).off("mousedown", g);
    };
    $(document.body).on("mousedown", g);
    elem.on("mouseover", () => {});
    programs.forEach((e) => {
        var temp = $("<div></div>").css("background-image", e.icon).css("background-position", e.pos).css({
            width: "16px",
            height: "16px",
            float: "right"
        });
        elem.append($(`<div style="height: 20px;"><span style="float:left;">${e.name}</span></div>`).last().append(temp));
    });
}
window.prop = (e) => {
    $(document.body).append(`<div class="property"></div>`);
    var elem = $(".property");
	for(var i=0;i<programs.length;i++){if(programs[i].name===$(e.target).parent().attr("title")||programs[i].name===$(e.target).attr("title"))elem.data("id",i);}
    var g = (e) => {
		var o = document.querySelector(".property").children;
		for (var i = 0; i < o.length; i++) {
			if (e.target.isSameNode(o[i]) || e.target.parentElement.isSameNode(o[i])){var args=programs[elem.data("id")];args.shargs=$(e.target).text()||$(e.target).parent().text();(programs[i].start||new Function()).call(args);}
		}
		window.o=e.target;
        if (e.target.className !== "property") elem.remove(), $(document.body).off("mousedown", g);
    };
    $(document.body).on("mousedown", g);
    elem.on("mouseover", () => {});
	attr=""
	if($(e.target).children("attr").length)attr=$(e.target).children("attr")
	if($(e.target).parent().children("attr").length)attr=$(e.target).parent().children("attr")
    if(attr!="")attr.each(function(e){
        var temp = $("<div></div>").css("background-image", e.icon).css("background-position", e.pos).css({
            width: "16px",
            height: "16px",
            float: "right"
        });
        elem.append($(`<div style="height: 20px;"><span style="float:left;">${$(this).data("value")}</span></div>`).last().append(temp));
    });
}

if(typeof($)==="function")$(".taskbar").on("contextmenu",e=>(e.preventDefault(),prop(e)));

(function(){
	var win;
var [l_x,l_y,down]=[0,0,null];
document.addEventListener("mousemove",(e)=>{
	e.preventDefault();
	var [x,y]=[e.clientX,e.clientY];
	if(down){
		if(x<l_x && down[1].indexOf("w")>-1)$(down[0]).offset({left:x}),$(down[0]).width(l_w+(l_x-x));
		if(y<l_y && down[1].indexOf("n")>-1)$(down[0]).offset({top:y}),$(down[0]).height(l_h+(l_y-y));
		if(x>l_x && down[1].indexOf("w")>-1)$(down[0]).offset({left:Math.min(x,l_x+l_w-200)}),$(down[0]).width(Math.max(l_w+(l_x-x),200));
		if(y>l_y && down[1].indexOf("n")>-1)$(down[0]).offset({top:Math.min(y,l_y+l_h-200)}),$(down[0]).height(Math.max(l_h+(l_y-y),200));
		
		if(x<l_x && down[1].indexOf("e")>-1)$(down[0]).width(Math.max(200,(x-$(down).offset().left)));
		if(y<l_y && down[1].indexOf("s")>-1)$(down[0]).height(Math.max(200,(y-$(down).offset().top)));
		if(x>l_x && down[1].indexOf("e")>-1)$(down[0]).width(x-$(down).offset().left);
		if(y>l_y && down[1].indexOf("s")>-1)$(down[0]).height(y-$(down).offset().top);
		return;
	}
	win=null;
	for (var i = 0; i < reg.length; i++) {
		if(reg[i].parentElement!==null){
		el = reg[i];
		t = $(el).offset();
		var r="";
		if (x >= t.left-5 && x <= t.left + $(el).width()+15 && y + 5 >= t.top && y + 5 <= t.top + 5) r += "n";
		if (x <= t.left + $(el).width()+15 && x >= t.left-5 && y>=t.top+$(el).height()+5 && y <=t.top+$(el).height()+15) r+="s"
		if (x + 5 >= t.left && x + 5 <= t.left + 5 && y >= t.top-5 && y-15 <= t.top + $(el).height()) r += "w";
		if (x <= t.left + $(el).width()+15 && x >= t.left+$(el).width()+5 && y >= t.top-5 && y-15 <= t.top + $(el).height()) r+="e"
		if(r!=="")win=el;
		document.body.style.cursor = r===""?"":r+"-resize";}
	}
})
document.addEventListener("mousedown",(e)=>{
	e.preventDefault();
	if(win)down=[win,document.body.style.cursor.split("-")[0]],[l_x,l_y,l_w,l_h]=[e.clientX,e.clientY,$(win).width(),$(win).height()];
})
document.addEventListener("mouseup",(e)=>{
	e.preventDefault();
	down=null;
})
var reg= new Array();
Element.prototype.resizeable=function(){return reg.push(this);}
Element.prototype.unresizeable=function(){return reg.forEach(e=>e=(e===this)?null:e);}
})();

function formatted_date(e)
{
   var result="";
   var d = new Date(e);
   result += d.getFullYear()+"/"+(d.getMonth()+1)+"/"+d.getDate() + 
             " "+ d.getHours()+":"+d.getMinutes()+":"+
             d.getSeconds();
   return result;
}
(function(){
var o=window.Notification;
window.addEventListener("DOMContentLoaded",()=>{console.log(o);o.requestPermission().then(function(result) {console.log(result);});})
window.notify=function notify(applicationindex,message){
	if(!checkPerm(applicationindex, "notify"))return;
	var t=document.getElementsByTagName("link")
	var img=""
	for(var i=0;t.length;i++){if(t[i].rel.toLowerCase()==="shortcut icon")img=t[i].href}
	var text = message;
	var notification = new o(`${document.title} - ${programs[applicationindex].name}`, { body: text, icon: img });
	return {close:_=>notification.close(),on:(e,a,o)=>notification.addEventListener(e,a,o),}
}
window.Notification=_=>{throw new Error("Use notify instead");}
})();

function checkPerm(i,p){
	if(!programs[i].permissions[p]){
		programs[i].permissions[p]=confirm(`Möchtest du ${programs[i].name} die Berechtigung ${p} geben?`)
	}
	return programs[i].permissions[p]
}

tmp=(function(){var o=window.alert;window.alert=function(i,m){if(!checkPerm(i,"notify")||!m)return;o(m)}})
tmp();

var clock="";
var int=setInterval(_=>{clock+=1000;$(".clock").html(formatted_date(clock));$.ajax({"url":"/up"}).success(_).error(_=>{})},1000)
$.ajax({url:"/clock"}).success(e=>$(".clock").html(formatted_date(clock=int(e)))).error(_=>{clock=Date.now();})

for(var i=0;i<programs.length;i++){
	for(const b in programs[i].permissions){
		programs[i].permissions[b]=false;
	}
}
