<!doctype html>
<html <?php language_attributes(); ?>>

	<head>
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>

		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="viewport" content="width=device-width,initial-scale=1.0" />

		<link href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico" rel="shortcut icon" />

		<?php wp_head(); ?>
	</head>
	
	<body <?php body_class(); ?> >



		<?php
			/**
			 * Import SVG Sprite
			 */
			include('assets/svg-sprite.svg');

			/**
			 * Require all Classes
			*/
			function return_views() {

				$folder = '/views/*.php';
				$files = glob(dirname(__FILE__) . $folder);

				foreach( $files as $file ) {
					require_once( $file );
				}

			}

			return_views();
		
		/**
		 * Page wrap
		 */
		echo '<div class="page-wrap">';
			
			/**
			 * Page header
			 */
			echo '<section class="u-section">';
				echo '<header class="m-page-header u-row u-row--small">';

					echo '<div class="m-page-header__logo-container">';
						//render_site_logo();
						echo '<a href="'. home_url() .'">';
							echo '<svg class="b_icon m-page-header__logo" width="579" height="144" viewBox="0 0 579 144" xmlns="http://www.w3.org/2000/svg"><path d="M77.607 23.519H4.01c-.779 0-1.417-.64-1.417-1.422V2.736c0-.785.635-1.422 1.417-1.422h113.203c1.131 0 1.806 1.263 1.182 2.208L40.026 121.211h73.964c.779 0 1.417.641 1.417 1.423v19.361c0 .785-.634 1.421-1.417 1.421H1.42c-1.13 0-1.806-1.262-1.182-2.208L77.607 23.519zm61.966 64.665V2.788c0-.783.635-1.418 1.417-1.418h4.368c9.393 0 17.007 7.615 17.007 17.008v67.471c0 24.237 13.008 35.133 35.021 35.133 21.791 0 34.799-10.896 34.799-35.133V18.378c0-9.393 7.615-17.008 17.008-17.008h4.367c.783 0 1.417.635 1.417 1.418v85.396c0 36.911-24.904 55.284-57.591 55.284-32.909 0-57.813-18.373-57.813-55.284zm213.888 27.929l-51.298-57.928v82.791c0 .783-.635 1.417-1.417 1.417h-19.624c-.783 0-1.417-.634-1.417-1.417V1.419c0-1.32 1.648-1.923 2.5-.913l72.435 84.778L426.18.548c.848-1.018 2.506-.418 2.506.907v139.521c0 .783-.635 1.417-1.418 1.417h-19.623c-.784 0-1.418-.634-1.418-1.417V58.185l-50.637 57.922c-.563.643-1.563.646-2.129.006zm158.947-64.8821l-42.045 90.806a2.4043 2.4043 0 0 1-2.178 1.384h-18.696c-1.763 0-2.927-1.832-2.177-3.425L510.35 2.709c.859-1.857 3.499-1.861 4.364-.005l63.443 137.2859c.756 1.595-.408 3.431-2.174 3.431h-19.79c-.937 0-1.789-.544-2.182-1.393l-41.603-90.797z" fill-rule="evenodd"/></svg>';
						echo '</a>';
					echo '</div>';
					
					/**
					 * Primary navigation
					 */
					render_navigation();

				echo '</header>';
			echo '</section>';

			/**
			 * Render Hero
			 */
			echo render_hero();

		?>