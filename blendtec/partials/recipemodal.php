<div id="modalRecipesNewsletter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog recipe-email-signup--modal-box">
		<div class="modal-content recipe-email-signup--modal-content">          
			<div class="recipe-email-signup--modal-header">
				<h2 class="modal-title">
					<?php echo __('Get Recipes'); ?>
				</h2>
				<a class="recipe-email-signup--close" data-dismiss="modal" aria-hidden="true"><?php get_template_part('plus_minus'); ?>
				</a>
			</div>
			<div class="modal-body recipe-email-signup--body">
				<p>
				<?php
					echo __('Signup for our email list and receive recipes, tips & an occasional marketing message.');
				?>
				</p>
				<div class="newsletters form">
					<form role="form" id="NewsletterSignupForm" method="post" accept-charset="utf-8">
						<div class="form-group required">
							<label for="NewsletterFirstName" class="control-label">First Name<span class="required">*</span></label>
							<input name="data[Newsletter][first_name]" class="form-control" type="text" id="NewsletterFirstName" required="required" >
						</div>
						<div class="form-group required">
							<label for="NewsletterEmail" class="control-label">Email<span class="required">*</span></label>
							<input name="data[Newsletter][email]" class="form-control" type="email" id="NewsletterEmail" required="required">
						</div>
						<div class="form-group recipe-email-signup--radio-select">
							<label for="NewsletterOwnBlender"></label>
							<div class="radio">
								<label for="NewsletterOwnBlendertrue">
								<input type="radio" name="data[Newsletter][own_blender]" id="NewsletterOwnBlendertrue" value="true"> I own a Blendtec</label>
							</div>
							<div class="radio">
								<label for="NewsletterOwnBlenderfalse">
								<input type="radio" name="data[Newsletter][own_blender]" id="NewsletterOwnBlenderfalse" value="false" checked="checked"> I want a Blendtec</label>
							</div>
						</div>
						<div class="submit-button">
							<button type="submit" class="btn bt-button-style" div="submit-button" onClick="_gaq.push(['_trackEvent', 'Image Button', 'Send Me Recipes', 'Modal Submit Button ']);">
								<div class="bt-button-text"><span>Signup</span></div>
								<span class="bt-button-arrow icon icon_arrow"></span>
							</button>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>
  </div>
  