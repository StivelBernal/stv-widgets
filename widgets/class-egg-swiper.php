<?php
/**
 * Content Egg Swiper class.
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
 * EggSwiper widget class.
 *
 * @since 1.0.0
 */
class EggSwiper extends Widget_Base {
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

		wp_register_style( 'stv-movement', plugins_url( '/assets/css/fovea.css', ELEMENTOR_STV ), [], $vers );

		wp_register_style( 'stv-swipercss', plugins_url( '/assets/swiper/swiper-bundle.min.css', ELEMENTOR_STV ), [], '1.0.0' );
		
		
		//SCRIPTS
		wp_enqueue_script( 'stv-swiperjs', plugins_url( '/assets/swiper/swiper-bundle.min.js', ELEMENTOR_STV ), [], '1.0.0');
		
		wp_enqueue_script( 'stv-popup', plugins_url( '/assets/magnific-popup/jquery.magnific-popup.js', ELEMENTOR_STV ), ['jquery'], $vers);
	
		wp_enqueue_script( 'stv-scripts-g', plugins_url( '/assets/js/fovea.js', ELEMENTOR_STV ), ['jquery', 'stv-swiperjs'], $vers);
		

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
		return 'Huevo Carousel';
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
		return __( 'Huevo Carousel', ' elementor-stv' );
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
		return 'fa fa-ellipsis-h';
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
		return array( 'stv-movement', 'stv-swipercss', 'stv-swiperjs' );
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


