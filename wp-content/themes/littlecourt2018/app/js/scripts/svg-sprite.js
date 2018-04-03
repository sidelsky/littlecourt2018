/**
 * Build the SVG Sprite sheet
 */

export function svgSprite() {
   const __svg__ = {
      path: "../../img/svg/*.svg",
      name: "dist/svg-sprite.svg"
   };

   return __svg__;
}