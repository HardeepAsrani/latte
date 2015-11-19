<?php
	$latte_footer_content = get_theme_mod('latte_footer_content');
?>

		<footer class="footer" id="footer">
			<div class="row">
				<div class="col-md-12">
				<?php if(!empty($latte_footer_content)) : ?>
					<?php echo '<p>' . $latte_footer_content . '</p>'; ?>
				<?php else: ?>
					<?php echo '<p>' . __( 'Copyright &#x000A9;&nbsp;'.date("Y").' ~ <a target="_blank" href="http://www.hardeepasrani.com/portfolio/latte/">Latte</a><br/>Proudly powered by WordPress', 'latte' ) . '</p>'; ?>
				<?php endif; ?>
				</div>
			</div>
		</footer>

	</div>
<?php wp_footer(); ?>
 </body>
</html>