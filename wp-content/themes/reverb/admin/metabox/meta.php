<?php
/*--------------------------*
/* Meta Boxes
/*--------------------------*/

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );

function cmb_sample_metaboxes( array $meta_boxes ) {

	
	$prefix = 'ad_';

	$meta_boxes[] = array(
		'id' => 'header_meta_box',					
		'title' => 'Add  Subtitle',					
		'pages' => array('post', 'page', 'product'),			
		'context' => 'side',						
		'priority' => 'high',		
		'show_names' => true, 
		'fields'     => array(
			array(
				'name' => 'Subtitle',
				'desc' => '',
				'id'   => $prefix . 'header_subtitle',
				'type' => 'text',
			),
			),
	);

	$meta_boxes[] = array(
		'id'         => 'Slider Link',
		'title'      => 'Add the url to link to',
		'pages'      => array( 'slider', ), 
		'context'    => 'side',
		'priority'   => 'low',
		'fields' => array(
			array(
				'name' => 'Slider Link',
				'desc' => '(optional)',
				'id'   => $prefix . 'slider_link',
				'type' => 'text',
			),
		)
	);
	
	$meta_boxes[] = array(
		'id' => 'team_meta_box',					
		'title' => 'Job Title',					
		'pages' => array('Team',),			
		'context' => 'side',						
		'priority' => 'low',		
		'show_names' => true, 
		'fields'     => array(
			array(
				'name' => 'Job Title',
				'desc' => '',
				'id'   => $prefix . 'team_title',
				'type' => 'text',
			),
		),
	);
	
	$meta_boxes[] = array(
		'id' => 'twitter_meta_box',					
		'title' => 'Twitter Link',					
		'pages' => array('Team',),			
		'context' => 'side',						
		'priority' => 'low',		
		'show_names' => true, 
		'fields'     => array(
			array(
				'name' => 'Twitter Url',
				'desc' => '',
				'id'   => $prefix . 'team_twitter',
				'type' => 'text',
			),
),
	);
	
	$meta_boxes[] = array(
		'id' => 'facebook_meta_box',					
		'title' => 'Facebook Link',					
		'pages' => array('Team',),			
		'context' => 'side',						
		'priority' => 'low',		
		'show_names' => true, 
		'fields'     => array(
			array(
				'name' => 'Facebook Url',
				'desc' => '',
				'id'   => $prefix . 'team_facebook',
				'type' => 'text',
			),
),
	);
	
	$meta_boxes[] = array(
		'id' => 'linkedin_meta_box',					
		'title' => 'LinkedIn Link',					
		'pages' => array('Team',),			
		'context' => 'side',						
		'priority' => 'low',		
		'show_names' => true, 
		'fields'     => array(
			array(
				'name' => 'LinkedIn Url',
				'desc' => '',
				'id'   => $prefix . 'team_linkedin',
				'type' => 'text',
			),
	),
	);
	
	$meta_boxes[] = array(
		'id' => 'sign_meta_box',					
		'title' => 'Signature Line',					
		'pages' => array('Testimonial',),			
		'context' => 'side',						
		'priority' => 'low',		
		'show_names' => true, 
		'fields'     => array(
			array(
				'name' => 'Signature',
				'desc' => '',
				'id'   => $prefix . 'testimonial_sign',
				'type' => 'text',
			),
	),
	);
	
	
	$meta_boxes[] = array(
		'id' => 'video_meta_box',
		'title' => 'Video',
		'pages' => array('post'), 
		'context' => 'normal',
		'priority' => 'low',
		'show_names' => false,
		'fields' => array(
			array(
				'name' => 'Video',
				'desc' => 'Paste your video embed code here.',
				'id' => $prefix . 'post_video',
				'type' => 'textarea_code'
			),
		)
	);


	return $meta_boxes;
	
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';

}