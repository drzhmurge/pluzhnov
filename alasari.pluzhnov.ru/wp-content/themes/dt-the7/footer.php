<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the <div class="wf-container"> and all content after
 *
 * @since 1.0.0
 *
 * @package The7\Templates
 */

defined( 'ABSPATH' ) || exit;

if ( presscore_is_content_visible() ) : ?>

			</div><!-- .wf-container -->
		</div><!-- .wf-wrap -->

	<?php
	/**
	 * Do something after content container close tag.
	 *
	 * @since 6.8.1
	 */
	do_action( 'the7_after_content_container' );
	?>

	</div><!-- #main -->

	<?php
	if ( presscore_config()->get( 'template.footer.background.slideout_mode' ) ) {
		echo '</div>';
	}
	?>

<?php endif; ?>

	<?php do_action( 'presscore_after_main_container' ); ?>

	<a href="#" class="scroll-top"><span class="screen-reader-text"><?php esc_html_e( 'Go to Top', 'the7mk2' ); ?></span></a>

</div><!-- #page -->

<?php wp_footer(); ?>

<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="pswp__bg"></div>
	<div class="pswp__scroll-wrap">
		<div class="pswp__container">
			<div class="pswp__item"></div>
			<div class="pswp__item"></div>
			<div class="pswp__item"></div>
		</div>
		<div class="pswp__ui pswp__ui--hidden">
			<div class="pswp__top-bar">
				<div class="pswp__counter"></div>
				<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
				<button class="pswp__button pswp__button--share" title="Share"></button>
				<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
				<button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
				<div class="pswp__preloader">
					<div class="pswp__preloader__icn">
						<div class="pswp__preloader__cut">
							<div class="pswp__preloader__donut"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
				<div class="pswp__share-tooltip"></div> 
			</div>
			<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
			</button>
			<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
			</button>
			<div class="pswp__caption">
				<div class="pswp__caption__center"></div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade modal-callback" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
<div class="vertical-alignment-helper">
  <div class="modal-dialog modal-sm vertical-align-center">
    <div class="modal-content">
      <div id="ult-modal-wrap-3415" class="ult_modal-content" style="border-style:solid;border-width:2px;border-radius:0px;border-color:#333333;">
			<div class="ult_modal-header" style="color:#333333;font-weight:bold;border-color:#333333;">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 data-ultimate-target="#ult-modal-wrap-3415 .ult_modal-title" data-responsive-json-new="{&quot;font-size&quot;:&quot;&quot;,&quot;line-height&quot;:&quot;&quot;}" class="ult_modal-title ult-responsive">Заказать звонок</h3>
			</div>
			<div data-ultimate-target="#ult-modal-wrap-3415 .ult_modal-body" data-responsive-json-new="{&quot;font-size&quot;:&quot;&quot;,&quot;line-height&quot;:&quot;&quot;}" class="ult_modal-body ult-responsive ult-html" style="">
			<?php echo do_shortcode('[contact-form-7 id="2489" title="Заказ звонка (pop up)"]');?>
			</div>
	</div>
    </div></div></div></div>
	<div class="modal fade modal-callback2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="vertical-alignment-helper">
  <div class="modal-dialog modal-lg vertical-align-center">
    <div class="modal-content">
      <div id="ult-modal-wrap-3415" class="ult_modal-content" style="border-style:solid;border-width:2px;border-radius:0px;border-color:#333333;">
			<div class="ult_modal-header" style="color:#333333;font-weight:bold;border-color:#333333;">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 data-ultimate-target="#ult-modal-wrap-3415 .ult_modal-title" data-responsive-json-new="{&quot;font-size&quot;:&quot;&quot;,&quot;line-height&quot;:&quot;&quot;}" class="ult_modal-title ult-responsive">Написать руководителю</h3>
			</div>
			<div data-ultimate-target="#ult-modal-wrap-3415 .ult_modal-body" data-responsive-json-new="{&quot;font-size&quot;:&quot;&quot;,&quot;line-height&quot;:&quot;&quot;}" class="ult_modal-body ult-responsive ult-html" style="">
			<?php echo do_shortcode('[contact-form-7 id="2618" title="Написать руководителю"]');?>
			</div>
	</div>
    </div></div></div></div>
</body>
</html>
