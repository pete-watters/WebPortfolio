<?php get_header( 'buddypress' ); ?>
<?php $DYN_layout=get_option("buddylayout"); ?>
<?php if($DYN_layout!="layout_four" && $DYN_layout!="layout_five") {

	get_sidebar();

} ?>

<div class="mid-wrap <?php

		if($DYN_layout=="layout_one") { ?> left out-full  <?php }

		elseif($DYN_layout=="layout_two") { ?> right out-threequarter  <?php }

		elseif($DYN_layout=="layout_three") { ?> right out-half  <?php }

		elseif($DYN_layout=="layout_four") { ?> left out-threequarter  <?php }

		elseif($DYN_layout=="layout_five") { ?> left out-half  <?php }

		elseif($DYN_layout=="layout_six") { ?> left out-half  <?php }

		else { ?> left out-threequarter  <?php }

	?>">

	<div id="container">
	<div id="content">
		<div class="padder">

			<?php do_action( 'bp_before_member_plugin_template' ); ?>

			<div id="item-header">

				<?php locate_template( array( 'members/single/member-header.php' ), true ); ?>

			</div><!-- #item-header -->

			<div id="item-nav">
				<div class="item-list-tabs no-ajax" id="object-nav" role="navigation">
					<ul>

						<?php bp_get_displayed_user_nav(); ?>

						<?php do_action( 'bp_member_options_nav' ); ?>

					</ul>
				</div>
			</div><!-- #item-nav -->

			<div id="item-body" role="main">

				<?php do_action( 'bp_before_member_body' ); ?>

				<div class="item-list-tabs no-ajax" id="subnav">
					<ul>

						<?php bp_get_options_nav(); ?>

						<?php do_action( 'bp_member_plugin_options_nav' ); ?>

					</ul>
				</div><!-- .item-list-tabs -->

				<h3><?php do_action( 'bp_template_title' ); ?></h3>

				<?php do_action( 'bp_template_content' ); ?>

				<?php do_action( 'bp_after_member_body' ); ?>

			</div><!-- #item-body -->

			<?php do_action( 'bp_after_member_plugin_template' ); ?>

		</div><!-- .padder -->
	</div><!-- #content -->
	</div><!-- #container -->
</div><!-- / mid-wrap -->
<?php get_sidebar( 'buddypress' ); ?>
<?php get_footer( 'buddypress' ); ?>
