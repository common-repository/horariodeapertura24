<?php
/*
  Plugin Name: Horario de apertura 24
  Plugin URI: http://www.horariodeapertura24.es
  Description: Widget de horariodeapertura24.es para tu página
  Version: 1.0.0
  Author: horariodeapertura24.es
 */


if (!class_exists('WP_Horariodeapertura24_Script'))
{

	class WP_Horariodeapertura24_Script
	{

		public function __construct()
		{
			add_action('admin_init', array(&$this, 'admin_init'));
			add_action('admin_menu', array(&$this, 'add_menu'));
		}

		public function admin_init()
		{
			$this->init_settings();
		}

		public function init_settings()
		{
			register_setting('wp_horariodeapertura24_script-group', 'wp_horariodeapertura24_widgetwo');
			register_setting('wp_horariodeapertura24_script-group', 'wp_horariodeapertura24_widgetwas');
			register_setting('wp_horariodeapertura24_script-group', 'wp_horariodeapertura24_titlecolor');
			register_setting('wp_horariodeapertura24_script-group', 'wp_horariodeapertura24_titlebgcolor');
			register_setting('wp_horariodeapertura24_script-group', 'wp_horariodeapertura24_textcolor');
			register_setting('wp_horariodeapertura24_script-group', 'wp_horariodeapertura24_textbgcolor');
			register_setting('wp_horariodeapertura24_script-group', 'wp_horariodeapertura24_buttoncolor');
			register_setting('wp_horariodeapertura24_script-group', 'wp_horariodeapertura24_buttonbgcolor');
		}

		public function add_menu()
		{
			add_options_page('Ajustes WP horariodeapertura24 Script', 'WP horariodeapertura24 Script', 'manage_options', 'wp_horariodeapertura24_script', array(&$this, 'plugin_settings_page'));
		}

		public function plugin_settings_page()
		{
			if (!current_user_can('manage_options'))
			{
				wp_die(__('You do not have sufficient permissions to access this page.'));
			}

			include(sprintf("%s/templates/settings.php", dirname(__FILE__)));
		}

		public static function activate()
		{

		}

		public static function deactivate()
		{

		}

		public static function load_widget()
		{
			register_widget('Horariodeapertura24ScriptWidget');
		}

	}

}

