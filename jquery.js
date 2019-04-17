/* $(document).ready(function(){
	$('.circle.nav').click(function(){
		$(this).effect('bounce',{times:2},500);
	});
}); */


 $(document).ready(function(){
	 $('[title="footerToggle"]').click(function(){
		 $('div#footer_toggle').slideToggle(1000);
		 $('html, body').animate({
      scrollTop: $('div#footer_toggle').offset().top + $('window').height()
    }, 1000);
	 });
 });
 
 $(document).ready(function(){
	$('.socialIcons').click(function(){
		$(this).effect('bounce',{times:2},500);
	}); 
 });