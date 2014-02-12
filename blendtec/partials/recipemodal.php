<div id="modalRecipesNewsletter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <form action="#submit" id="NewsletterDisplayForm" method="POST" accept-charset="utf-8">
        <div style="display:none;"><input type="hidden" name="_method" value="POST"></div> 
    	<div class="modal-body">
    		<h2>Get Blendtec Recipes</h2>
    		<p>Get new Blendtec recipes delivered to your inbox each week</p>
    		<div class="newsletters form">
             
        	<fieldset>
        				<div class="newsletter-email">
                    <div class="form-group">        
                        <label for="NewsletterEmail" class="control-label">Email<span class="required">*</span></label>
                        <input name="data[Newsletter][email]" type="email" id="NewsletterEmail" required="required" class="form-control">
                    </div>
                </div>
                <div class="newsletter-firstname">
                    <div class="form-group">
                        <label for="NewsletterFirstName" class="control-label">First Name<span class="required">*</span></label>
                        <input name="data[Newsletter][first_name]" type="text" id="NewsletterFirstName" required="required" class="form-control">
                    </div>
                </div>
                <div class="newsletter-lastname">
                    <div class="form-group">
                        <label for="NewsletterLastName" class="control-label">Last Name<span class="required">*</span></label>
                        <input name="data[Newsletter][last_name]" type="text" id="NewsletterLastName" required="required" class="form-control">
                    </div>
                </div>

            </fieldset>
            </div>

    	</div>
    	<div class="modal-footer">
    		<div class="newsletter-submit"><button type="submit" class="btn btn-red" onClick="_gaq.push(['_trackEvent', 'Image Button', 'Send Me Recipes', 'Modal Submit Button ']);">Send Me Recipes<span class="font-arrow">&#9658;</span></button></div>
        </div>
        </form>
    </div>
    </div>

  </div>