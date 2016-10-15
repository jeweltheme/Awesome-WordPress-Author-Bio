<?php
	
	add_action('wp_head','jeweltheme_wp_custom_style');
	
	function jeweltheme_wp_custom_style() { ?>
		<style type="text/css">	
			.resp-tabs-list li, h2.resp-accordion{
				background: <?php echo jeweltheme_wp_options( 'tabbed-color', 'jeweltheme_wp_style', '#56AAA6');?>;
			}

			h2.resp-accordion{
				
				background: <?php echo jeweltheme_wp_options( 'tabbed-color', 'jeweltheme_wp_style', '#56AAA6');?> !important;
			}

			.jeweltheme-wp-author-name a {
				color:<?php echo jeweltheme_wp_options( 'name-color', 'jeweltheme_wp_style', '#fff' );?>;
			}
			
			.jeweltheme-wp-authorbio-maindiv{
				background:<?php echo jeweltheme_wp_options( 'background-color', 'jeweltheme_wp_style', '#DDDDDD' );?>;
			}


		</style>
<?php
	}
