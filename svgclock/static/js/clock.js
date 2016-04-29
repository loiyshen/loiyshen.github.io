function goClock(){
	var sec = last_sec + 1;
	if(sec > max_sec){
		$(".sec b").removeClass("on")
		sec = 0;
		min++;
		setTimes(min, 'm');
	}
	if(min>59){
		min=0;
		hour++;
		setTimes(hour, 'h');
	}
	$(".sec"+last_sec).removeClass("cur");
	if(last_sec!=59 && last_sec!=14 && last_sec!=29 && last_sec!=44){
		$(".sec"+last_sec).addClass("on");
	}
	$(".sec"+sec).addClass("cur");
	last_sec = sec;
	setPoints();
}

function setPoints(){
	$(".cent").each(function(){
		if($(this).hasClass('blue')){
			$(this).removeClass('blue');
		}else{
			$(this).addClass('blue');
		}
	});
}

function setTimes(v, type){
	if(v<10){
		v = '0'+v;
	}
	if(type=='h'){
		$('.hour').html(v);
	}else{
		$('.min').html(v);
	}
}