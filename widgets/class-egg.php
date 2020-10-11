<?php
/**
 * Awesomesauce class.
 *
 * @category   Class
 * @package    ElementorAwesomesauce
 * @subpackage WordPress
 * @author     Ben Marshall <me@benmarshall.me>
 * @copyright  2020 Ben Marshall
 * @license    https://opensource.org/licenses/GPL-3.0 GPL-3.0-only
 * @link       link(https://www.benmarshall.me/build-custom-elementor-widgets/,
 *             Build Custom Elementor Widgets)
 * @since      1.0.0
 * php version 7.3.9
 */

namespace ElementorStv\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();

/**
 * Awesomesauce widget class.
 *
 * @since 1.0.0
 */
class Egg extends Widget_Base {
	/**
	 * Class constructor.
	 *
	 * @param array $data Widget data.
	 * @param array $args Widget arguments.
	 */
	public function __construct( $data = array(), $args = null ) {
		parent::__construct( $data, $args );

		$vers =  STV_DEV_MODE ? time(): false;

		wp_register_style( 'stv-movement', plugins_url( '/assets/css/stv-movement.css', ELEMENTOR_STV ), [], $vers );
		
		wp_enqueue_script( 'stv-popup', plugins_url( '/assets/magnific-popup/jquery.magnific-popup.js', ELEMENTOR_STV ), ['jquery'], $vers);
	
		wp_enqueue_script( 'stv-scripts-g', plugins_url( '/assets/js/fovea.js', ELEMENTOR_STV ), ['jquery'], $vers);
		
	}

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Huevo';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Huevo', ' elementor-stv' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-weixin';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'general' );
	}
	
	/**
	 * Enqueue styles.
	 */
	public function get_style_depends() {
		return array( 'stv-movement' );
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			array(
				'label' => __( 'Contenido', 'elementor-stv' ),
			)
		);

		
		$this->add_control(
			'title',
			array(
				'label'   => __( 'Titulo', 'elementor-stv' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Titulo',
			)
		);

		$this->add_control(
			'url',
			array(
				'label'   => __( 'Url', 'elementor-stv' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '#!',
			)
		);

	
		$this->add_control(
			'mask_image',
			[
				'label' => __( 'Mask Image', 'elementor-stv' ),
				'type' => Controls_Manager::MEDIA,
        		'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);

		$this->add_control(
			'action_egg',
			[
			  'label' => __( 'Acción', 'elementor-stv' ),
			  'type' => \Elementor\Controls_Manager::CHOOSE,
			  'options' => [
				'link' => [
				  'title' => __( 'Link', 'elementor-stv' ),
				  'icon' => 'fa fa-link',
				],
				'video' => [
				  'title' => __( 'Video', 'elementor-stv' ),
				  'icon' => 'fa fa-play-circle',
				],
				'gallery' => [
				  'title' => __( 'Galeria', 'elementor-stv' ),
				  'icon' => 'fa fa-arrows-alt',
				]
			  ],
			  'default' => 'link',
			  'toggle' => true,
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'style_section',
			[
			  'label' => __( 'Style Section', 'elementor-stv' ),
			  'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->end_controls_section();
		

	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		//$this->add_inline_editing_attributes( 'title', 'none' );
		//$this->add_inline_editing_attributes( 'description', 'basic' );
		//$this->add_inline_editing_attributes( 'content', 'advanced' );
		?>
		<?php 
		
		if ( $settings['action_egg'] === 'gallery' ) {
			
			?>
						
			<div class="col-xs-12">

				<a class="gallery-item noDecoracion" href="<?php echo wp_kses( $settings['mask_image']['url'], array() ); ?>" title="<?php echo wp_kses( $settings['title'], array() ); ?>">
					<img class="img-responsive burbuja" src="<?php echo wp_kses( $settings['mask_image']['url'], array() ); ?>" alt="<?php echo wp_kses( $settings['title'], array() ); ?>">
				</a>

			</div>

			<?php
			
		}else if ( $settings['action_egg'] === 'video' ) {
			
			?>
						
			<div class="col-xs-12">

				<a class="gallery-item-video noDecoracion" href="<?php echo wp_kses( $settings['url'], array() ); ?>" title="<?php echo wp_kses( $settings['title'], array() ); ?>">
					<img class="img-responsive burbuja" src="<?php echo wp_kses( $settings['mask_image']['url'], array() ); ?>" alt="<?php echo wp_kses( $settings['title'], array() ); ?>">
				</a>

			</div>


			<?php


		}else{
			
			?>
			
			<div class="col-xs-12">

				<a class="gallery-item noDecoracion" href="<?php echo wp_kses( $settings['url'], array() ); ?>" title="<?php echo wp_kses( $settings['title'], array() ); ?>">
					<img class="img-responsive burbuja" src="<?php echo wp_kses( $settings['mask_image']['url'], array() ); ?>" alt="<?php echo wp_kses( $settings['title'], array() ); ?>">
				</a>

			</div>

			<?php

		}	
	
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _content_template() {
		
		// <#
		// view.addInlineEditingAttributes( 'title', 'none' );
		// view.addInlineEditingAttributes( 'description', 'basic' );
		// view.addInlineEditingAttributes( 'content', 'advanced' );
		// #>

		// <h2 {{{ view.getRenderAttributeString( 'title' ) }}}>{{{ settings.title }}}</h2>
		// <div {{{ view.getRenderAttributeString( 'description' ) }}}>{{{ settings.description }}}</div>
		// <div {{{ view.getRenderAttributeString( 'content' ) }}}>{{{ settings.content }}}</div>
		
		?>


		<#
		if ( settings.action_egg === 'gallery' ) {
			#>
			<div class="col-xs-12">

				<a class="gallery-item noDecoracion" href="{{{ settings.mask_image.url }}}" title="{{{ settings.title }}}">
					<img class="img-responsive burbuja" src="{{{ settings.mask_image.url }}}" alt="{{{ settings.title }}}">
				</a>

			</div>
			<#
		}else if( settings.action_egg === 'video' ){
			#>
			<div class="col-xs-12">

				<a class="gallery-item-video" href="{{{ settings.url }}}" title="{{{ settings.title }}}">
					<img class="img-responsive burbuja" src="{{{ settings.mask_image.url }}}" alt="{{{ settings.title }}}">
				</a>
           
         	</div>
			<#
		}else{
			#>
			<div class="col-xs-12">

				<a class="gallery-item noDecoracion" href="{{{ settings.url }}}" title="{{{ settings.title }}}">
					<img class="img-responsive burbuja" src="{{{ settings.mask_image.url }}}" alt="{{{ settings.title }}}">
				</a>

			</div>
			<#
		}


		#>
		
		<?php
	}
}
