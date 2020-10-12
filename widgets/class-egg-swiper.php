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


			$svg = base64_encode('<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 304.92 226.4">
					<defs>
						<style>.cls-1{fill:url(#linear-gradient);}</style>
						<linearGradient id="linear-gradient" y1="113.2" x2="304.92" y2="113.2" gradientUnits="userSpaceOnUse">
							<stop offset="0" stop-color="'.$settings['color_borde1'].'" stop-opacity="0.68"/>
							<stop offset="0.19" stop-color="'.$settings['color_borde2'].'"/>
							<stop offset="1" stop-color="'.$settings['color_borde3'].'" stop-opacity="0.6"/>
						</linearGradient>
					</defs>
					<title>Recurso 1ed</title>
					<g id="Capa_2" data-name="Capa 2">
						<g id="Capa_1-2" data-name="Capa 1">
							<path style="fill: '.$settings['color_fondo'].';" d="M212.76,225.4c-16.16,0-34.15-.16-53.19-.32-20-.18-40.75-.35-60.31-.35-10.65,0-20,.05-28.46.16-.59,0-4.18,0-4.76,0-41.44,1-94.27-38.17-46.43-141C50.73,17.05,126.13,1.38,128.78,1.22c2.47-.15,12-1.11,14.38-1.11,35.43,0,65.92,7.9,90.63,23.49,19.71,12.44,35.85,29.81,48,51.61,20.73,37.3,22.51,75,22.52,75.36v.28a63.09,63.09,0,0,1-15.09,49.81C275.74,216,255,225,232.19,225.3,226.46,225.37,220.11,225.4,212.76,225.4Z"/>
							<path class="cls-1" d="M143.37,6.11c33.85,0,62.95,7.49,86.49,22.27C248.62,40.15,264,56.62,275.59,77.31c20,35.75,21.81,72.21,21.82,72.56l0,.28,0,.27a58.28,58.28,0,0,1-13.92,46C271,210.7,251.65,219,230.39,219.3c-5.59.07-11.8.1-19,.1-15.78,0-33.36-.15-52-.32-19.6-.16-39.86-.34-59-.34-10.43,0-19.54,0-27.87.16H70.9c-17.47,0-32-3.89-41.94-11.23-7-5.16-9.56-10.35-9.8-10.88L18,195.17c-29.23-40.61,7.23-108.26,7.61-109A160.41,160.41,0,0,1,59.71,42.39a149.75,149.75,0,0,1,36.12-24C117.4,8.21,126.62,7.52,128.22,7.23c2.13-.37,12.84-1.12,15.15-1.12m8.4-6C149.33,0,122-1.77,96.1,11c-24,11.81-53.47,30.74-73.63,67.38-11.62,21.12-38,80.19-10,120.37,0,0,15.17,27,58.47,27.18h1.76c8.83-.11,18.16-.16,27.78-.16,37.05,0,78.32.66,111,.66,6.76,0,13.14,0,19.05-.1,45.44-.55,79-34.34,73.94-76.72,0,0-7.64-134-135-147.93C169.43,1.65,155.38.32,151.77.15Z"/>
						</g>
					</g>
				</svg>');




			echo '
			<div class="swiper-container">
			
				<div class="swiper-wrapper">';

				foreach (  $settings['list'] as $item ) {
					echo '
					<div class="swiper-slide item-swp-'.$item['_id'].'">
					';


					if ( $item['action_egg'] === 'gallery' ) {
						
						?>
									
						<div class="col-xs-12 gallery-stv">
							
							<a  class="gallery-item noDecoracion" href="<?php echo wp_kses( $item['mask_image']['url'], array() ); ?>" title="<?php echo wp_kses( $item['title'], array() ); ?>">
								<img style="background-image:url('data:image/svg+xml;base64,<?php echo $svg; ?>');" class="img-responsive burbuja" src="<?php echo wp_kses( $item['mask_image']['url'], array() ); ?>" alt="<?php echo wp_kses( $item['title'], array() ); ?>">
							</a>

						</div>

						<?php
						
					}else if ( $item['action_egg'] === 'video' ) {   
						
						?>
									
						<div class="col-xs-12 gallery-stv">
							
							<a class="gallery-item-video noDecoracion" href="<?php echo wp_kses( $item['url'], array() ); ?>" title="<?php echo wp_kses( $item['title'], array() ); ?>">
								<img style="background-image:url('data:image/svg+xml;base64,<?php echo $svg; ?>');" class="img-responsive burbuja" src="<?php echo wp_kses( $item['mask_image']['url'], array() ); ?>" alt="<?php echo wp_kses( $item['title'], array() ); ?>">
							</a>

						</div>


						<?php


					}else{
						
						?>
						
						<div class="col-xs-12 gallery-stv">
							
							<a class="gallery-item noDecoracion" href="<?php echo wp_kses( $item['url'], array() ); ?>" title="<?php echo wp_kses( $item['title'], array() ); ?>">
								<img style="background-image:url('data:image/svg+xml;base64,<?php echo $svg; ?>');" class="img-responsive burbuja" src="<?php echo wp_kses( $item['mask_image']['url'], array() ); ?>" alt="<?php echo wp_kses( $settings['title'], array() ); ?>">
							</a>

						</div>

						<?php

					}	
				
					echo '</div>';
				}

				echo '
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

			var svg = btoa(`<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" viewBox=\"0 0 304.92 226.4\">
				<defs>
					<style>.cls-1{fill:url(#linear-gradient);}</style>
					<linearGradient id=\"linear-gradient\" y1=\"113.2\" x2=\"304.92\" y2=\"113.2\" gradientUnits=\"userSpaceOnUse\">
						<stop offset=\"0\" stop-color=\"${settings.color_borde1}" stop-opacity=\"0.68\"/>
						<stop offset=\"0.19\" stop-color=\"${settings.color_borde2}"/>
						<stop offset=\"1\" stop-color=\"${settings.color_borde3}" stop-opacity=\"0.6\"/>
					</linearGradient>
				</defs>
				<title>Recurso 1ed</title>
				<g id=\"Capa_2\" data-name=\"Capa 2\">
					<g id=\"Capa_1-2\" data-name=\"Capa 1\">
						<path style=\"fill: ${settings.color_fondo};\" d=\"M212.76,225.4c-16.16,0-34.15-.16-53.19-.32-20-.18-40.75-.35-60.31-.35-10.65,0-20,.05-28.46.16-.59,0-4.18,0-4.76,0-41.44,1-94.27-38.17-46.43-141C50.73,17.05,126.13,1.38,128.78,1.22c2.47-.15,12-1.11,14.38-1.11,35.43,0,65.92,7.9,90.63,23.49,19.71,12.44,35.85,29.81,48,51.61,20.73,37.3,22.51,75,22.52,75.36v.28a63.09,63.09,0,0,1-15.09,49.81C275.74,216,255,225,232.19,225.3,226.46,225.37,220.11,225.4,212.76,225.4Z\"/>
						<path class=\"cls-1\" d=\"M143.37,6.11c33.85,0,62.95,7.49,86.49,22.27C248.62,40.15,264,56.62,275.59,77.31c20,35.75,21.81,72.21,21.82,72.56l0,.28,0,.27a58.28,58.28,0,0,1-13.92,46C271,210.7,251.65,219,230.39,219.3c-5.59.07-11.8.1-19,.1-15.78,0-33.36-.15-52-.32-19.6-.16-39.86-.34-59-.34-10.43,0-19.54,0-27.87.16H70.9c-17.47,0-32-3.89-41.94-11.23-7-5.16-9.56-10.35-9.8-10.88L18,195.17c-29.23-40.61,7.23-108.26,7.61-109A160.41,160.41,0,0,1,59.71,42.39a149.75,149.75,0,0,1,36.12-24C117.4,8.21,126.62,7.52,128.22,7.23c2.13-.37,12.84-1.12,15.15-1.12m8.4-6C149.33,0,122-1.77,96.1,11c-24,11.81-53.47,30.74-73.63,67.38-11.62,21.12-38,80.19-10,120.37,0,0,15.17,27,58.47,27.18h1.76c8.83-.11,18.16-.16,27.78-.16,37.05,0,78.32.66,111,.66,6.76,0,13.14,0,19.05-.1,45.44-.55,79-34.34,73.94-76.72,0,0-7.64-134-135-147.93C169.43,1.65,155.38.32,151.77.15Z\"/>
					</g>
				</g>
			</svg>`);

			
			<div class="swiper-container">
			
				<div class="swiper-wrapper">
					
				<# _.each( settings.list, function( item ) { #>
				
					<div class="swiper-slide item-swp-{{ item._id }}">

					if ( item.action_egg === 'gallery' ) {			
					#>
						<div class="col-xs-12 gallery-stv">

							<a class="gallery-item noDecoracion" href="{{{ item.mask_image.url }}}" title="{{{ item.title }}}">
								<img style="background-image: url('data:image/svg+xml;base64,{{{ svg }}}'); " class="img-responsive burbuja" src="{{{ item.mask_image.url }}}" alt="{{{ item.title }}}">
							</a>

						</div>
					<#
					}else if( item.action_egg === 'video' ){
					#>
						<div class="col-xs-12 gallery-stv">

							<a class="gallery-item-video" href="{{{ item.url }}}" title="{{{ item.title }}}">
								<img style="background-image:url('data:image/svg+xml;base64,{{{ svg }}}');" class="img-responsive burbuja" src="{{{ item.mask_image.url }}}" alt="{{{ item.title }}}">
							</a>

						</div>
					<#
					}else{
					#>
						<div class="col-xs-12 gallery-stv">

							<a class="gallery-item noDecoracion" href="{{{ item.url }}}" title="{{{ item.title }}}">
								<img style="background-image:url('data:image/svg+xml;base64,{{{ svg }}}');" class="img-responsive burbuja" src="{{{ item.mask_image.url }}}" alt="{{{ item.title }}}">
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
