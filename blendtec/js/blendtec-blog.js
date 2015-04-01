(function($) { "use strict";

var BlendtecBlog = {
	init: function() {
		this.MakeMobileFooterClickable();
		this.navStickyHandler();
		this.RecipeSubmit();
		this.isMobile();
	},
	MakeMobileFooterClickable: function() {
		var Ww = $(window).width();

		if (Ww <= 768) {
			if($('.mobile-collapse').parent().not('a')) {
				$('.mobile-collapse').wrap('<a href="#" class="clickable"></a>');
			}
			$('.clickable').click(function(e){
				e.preventDefault();
				$(this).next().slideToggle();
			});
		}else{
			if($('.mobile-collapse').parent().is('a')) {
				$('.mobile-collapse').unwrap('<a href="#" class="clickable"></a>');
			}
		}
	},
	RecipeSubmit: function() {
		function emailSignupBox() {
			
			
			$('.recipe-signup--email-input input').each(function(){
				$(this).on('click', function(e){
					e.preventDefault();
				});
				$(this).on('focus', function(e) {
					e.preventDefault();
					$(this).prev('.control-label').addClass('hide');
				});
				$(this).on('focusout', function() {
					if($(this).val !== '') {
						$(this).prev('.control-label').removeClass('hide');	
					}
				});

			});
			


			$('.recipe-signup--signup-form').on('submit', function(e) {
				e.preventDefault();
				var $email = $(this).find('#EmailSignupEmail').val();
				$(this).find('#EmailSignupEmail').val('');

				$('#modalRecipesNewsletter').modal('show');
				$('#NewsletterEmail').val($email);
			});
		}

		function submitEmail(){

			$('#NewsletterSignupForm').on('submit', function(e){
				e.preventDefault();
				var data = $(this).serialize();
				$.ajax({
					type: 'POST',
					url: 'http://www.blendtec.com/newsletters/add',
					data: data,
					headers: {
						"X-Requested-With": "XMLHttpRequest"
					},
					success: function (data) {
						$('#modalRecipesNewsletter').html(data);
					},
					fail: function (data) {
						console.log(data);
					}
				});

			});
			
		}

		emailSignupBox();
		submitEmail();
	},
	RipOutSrcAttr: function() {
		$('.wp-post-image').removeAttr('height');
		$('.wp-post-image').removeAttr('width').css('height', 'auto');
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
	},
	isMobile: function() {
		var options, $el;
		if(isMobile.any && !isMobile.tablet) {
			$el = '.featured-posts--holder';
			options = {
				cellSelector: '.featured-posts--slide'
			};
			options = _.merge(this.flickityOptions(), options);
			this.initFlickity($el, options, false);
		} else {
			$el = '.featured-posts--slider';
			options = {
				cellSelector: '.featured-posts--holder'
			};
			options = _.merge(this.flickityOptions(), options);
			this.initFlickity($el, options, true);

		}
	},
	flickityOptions: function() {
		return {
			prevNextButtons: false,
			pageDots: false,
			cellAlign: 'left',
			draggable: false
		};
	},
	initFlickity: function($el, options, append) {
		var self = this;
		var $gallery = $($el).flickity(options);
		//console.log($gallery);
		// Flickity instance
		var flkty = $gallery.data('flickity');
		// elements
		var $cellButtonGroup = $('.featured-posts--slider-nav');
		var $cellButtons = $cellButtonGroup.find('a');

		// update selected cellButtons
		$gallery.on( 'cellSelect', function() {
			$cellButtons.filter('.active')
			.removeClass('active');
			$cellButtons.eq( flkty.selectedIndex )
			.addClass('active');
		});

		// select cell on button click
		$cellButtonGroup.on( 'click', 'a', function() {
			var index = $(this).index();
			if (append === true) {
				getFeaturedPosts(index);	
			} else {
				$gallery.flickity('select', index);
			}
						
		});

		function getFeaturedPosts(index) {
			var visited = [];
			if (index === 0) {
				$gallery.flickity('select', index);
			} else {				
				if (index !== _.include(visited)) {
					$.ajax({
						type: 'POST',
						url: ajaxurl,
						dataType: 'text',
						data: { action: 'get_featured_posts', index:  index * 3},
						success: function(data){
							//.log(data);
							var $cellElems = $(data);
							$gallery.flickity('append', $cellElems);
							$gallery.flickity('select', index);
						}
					});
				} else {
					$gallery.flickity('select', index);
				}
				visited.push(index);
			}
			
		}

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

window.Blendtec = BlendtecBlog;

})(jQuery);
