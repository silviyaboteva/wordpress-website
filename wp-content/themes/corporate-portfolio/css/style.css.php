<?php
/*
 * Dynamic css, here css value are control from customizer
 * Grab the HEX color values from theme options
*/


	$corporate_portfolio_dynamic_accent_style = 'a {
			color: '.esc_html( $corporate_portfolio_accent ).';
			}

		::selection { 
			background: '.esc_html( $corporate_portfolio_accent ).';
			}

		a.btn,
		input[type="submit"],
		button.btn,
		.more-link {
			background-color: '.esc_html( $corporate_portfolio_accent ).';
			}

		#header .logo a {
			border-bottom-color: '.esc_html( $corporate_portfolio_accent ).';
			}

		#header #nav li a:hover {
			color: '.esc_html( $corporate_portfolio_accent ).';
			}

		#header #nav li.current_page_item a,
		#header #nav li.current-menu-parent a,
		#header #nav li.current_page_parent a {
			color: '.esc_html( $corporate_portfolio_accent ).';
			}

		#header #nav ul li.current-menu-item a {
			color: '.esc_html( $corporate_portfolio_accent ).' !important;
			}

		body.home #hero .flexslider .slide a .overlay {
			background: '.esc_html( $corporate_portfolio_accent ).';
			}

		body.home #blog .entry-title a:hover {
			color: '.esc_html( $corporate_portfolio_accent ).';
			}

		#content article h2.entry-title a:hover {
			color: '.esc_html( $corporate_portfolio_accent ).';
			}

		#content article .entry-content blockquote {
			border-left-color: '.esc_html( $corporate_portfolio_accent ).';
			}

		#content article.format-quote .entry-title a:hover blockquote p {
			color: '.esc_html( $corporate_portfolio_accent ).';
			}

		#content article.format-link .entry-image p a {
			background: '.esc_html( $corporate_portfolio_accent ).';
			}

		.mejs-time-current {
			background: '.esc_html( $corporate_portfolio_accent ).' !important;
			}

		.mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current {
			background: '.esc_html( $corporate_portfolio_accent ).' !important;
			}

		.flex-direction-nav a:hover {
			background-color: '.esc_html( $corporate_portfolio_accent ).';
			}

		.corporate_portfolio_project_widget .post a .overlay {
			background: '.esc_html( $corporate_portfolio_accent ).';
			}

		.corporate_portfolio_project_widget .post a:hover .overlay {
			background: '.esc_html( $corporate_portfolio_accent ).';
			}

		.corporate_portfolio_social_widget a:hover {
			background: '.esc_html( $corporate_portfolio_accent ).';
			}

		body.page-template-template-portfolio-sortable-php .portfolio-filter li a.active,
		body.page-template-template-portfolio-sortable-php .portfolio-filter li a:hover {
			color: '.esc_html( $corporate_portfolio_accent ).';
			}

		body.page-template-template-portfolio-php .item a .overlay,
		body.single-portfolio .item a .overlay {
			background: '.esc_html( $corporate_portfolio_accent ).';
			}

		body.page-template-template-portfolio-php .item a:hover .overlay,
		body.single-portfolio .item a:hover .overlay {
			background: '.esc_html( $corporate_portfolio_accent ).';
			}

		#footer nav li a:hover,
		#footer nav li.current-menu-item a {
			color: '.esc_html( $corporate_portfolio_accent ).';
		}

		@media only screen and (max-width: 999px) {

			a.slicknav_btn:hover .slicknav_icon-bar {
				background: '.esc_html( $corporate_portfolio_accent ).';
			}

			.slicknav_nav .slicknav_arrow {
				color: '.esc_html( $corporate_portfolio_accent ).';
			}

		}';

//add dynamic variable on wp_add_inline_style.
wp_add_inline_style( 'corporate-portfolio-responsive', $corporate_portfolio_dynamic_accent_style );