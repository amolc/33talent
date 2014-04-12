function upclick(d){
    var g={
        element:null,
        action:"about:blank",
        action_params:{},
        maxsize:0,
        onstart:null,
        oncomplete:null,
        dataname:"Filedata",
        target:null,
        zindex:"auto"
    };
    
    for(var h in g)d[h]=d[h]?d[h]:g[h];var k=d.element;
    if(typeof k=="string")k=document.getElementById(k);
    var e=k.ownerDocument,b,c=e.createElement("div"),n="frame"+(new Date).getTime().toString().substr(8);
    c.innerHTML='<iframe name="'+n+'" src="about:blank" onload="this.onload_callback()"></iframe>';
    var i=c.childNodes[0];
    i.onload_callback=
    function(){
        var a=e.createElement("form");
        c.appendChild(a);
        a.method="post";
        a.enctype="multipart/form-data";
        a.encoding="multipart/form-data";
        if(d.target){
            a.target=d.target;
            a.setAttribute("target",d.target)
            }else{
            a.target=n;
            a.setAttribute("target",n)
            }
            a.action=d.action;
        a.setAttribute("action",d.action);
        a.style.margin=0;
        a.style.padding=0;
        a.style.height="80px";
        a.style.width="40px";
        a.runat="server";
        var j=d.action_params;
        for(var p in j){
            var m=e.createElement("input");
            m.type="hidden";
            m.name=p;
            m.value=String(j[p]);
            a.appendChild(m)
            }
            if(d.maxsize){
            j=e.createElement("input");
            j.type="hidden";
            j.name="MAX_FILE_SIZE";
            j.value=String(d.maxsize);
            a.appendChild(j)
            }
            b=e.createElement("input");
        b.name=d.dataname;
        b.type="file";
        b.size="1";
        b.runat="server";
        a.appendChild(b);
        b.style.position="absolute";
        b.style.display="block";
        b.style.top=0;
        b.style.left=0;
        b.style.height=a.style.height;
        b.style.width="80px";
        b.style.opacity=0;
        b.style.filter="alpha(opacity=0)";
        b.style.fontSize=8;
        b.style.zIndex=1;
        b.style.visiblity="hidden";
        b.style.marginLeft=
        "-40px";
        var o=function(){
            if(b.value){
                var f=d.onstart;
                f&&f(b.value);
                a.submit()
                }
            };
        
    if(b.addEventListener)b.addEventListener("change",o,false);
    else if(b.attachEvent)b.attachEvent("onpropertychange",function(f){
        if(!f)f=window.event;
        f.propertyName=="value"&&o()
        });else b.onpropertychange=o;
    i.onload_callback=function(){
        var f=null;
        if(i.contentWindow)f=i.contentWindow;
        else if(i.contentDocument)f=i.contentDocument.defaultView;
        f=f.document.body.innerHTML;
        var q=d.oncomplete;
        q&&q(f);
        a.reset()
        }
    };

i.style.display=
"none";
i.width=0;
i.height=0;
i.marginHeight=0;
i.marginWidth=0;
e.body.insertBefore(c,e.body.firstChild);
c.style.position="absolute";
c.style.overflow="hidden";
c.style.padding=0;
c.style.margin=0;
c.style.visiblity="hidden";
c.style.width="0px";
c.style.height="0px";
if(d.zindex=="auto"){
    g=0;
    var l;
    for(h=k;h.tagName!="BODY";){
        l=h.currentStyle?h.currentStyle:getComputedStyle(h,null);
        l=parseInt(l.zIndex);
        l=isNaN(l)?0:l;
        g+=l+1;
        h=h.parentNode
        }
        c.style.zIndex=g
    }else c.style.zIndex=d.zindex;
g=function(a){
    if(!a)a=
        window.event;
    c.style.width="0px";
    c.style.height="0px";
    if(e.elementFromPoint(a.clientX,a.clientY)===k){
        c.style.width="40px";
        c.style.height="80px"
        }
    };

if(c.addEventListener)c.addEventListener("mousemove",g,false);else c.attachEvent&&c.attachEvent("onmousemove",g);
g=function(a){
    if(!a)a=window.event;
    var j=y=0;
    if(a.pageX)j=a.pageX;
    else if(a.clientX)j=a.clientX+(e.documentElement.scrollLeft?e.documentElement.scrollLeft:e.body.scrollLeft);
    if(a.pageY)y=a.pageY;
    else if(a.clientY)y=a.clientY+(e.documentElement.scrollTop?
        e.documentElement.scrollTop:e.body.scrollTop);
    c.style.left=j-20+"px";
    c.style.top=y-40+"px";
    c.style.width="40px";
    c.style.height="80px"
    };
    
if(k.addEventListener)k.addEventListener("mousemove",g,false);else k.attachEvent&&k.attachEvent("onmousemove",g)
    };
