<div class="wrap">
	<h2>Widget de horarios de apertura para tu página web</h2>
	<div>
		¿Tienes tu propia página web y quieres ofrecer a tus visitantes informaciones regionales? Entonces nuestro Widget de horarios de apertura quizas es algo para tí! Generate con nuestro generador simplemente un Widget, cual pegue a tu página web y añadelo a tu página web. Tus visitantes verán un cuadro de búsqueda, en el cual pueden introducir sus parámetros de búsqueda en los campos "Qué buscas", "Donde buscas" y definir el radio de búsqueda y asi obtener los resultados de horarios de apertura directamente en tu página web. Si necesitas ayuda - simplemente escríbenos un corto mensaja y te ayudamos.
	</div>
	<form method="post" action="options.php">
		<?php @settings_fields('wp_horariodeapertura24_script-group'); ?>
		<?php @do_settings_fields('wp_horariodeapertura24_script-group'); ?>
		<table width="70%" border="0">
			<tbody><tr>
                    <td>
                        <h3>1. Elige una ubicación</h3><br>
                        <input type="text" onchange="refreshWidget();" value="<?php echo get_option('wp_horariodeapertura24_widgetwo'); ?>" name="wp_horariodeapertura24_widgetwo" id="widgetwo" /> (opcional)
                    </td>
                    <td>
                        <h3>2. Elige un término de búsqueda</h3><br>
                        <input type="text" onchange="refreshWidget();" value="<?php echo get_option('wp_horariodeapertura24_widgetwas'); ?>" name="wp_horariodeapertura24_widgetwas" id="widgetwas" /> (opcional)
                    </td>
                </tr>
            </tbody>
		</table>
		<h3>3. Elige el diseño</h3><br>
		<table width="70%" cellspacing="10" border="0" style="padding-left: 14px;" id="widgetGenerator">
			<tbody><tr>
                    <td width="100">Color de título</td>
                    <td><input type="text" value="<?php echo get_option('wp_horariodeapertura24_titlecolor', '#FFFFFF'); ?>" name="wp_horariodeapertura24_titlecolor" id="titlecolor" class="color_picker"></td>
                    <td><div class="colorpickerview" id="titlecolor-picker-view" style="background-color: <?php echo get_option('wp_horariodeapertura24_titlecolor', '#FFFFFF'); ?>;"></div></td>
                    <td style="vertical-align: top; padding-left: 45px;" rowspan="5">
                        <h3>Vista previa</h3>
                        <br>
                        <div class="backgroundStyle" style="background: #C7E0FF; color:#000000;" id="oe-searchwidget">
							<div style="background: #489BFF; color:#FFFFFF;" id="oe-searchwidget-title">Buscar horarios de apertura</div>
							<iframe width="150" height="200" frameborder="0" id="previewWidget" style="overflow: hidden;" src="http://www.horariodeapertura24.es/rpc/widget/widget.php?wo=&amp;was=&amp;textcolor=000000&amp;textbgcolor=C7E0FF&amp;buttoncolor=FFFFFF&amp;buttonbgcolor=489BFF"></iframe>
							<div id="oe-searchwidget-branding"></div>
                            <script type="text/javascript">getWidgetBranding('', '', '#000000');</script>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Color de fondo</td>
                    <td><input type="text" value="<?php echo get_option('wp_horariodeapertura24_titlebgcolor', '#489BFF'); ?>" name="wp_horariodeapertura24_titlebgcolor" id="titlebgcolor" class="color_picker"></td>
                    <td><div class="colorpickerview" id="titlebgcolor-picker-view" style="background-color: <?php echo get_option('wp_horariodeapertura24_titlebgcolor', '#489BFF'); ?>;"></div></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Color de texto</td>
                    <td><input type="text" value="<?php echo get_option('wp_horariodeapertura24_textcolor', '#000000'); ?>" name="wp_horariodeapertura24_textcolor" id="textcolor" class="color_picker"></td>
                    <td><div class="colorpickerview" id="textcolor-picker-view" style="background-color: <?php echo get_option('wp_horariodeapertura24_textcolor', '#000000'); ?>;"></div></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Color de fondo del Widget</td>
                    <td><input type="text" value="<?php echo get_option('wp_horariodeapertura24_textbgcolor', '#C7E0FF'); ?>" name="wp_horariodeapertura24_textbgcolor" id="textbgcolor" class="color_picker"></td>
                    <td><div class="colorpickerview" id="textbgcolor-picker-view" style="background-color: <?php echo get_option('wp_horariodeapertura24_textbgcolor', '#C7E0FF'); ?>;"></div></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Color de texto de los botones</td>
                    <td><input type="text" value="<?php echo get_option('wp_horariodeapertura24_buttoncolor', '#FFFFFF'); ?>" name="wp_horariodeapertura24_buttoncolor" id="buttoncolor" class="color_picker"></td>
                    <td><div class="colorpickerview" id="buttoncolor-picker-view" style="background-color: <?php echo get_option('wp_horariodeapertura24_buttoncolor', '#FFFFFF'); ?>;"></div></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Color de fondo de los botones</td>
                    <td><input type="text" value="<?php echo get_option('wp_horariodeapertura24_buttonbgcolor', '#489BFF'); ?>" name="wp_horariodeapertura24_buttonbgcolor" id="buttonbgcolor" class="color_picker"></td>
                    <td><div class="colorpickerview" id="buttonbgcolor-picker-view" style="background-color: <?php echo get_option('wp_horariodeapertura24_buttonbgcolor', '#489BFF'); ?>;"></div></td>
                    <td></td>
                </tr>
            </tbody>
		</table>
		<input type="submit" value="Guardar" />
		<?php //@submit_button(); ?>
	</form>
