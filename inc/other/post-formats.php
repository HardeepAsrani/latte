<?php
/**
 * Post Format Tools - A mini library for formatting post formats.
 *
 * Post Format Tools has functions and filters for handling the output of post formats.  This library 
 * helps theme developers format posts with given post formats in a more standardized fashion.
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU 
 * General Public License as published by the Free Software Foundation; either version 2 of the License, 
 * or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without 
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @package   PostFormatTools
 * @version   0.1.0
 * @author    Justin Tadlock <justin@justintadlock.com>
 * @copyright Copyright (c) 2012, Justin Tadlock
 * @link      http://justintadlock.com
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

// Adds an infinity character "&#8734;" to the end of the post content on 'aside' posts.
function latte_post_format_tools_aside_infinity( $content ) {
	if ( has_post_format( 'aside' ) && !is_singular() )
		$content .= ' <a class="permalink" href="' . get_permalink() . '" title="' . the_title_attribute( array( 'echo' => false ) ) . '">&#8734;</a>';
		return $content;
}

// This function filters the post content when viewing a post with the "chat" post format. It formats the content with structured HTML markup to make it easy for theme developers to style chat posts.
function latte_post_format_tools_chat_content( $content ) {
	global $_post_format_chat_ids;

	// If this is not a 'chat' post, return the content. 
	if ( !has_post_format( 'chat' ) )
		return $content;

	// Set the global variable of speaker IDs to a new, empty array for this chat. 
	$_post_format_chat_ids = array();
	$chat_author = '';
	$speaker_id = 0;

	// Allow the separator (separator for speaker/text) to be filtered. 
	$separator = apply_filters( 'post_format_chat_separator', ':' );

	// Open the chat transcript div and give it a unique ID based on the post ID. 
	$chat_output = "\n\t\t\t" . '<div id="chat-transcript-' . esc_attr( get_the_ID() ) . '" class="chat-transcript">';

	// Split the content to get individual chat rows. 
	$chat_rows = preg_split( "/(\r?\n)+|(<br\s*\/?>\s*)+/", $content );

	// Loop through each row and format the output. 
	foreach ( $chat_rows as $chat_row ) {

		// If a speaker is found, create a new chat row with speaker and text. 
		if ( preg_match( '/(?<!http|https)' . $separator . '/', $chat_row ) ) {

			// Split the chat row into author/text. 
			$chat_row_split = explode( $separator, trim( $chat_row ), 2 );

			// Get the chat author and strip tags. 
			$chat_author = strip_tags( trim( $chat_row_split[0] ) );

			// Get the chat text. 
			$chat_text = trim( $chat_row_split[1] );

			// Get the chat row ID (based on chat author) to give a specific class to each row for styling. 
			$speaker_id = latte_post_format_tools_chat_row_id( $chat_author );

			// Open the chat row. 
			$chat_output .= "\n\t\t\t\t" . '<div class="chat-row ' . sanitize_html_class( "chat-speaker-{$speaker_id}" ) . '">';

			// Add the chat row author. 
			$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-author ' . sanitize_html_class( strtolower( "chat-author-{$chat_author}" ) ) . ' vcard"><cite class="fn">' . apply_filters( 'post_format_chat_author', $chat_author, $speaker_id ) . '</cite>' . $separator . '</div>';

			// Add the chat row text. 
			$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-text">' . str_replace( array( "\r", "\n", "\t" ), '', apply_filters( 'latte_post_format_chat_text', $chat_text, $chat_author, $speaker_id ) ) . '</div>';

			// Close the chat row. 
			$chat_output .= "\n\t\t\t\t" . '</div><!-- .chat-row -->';
		}

		// If no author is found, assume this is a separate paragraph of text that belongs to the previous speaker and label it as such, but let's still create a new row.		 

		else {

			// Make sure we have text. 
			if ( !empty( $chat_row ) ) {

				// Open the chat row. 
				$chat_output .= "\n\t\t\t\t" . '<div class="chat-row ' . sanitize_html_class( "chat-speaker-{$speaker_id}" ) . '">';

				// Don't add a chat row author.  The label for the previous row should suffice. 

				// Add the chat row text. 
				$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-text">' . str_replace( array( "\r", "\n", "\t" ), '', apply_filters( 'latte_post_format_chat_text', $chat_row, $chat_author, $speaker_id ) ) . '</div>';

				// Close the chat row. 
				$chat_output .= "\n\t\t\t</div><!-- .chat-row -->";
			}
		}
	}

	// Close the chat transcript div. 
	$chat_output .= "\n\t\t\t</div><!-- .chat-transcript -->\n";

	// Return the chat content and apply filters for developers. 
	return apply_filters( 'post_format_chat_content', $chat_output );
}

// This function returns an ID based on the provided chat author name. It keeps these IDs in a global array and makes sure we have a unique set of IDs.
function latte_post_format_tools_chat_row_id( $chat_author ) {
	global $_post_format_chat_ids;

	// Let's sanitize the chat author to avoid craziness and differences like "John" and "john". 
	$chat_author = strtolower( strip_tags( $chat_author ) );

	// Add the chat author to the array. 
	$_post_format_chat_ids[] = $chat_author;

	// Make sure the array only holds unique values. 
	$_post_format_chat_ids = array_unique( $_post_format_chat_ids );

	// Return the array key for the chat author and add "1" to avoid an ID of "0". 
	return absint( array_search( $chat_author, $_post_format_chat_ids ) ) + 1;
}

// Filters the content of the link format posts.  Wraps the content in the make_clickable() function so that users can enter just a URL into the post content editor.
function latte_post_format_tools_link_content( $content ) {

	if ( has_post_format( 'link' ) )
		$content = make_clickable( $content );

	return $content;
}

// Grabs the first URL from the post content of the current post.  This is meant to be used with the link post format to easily find the link for the post.
function latte_post_format_url_grabber() {
	if ( ! preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/is', make_clickable( get_the_content() ), $matches ) )
		return get_permalink( get_the_ID() );

	return esc_url_raw( $matches[1] );
}

// Wraps the output of the quote post format content in a <blockquote> element if the user hasn't added a blockquote> in the post editor.
function latte_post_format_tools_quote_content( $content ) {
	if ( has_post_format( 'quote' ) ) {
		preg_match( '/<blockquote.*?>/', $content, $matches );

		if ( empty( $matches ) )
			$content = "<blockquote>{$content}</blockquote>";
	}

	return $content;
}

// Retrieves embedded videos from the post content.  This script only searches for embeds used by the WordPress embed functionality.
function latte_post_format_tools_get_video( $args = array() ) {
	global $wp_embed;

	// If this is not a 'video' post, return. 
	if ( !has_post_format( 'video' ) )
		return false;

	// Merge the input arguments and the defaults. 
	$args = wp_parse_args( $args, wp_embed_defaults() );

	// Get the post content. 
	$content = get_the_content();

	// Set the default $embed variable to false. 
	$embed = false;

	// Use WP's built in WP_Embed class methods to handle the dirty work. 
	add_filter( 'post_format_tools_video_shortcode_embed', array( $wp_embed, 'run_shortcode' ) );
	add_filter( 'post_format_tools_video_auto_embed', array( $wp_embed, 'autoembed' ) );

	// We don't want to return a link when an embed doesn't work.  Filter this to return false. 
	add_filter( 'embed_maybe_make_link', '__return_false' );

	// Check for matches against the [embed] shortcode. 
	preg_match_all( '|\[embed.*?](.*?)\[/embed\]|i', $content, $matches, PREG_SET_ORDER );

	// If matches were found, loop through them to see if we can hit the jackpot. 
	if ( is_array( $matches ) ) {
		foreach ( $matches  as $value ) {

			// Apply filters (let WP handle this) to get an embedded video. 
			$embed = apply_filters( 'post_format_tools_video_shortcode_embed', '[embed width="' . absint( $args['width'] ) . '" height="' . absint( $args['height'] ) . '"]' . $value[1]. '[/embed]' );

			// If no embed, continue looping through the array of matches. 
			if ( empty( $embed ) )
				continue;
		}
	}

	// If no embed at this point and the user has 'auto embeds' turned on, let's check for URLs in the post. 
	if ( empty( $embed ) && get_option( 'embed_autourls' ) ) {
		preg_match_all( '|^\s*(https?://[^\s"]+)\s*$|im', $content, $matches, PREG_SET_ORDER );

		// If URL matches are found, loop through them to see if we can get an embed. 
		if ( is_array( $matches ) ) {
			foreach ( $matches  as $value ) {

				// Let WP work its magic with the 'autoembed' method. 
				$embed = apply_filters( 'post_format_tools_video_auto_embed', $value[0] );

				// If no embed, continue looping through the array of matches. 
				if ( empty( $embed ) )
					continue;

			}
		}
	}

	// Remove the maybe make link filter. 
	remove_filter( 'embed_maybe_make_link', '__return_false' );

	// Return the embed. 
	return $embed;
}

add_filter( 'the_content', 'latte_post_format_tools_aside_infinity', 9 );
add_filter( 'the_content', 'latte_post_format_tools_chat_content' );
add_filter( 'latte_post_format_chat_text', 'wpautop' );
add_filter( 'the_content', 'latte_post_format_tools_link_content' );
add_filter( 'the_content', 'latte_post_format_tools_quote_content' );
?>
