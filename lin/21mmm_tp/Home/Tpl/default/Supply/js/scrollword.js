  var mmove=document.getElementById("mmove");
  var mmove1=document.getElementById("mmove1");
  var mmove2=document.getElementById("mmove2");
  var speed=50
   mmove2.innerHTML=mmove1.innerHTML   
   function Marquee(){
	   if(mmove2.offsetTop-mmove.scrollTop<=0)
		   mmove.scrollTop-=mmove1.offsetHeight
	   else{
	  	 mmove.scrollTop++
	   }
   }
   var MyMar=setInterval(Marquee,speed)
   mmove.onmouseover=function() {clearInterval(MyMar)}
   mmove.onmouseout=function() {MyMar=setInterval(Marquee,speed)}