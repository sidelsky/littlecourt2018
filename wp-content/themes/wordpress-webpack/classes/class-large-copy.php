<?php

   /**
    * Large copy
    */

   class Large_copy {

      public static function render() {

         $content = get_field( 'large_copy' );
         $html = '';

         if( $content ) {
            $html .= $content;
         }

         return $html;

      }

   }