<?php 

/*
 * Options.php
 * Adds our options to the theme customizer.
 *************************************************************/

function wptricks_customize_register( $wp_customize ) {
	
	$template_dir = get_bloginfo('template_directory');

	
	/*
	 * ADD IMAGE UPLOADERS FOR THE HEADER AND FOOTER LOGOS
	 **/
	$wp_customize->add_section( 'header_logo' , array( 
		'title'       => __( 'Header Logo', 'wptricks' ),
		'priority'    => 40,
		'description' => 'Upload a logo to replace the default site name and description in the header, I recommend using an image that has a maximum height of 80px!',
	) );
	$wp_customize->add_setting( 'header_logo', array ( 'default'    => $template_dir . '/images/logo.png', ) ); // DEFAULT HEADER LOGO.PNG
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_logo', array(
		'label'    => __( 'Header Logo', 'wptricks' ),
		'section'  => 'header_logo',
		'settings' => 'header_logo',
	) ) );	
	
	/*
	 *  PROVIDE COLOUR OPTIONS
	 **/
	$colors = array();
	$colors[] = array(
		'slug'=>'content_text_color', 
		'default' => '#4a4a4a',
		'label' => __('Content Text Color', 'wptricks')
	);
	$colors[] = array(
		'slug'=>'content_link_color', 
		'default' => '#ff3b12',
		'label' => __('Content Link Color', 'wptricks')
	);
	$colors[] = array(
		'slug'=>'content_link_hover_color', 
		'default' => '#CC2B0A',
		'label' => __('Content Link Hover Color', 'wptricks')
	);
	$colors[] = array(
		'slug'=>'highlight_color', 
		'default' => '#ff3b12',
		'label' => __('Highlight Colors', 'wptricks')
	);
	$colors[] = array(
		'slug'=>'h_tag_color', 
		'default' => '#ff3b12',
		'label' => __('H Tag Colors', 'wptricks')
	);
	foreach( $colors as $color ) {
		// SETTINGS
		$wp_customize->add_setting(
			$color['slug'], array(
				'default' => $color['default'],
				'type' => 'option', 
				'capability' => 
				'edit_theme_options'
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$color['slug'], 
				array('label' => $color['label'], 
				'section' => 'colors',
				'settings' => $color['slug'])
			)
		);
	}
	

	
	/*
	 * INCLUDE SOCIAL MEDIA
	 **/
	$wp_customize->add_section( 'my_social_settings', array(
            'title'		=> 'Social Media',
            'priority'     => 50,
    ) );
 
    $social_sites = wptricks_social_media_array();
    $priority = 5;
 
    foreach($social_sites as $social_site) {
 
        $wp_customize->add_setting( "$social_site", array(
                'default' => '',
        ) );
 
        $wp_customize->add_control( $social_site, array(
                'label'   => __( "$social_site url:", 'social_icon' ),
                'section' => 'my_social_settings',
                'type'    => 'text',
                'priority'=> $priority,
        ) );
 
        $priority = $priority + 5;
    } 
	
		
		/*
	 * CUSTOM SIDEBAR POSITIONING
	 **/
	$wp_customize->add_setting('sidebar_position', array());
	$wp_customize->add_control('sidebar_position', array(
		'label'      => __('Sidebar Position', 'wptricks'),
		'section'    => 'layout',
		'settings'   => 'sidebar_position',
		'type'       => 'radio',
		'choices'    => array(
			'sidebar-right'  => 'Right',
			'sidebar-left'   => 'Left',
			'sidebar-none'  => 'None',
		),
	));
	$wp_customize->add_section('layout' , array(
		'title' => __('Layout','wptricks'),
		'priority'    => 50,
	));
	
	/*
	 * ADD A STANDARD TEXT FIELD FOR THE COPYRIGHT TEXT
	 **/	
	$wp_customize->add_section('wptricks_footer_copyright_text', array(
            'title' => __('Copyright Mesage ©','wptricks'),
            'description' => 'This is the copyright message in the footer.',
            'priority' => 55,
        )
    );
	$wp_customize->add_setting( 'wptricks_footer_copyright_text', array('default' => 'All Rights Reserved WPtricks',));
	$wp_customize->add_control(	'wptricks_footer_copyright_text', array(
			'section'  => 'wptricks_footer_copyright_text',
			'settings' => 'wptricks_footer_copyright_text',
			'label'    => 'Copyright Message',
			'type'     => 'text',
		)
	);
	
	
} add_action( 'customize_register', 'wptricks_customize_register' ); // END - wptricks_customize_register

/*
 * THIS IS THE OTHER FUNC... SOCIAL MEDIA FUNCTION
 **/
function wptricks_social_media_array() {
 
    // store social site names in array
    $social_sites = array('twitter', 'facebook', 'google-plus', 'flickr', 'pinterest', 'youtube', 'vimeo', 'tumblr', 'dribbble', 'rss', 'linkedin', 'instagram');
 
    return $social_sites;
}
// takes user input from the customizer and outputs linked social media icons
function my_social_media_icons() {
 
    $social_sites = wptricks_social_media_array();
 
    // any inputs that aren't empty are stored in $active_sites array
    foreach($social_sites as $social_site) {
        if( strlen( get_theme_mod( $social_site ) ) > 0 ) {
            $active_sites[] = $social_site;
        }
    }
 
 
    // for each active social site, add it as a list item
    if($active_sites) {
        echo "<ul class='social-media-icons'>";
        foreach ($active_sites as $active_site) {?>
            <li>
                <a href="<?php echo get_theme_mod( $active_site ); ?>" target="new">
                    <?php if( $active_site == "vimeo") { ?>
                        <i class="fa fa-<?php echo $active_site; ?>-square"></i> <?php
                    } else { ?>
                        <i class="fa fa-<?php echo $active_site; ?>"></i><?php
                    } ?>
                </a>
            </li><?php
        }
        echo "</ul>";
    }
}


/*
 * MAKE IT PRETTY ~ load styles only on the customizer
 ***/
 
 add_action('customize_controls_print_styles', 'my_custom_styles');
function my_custom_styles() {
	$bloginfo = get_bloginfo( 'template_directory' );
  echo '<style>
			/* Theme customizer styles */
		#customize-control-sidebar_position > label {
			display: block;
			margin-bottom: 7px;
			width: 230px;
			height: 60px;
			background-position: top right;
			background-repeat: no-repeat;
		}
		#customize-control-sidebar_position > label {
			background-image: url( '. $bloginfo .'/images/options/2cr.png);
		}
		#customize-control-sidebar_position > label:nth-of-type(2) {
			background-image: url('. $bloginfo .'/images/options/2cl.png);
		}
		#customize-control-sidebar_position > label:nth-of-type(3) {
			background-image: url('. $bloginfo .'/images/options/1col.png);
		}
  </style>';
}