<?php
/**
 * Content Lottie class.
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
class LOttie extends Widget_Base {
	/**
	 * Class constructor.
	 *
	 * @param array $data Widget data.
	 * @param array $args Widget arguments.
	 */
	public function __construct( $data = array(), $args = null ) {
		parent::__construct( $data, $args );

		$vers =  STV_DEV_MODE ? time(): false;
		
		//SCRIPTS
		wp_enqueue_script( 'lottie', plugins_url( '/assets/lottie/lottie.js', ELEMENTOR_STV ), [], '1.0.0');
		
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
		return 'Lottie';
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
		return __( 'Lottie', ' elementor-stv' );
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
		return array( 'lottie' );
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
				'label' => __( 'Configuración', 'elementor-stv' ),
			)
		);

		
		$this->add_control(
			'id_animation',
			array(
				'label'   => __( 'Id animación', 'elementor-stv' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Animation1',
			)
		);
/*
		$this->add_control(
			'json',
			array(
				'label'   => __( 'Json', 'elementor-stv' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( '{}', 'elementor-stv' ),
			)
		);
*/
		$this->add_control(
			'url',
			array(
				'label'   => __( 'Url archivo de la animación', 'elementor-stv' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '/',
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

			<script>

			lottie.loadAnimation({
                container: document.getElementById('<?php echo $settings['id_animation']; ?>'),
                path: '<?php echo $settings['url']; ?>', 
                renderer: 'canvas', 
                loop: true,
                autoplay: true, 
            })

			</script>

			<div id="<?php echo $settings['id_animation']; ?>"></div>

		<?php

	
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

			lottie.loadAnimation({
				container: document.getElementById(settings['id_animation']),
				path: settings['url'], 
				renderer: 'canvas', 
				loop: true,
				autoplay: true, 
			})

		
		#>
	
		?>

		<div id="{{{settings['id_animation']}}}"></div>

		<?php
	}
}
