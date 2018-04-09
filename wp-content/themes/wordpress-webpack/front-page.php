<?php 

   /**
    * Front page
    */
   include("header.php");

      echo render_large_copy();

		// get iframe HTML
		$iframe = get_field( 'video' );
		


		// use preg_match to find iframe src
		preg_match('/src="(.+?)"/', $iframe, $matches);
		$src = $matches[1];


		// add extra params to iframe src
		$params = array(
			'controls'    	=> 0,
			'hd'        	=> 1,
			'autohide'    	=> 1,
			'background'	=> 1
		);

		$new_src = add_query_arg($params, $src);

		$iframe = str_replace($src, $new_src, $iframe);

		// add extra attributes to iframe html
		$attributes = 'frameborder="1"';

		$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

		// echo $iframe
		echo $iframe;

      $poster = get_field( 'poster' )['url'];

      $poster_image = $poster ? '<div class="m-video-player__poster" style="background-image:url('. $poster .');"></div>' : ''; 

      echo '<section class="u-section">';
         echo '<div class="u-row--full-width">';
            echo '<div class="u-iframe m-video-player js-video-player">';

               echo '<div class="m-video-player__content u-row--small">';
                  echo 'Welcome home sally';
                  echo '<button type="button" class="play-button">Play video</button>';
                  echo '<button type="button" class="pause-button">Pause video</button>';
               echo '</div>';

               echo $poster_image;
               echo $iframe;
            echo '</div>';
         echo '</div>';
      echo '</section>';

   include("footer.php");