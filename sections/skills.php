<?php
	$latte_skills_title = get_theme_mod('latte_skills_title',__( 'Skills', 'latte' ));
	$latte_skills_subtitle = get_theme_mod('latte_skills_subtitle',__( 'Things that I\'m good at.', 'latte' ));
?>

		<section class="skills" id="skills">
			<div class="container">
				<div class="row">
				<?php if(!empty($latte_skills_title) || !empty($latte_skills_subtitle)) : ?>
					<header data-sr="ease-in-out wait 0.25s" class="skills-header">
					<?php if(!empty($latte_skills_title)) : ?>
						<h2><?php echo esc_html($latte_skills_title); ?></h2>
					<?php endif; ?>
					<?php if(!empty($latte_skills_subtitle)) : ?>
						<h3><?php echo esc_html($latte_skills_subtitle); ?></h3>
					<?php endif; ?>
					</header>
				<?php endif; ?>
					<div class="col-md-12">
					<?php
						if ( is_active_sidebar( 'skills-widgets' ) ) :
							dynamic_sidebar( 'skills-widgets' );
						else:
							the_widget( 'latte_skills_widget', array(
								'title' => esc_html__('HTML', 'latte'),
								'percentage' => '75',
								'titlebackground' => '#D35400',
								'barbackground' => '#E67E22',
							));
							the_widget( 'latte_skills_widget', array(
								'title' => esc_html__('CSS', 'latte'),
								'percentage' => '65',
								'titlebackground' => '#2980B9',
								'barbackground' => '#3498DB',
							));
							the_widget( 'latte_skills_widget', array(
								'title' => esc_html__('jQuery', 'latte'),
								'percentage' => '20',
								'titlebackground' => '#2C3E50',
								'barbackground' => '#2C3E50',
							));
							the_widget( 'latte_skills_widget', array(
								'title' => esc_html__('PHP', 'latte'),
								'percentage' => '40',
								'titlebackground' => '#46465E',
								'barbackground' => '#5A68A5',
							));
							the_widget( 'latte_skills_widget', array(
								'title' => esc_html__('WordPress', 'latte'),
								'percentage' => '85',
								'titlebackground' => '#333333',
								'barbackground' => '#525252',
							));
							the_widget( 'latte_skills_widget', array(
								'title' => esc_html__('SEO', 'latte'),
								'percentage' => '100',
								'titlebackground' => '#27AE60',
								'barbackground' => '#2ECC71',
							));
							the_widget( 'latte_skills_widget', array(
								'title' => esc_html__('Photoshop', 'latte'),
								'percentage' => '40',
								'titlebackground' => '#124E8C',
								'barbackground' => '#4288D0',
							));
							the_widget( 'latte_skills_widget', array(
								'title' => esc_html__('Writing', 'latte'),
								'percentage' => '60',
								'titlebackground' => '#EED800',
								'barbackground' => '#FFE723',
							));
						endif;
					?>
					</div>
				</div>
			</div>
		</section>
