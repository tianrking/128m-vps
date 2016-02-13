<?php
/**
 * FashionBuzz Theme Customizer
 *
 * @package FashionBuzz
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function fashionbuzz_customize_register( $wp_customize ) {
	
class WP_Customize_Textarea_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
        ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            </label>
        <?php
    }
}

//Add a class for titles
    class Fashionbuzz_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	$wp_customize->remove_control('header_textcolor');
	
	$wp_customize->add_section(
        'logo_sec',
        array(
            'title' => __('Logo (PRO Version)', 'fashionbuzz'),
            'priority' => 1,
            'description' => __('<strong>Logo settings available in</strong>','fashionbuzz'). '<a href="'.esc_url(pro_theme_url).'" target="_blank">PRO Version</a>.',
        )
    );  
    $wp_customize->add_setting('Fashionbuzz_options[font-info]', array(
			'sanitize_callback' => 'sanitize_text_field',
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( new Fashionbuzz_Info( $wp_customize, 'logo_section', array(
        'section' => 'logo_sec',
        'settings' => 'Fashionbuzz_options[font-info]',
        'priority' => null
        ) )
    );
	
	$wp_customize->add_section('opacity',array(
			'title'	=> __('Background Opacity (PRO Version)','fashionbuzz'),
			'description'	=> __('<strong>Background opacity available in','fashionbuzz'). '<a href="'.esc_url(pro_theme_url).'">PRO Version</a></strong>',
			'priority'	=> 2
	));
	
	$wp_customize->add_setting('bg_opacity',array(
			'sanitize_callback'	=> 'sanitize_text_field',
			'type'	=> 'info-control',
			'capability'	=> 'edit_theme_options'
	));
	
	$wp_customize->add_control(
		new Fashionbuzz_Info(
			$wp_customize,
			'bg_opacity',
			array(
				'setting'	=> 'bg_opacity',
				'section'	=> 'opacity'
			)
		)
	);
	
	$wp_customize->add_setting('color_scheme', array(
		'default' => '#d74516',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','fashionbuzz'),
			'description'	=> __('<strong>More color options in</strong>','fashionbuzz'). '<a href="'.esc_url(pro_theme_url).'" target="_blank">PRO version</a>',
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	$wp_customize->add_section('social_section',array(
		'title'	=> __('Social Links','fashionbuzz'),
		'description'	=> __('Add your social links here. <br><strong>More social links in</strong>','fashionbuzz'). '<a href="'.esc_url(pro_theme_url).'" target="_blank">PRO version</a>.',
		'priority'		=> null
	));
	
	$wp_customize->add_setting('fb_link',array(
		'default'	=> '#',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	
	$wp_customize->add_control('fb_link',array(
		'label'	=> __('Add facebook link here.','fashionbuzz'),
		'section'	=> 'social_section',
		'type'		=> 'text'
	));
	
	$wp_customize->add_setting('twitt_link',array(
		'default'	=> '#',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	
	$wp_customize->add_control('twitt_link',array(
		'label'	=> __('Add twitter link here.','fashionbuzz'),
		'section'	=> 'social_section',
		'type'		=> 'text'
	));
	
	$wp_customize->add_setting('in_link',array(
		'default'	=> '#',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	
	$wp_customize->add_control('in_link',array(
		'label'	=> __('Add linkedin link here.','fashionbuzz'),
		'section'	=> 'social_section',
		'type'		=> 'text'
	));
	
	$wp_customize->add_setting('gplus_link',array(
		'default'	=> '#',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	
	$wp_customize->add_control('gplus_link',array(
		'label'	=> __('Add google plus link here.','fashionbuzz'),
		'section'	=> 'social_section',
		'type'		=> 'text'
	));
	
	$wp_customize->add_setting('flickr_link',array(
		'default'	=> '#',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	
	$wp_customize->add_control('flickr_link',array(
		'label'	=> __('Add flickr link here.','fashionbuzz'),
		'section'	=> 'social_section',
		'type'		=> 'text'
	));

	
	$wp_customize->add_section('slider_section',array(
		'title'	=> __('Slider Settings','fashionbuzz'),
		'description'	=> __('Add slider images here. <br><strong>More slider settings available in</strong>','fashionbuzz'). '<a href="'.esc_url(pro_theme_url).'" target="_blank">PRO version</a>.',
		'priority'		=> null
	));
	
	$wp_customize->add_section('footer_section',array(
		'title'	=> __('Footer Text','fashionbuzz'),
		'description'	=> __('Add some text for footer like copyright etc.','fashionbuzz'),
		'priority'	=> null
	));
	
	$wp_customize->add_setting('footer_copy',array(
		'default'	=> __('FashionBuzz 2015 | All Rights Reserved.','fashionbuzz'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	
	$wp_customize->add_control('footer_copy',array(
		'label'	=> __('Copyright Text','fashionbuzz'),
		'section'	=> 'footer_section',
		'type'		=> 'text'
	));
	
	$wp_customize->add_setting('Fashionbuzz_options[credit-info]', array(
			'sanitize_callback' => 'sanitize_text_field',
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( new Fashionbuzz_Info( $wp_customize, 'cred_section', array(
        'section' => 'footer_section',
		'label'	=> __('To remove credit link upgrade to pro','fashionbuzz'),
        'settings' => 'Fashionbuzz_options[credit-info]',
        ) )
    );
	
	$wp_customize->add_section(
        'theme_layout_sec',
        array(
            'title' => __('Layout Settings (PRO Version)', 'fashionbuzz'),
            'priority' => null,
            'description' => __('<strong>Layout Settings available in</strong>','fashionbuzz'). '<a href="'.esc_url(pro_theme_url).'" target="_blank">PRO Version</a>.',
        )
    );  
    $wp_customize->add_setting('Fashionbuzz_options[layout-info]', array(
			'sanitize_callback' => 'sanitize_text_field',
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( new Fashionbuzz_Info( $wp_customize, 'layout_section', array(
        'section' => 'theme_layout_sec',
        'settings' => 'Fashionbuzz_options[layout-info]',
        'priority' => null
        ) )
    );
	
	$wp_customize->add_section(
        'theme_font_sec',
        array(
            'title' => __('Fonts Settings (PRO Version)', 'fashionbuzz'),
            'priority' => null,
            'description' => __('<strong>Font Settings available in</strong>','fashionbuzz'). '<a href="'.esc_url(pro_theme_url).'" target="_blank">PRO Version</a>.',
        )
    );  
    $wp_customize->add_setting('Fashionbuzz_options[font-info]', array(
			'sanitize_callback' => 'sanitize_text_field',
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( new Fashionbuzz_Info( $wp_customize, 'font_section', array(
        'section' => 'theme_font_sec',
        'settings' => 'Fashionbuzz_options[font-info]',
        'priority' => null
        ) )
    );
	
    $wp_customize->add_section(
        'theme_doc_sec',
        array(
            'title' => __('Documentation &amp; Support', 'fashionbuzz'),
            'priority' => null,
            'description' => __('For documentation and support check this link :','fashionbuzz'). '<a href="'.esc_url(theme_doc).'" target="_blank">FashionBuzz Documentation</a>',
        )
    );  
    $wp_customize->add_setting('Fashionbuzz_options[info]', array(
			'sanitize_callback' => 'sanitize_text_field',
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( new Fashionbuzz_Info( $wp_customize, 'doc_section', array(
        'section' => 'theme_doc_sec',
        'settings' => 'Fashionbuzz_options[info]',
        'priority' => 10
        ) )
    );
	
	
}
add_action( 'customize_register', 'fashionbuzz_customize_register' );

//Integer
function fashionbuzz_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}	

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function fashionbuzz_customize_preview_js() {
	wp_enqueue_script( 'fashionbuzz_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'fashionbuzz_customize_preview_js' );

function fashionbuzz_css(){
		?>
        <style>
				.social_icons h5,
				.social_icons a,
				a,
				a:hover, a:focus, 
				.tm_client strong,
				#footer a,
				.nav ul li:hover a, 
				.nav ul li.current_page_item a,
				.postmeta a:hover,
				#sidebar ul li a:hover,
				.blog-post h3.entry-title,
				.woocommerce ul.products li.product .price{
					color:<?php echo get_theme_mod('color_scheme','#d74516'); ?>;
				}
				a.read-more, a.blog-more,
				.pagination ul li .current, 
				.pagination ul li a:hover,
				#commentform input#submit,
				input.search-submit{
					background-color:<?php echo get_theme_mod('color_scheme','#d74516'); ?>;
				}
		</style>
	<?php }
add_action('wp_head','fashionbuzz_css');

function fashionbuzz_custom_customize_enqueue() {
	wp_enqueue_script( 'fashionbuzz-custom-customize', get_template_directory_uri() . '/js/custom.customize.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'fashionbuzz_custom_customize_enqueue' );