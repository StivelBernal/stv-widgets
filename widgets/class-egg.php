<?php
/**
 * Content Egg class.
 *
 * @category   Class
 * @package    ElementorStv
 * @subpackage WordPress
 * @author     Brayan Bernal <contacto@stivel.dev>
 * @copyright  2020 Brayan Bernal
 * @license    https://opensource.org/licenses/GPL-3.0 GPL-3.0-only
 * @link       link(https://www.stivel.dev/elementor/,
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
 * Egg widget class.
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

		// STYLES
		//wp_register_style( 'stv-pstyle', plugins_url( '/assets/css/magnific-popup.css', ELEMENTOR_STV ), [], '1.0.0' );
		
		wp_register_style( 'stv-movement', plugins_url( '/assets/css/fovea.css', ELEMENTOR_STV ), [], $vers );
		
		//SCRIPTS
		wp_enqueue_script( 'stv-popup', plugins_url( '/assets/magnific-popup/jquery.magnific-popup.js', ELEMENTOR_STV ), ['jquery'], $vers);
	
		wp_enqueue_script( 'stv-scripts-g', plugins_url( '/assets/js/fovea.js', ELEMENTOR_STV ), ['jquery', 'stv-popup'], $vers);
		
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
		return 'fa fa-eye';
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
		return array( 'stv-movement', 'stv-popup', 'stv-scripts-g' );
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

				
		$this->add_control(
			'color_borde1',
			array(
				'label'   => __( 'Color Borde 1', 'elementor-stv' ),
				'type'    => Controls_Manager::COLOR,
				'default' => '#000000',
			)
		);

		$this->add_control(
			'color_borde2',
			array(
				'label'   => __( 'Color Borde 2', 'elementor-stv' ),
				'type'    => Controls_Manager::COLOR,
				'default' => '#000000',
			)
		);

		$this->add_control(
			'color_borde3',
			array(
				'label'   => __( 'Color Borde 3', 'elementor-stv' ),
				'type'    => Controls_Manager::COLOR,
				'default' => '#000000',
			)
		);


		$this->add_control(
			'color_fondo',
			array(
				'label'   => __( 'Color Fondo', 'elementor-stv' ),
				'type'    => Controls_Manager::COLOR,
				'default' => '#000000',
			)
		);

		$this->add_control(
			'tamaño_imagen',
			array(
				'label'   => __( 'Tamaño imagen', 'elementor-stv' ),
				'type'    => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 270,
				],
			)
		);

		$this->add_control(
			'x_imagen',
			array(
				'label'   => __( 'Posición horizontal imagen', 'elementor-stv' ),
				'type'    => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -250,
						'max' => 250,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
			)
		);


		$this->add_control(
			'y_imagen',
			array(
				'label'   => __( 'Posición vertical imagen', 'elementor-stv' ),
				'type'    => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -250,
						'max' => 250,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => -30,
				],
			)
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
		
		?>
		
		<?php

		$play = '';

		if ( $settings['action_egg'] === 'video' ) {  
			
			/*$play = '
			<image width="110%" height="110%" xlink:href="/wp-content/themes/fovea/app/imagenes/play.svg"/>
		';*/

		$play = '<g style="transform: translate(-10%, -8%);">
					<circle class="st0" cx="182.23" cy="126.15" r="40"/>
					<polygon class="st1" points="172.23,109.47 172.23,144.83 197.23,126.54 	"/>
				</g>';
		}

		
		$svg = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 283.65 196.35">
					<defs>
					
					<style>
						.cls-2{fill:#ffffff;}
						.cls-1,.cls-4{
							stroke: url(#linear-gradient);
							stroke-miterlimit:10;
							stroke-width:5px;
						}
						.cls-3{clip-path:url(#clip-path);}
						.cls-4{fill:none;}
						.st0{opacity:0.47;}
						.st1{fill: '.$settings['color_borde3'].';}
						</style>

						<linearGradient id="linear-gradient" y1="113.2" x2="304.92" y2="113.2" gradientUnits="userSpaceOnUse">
							<stop offset="0" stop-color="'.$settings['color_borde1'].'" stop-opacity="0.68"/>
							<stop offset="0.19" stop-color="'.$settings['color_borde2'].'"/>
							<stop offset="1" stop-color="'.$settings['color_borde3'].'" stop-opacity="0.6"/>
						</linearGradient>
						<clipPath id="clip-path" transform="translate(18.52)">
							<path class="cls-1" d="M258.8,129.18S253.42-1.52,117,2.6c0,0-62.82,4.76-98.05,70.44,0,0-32.81,60.38-5.7,98.05,0,0,9,22.89,50.47,22.34,42-.53,97.61.74,132.86.34C234.81,193.31,263.1,164.86,258.8,129.18Z"/>
						</clipPath>

					</defs>
					<title>Recurso 3img</title>
					<g id="Capa_2" data-name="Capa 2">
						<g id="Graficos">
							<path class="cls-2" style="fill: '.$settings['color_fondo'].';" d="M258.8,129.18S253.42-1.52,117,2.6c0,0-62.82,4.76-98.05,70.44,0,0-32.81,60.38-5.7,98.05,0,0,9,22.89,50.47,22.34,42-.53,97.61.74,132.86.34C234.81,193.31,263.1,164.86,258.8,129.18Z" transform="translate(18.52)"/>
							<g class="cls-3">
								<image width="'.$settings['tamaño_imagen']['size'].'" height="'.$settings['tamaño_imagen']['size'].'" transform="translate('.$settings['x_imagen']['size'].' '.$settings['y_imagen']['size'].') scale(1)" xlink:href="'.$settings['mask_image']['url'].'"/>
							</g>
							
							<path class="cls-4" d="M258.8,129.18S253.42-1.52,117,2.6c0,0-62.82,4.76-98.05,70.44,0,0-32.81,60.38-5.7,98.05,0,0,9,22.89,50.47,22.34,42-.53,97.61.74,132.86.34C234.81,193.31,263.1,164.86,258.8,129.18Z" transform="translate(18.52)"/>
							
						</g>
					</g>
					<g style="fill: '.$settings['color_fondo'].';">
					'.$play.'
					</g>
				</svg>';


		if ( $settings['action_egg'] === 'gallery' ) {
			
			?>
						
			<div class="col-xs-12 gallery-stv">
				
				<a  class="gallery-item noDecoracion" href="<?php echo wp_kses( $settings['mask_image']['url'], array() ); ?>" title="<?php echo wp_kses( $settings['title'], array() ); ?>">
					<div class="gallery-container-img burbuja">		
						<?php echo $svg; ?>
					</div>
				</a>

			</div>

			<?php
			
		}else if ( $settings['action_egg'] === 'video' ) {   
			
			?>
						
			<div class="col-xs-12 gallery-stv">
				
				<a class="gallery-item-video noDecoracion" href="<?php echo wp_kses( $settings['url'], array() ); ?>" title="<?php echo wp_kses( $settings['title'], array() ); ?>">
					<div class="gallery-container-img burbuja">		
						<?php echo $svg; ?>
					</div>
				</a>

			</div>


			<?php


		}else{
			
			?>
			
			<div class="col-xs-12 gallery-stv">
				
				<a class="gallery-item noDecoracion" href="<?php echo wp_kses( $settings['url'], array() ); ?>" title="<?php echo wp_kses( $settings['title'], array() ); ?>">
					<div class="gallery-container-img burbuja">		
						<?php echo $svg; ?>
					</div>
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
				
		?>

		<#

		var svg = `<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" viewBox=\"0 0 283.65 196.35\">
						<defs>
						
						<style>
							.cls-2{fill:#ffffff;}
							.cls-1,.cls-4{
								stroke: url(#linear-gradient);
								stroke-miterlimit:10;
								stroke-width:5px;
							}
							.cls-3{clip-path:url(#clip-path);}
							.cls-4{fill:none;}
							</style>

							<linearGradient id=\"linear-gradient\" y1=\"113.2\" x2=\"304.92\" y2=\"113.2\" gradientUnits=\"userSpaceOnUse\">
								<stop offset=\"0\" stop-color=\"${settings.color_borde1}\" stop-opacity=\"0.68\"/>
								<stop offset=\"0.19\" stop-color=\"${settings.color_borde2}\"/>
								<stop offset=\"1\" stop-color=\"${settings.color_borde3}\" stop-opacity=\"0.6\"/>
							</linearGradient>
							<clipPath id=\"clip-path\" transform=\"translate(18.52)\">
								<path class=\"cls-1\" d=\"M258.8,129.18S253.42-1.52,117,2.6c0,0-62.82,4.76-98.05,70.44,0,0-32.81,60.38-5.7,98.05,0,0,9,22.89,50.47,22.34,42-.53,97.61.74,132.86.34C234.81,193.31,263.1,164.86,258.8,129.18Z\"/>
							</clipPath>

						</defs>
						<title>Recurso 3img</title>
						<g id=\"Capa_2\" data-name=\"Capa 2\">
							<g id=\"Graficos\">
								<path class=\"cls-2\" style=\"fill: ${settings['color_fondo']};\" d=\"M258.8,129.18S253.42-1.52,117,2.6c0,0-62.82,4.76-98.05,70.44,0,0-32.81,60.38-5.7,98.05,0,0,9,22.89,50.47,22.34,42-.53,97.61.74,132.86.34C234.81,193.31,263.1,164.86,258.8,129.18Z\" transform=\"translate(18.52)\"/>
								<g class=\"cls-3\">
									<image width=\"${settings['tamaño_imagen'].size}\" height=\"${settings['tamaño_imagen'].size}\" transform=\"translate(${settings['x_imagen'].size} ${settings['y_imagen'].size}) scale(1)\" xlink:href=\"${settings.mask_image.url}\"/>
								</g>

								<path class=\"cls-4\" d=\"M258.8,129.18S253.42-1.52,117,2.6c0,0-62.82,4.76-98.05,70.44,0,0-32.81,60.38-5.7,98.05,0,0,9,22.89,50.47,22.34,42-.53,97.61.74,132.86.34C234.81,193.31,263.1,164.86,258.8,129.18Z\" transform=\"translate(18.52)\"/>
						
							</g>
						</g>
					</svg>`;


		if ( settings.action_egg === 'gallery' ) {

			
			#>
			<div class="col-xs-12 gallery-stv">

				<a class="gallery-item noDecoracion" href="{{{ settings.mask_image.url }}}" title="{{{ settings.title }}}">
					<div class="gallery-container-img burbuja">		
						{{{ svg }}}
					</div>
				</a>

			</div>
			<#
		}else if( settings.action_egg === 'video' ){
			#>
			<div class="col-xs-12 gallery-stv">

				<a class="gallery-item-video" href="{{{ settings.url }}}" title="{{{ settings.title }}}">
					<div class="gallery-container-img burbuja">		
						{{{ svg }}}
					</div>
				</a>
           
         	</div>
			<#
		}else{
			#>
			<div class="col-xs-12 gallery-stv">

				<a class="gallery-item noDecoracion" href="{{{ settings.url }}}" title="{{{ settings.title }}}">
					<div class="gallery-container-img burbuja">		
						{{{ svg }}}
					</div>
				</a>

			</div>
			<#
		}


		#>
		
		<?php
	}
}
