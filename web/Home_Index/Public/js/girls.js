$(function(){

//鼠标移进移出类开始
function mouse_over(idname,classname){
	$(idname).hover(
		function(){
			$(this).addClass(classname);
		},
		function(){
			$(this).removeClass(classname);
		}
	);
}
//鼠标移进移出类结束
mouse_over("#addsubmitid","subnav_oversubmit");
mouse_over("#id_bu","sibut_current");
mouse_over("#perv_1","perv_current");
mouse_over("#next_1","next_current");
mouse_over("#perv_2","perv_current");
mouse_over("#next_2","next_current");
mouse_over("#perv_3","perv_current");
mouse_over("#next_3","next_current");
mouse_over("#search_id","search_current");
mouse_over("#share","copy_current");

//总排行月排行开始
var tabs=$('#totaltop_id>h3');//获取选项卡导航
var boxs=$('#totaltop_con>dl');//获取内容切换区
var hovers='totaltop_titletwo';//当前点击显示的样式
tabs.mouseover(function(){
var indexs=tabs.index(this);//获取当前点击的索引值
if(indexs!='0'){
$('#totaltop_id').addClass(hovers);//当前点击高亮显示
boxs.eq(indexs).show().siblings().hide();//通过索引值让对应的选项内容区显示
}
else
{
$('#totaltop_id').removeClass(hovers);//当前点击高亮显示
boxs.eq(indexs).show().siblings().hide();//通过索引值让对应的选项内容区显示
}
});
//总排行月排行结束

function scorllimg(var_next,var_perv,div_name,warp_div,em,ma_th,stime){
	var page = 1;
    var i = ma_th; //每版放1个图片
    //向后 按钮
    $(var_next).click(function(){    //绑定click事件
		 var $v_show = $(div_name); //寻找到“视频内容展示区域”
		 var $v_content = $(warp_div); //寻找到“视频内容展示区域”外围的DIV元素
		 var v_width = $v_content.width() ;
		 var len = $v_show.find(em).length;
		 var page_count = Math.ceil(len / i) ;   //只要不是整数，就往大的方向取最小的整数
		 if( !$v_show.is(":animated") ){    //判断“视频内容展示区域”是否正在处于动画
			  if( page == page_count ){  //已经到最后一个版面了,如果再向后，必须跳转到第一个版面。
				$v_show.animate({ left : '0px'}, stime); //通过改变left值，跳转到第一个版面
				page = 1;
				}else{
				$v_show.animate({ left : '-='+v_width }, stime);  //通过改变left值，达到每次换一个版面
				page++;
			 }
		 }	
   });
    //往前 按钮
    $(var_perv).click(function(){
	     var $v_show = $(div_name); //寻找到“视频内容展示区域”
		 var $v_content = $(warp_div); //寻找到“视频内容展示区域”外围的DIV元素
		 var v_width = $v_content.width();
		 var len = $v_show.find(em).length;
		 var page_count = Math.ceil(len / i) ;   //只要不是整数，就往大的方向取最小的整数
		 if( !$v_show.is(":animated") ){    //判断“视频内容展示区域”是否正在处于动画
		 	 if( page == 1 ){  //已经到第一个版面了,如果再向前，必须跳转到最后一个版面。
			 $v_show.animate({ left : '-='+v_width*(page_count-1) }, stime);
				page = page_count;
	
			}else{
				$v_show.animate({ left : '+='+v_width }, stime);
				page--;
			}
		}
		
    });


}

scorllimg('#next_1','#perv_1','#content_1 ul','#content_1','li','1','100');
scorllimg('#next_2','#perv_2','#content_2 ul','#content_2','li','1','100');
scorllimg('#next_3','#perv_3','#content_3 ul','#content_3','li','6','100');



//好玩推荐标签切换开始 editor 3-3(wanghui)
function tabTaglist(btns,content,cn){
	var btns=$(btns),cont=$(content),curDom=btns.eq(0);
	btns.each(function(i){
		$(this).attr('i',i);
		if(i>0) {
			var domD=$('<div class="list_radiusimg"></div>');
			domD.hide();
			cont.append(domD);
		}
	});
	btns.bind('click',function(){
			var tp=$(this),index=tp.attr('i'),dom_dd=cont.find('div');
			if(index==0) tp.attr('hasdata','1');
			if(tp[0]==curDom[0]) return;
			if(!tp.attr('hasdata')){
				$.ajax({
					type:'GET',
					url:'/girls/js/data.js?d='+index,
					dataType:'json',
					success:function(d){
						var datalist=d['gamedata'],htmlStr=[],thiscont=cont.find('div').eq(tp.attr('i'));
						for(var j=0;j<datalist.length;j++){
							htmlStr.push('<a href="'+datalist[j]['l'].replace('*','/html/')+'"><img src="http://i'+(j%4+1)+'.21mmm.cn/a/'+datalist[j]['i']+'" alt="'+datalist[j]['t']+'" />'+datalist[j]['t']+'</a>')
						}
						thiscont.append(htmlStr.join(''));
						tp.attr('hasdata','1');
					}
				})
			}
			tp.addClass(cn);
			curDom.removeClass(cn);
			dom_dd.eq(curDom.attr('i')).hide();
			dom_dd.eq(index).show();
			curDom=tp;
		})
}
tabTaglist('#tags_1 li','#con_1','current');
//好玩推荐标签切换结束


});