</div>
<style>

</style>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		var hideit = function(e, ui) { $(this).val('#'+ui.hex); $('.ui-colorpicker').css('display', 'none'); };
		$('.color_picker').ColorPicker({
			onChange: function(hsb, hex, rgb, el) {
				$('#'+el.id).val('#'+hex);
				$('#'+el.id+'-picker-view').css('background-color', '#'+hex);
			},
			onHide: function(el) {
				refreshWidget();
			}
		});
	});

	document.getElementById('titlecolor-picker-view').style.backgroundColor = document.getElementById('titlecolor').value;
	document.getElementById('titlebgcolor-picker-view').style.backgroundColor = document.getElementById('titlebgcolor').value;
	document.getElementById('textcolor-picker-view').style.backgroundColor = document.getElementById('textcolor').value;
	document.getElementById('textbgcolor-picker-view').style.backgroundColor = document.getElementById('textbgcolor').value;
	document.getElementById('buttoncolor-picker-view').style.backgroundColor = document.getElementById('buttoncolor').value;
	document.getElementById('buttonbgcolor-picker-view').style.backgroundColor = document.getElementById('buttonbgcolor').value;

	refreshWidget();

	function refreshWidget() {
		var src = regenerateURL();
		document.getElementById('oe-searchwidget').style.background = document.getElementById('textbgcolor').value;
		document.getElementById('oe-searchwidget').style.color = document.getElementById('textcolor').value;
		document.getElementById('oe-searchwidget-title').style.background = document.getElementById('titlebgcolor').value;
		document.getElementById('oe-searchwidget-title').style.color = document.getElementById('titlecolor').value;

		//Funktion aufrufen um Branding zu aktualisieren
		var widgetwo = document.getElementById('widgetwo').value.replace('#', '');
		var widgetwas = document.getElementById('widgetwas').value.replace('#', '');
		var textcolor = document.getElementById('textcolor').value.replace('#', '');
		getWidgetBranding(widgetwo, widgetwas, textcolor);

		document.getElementById('previewWidget').src = src;
	}

	function regenerateURL() {
		var widgetwo = document.getElementById('widgetwo').value.replace('#', '');
		var widgetwas = document.getElementById('widgetwas').value.replace('#', '');
		var textcolor = document.getElementById('textcolor').value.replace('#', '');
		var textbgcolor = document.getElementById('textbgcolor').value.replace('#', '');
		var buttoncolor = document.getElementById('buttoncolor').value.replace('#', '');
		var buttonbgcolor = document.getElementById('buttonbgcolor').value.replace('#', '');
		var url = "http://www.horariodeapertura24.es/rpc/widget/widget.php?wo="+widgetwo+"&was="+widgetwas+"&textcolor="+textcolor+"&textbgcolor="+textbgcolor+"&buttoncolor="+buttoncolor+"&buttonbgcolor="+buttonbgcolor;
		return url;
	}

	function getWidgetBranding(wo, was, color) {

		var brandingtext = "";
		if(wo != "" && was == "") {
			brandingtext = 'Horarios de apertura in <a href="http://www.horariodeapertura24.es/ciudad/'+ucFirst(wo)+'-1.html" style="color: '+color+'; font-size: 10px;">'+ucFirst(wo)+'</a>. Un servicio de horariodeapertura24.';
		}else if(wo == "" && was != "") {
			brandingtext = 'Horarios de apertura '+ucFirst(was)+'. Un servicio de <a href="http://www.horariodeapertura24.es/" style="color: '+color+'; font-size: 10px;">horariodeapertura24.</a>';
		}else if(wo != "" && was != "") {
			brandingtext = '<a href="http://www.horariodeapertura24.es/busqueda/sucursal-'+ucFirst(wo)+'-30+km-'+ucFirst(was)+'-1.html" style="color: '+color+'; font-size: 10px;">Horarios de apertura '+ucFirst(was)+' in '+ucFirst(wo)+'</a>. Un servicio de horariodeapertura24.';
		}else{
			brandingtext = 'Horarios de apertura-Busca. Un servicio de <a href="http://www.horariodeapertura24.es/" style="color: '+color+'; font-size: 10px;">horariodeapertura24</a>.';
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