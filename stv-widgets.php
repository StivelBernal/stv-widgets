<?php
/**
 * Elementor Stv WordPress Plugin
 *
 * @package ElementorStv
 *
 * Plugin Name: Stv widgets
 * Description: Plantilla para widgets para elementor
 * Plugin URI:  https://www.stivel.me/elementor/
 * Version:     1.0.0
 * Author:      Brayan Bernal
 * Author URI:  https://www.stivel.me
 * Text Domain: elementor-stv
 */

define( 'ELEMENTOR_STV', __FILE__ );

/**
 * Include the Elementor_Stv class.
 */
require plugin_dir_path( ELEMENTOR_STV ) . 'class-elementor-stv.php';
