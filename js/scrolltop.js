 $(document).ready(function(){
	
	//Check to see if the window is top if not then display button
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.btn-floating').fadeIn();
		} else {
			$('.btn-floating').fadeOut();
		}
	});
	
	//Click event to scroll to top
	$('.btn-floating').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	
});/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


