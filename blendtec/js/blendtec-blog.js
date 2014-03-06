(function($) { "use strict";

var BlendtecBlog = {
	init: function() {
		this.MakeMobileFooterClickable();
	},
	MakeMobileFooterClickable: function() {
		var Ww = $(window).width();

		if (Ww <= 768) {
			if($('.mobile-collapse').parent().not('a')) {
				$('.mobile-collapse').wrap('<a href="#" class="clickable"></a>');
			}
			$('.clickable').click(function(e){
				e.preventDefault();
				console.log($(this).closest('.mobile-closed'));
				$(this).next('.mobile-closed').slideToggle('normal');
			});
		}else{
			if($('.mobile-collapse').parent().is('a')) {
				$('.mobile-collapse').unwrap('<a href="#" class="clickable"></a>');
			}
		}
	},
	RipOutSrcAttr: function() {
		$('.wp-post-image').removeAttr('height');
		$('.wp-post-image').removeAttr('width');
	}
};

$(document).ready(function(){
	BlendtecBlog.init();
});
$(window).on('debouncedresize', function(){
	BlendtecBlog.MakeMobileFooterClickable();
});
$(window).load(function(){
	BlendtecBlog.RipOutSrcAttr();
});

})(jQuery);
