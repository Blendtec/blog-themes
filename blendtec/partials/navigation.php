<div class="new-menu navbar-container hide-print">
	<div class="navbar navbar-main">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navigation">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="<?php echo blendtec_url(); ?>" class="navbar-brand">
			<?php get_template_part('partials/logo'); ?>
			</a>
		</div>

		<div class="nav-collapse collapse" id="main-navigation">
			<ul class="navbar-nav nav navbar-right" id="navlist">
				<li class="navlink nav-first">
					<a href="<?php echo blendtec_url(); ?>/blenders" title="SHOP">SHOP</a>
				</li>
				<div class="menutab firsttab"></div>
				<li class="navlink nav-second">
					<a href="<?php echo blendtec_url(); ?>/recipes" title="Recipes">Recipes</a>
				</li>
				<div class="menutab middletab"></div>
				<li class="navlink nav-third">
					<a href="<?php echo blendtec_url(); ?>/blog" title="BLOG">BLOG</a>
				</li>
				<div class="menutab middletab"></div>
				<li class="navlink nav-third">
					<a href="<?php echo blendtec_url(); ?>/find_a_store" title="FIND STORE">FIND STORE</a>
				</li>
				<div class="menutab"></div>
				<li class="navlink nav-fourth">
					<a href="<?php echo blendtec_url(); ?>/myaccount/signin" title="Recipes">SIGN IN</a>
				</li>

				<li class="navlink cart-state">
						<a href="<?php echo blendtec_url(); ?>/checkout"><i class="icon icon_cart"></i><span>YOUR CART</span></a>
				</li>
			</ul>
		</div>
	</div>
</div>