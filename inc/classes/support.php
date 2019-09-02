<?php
/**
 * Register customizer support section.
 */
class Mudra_Customizer_Support_Section extends WP_Customize_Section {

	public $type = 'mudra-support';
	public $url = '';
	public $id = '';

	public function json() {
		$json = parent::json();
		$json['url'] = esc_url( $this->url );
		$json['id'] = $this->id;
		return $json;
	}

	protected function render_template() {
		?>
		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
			<h3><a href="{{{ data.url }}}" target="_blank">{{ data.title }}</a></h3>
		</li>
		<?php
	}

}

/**
 * Enqueue support scripts
 */
function mudra_support_css_js() {
	wp_enqueue_script( 'mudra-support-js', get_template_directory_uri() . '/assets/js/support.js', array( 'customize-controls' ), '', true );
	wp_enqueue_style( 'mudra-support-css', get_template_directory_uri() . '/assets/css/support.css', null );
}
add_action( 'customize_controls_enqueue_scripts', 'mudra_support_css_js' );
