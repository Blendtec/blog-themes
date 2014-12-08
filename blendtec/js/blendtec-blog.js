(function($) { "use strict";

var BlendtecBlog = {
	init: function() {
		this.MakeMobileFooterClickable();
		this.navStickyHandler();
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
	},
	navStickyHandler: function() {

		var NavbarHandler = {

			_bindElements: function() {
				this.$navbar = $('.navbar-container');
			},

			_bindHandlers: function() {
				return this._bindStickyNavHandler();
			},

			_bindStickyNavHandler: function() {
				return $(window).scroll(_.debounce(this.onScroll, 10));
			},

			onScroll: function() {
				var top, object;
				object = NavbarHandler;
				top = $(window).scrollTop();
				object.stickyTop = 25;
				if (top >= object.stickyTop) {
					return object.onSticky();
				} else {
					return object.onUnSticky();
				}
			},

			onSticky: function() {
				return this.$navbar.addClass('is-sticky');
			},

			onUnSticky: function() {
				return this.$navbar.removeClass('is-sticky');
			},

			init: function() {
				this._bindElements();
				this._bindHandlers();
			}
		};

		return NavbarHandler.init();
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
