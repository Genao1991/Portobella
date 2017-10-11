<?php
/**
 * Internationalization helper.
 *
 * @package     Kirki
 * @category    Core
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2016, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       1.0
 */

if ( ! class_exists( 'Kirki_l10n' ) ) {

	/**
	 * Handles translations
	 */
	class Kirki_l10n {

		/**
		 * The plugin textdomain
		 *
		 * @access protected
		 * @var string
		 */
		protected $textdomain = 'kirki';

		/**
		 * The class constructor.
		 * Adds actions & filters to handle the rest of the methods.
		 *
		 * @access public
		 */
		public function __construct() {

			add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );

		}

		/**
		 * Load the plugin textdomain
		 *
		 * @access public
		 */
		public function load_textdomain() {

			if ( null !== $this->get_path() ) {
				load_textdomain( $this->textdomain, $this->get_path() );
			}
			load_plugin_textdomain( $this->textdomain, false, Kirki::$path . '/languages' );

		}

		/**
		 * Gets the path to a translation file.
		 *
		 * @access protected
		 * @return string Absolute path to the translation file.
		 */
		protected function get_path() {
			$path_found = false;
			$found_path = null;
			foreach ( $this->get_paths() as $path ) {
				if ( $path_found ) {
					continue;
				}
				$path = wp_normalize_path( $path );
				if ( file_exists( $path ) ) {
					$path_found = true;
					$found_path = $path;
				}
			}

			return $found_path;

		}

		/**
		 * Returns an array of paths where translation files may be located.
		 *
		 * @access protected
		 * @return array
		 */
		protected function get_paths() {

			return array(
				WP_LANG_DIR . '/' . $this->textdomain . '-' . get_locale() . '.mo',
				Kirki::$path . '/languages/' . $this->textdomain . '-' . get_locale() . '.mo',
			);

		}

		/**
		 * Shortcut method to get the translation strings
		 *
		 * @static
		 * @access public
		 * @param string $config_id The config ID. See Kirki_Config.
		 * @return array
		 */
		public static function get_strings( $config_id = 'global' ) {

			$translation_strings = array(
				'background-color'      => esc_attr__( 'Background Color', 'simple-business-wp' ),
				'background-image'      => esc_attr__( 'Background Image', 'simple-business-wp' ),
				'no-repeat'             => esc_attr__( 'No Repeat', 'simple-business-wp' ),
				'repeat-all'            => esc_attr__( 'Repeat All', 'simple-business-wp' ),
				'repeat-x'              => esc_attr__( 'Repeat Horizontally', 'simple-business-wp' ),
				'repeat-y'              => esc_attr__( 'Repeat Vertically', 'simple-business-wp' ),
				'inherit'               => esc_attr__( 'Inherit', 'simple-business-wp' ),
				'background-repeat'     => esc_attr__( 'Background Repeat', 'simple-business-wp' ),
				'cover'                 => esc_attr__( 'Cover', 'simple-business-wp' ),
				'contain'               => esc_attr__( 'Contain', 'simple-business-wp' ),
				'background-size'       => esc_attr__( 'Background Size', 'simple-business-wp' ),
				'fixed'                 => esc_attr__( 'Fixed', 'simple-business-wp' ),
				'scroll'                => esc_attr__( 'Scroll', 'simple-business-wp' ),
				'background-attachment' => esc_attr__( 'Background Attachment', 'simple-business-wp' ),
				'left-top'              => esc_attr__( 'Left Top', 'simple-business-wp' ),
				'left-center'           => esc_attr__( 'Left Center', 'simple-business-wp' ),
				'left-bottom'           => esc_attr__( 'Left Bottom', 'simple-business-wp' ),
				'right-top'             => esc_attr__( 'Right Top', 'simple-business-wp' ),
				'right-center'          => esc_attr__( 'Right Center', 'simple-business-wp' ),
				'right-bottom'          => esc_attr__( 'Right Bottom', 'simple-business-wp' ),
				'center-top'            => esc_attr__( 'Center Top', 'simple-business-wp' ),
				'center-center'         => esc_attr__( 'Center Center', 'simple-business-wp' ),
				'center-bottom'         => esc_attr__( 'Center Bottom', 'simple-business-wp' ),
				'background-position'   => esc_attr__( 'Background Position', 'simple-business-wp' ),
				'background-opacity'    => esc_attr__( 'Background Opacity', 'simple-business-wp' ),
				'on'                    => esc_attr__( 'ON', 'simple-business-wp' ),
				'off'                   => esc_attr__( 'OFF', 'simple-business-wp' ),
				'all'                   => esc_attr__( 'All', 'simple-business-wp' ),
				'cyrillic'              => esc_attr__( 'Cyrillic', 'simple-business-wp' ),
				'cyrillic-ext'          => esc_attr__( 'Cyrillic Extended', 'simple-business-wp' ),
				'devanagari'            => esc_attr__( 'Devanagari', 'simple-business-wp' ),
				'greek'                 => esc_attr__( 'Greek', 'simple-business-wp' ),
				'greek-ext'             => esc_attr__( 'Greek Extended', 'simple-business-wp' ),
				'khmer'                 => esc_attr__( 'Khmer', 'simple-business-wp' ),
				'latin'                 => esc_attr__( 'Latin', 'simple-business-wp' ),
				'latin-ext'             => esc_attr__( 'Latin Extended', 'simple-business-wp' ),
				'vietnamese'            => esc_attr__( 'Vietnamese', 'simple-business-wp' ),
				'hebrew'                => esc_attr__( 'Hebrew', 'simple-business-wp' ),
				'arabic'                => esc_attr__( 'Arabic', 'simple-business-wp' ),
				'bengali'               => esc_attr__( 'Bengali', 'simple-business-wp' ),
				'gujarati'              => esc_attr__( 'Gujarati', 'simple-business-wp' ),
				'tamil'                 => esc_attr__( 'Tamil', 'simple-business-wp' ),
				'telugu'                => esc_attr__( 'Telugu', 'simple-business-wp' ),
				'thai'                  => esc_attr__( 'Thai', 'simple-business-wp' ),
				'serif'                 => _x( 'Serif', 'font style', 'simple-business-wp' ),
				'sans-serif'            => _x( 'Sans Serif', 'font style', 'simple-business-wp' ),
				'monospace'             => _x( 'Monospace', 'font style', 'simple-business-wp' ),
				'font-family'           => esc_attr__( 'Font Family', 'simple-business-wp' ),
				'font-size'             => esc_attr__( 'Font Size', 'simple-business-wp' ),
				'font-weight'           => esc_attr__( 'Font Weight', 'simple-business-wp' ),
				'line-height'           => esc_attr__( 'Line Height', 'simple-business-wp' ),
				'font-style'            => esc_attr__( 'Font Style', 'simple-business-wp' ),
				'letter-spacing'        => esc_attr__( 'Letter Spacing', 'simple-business-wp' ),
				'top'                   => esc_attr__( 'Top', 'simple-business-wp' ),
				'bottom'                => esc_attr__( 'Bottom', 'simple-business-wp' ),
				'left'                  => esc_attr__( 'Left', 'simple-business-wp' ),
				'right'                 => esc_attr__( 'Right', 'simple-business-wp' ),
				'center'                => esc_attr__( 'Center', 'simple-business-wp' ),
				'justify'               => esc_attr__( 'Justify', 'simple-business-wp' ),
				'color'                 => esc_attr__( 'Color', 'simple-business-wp' ),
				'add-image'             => esc_attr__( 'Add Image', 'simple-business-wp' ),
				'change-image'          => esc_attr__( 'Change Image', 'simple-business-wp' ),
				'no-image-selected'     => esc_attr__( 'No Image Selected', 'simple-business-wp' ),
				'add-file'              => esc_attr__( 'Add File', 'simple-business-wp' ),
				'change-file'           => esc_attr__( 'Change File', 'simple-business-wp' ),
				'no-file-selected'      => esc_attr__( 'No File Selected', 'simple-business-wp' ),
				'remove'                => esc_attr__( 'Remove', 'simple-business-wp' ),
				'select-font-family'    => esc_attr__( 'Select a font-family', 'simple-business-wp' ),
				'variant'               => esc_attr__( 'Variant', 'simple-business-wp' ),
				'subsets'               => esc_attr__( 'Subset', 'simple-business-wp' ),
				'size'                  => esc_attr__( 'Size', 'simple-business-wp' ),
				'height'                => esc_attr__( 'Height', 'simple-business-wp' ),
				'spacing'               => esc_attr__( 'Spacing', 'simple-business-wp' ),
				'ultra-light'           => esc_attr__( 'Ultra-Light 100', 'simple-business-wp' ),
				'ultra-light-italic'    => esc_attr__( 'Ultra-Light 100 Italic', 'simple-business-wp' ),
				'light'                 => esc_attr__( 'Light 200', 'simple-business-wp' ),
				'light-italic'          => esc_attr__( 'Light 200 Italic', 'simple-business-wp' ),
				'book'                  => esc_attr__( 'Book 300', 'simple-business-wp' ),
				'book-italic'           => esc_attr__( 'Book 300 Italic', 'simple-business-wp' ),
				'regular'               => esc_attr__( 'Normal 400', 'simple-business-wp' ),
				'italic'                => esc_attr__( 'Normal 400 Italic', 'simple-business-wp' ),
				'medium'                => esc_attr__( 'Medium 500', 'simple-business-wp' ),
				'medium-italic'         => esc_attr__( 'Medium 500 Italic', 'simple-business-wp' ),
				'semi-bold'             => esc_attr__( 'Semi-Bold 600', 'simple-business-wp' ),
				'semi-bold-italic'      => esc_attr__( 'Semi-Bold 600 Italic', 'simple-business-wp' ),
				'bold'                  => esc_attr__( 'Bold 700', 'simple-business-wp' ),
				'bold-italic'           => esc_attr__( 'Bold 700 Italic', 'simple-business-wp' ),
				'extra-bold'            => esc_attr__( 'Extra-Bold 800', 'simple-business-wp' ),
				'extra-bold-italic'     => esc_attr__( 'Extra-Bold 800 Italic', 'simple-business-wp' ),
				'ultra-bold'            => esc_attr__( 'Ultra-Bold 900', 'simple-business-wp' ),
				'ultra-bold-italic'     => esc_attr__( 'Ultra-Bold 900 Italic', 'simple-business-wp' ),
				'invalid-value'         => esc_attr__( 'Invalid Value', 'simple-business-wp' ),
				'add-new'           	=> esc_attr__( 'Add new', 'simple-business-wp' ),
				'row'           		=> esc_attr__( 'row', 'simple-business-wp' ),
				'limit-rows'            => esc_attr__( 'Limit: %s rows', 'simple-business-wp' ),
				'open-section'          => esc_attr__( 'Press return or enter to open this section', 'simple-business-wp' ),
				'back'                  => esc_attr__( 'Back', 'simple-business-wp' ),
				'reset-with-icon'       => sprintf( esc_attr__( '%s Reset', 'simple-business-wp' ), '<span class="dashicons dashicons-image-rotate"></span>' ),
				'text-align'            => esc_attr__( 'Text Align', 'simple-business-wp' ),
				'text-transform'        => esc_attr__( 'Text Transform', 'simple-business-wp' ),
				'none'                  => esc_attr__( 'None', 'simple-business-wp' ),
				'capitalize'            => esc_attr__( 'Capitalize', 'simple-business-wp' ),
				'uppercase'             => esc_attr__( 'Uppercase', 'simple-business-wp' ),
				'lowercase'             => esc_attr__( 'Lowercase', 'simple-business-wp' ),
				'initial'               => esc_attr__( 'Initial', 'simple-business-wp' ),
				'select-page'           => esc_attr__( 'Select a Page', 'simple-business-wp' ),
				'open-editor'           => esc_attr__( 'Open Editor', 'simple-business-wp' ),
				'close-editor'          => esc_attr__( 'Close Editor', 'simple-business-wp' ),
				'switch-editor'         => esc_attr__( 'Switch Editor', 'simple-business-wp' ),
			);

			$config = apply_filters( 'kirki/config', array() );

			if ( isset( $config['i18n'] ) ) {
				$translation_strings = wp_parse_args( $config['i18n'], $translation_strings );
			}

			return apply_filters( 'kirki/' . $config_id . '/l10n', $translation_strings );

		}
	}
}
