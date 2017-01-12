<?php

add_action( 'cmb2_admin_init', 'nzgst_register_user_profile_metabox' );
/**
 * Hook in and add a metabox to add fields to the user profile pages
 */
function nzgst_register_user_profile_metabox() {
	$prefix = 'nzgst_user_';
	/**
	 * Metabox for the user profile screen
	 */
	$cmb_user = new_cmb2_box( array(
		'id'               => $prefix . 'edit',
		'title'            => __( 'User Profile Info', 'cmb2' ), // Doesn't output for user boxes
		'object_types'     => array( 'user' ), // Tells CMB2 to use user_meta vs post_meta
		'show_names'       => true,
		'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
	) );
	$cmb_user->add_field( array(
		'name'     => __( 'Storyteller Page Info', 'cmb2' ),
		'desc'     => __( 'This is the information that will be shown on your public storyteller page. To activate your storyteller page make sure the "Display my storyteller page" box is checked. ', 'cmb2' ),
		'id'       => $prefix . 'extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );
	$cmb_user->add_field( array(
	    'name' => __('Display my storyteller page', 'cmb2'),
	    'desc' => __('Check this box if you want to be displayed on the "Storytellers" page.', 'cmb2'),
	    'id'   => $prefix . 'display_page',
	    'type' => 'checkbox',
	) );
	$cmb_user->add_field( array(
	    'name' => __('Display name', 'cmb2'),
	    'desc' => __('This is the name that will be displayed on your storyteller\'s page. If you leave this blank your first and last name will be displayed.', 'cmb2'),
	    'id' => $prefix . 'display_name',
	    'type' => 'text',
	) );
	$cmb_user->add_field( array(
		'name'    => __( 'Storyteller Photo', 'cmb2' ),
		'desc'    => __( 'Enter the url of an image of yourself or click the button to upload one.', 'cmb2' ),
		'id'      => $prefix . 'profile_photo',
		'type'    => 'file',
	) );
	$cmb_user->add_field( array(
		'name'    => __( 'Cover Photo', 'cmb2' ),
		'desc'    => __( 'Enter the url of an image or click the button to upload one.', 'cmb2' ),
		'id'      => $prefix . 'cover_photo',
		'type'    => 'file',
	) );
	$cmb_user->add_field( array(
	    'name' => __('Bio', 'cmb2'),
	    'desc' => __('Tell the website visitors about yourself. How did you get started telling stories? What kind of stories do you tell? Who do you tell your stories to?', 'cmb2'),
	    'id' => $prefix . 'bio',
	    'type' => 'textarea',
	) );
	$cmb_user->add_field( array(
	    'name' => __('I tell stories for:', 'cmb2'),
	    'desc' => __('Do you tell stories for adults, children or both?', 'cmb2'),
	    'id' => $prefix . 'stories_for',
	    'type' => 'multicheck',
	    'options' => array(
	        'adults' => 'Adults',
	        'children' => 'Children',
	    ),
	) );
	$cmb_user->add_field( array(
		'name' => __( 'Contact email', 'cmb2' ),
	    'desc' => __('This will be displayed publicly.', 'cmb2'),
		'id'   => $prefix . 'contact_email',
		'type' => 'text_email',
	) );
	$cmb_user->add_field( array(
		'name' => __( 'Contact phone number', 'cmb2' ),
	    'desc' => __('This will be displayed publicly.', 'cmb2'),
		'id'   => $prefix . 'contact_phone',
		'type' => 'text_medium',
	) );
	$cmb_user->add_field( array(
		'name' => __( 'Website URL', 'cmb2' ),
		'id'   => $prefix . 'website_url',
		'type' => 'text_url',
	) );
	$cmb_user->add_field( array(
		'name' => __( 'Facebook URL', 'cmb2' ),
		'id'   => $prefix . 'facebook_url',
		'type' => 'text_url',
	) );
	$cmb_user->add_field( array(
		'name' => __( 'Twitter URL', 'cmb2' ),
		'id'   => $prefix . 'twitter_url',
		'type' => 'text_url',
	) );
	$cmb_user->add_field( array(
		'name' => __( 'Google+ URL', 'cmb2' ),
		'id'   => $prefix . 'googleplus_url',
		'type' => 'text_url',
	) );
	$cmb_user->add_field( array(
		'name' => __( 'Linkedin URL', 'cmb2' ),
		'id'   => $prefix . 'linkedin_url',
		'type' => 'text_url',
	) );
}

?>