if (!class_exists('Horariodeapertura24ScriptWidget'))
{

	class Horariodeapertura24ScriptWidget extends WP_Widget
	{

		function Horariodeapertura24ScriptWidget()
		{
			add_action('wp_enqueue_scripts', array(&$this, 'enqueue_scripts'));
			$widget_ops = array('classname' => 'widget_horariodeapertura24_script',
				'description' => __("Tu campo de búsqeuda de horarios de apertura de horariodeapertura24"));
			$this->WP_Widget('horariodeapertura24_script', 'Horarios de apertura', $widget_ops);
		}

		function enqueue_scripts()
		{
			wp_register_style('horariodeapertura24_style_widget', '//www.horariodeapertura24.es/rpc/widget/templates/style/searchwidget.css', array());
			wp_register_script('horariodeapertura24_script_widget', '//www.horariodeapertura24.es/rpc/widget/templates/js/widgetbranding.js', array());
			wp_enqueue_style('horariodeapertura24_style_widget');
			wp_enqueue_script('horariodeapertura24_script_widget');
		}

		function widget($args, $instance)
		{
			extract($args);

			# Before the widget
			echo $before_widget;
			?>
			<!-- Horariodeapertura24.es -->

			<div id="oe-searchwidget" style="background: <?php echo get_option('wp_horariodeapertura24_textbgcolor', '#C7E0FF'); ?>; color: <?php echo get_option('wp_horariodeapertura24_textcolor', '#000000'); ?>;" class="backgroundStyle">
				<div id="oe-searchwidget-title" style="background: <?php echo get_option('wp_horariodeapertura24_titlebgcolor', '#489BFF'); ?>; color: <?php echo get_option('wp_horariodeapertura24_titlecolor', '#FFFFFF'); ?>;">Buscar horarios de apertura</div>
				<iframe src="http://www.horariodeapertura24.es/rpc/widget/widget.php?wo=<?php echo urlencode(get_option('wp_horariodeapertura24_widgetwo', '')) ?>&was=<?php echo urlencode(get_option('wp_horariodeapertura24_widgetwas', '')) ?>&textcolor=<?php echo urlencode(get_option('wp_horariodeapertura24_textcolor', '#000000')) ?>&textbgcolor=<?php echo urlencode(get_option('wp_horariodeapertura24_textbgcolor', '#C7E0FF')) ?>&buttoncolor=<?php echo urlencode(get_option('wp_horariodeapertura24_buttoncolor', '#FFFFFF')) ?>&buttonbgcolor=<?php echo urlencode(get_option('wp_horariodeapertura24_buttonbgcolor', '#489BFF')) ?>" width="150" height="200" frameborder="0" style="overflow: hidden;"></iframe>
				<div id="oe-searchwidget-branding"></div>
                <script type="text/javascript">getWidgetBranding('<?php echo urlencode(get_option('wp_horariodeapertura24_widgetwo', '')) ?>', '<?php echo urlencode(get_option('wp_horariodeapertura24_widgetwas', '')) ?>', '#000000');</script>
			</div>
			<script>
				function getWidgetBranding(wo, was, color) {

					var brandingtext = "";
					if(wo != "" && was == "") {
						brandingtext = 'Horarios de apertura en <a href="http://www.horariodeapertura24.es/ciudad/'+ucFirst(wo)+'-1.html" style="color: '+color+'; font-size: 10px;">'+ucFirst(wo)+'</a>. Un servico de  horariodeapertura24';
					}else if(wo == "" && was != "") {
						brandingtext = 'Horarios de apertura '+ucFirst(was)+'. Un servicio de <a href="http://www.horariodeapertura24.es/" style="color: '+color+'; font-size: 10px;">horariodeapertura24.</a>';
					}else if(wo != "" && was != "") {
						brandingtext = '<a href="http://www.horariodeapertura24.es/busqueda/sucursal-'+ucFirst(wo)+'-30+km-'+ucFirst(was)+'-1.html" style="color: '+color+'; font-size: 10px;">&Ouml;ffnungszeiten '+ucFirst(was)+' in '+ucFirst(wo)+'</a>. Un servicio de horariodeapertura24.';
					}else{
						brandingtext = 'Búsqueda de horarios de apertura. Un servicio de <a href="http://www.horariodeapertura24.es/" style="color: '+color+'; font-size: 10px;">horariodeapertura24</a>.';
					}

					if(document.getElementById('oe-searchwidget-branding')) {
						document.getElementById('oe-searchwidget-branding').innerHTML = '<small>'+brandingtext+'</small>';
					}

					var widgetElement = document.getElementById('oe-searchwidget');
					var iframeElement = widgetElement.getElementsByTagName("iframe")[0];
					iframeElement.height = "200";

					return true;
				}

				function ucFirst(capitalizeMe)
				{
					return capitalizeMe[0].toUpperCase() + capitalizeMe.substring(1);
				}
			</script>
			<!-- Ende Horariodeapertura24.es -->
			<?php
			# After the widget
			echo $after_widget;
		}
	}

}

function add_horariodeapertura24_enqueue_scripts()
{
	wp_register_script('horariodeapertura24', plugins_url( 'templates/js/widgetColorpicker.js', __FILE__ ), array('jquery'));
	wp_register_style('horariodeapertura24_cp', plugins_url( 'templates/css/colorpicker.css', __FILE__ ), array());
	wp_register_style('horariodeapertura24_style', plugins_url( 'templates/css/style.css', __FILE__ ), array());

	wp_enqueue_script('jquery');
	wp_enqueue_script('horariodeapertura24');
	wp_enqueue_style('horariodeapertura24_cp');
	wp_enqueue_style('horariodeapertura24_style');
}

if (class_exists('WP_Horariodeapertura24_Script'))
{
	register_activation_hook(__FILE__, array('WP_Horariodeapertura24_Script', 'activate'));
	register_deactivation_hook(__FILE__, array('WP_Horariodeapertura24_Script', 'deactivate'));
	$wp_horariodeapertura24_script = new WP_Horariodeapertura24_Script();



	if (isset($wp_horariodeapertura24_script))
	{

		// Add the settings link to the plugins page
		function wp_horariodeapertura24_plugin_settings_link($links)
		{
			$settings_link = '<a href="options-general.php?page=wp_horariodeapertura24_script">Ajustes</a>';
			array_unshift($links, $settings_link);
			return $links;
		}

		$plugin = plugin_basename(__FILE__);
		add_filter("plugin_action_links_$plugin", 'wp_horariodeapertura24_plugin_settings_link');
		add_action('admin_enqueue_scripts', 'add_horariodeapertura24_enqueue_scripts');

		add_action('widgets_init', array('WP_Horariodeapertura24_Script', 'load_widget'));
	}
}
?>