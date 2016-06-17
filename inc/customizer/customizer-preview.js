( function( $ ) {

	// General Settings > Site Identity > Site Title
	wp.customize( 'blogname', function( value ) {
		value.bind( function( newval ) {
			$('.intro h1.cover-heading').text( newval );
			$('.archive-header h1.cover-heading').text( newval );
		} );
	} );

	// General Settings > Site Identity > Site Description
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( newval ) {
			$('.intro p.lead').text( newval );
			$('.archive-header p.lead').text( newval );
		} );
	} );

	// Intro Section > Content > Avatar Image
	wp.customize( 'latte_intro_avatar', function( value ) {
		value.bind( function( newval ) {
			if ( newval == '' ) {
				$('.intro .avatar').css( 'display', 'none' );
			} else {
				$('.intro .avatar').removeClass( 'customizer-hidden' );
				$('.intro .avatar').css( 'background-image', 'url(' +newval+ ')' );
				$('.intro .avatar').css( 'display', 'block' );
			}
		} );
	} );

	// Intro Section > Content > Scroll Anchor
	wp.customize( 'latte_intro_scroll', function( value ) {
		value.bind( function( newval ) {
			if ( newval == '' ) {
				$('.intro .arrow').css( 'display', 'none' );
			} else {
				$('.intro .arrow').removeClass( 'customizer-hidden' );
				$('.intro .arrow').css( 'display', 'block' );
				$('.intro .arrow .fa').attr( 'href', newval );
			}
		} );
	} );

	// Intro Section > Colors > Background Color
	wp.customize( 'latte_intro_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.intro').css( 'background', newval );
		} );
	} );

	// About Section > Settings > Section Title
	wp.customize( 'latte_about_title', function( value ) {
		value.bind( function( newval ) {
			$('.about .about-header h2').text( newval );
		} );
	} );

	// About Section > Settings > Section Subtitle
	wp.customize( 'latte_about_subtitle', function( value ) {
		value.bind( function( newval ) {
			$('.about .about-header h3').text( newval );
		} );
	} );

	// About Section > Content > Image
	wp.customize( 'latte_about_avatar', function( value ) {
		value.bind( function( newval ) {
			if ( newval == '' ) {
				$('.about .about-image').css( 'display', 'none' );
				$('.about .col-md-7').attr( 'class', 'cold-md-12' );
			} else {
				$('.about .about-image').removeClass( 'customizer-hidden' );
				$('.about .about-image').css( 'display', 'block' );
				$('.about .col-md-12').attr( 'class', 'cold-md-7' );
				$('.about .about-image').attr( 'src', newval );
			}
		} );
	} );

	// About Section > Content > Name
	wp.customize( 'latte_about_name', function( value ) {
		value.bind( function( newval ) {
			$('.about h3.name').text( newval );
		} );
	} );

	// About Section > Content > Position
	wp.customize( 'latte_about_position', function( value ) {
		value.bind( function( newval ) {
			$('.about span.text-muted').text( newval );
		} );
	} );

	// About Section > Content > Content
	wp.customize( 'latte_about_content', function( value ) {
		value.bind( function( newval ) {
			$('.about div.lead').html( newval );
		} );
	} );

	// About Section > Colors > Background Color
	wp.customize( 'latte_about_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.about').css( 'background', newval );
		} );
	} );

	// Social Section > Settings > Section Title
	wp.customize( 'latte_social_title', function( value ) {
		value.bind( function( newval ) {
			$('.social .social-header h2').text( newval );
		} );
	} );

	// Social Section > Content > 1. Icon URL
	wp.customize( 'latte_social_facebook', function( value ) {
		value.bind( function( newval ) {
			if ( newval == '' ) {
				$('.social .sb-first').css( 'display', 'none' );
			} else {
				$('.social .sb-first').removeClass( 'customizer-hidden' );
				$('.social .sb-first').css( 'display', 'inline-block' );
				$('.it-first .icon a').attr( 'href', newval );
			}
		} );
	} );

	// Social Section > Content > 1. Icon Title
	wp.customize( 'latte_social_facebook_title', function( value ) {
		value.bind( function( newval ) {
			$('.social .it-first span').text( newval );
		} );
	} );

	// Social Section > Content > 2. Icon URL
	wp.customize( 'latte_social_twitter', function( value ) {
		value.bind( function( newval ) {
			if ( newval == '' ) {
				$('.social .sb-second').css( 'display', 'none' );
			} else {
				$('.social .sb-second').removeClass( 'customizer-hidden' );
				$('.social .sb-second').css( 'display', 'inline-block' );
				$('.it-second .icon a').attr( 'href', newval );
			}
		} );
	} );

	// Social Section > Content > 2. Icon Title
	wp.customize( 'latte_social_twitter_title', function( value ) {
		value.bind( function( newval ) {
			$('.social .it-second span').text( newval );
		} );
	} );

	// Social Section > Content > 3. Icon URL
	wp.customize( 'latte_social_google_plus', function( value ) {
		value.bind( function( newval ) {
			if ( newval == '' ) {
				$('.social .sb-third').css( 'display', 'none' );
			} else {
				$('.social .sb-third').removeClass( 'customizer-hidden' );
				$('.social .sb-third').css( 'display', 'inline-block' );
				$('.it-third .icon a').attr( 'href', newval );
			}
		} );
	} );

	// Social Section > Content > 3. Icon Title
	wp.customize( 'latte_social_google_plus_title', function( value ) {
		value.bind( function( newval ) {
			$('.social .it-third span').text( newval );
		} );
	} );

	// Social Section > Content > 4. Icon URL
	wp.customize( 'latte_social_instagram', function( value ) {
		value.bind( function( newval ) {
			if ( newval == '' ) {
				$('.social .sb-fourth').css( 'display', 'none' );
			} else {
				$('.social .sb-fourth').removeClass( 'customizer-hidden' );
				$('.social .sb-fourth').css( 'display', 'inline-block' );
				$('.it-fourth .icon a').attr( 'href', newval );
			}
		} );
	} );

	// Social Section > Content > 4. Icon Title
	wp.customize( 'latte_social_instagram_title', function( value ) {
		value.bind( function( newval ) {
			$('.social .it-fourth span').text( newval );
		} );
	} );

	// Social Section > Content > 5. Icon URL
	wp.customize( 'latte_social_github', function( value ) {
		value.bind( function( newval ) {
			if ( newval == '' ) {
				$('.social .sb-fifth').css( 'display', 'none' );
			} else {
				$('.social .sb-fifth').removeClass( 'customizer-hidden' );
				$('.social .sb-fifth').css( 'display', 'inline-block' );
				$('.it-fifth .icon a').attr( 'href', newval );
			}
		} );
	} );

	// Social Section > Content > 5. Icon Title
	wp.customize( 'latte_social_github_title', function( value ) {
		value.bind( function( newval ) {
			$('.social .it-fifth span').text( newval );
		} );
	} );

	// Social Section > Colors > Background Color
	wp.customize( 'latte_social_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.social').css( 'background', newval );
		} );
	} );

	// Services Section > Settings > Section Title
	wp.customize( 'latte_services_title', function( value ) {
		value.bind( function( newval ) {
			$('.services .services-header h2').text( newval );
		} );
	} );

	// Services Section > Settings > Section Subtitle
	wp.customize( 'latte_services_subtitle', function( value ) {
		value.bind( function( newval ) {
			$('.services .services-header h3').text( newval );
		} );
	} );

	// Services Section > Colors > Background Color
	wp.customize( 'latte_services_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.services').css( 'background', newval );
		} );
	} );

	// Subscribe Section > Settings > Section Title
	wp.customize( 'latte_subscribe_title', function( value ) {
		value.bind( function( newval ) {
			$('.subscribe .subscribe-header h2').text( newval );
		} );
	} );

	// Subscribe Section > Settings > Section Subtitle
	wp.customize( 'latte_subscribe_subtitle', function( value ) {
		value.bind( function( newval ) {
			$('.subscribe .subscribe-header h3').text( newval );
		} );
	} );

	// Subscribe Section > Colors > Background Color
	wp.customize( 'latte_subscribe_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.subscribe').css( 'background', newval );
		} );
	} );

	// Skills Section > Settings > Section Title
	wp.customize( 'latte_skills_title', function( value ) {
		value.bind( function( newval ) {
			$('.skills .skills-header h2').text( newval );
		} );
	} );

	// Skills Section > Settings > Section Subtitle
	wp.customize( 'latte_skills_subtitle', function( value ) {
		value.bind( function( newval ) {
			$('.skills .skills-header h3').text( newval );
		} );
	} );

	// Skills Section > Colors > Background Color
	wp.customize( 'latte_skills_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.skills').css( 'background', newval );
		} );
	} );

	// Blog Section > Settings > Section Title
	wp.customize( 'latte_blogposts_title', function( value ) {
		value.bind( function( newval ) {
			$('.blogposts .blog-header h2').text( newval );
		} );
	} );

	// Blog Section > Settings > Section Subtitle
	wp.customize( 'latte_blogposts_subtitle', function( value ) {
		value.bind( function( newval ) {
			$('.blogposts .blog-header h3').text( newval );
		} );
	} );

	// Blog Section > Colors > Background Color
	wp.customize( 'latte_blogposts_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.blogposts').css( 'background', newval );
		} );
	} );

	// Blog Page > Header
	wp.customize( 'header_image', function( value ) {
		value.bind( function( newval ) {
			$('.archive-header').css( 'background', 'transparent url(' +newval+ ') repeat scroll center center / cover' );
		} );
	} );
	
} )( jQuery );
