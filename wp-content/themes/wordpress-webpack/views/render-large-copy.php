<?php

   $file = '../../classes/class-large-copy.php';
   require_once __DIR__ . $file;

   /**
    * Render large copy
    */
   function render_large_copy() {

      $html = '';

      $html .= '<section class="u-section">';
         $html .= '<div class="u-row u-row--small">';
            $html .= '<div class="m-large-copy u-text-transform--uppercase">';
               $html .= Large_copy::render();
            $html .= '</div>';
         $html .= '</div>';
      $html .= '</section>';

      return $html;

   }