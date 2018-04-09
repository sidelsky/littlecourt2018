<?php

   $file = '../../classes/class-hero.php';
   require_once __DIR__ . $file;

   /**
    * Render Hero view
    */
   function render_hero() {

      $html = '';

      $hero_module_args = array(
         'post_thumbnail_url' => get_the_post_thumbnail_url(), 
         'hero_title_1st_line' => get_field( 'hero_title_1st_line' ),
         'hero_title_2nd_line' => get_field( 'hero_title_2nd_line' )
       );
      $html .= Hero::render($hero_module_args);

      return $html;

   }