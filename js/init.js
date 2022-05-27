$(document).ready(function() {

	$("#calendar table td:not(.empty)").hover(
		function() {
		    $(this).css("background-color", "#f1f1f1");
			$(this).children('span').css({"background-color": "#888", "color": "#fff"});
		}, 
		function () {
			$(this).css("background-color", "#fff");
			$(this).children('span').css({"background-color": "#ececec", "color": "#5C5C5C"});
		}
	);

	$('a.more').click(function() {
		$(this).addClass('opened').parent().parent().next().toggle();
	})

	$('.search_box_form input:[type=checkbox]').attr('checked', false);
	$('.search_box_form input:[type=checkbox]:first').attr('checked', true);
	$('.search_box_form input:[type=checkbox]').change(function(){
		$('.search_box_form input:[type=checkbox]').attr('checked', false);
		$(this).attr('checked', true);
	})	
	$(".search_box_form input[type=checkbox]").change(function() {
		if($('#search-global:checked').length) {
			$(".change").addClass("google");
		} else {
			$(".change").removeClass("google");
		}
		$('.search_box_form input[type=text]').focus();
	});
	
	//Ticker
	$(function(){ $("ul#ticker01").liScroll(); });
	
	// Form Input
	$('.change').focus(function() {
		if(this.value == this.defaultValue) this.value = '';
	});
	$('.change').blur(function() {
		if(this.value == '') this.value = this.defaultValue;
	});
	
	
	
	
	// Table coloring
	$('#exchange table tr:odd').addClass('colored');
	
	// Download list coloring
	$('#download ul li:odd').addClass('colored');
	
	$('#calendar-main ul li:odd').addClass('colored');
	
	//$('.phone_book table tr:odd').addClass('colored');
	
	// Filter - show / hide
	$("a.switch").click(function(){
			if ($(this).hasClass("hide")) {
				$(this).removeClass("hide");
				$(this).html("Prikaži filter");
				$(".filter .filter-inner").fadeTo("normal",0);
				$(".filter .filter-inner").slideToggle("normal");
				$(".filter").css("border-bottom","1px solid #E4E4E4");
				$(".filter .bottom").fadeTo("normal",0);
			} else {
		$(".filter .filter-inner").slideToggle("normal");
		$(".filter .filter-inner").fadeTo("normal",1);	
		$(".filter").css("border-bottom","none");
		$(".filter .bottom").fadeTo("normal",10);
		$(this).html("Sakrij filter");
		$(this).addClass("hide");
		}
	});
	
	//Fancybox
	$("a.fancybox").fancybox({'titleShow': false});
	$("a#inline").fancybox({'hideOnContentClick': true});
	$("a.group").fancybox({
		'transitionIn'	:	'elastic',
		'transitionOut'	:	'elastic',
		'speedIn'		:	600, 
		'speedOut'		:	200, 
		'overlayShow'	:	false
	});
	
	// <SELECT> z-index bug
    jQuery.fn.activeXOverlap = function() {   
      
        $(this).each(function(i){  
            var h   = $(this).outerHeight();  
            var w   = $(this).outerWidth();  
            var iframe  = '<!--[if IE 6]>' +  
                          '<iframe src="javascript:false;" style="height: ' +  
                          h +  
                          'px; width: ' +  
                        w +  
                         'px" class="selectOverlap">' +  
                         '</iframe>' +  
                         '<![endif]-->'  
           $(this).prepend(iframe);  
       });  
   }

    $(function() {  
		$('#nav-list li ul').activeXOverlap();  
	});

	$("#nav li, #menu li").hover(
		function() { $(this).addClass('sfhover'); },
		function() { $(this).removeClass('sfhover'); }
	);

});

	