		$repeater = new \Elementor\Repeater();

		
		$repeater->add_control(
			'title',
			array(
				'label'   => __( 'Titulo', 'elementor-stv' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Titulo',
			)
		);

		$repeater->add_control(
			'url',
			array(
				'label'   => __( 'Url', 'elementor-stv' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '#!',
			)
		);

	
		$repeater->add_control(
			'mask_image',
			[
				'label' => __( 'Mask Image', 'elementor-stv' ),
				'type' => Controls_Manager::MEDIA,
        		'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);

		$repeater->add_control(
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

		$this->add_control(
			'list',
			[
				'label' => __( 'Items', 'elementor-stv' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				[
					'title' => __( 'titulo imagen', 'elementor-stv' ),
						'default' => [
						'url' => __( 'Url del video o del enlace', 'elementor-stv' ),
						
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->add_control(
			'slides_number',
			array(
				'label'   => __( 'Slides visibles', 'elementor-stv' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [ 	'1' => '1',
								'2' => '2',
								'3' => '3',
								'4' => '4',
								'5' => '5'],
				'default' => '2',
			)
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
			
		if ( $settings['list'] ) {

			echo '
			<div class="swiper-stv swiper-container-'.$settings['slides_number'].'">
			
				<div class="swiper-wrapper">';

				foreach (  $settings['list'] as $item ) {

					$play = '';

					if ( $item['action_egg'] === 'video' ) { 
						
						
								
					$play = '
					<g style="transform: translate(-10%, -8%);">
						<circle class="st0" cx="182.23" cy="126.15" r="40"/>
						<polygon style="fill: '.$settings['color_borde3'].';" class="st1" points="172.23,109.47 172.23,144.83 197.23,126.54 	"/>
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
											<image width="961" height="638" transform="translate(0 3.69) scale(0.3)" xlink:href="'.$item['mask_image']['url'].'"/>
										</g>
										<g style="fill: '.$settings['color_fondo'].';">
											'.$play.'
										</g>

										<path class="cls-4" d="M258.8,129.18S253.42-1.52,117,2.6c0,0-62.82,4.76-98.05,70.44,0,0-32.81,60.38-5.7,98.05,0,0,9,22.89,50.47,22.34,42-.53,97.61.74,132.86.34C234.81,193.31,263.1,164.86,258.8,129.18Z" transform="translate(18.52)"/>
								
									</g>
								</g>
							</svg>';



					echo '
					<div class="swiper-slide item-swp-'.$item['_id'].'">
					';


					if ( $item['action_egg'] === 'gallery' ) {
						
						?>
									
						<div class="col-xs-12 gallery-stv">
							
							<a  class="gallery-item noDecoracion" href="<?php echo wp_kses( $item['mask_image']['url'], array() ); ?>" title="<?php echo wp_kses( $item['title'], array() ); ?>">
								<div class="gallery-container-img burbuja">		
									<?php echo $svg; ?>
								</div>
							</a>

						</div>

						<?php
						
					}else if ( $item['action_egg'] === 'video' ) {   
						
						?>
									
						<div class="col-xs-12 gallery-stv">
							
							<a class="gallery-item-video noDecoracion" href="<?php echo wp_kses( $item['url'], array() ); ?>" title="<?php echo wp_kses( $item['title'], array() ); ?>">
								<div class="gallery-container-img burbuja">		
									<?php echo $svg; ?>
								</div>
							</a>

						</div>


						<?php


					}else{
						
						?>
						
						<div class="col-xs-12 gallery-stv">
							
							<a class="gallery-item noDecoracion" href="<?php echo wp_kses( $item['url'], array() ); ?>" title="<?php echo wp_kses( $item['title'], array() ); ?>">
								<div class="gallery-container-img burbuja">		
									<?php echo $svg; ?>
								</div>
							</a>

						</div>

						<?php

					}	

					
				
					echo '</div>';
				}

				echo '
				</div>

				<div class="button-prev">
					<svg version="1.1" id="Capa_2_xA0_Imagen_1_" opacity="0.9"
								xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 372 282"
								style="enable-background:new 0 0 372 282;" xml:space="preserve">
							<style type="text/css">
								.st0{fill:#006CB9;stroke:#FFFFFF;stroke-miterlimit:10;}
							</style>
							<path class="st0" d="M152.5,92.2c0,0-50,45.9,2.9,93c0,0,21.5,15.3,32.2,6.2c10.8-9.1,4.6-14.9,3.3-19.1
								c-1.2-4.1-21.9-35.1-6.2-67.8c0,0,4.4-19.7-8.9-21.7C175.9,82.9,165.8,80.5,152.5,92.2L152.5,92.2z"/>
					</svg>
					
				</div>
				<div class="button-next">
					<svg version="1.1" id="Capa_2_xA0_Imagen_1_" opacity="0.9"
							xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 372 282"
							style="enable-background:new 0 0 372 282;" xml:space="preserve">
							<style type="text/css">
								.st0{fill:#006CB9;stroke:#FFFFFF;stroke-miterlimit:10;}
							</style>
						<path class="st0" d="M250.5,92.2c0,0,50,45.9-2.9,93c0,0-21.5,15.3-32.2,6.2c-10.8-9.1-4.6-14.9-3.3-19.1
						c1.2-4.1,21.9-35.1,6.2-67.8c0,0-4.4-19.7,8.9-21.7C227.2,82.9,237.3,80.5,250.5,92.2L250.5,92.2z"/>
					</svg>
					
				</div>
			</div>';
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
	
		if ( settings.list.length ) { 

			var svg = '';

			
			<div class="swiper-container-{{{settings.slides_number}}}">
			
				<div class="swiper-wrapper">
					
				<# _.each( settings.list, function( item ) { 
					
					svg = `<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" viewBox=\"0 0 283.65 196.35\">
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
								<path class=\"cls-2\" style=\"fill: ${settings.color_fondo};\" d=\"M258.8,129.18S253.42-1.52,117,2.6c0,0-62.82,4.76-98.05,70.44,0,0-32.81,60.38-5.7,98.05,0,0,9,22.89,50.47,22.34,42-.53,97.61.74,132.86.34C234.81,193.31,263.1,164.86,258.8,129.18Z\" transform=\"translate(18.52)\"/>
								<g class=\"cls-3\">
									<image width=\"961\" height=\"638\" transform=\"translate(0 3.69) scale(0.3)\" xlink:href=\"'.${item.mask_image.url}\"/>
								</g>

								<path class=\"cls-4\" d=\"M258.8,129.18S253.42-1.52,117,2.6c0,0-62.82,4.76-98.05,70.44,0,0-32.81,60.38-5.7,98.05,0,0,9,22.89,50.47,22.34,42-.53,97.61.74,132.86.34C234.81,193.31,263.1,164.86,258.8,129.18Z\" transform=\"translate(18.52)\"/>
						
							</g>
						</g>
					</svg>`;
					
					
					
					
					#>
				
					<div class="swiper-slide item-swp-{{ item._id }}">

					if ( item.action_egg === 'gallery' ) {			
					#>
						<div class="col-xs-12 gallery-stv">

							<a class="gallery-item noDecoracion" href="{{{ item.mask_image.url }}}" title="{{{ item.title }}}">
								<div class="gallery-container-img burbuja">		
									{{{ svg }}}
								</div>
							</a>

						</div>
					<#
					}else if( item.action_egg === 'video' ){
					#>
						<div class="col-xs-12 gallery-stv">

							<a class="gallery-item-video" href="{{{ item.url }}}" title="{{{ item.title }}}">
								<div class="gallery-container-img burbuja">		
									{{{ svg }}}
								</div>
							</a>

						</div>
					<#
					}else{
					#>
						<div class="col-xs-12 gallery-stv">

							<a class="gallery-item noDecoracion" href="{{{ item.url }}}" title="{{{ item.title }}}">
								<div class="gallery-container-img burbuja">		
									{{{ svg }}}
								</div>
							</a>

						</div>
						<#
					}
					#>

					</div>
				
				<# }); #>
				
				</div>

			</div>

		<#
		}
	#>
		
		<?php
	}
}
