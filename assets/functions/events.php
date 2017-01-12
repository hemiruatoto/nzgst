<?php
// let's create the function for the custom type
function nzgst_custom_post_events() { 
	// creating (registering) the custom type 
	register_post_type( 'event', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Events', 'jointswp'), /* This is the Title of the Group */
			'singular_name' => __('Event', 'jointswp'), /* This is the individual type */
			'all_items' => __('All Events', 'jointswp'), /* the all items menu item */
			'add_new' => __('Add New', 'jointswp'), /* The add new menu item */
			'add_new_item' => __('Add New Event', 'jointswp'), /* Add New Display Title */
			'edit' => __( 'Edit', 'jointswp' ), /* Edit Dialog */
			'edit_item' => __('Edit Event', 'jointswp'), /* Edit Display Title */
			'new_item' => __('New Event', 'jointswp'), /* New Display Title */
			'view_item' => __('View Event', 'jointswp'), /* View Display Title */
			'search_items' => __('Search Events', 'jointswp'), /* Search Custom Type Title */ 
			'not_found' =>  __('No events found.', 'jointswp'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('No events found in Trash', 'jointswp'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Advertise your upcoming event.', 'jointswp' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-calendar-alt', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
			'rewrite'	=> array( 'slug' => 'events', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => true, /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title' )
	 	) /* end of options */
	); /* end of register post type */
	
} 

// adding the function to the Wordpress init
add_action( 'init', 'nzgst_custom_post_events');

// now let's add custom categories (these act like categories)
register_taxonomy( 'target_audience', 
	array('event'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => true,     /* if this is true, it acts like categories */             
		'labels' => array(
			'name' => __( 'Target Audiences', 'jointswp' ), /* name of the custom taxonomy */
			'singular_name' => __( 'Target Audience', 'jointswp' ), /* single taxonomy name */
			'search_items' =>  __( 'Search Target Audiences', 'jointswp' ), /* search title for taxomony */
			'all_items' => __( 'All Target Audiences', 'jointswp' ), /* all title for taxonomies */
			'parent_item' => __( 'Parent Target Audience', 'jointswp' ), /* parent title for taxonomy */
			'parent_item_colon' => __( 'Parent Target Audience:', 'jointswp' ), /* parent taxonomy title */
			'edit_item' => __( 'Edit Target Audience', 'jointswp' ), /* edit custom taxonomy title */
			'update_item' => __( 'Update Target Audience', 'jointswp' ), /* update title for taxonomy */
			'add_new_item' => __( 'Add New Target Audience', 'jointswp' ), /* add new title for taxonomy */
			'new_item_name' => __( 'New Target Audience', 'jointswp' ) /* name title for taxonomy */
		),
		'show_admin_column' => true, 
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'target-audience' ),
	)
);



// Change the custom taxonomy checkboxes to radio inputs
function nzgst_events_audience_checkbox_to_radio() {

    echo '<script type="text/javascript" id="checkbox-to-radio"> jQuery( document ).ready( function($) { $( "#target_audiencechecklist input" ).each( function() { this.type="radio" } ); $( "#target_audience-tabs .hide-if-no-js" ).hide(); }); </script>';

}

add_action('admin_footer', 'nzgst_events_audience_checkbox_to_radio');


// add custom metaboxes
add_action( 'cmb2_admin_init', 'nzgst_events_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function nzgst_events_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_events_';

    /**
     * Initiate the metabox
     */
    $info = new_cmb2_box( array(
        'id'            => 'event_info',
        'title'         => __( 'Event Information', 'cmb2' ),
        'object_types'  => array( 'event', ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
    ) );

    $dates = new_cmb2_box( array(
        'id'            => 'dates',
        'title'         => __( 'Dates', 'cmb2' ),
        'object_types'  => array( 'event', ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
    ) );

    $location = new_cmb2_box( array(
        'id'            => 'location',
        'title'         => __( 'Location', 'cmb2' ),
        'object_types'  => array( 'event', ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
    ) );

    $contact = new_cmb2_box( array(
        'id'            => 'contact',
        'title'         => __( 'Contact Information', 'cmb2' ),
        'object_types'  => array( 'event', ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
    ) );

    $tickets = new_cmb2_box( array(
        'id'            => 'tickets',
        'title'         => __( 'Tickets', 'cmb2' ),
        'object_types'  => array( 'event', ),
        'context'       => 'normal',
        'priority'      => 'low',
        'show_names'    => true,
    ) );

    // Add fields

    $info->add_field( array(
		'name'    => esc_html__( 'Event Description', 'cmb2' ),
		'desc'    => esc_html__( 'Give a detailed description of the event.', 'cmb2' ),
		'id'      => $prefix . 'description',
		'type'    => 'wysiwyg',
		'options' => array( 'textarea_rows' => 10, ),
	) );

	$info->add_field( array(
		'name' => esc_html__( 'Online Bookings', 'cmb2' ),
		'desc' => esc_html__( 'The URL of a webpage where people can book tickets online.', 'cmb2' ),
		'id'   => $prefix . 'booking_url',
		'type' => 'text_url',
		'protocols' => array('http', 'https'),
	) );

	$info->add_field( array(
		'name' => esc_html__( 'Website', 'cmb2' ),
		'desc' => esc_html__( 'The URL of a website where people can find out more info about the event.', 'cmb2' ),
		'id'   => $prefix . 'url',
		'type' => 'text_url',
		'protocols' => array('http', 'https'),
	) );

	$info->add_field( array(
		'name' => esc_html__( 'Event Image', 'cmb2' ),
		'desc' => esc_html__( 'Upload an image or enter a URL. If you don\'t have your own image then you can find awesome FREE stock photos at www.pexels.com.', 'cmb2' ),
		'id'   => $prefix . 'image',
		'type' => 'file',
	) );

	$dates->add_field( array(
	    'name' => 'Dates and Times',
	    'desc' => 'The dates and times of the event.',
	    'id'   => $prefix . 'dates_and_times',
	    'type' => 'text_datetime_timestamp',
	    'repeatable' => true,
	    'date_format' => 'j M Y',
	) );

	$location->add_field( array(
	    'name'    => 'Venue Name (Optional)',
	    'id'      => $prefix . 'venue',
	    'type'    => 'text'
	) );

	$location->add_field( array(
	    'name'    => 'Street Address',
	    'id'      => $prefix . 'street_address',
	    'type'    => 'text',
	    'attributes' => array(
	    	'required' => 'required',
	    ),
	) );

	$location->add_field( array(
	    'name'    => 'City',
	    'id'      => $prefix . 'city',
	    'type'    => 'text',
	    'attributes' => array(
	    	'required' => 'required',
	    ),
	) );

	$contact->add_field( array(
		'name' => esc_html__( 'Contact Email', 'cmb2' ),
		'desc' => esc_html__( 'The email to contact to get more info about the event or to book a ticket. (This will be displayed)', 'cmb2' ),
		'id'   => $prefix . 'email',
		'type' => 'text_email',
	) );

	$contact->add_field( array(
		'name'       => esc_html__( 'Contact Phone', 'cmb2' ),
		'desc'       => esc_html__( 'The phone number to call to get more info about the event or to book a ticket. (This will be displayed)', 'cmb2' ),
		'id'         => $prefix . 'phone',
		'type'       => 'text',
	    'attributes' => array(
	    	'required' => 'required',
	    ),
	) );

	$tickets->add_field( array(
	    'id'          => $prefix . 'tickets',
	    'description' => 'Let people know how much it will cost for them to attend your event and what they\'ll get for their money.',
	    'type'        => 'group',
	    'options'     => array(
	        'group_title'   => __( 'Ticket {#}', 'cmb2' ),
	        'add_button'    => __( 'Add Another Ticket', 'cmb2' ),
	        'remove_button' => __( 'Remove Ticket', 'cmb2' ),
	        'sortable'      => true,
	    ),
	    'fields'      => array(
	        array(
	            'name' => 'Ticket Name',
	            'id'   => 'ticket_name',
	            'type' => 'text',
	        ),
	        array(
	            'name' => 'Description',
	            'description' => 'Write a short description for this ticket.',
	            'id'   => 'description',
	            'type' => 'textarea_small',
	        ),
	        array(
			    'name' => 'Price',
			    'desc' => 'The price of the ticket. Leave this blank if the ticket is free.',
			    'id' => 'price',
			    'type' => 'text_money',
			),
	    ),
	) );
}