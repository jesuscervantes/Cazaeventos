$(document).ready(function(){

    var totWidth=0;

    var positions = new Array();
    positions[0]=0;
    positions[1]=99;
    positions[2]=198;



    $('#gallery').css("width","301%");

 

   
    $('#promciones li a').click(function(e)
    {
        $('li.menuItem').removeClass('act').addClass('inact');
        $(this).parent().addClass('act');
        var pos = $(this).parent().prevAll('.menuItem').length;
        $('#gallery').stop().animate(
        {
        	marginLeft:-positions[pos]+'%'},450);
        e.preventDefault();

    	});

    	$('#promciones li.menuItem:first').addClass('act').siblings().addClass('inact');

	});

	var actual=1;
	function autoAvance()
	{
		if(actual==-1) return false;
		$('#promciones li a').eq(actual%$('#promciones li a').length).click();
		actual++;

			
		
	}
 

	
	var cambio = 3;
 
	var itvl = setInterval(function(){autoAvance();},cambio*2000);
 
