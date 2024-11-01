<?php
/*
Plugin Name: WP-RandomAds Widget
Plugin URI: http://wan.web.id/plugins/wp-randomads
Description: WP-RandomAds is Widget that will display random ads on your blog sidebar. You can put up to 6 ad code and ads will be displayed one at random. Visit <a href="http://wan.web.id" target="_blank">My Blog</a> For Detail Information.
Author: Iswan Febriyanto
Author URI: http://wan.web.id
Version: 0.1
*/

function widget_randomads_init() 
{
	if ( !function_exists('register_sidebar_widget') ) return;
	function widget_randomads($args) 
	{
		extract($args);
		$options = get_option('widget_randomads');
		echo $before_widget . $before_title . $options['RandomAds-Title'] . $after_title;
		$kode1 = $options['kode1'];
		$kode2 = $options['kode2'];
		$kode3 = $options['kode3'];
		$kode4 = $options['kode4'];
		$kode5 = $options['kode5'];
		$kode6 = $options['kode6'];
		$kodearray = array ($kode1,$kode2,$kode3,$kode4,$kode5,$kode6);
    	$random_iklan = $kodearray[array_rand($kodearray)];
		
		echo $random_iklan;
		echo $after_widget;
	}

	function widget_randomads_control() 
	{
		$options = get_option('widget_randomads');

		if ( !is_array($options) )
		{
			$options = array ('RandomAds-Title' => "Random Ads");
		}
		if ( $_POST['RandomAds-submit'] ) {
			    $options['kode1'] = stripslashes($_POST['kode1']);
			    $options['kode2'] = stripslashes($_POST['kode2']);
			    $options['kode3'] = stripslashes($_POST['kode3']);
			    $options['kode4'] = stripslashes($_POST['kode4']);
			    $options['kode5'] = stripslashes($_POST['kode5']);
			    $options['kode6'] = stripslashes($_POST['kode6']);
			    $options['RandomAds-Title'] = htmlspecialchars($_POST['RandomAds-Title']);
				update_option('widget_randomads', $options);
		}
		$title = $options['RandomAds-Title'];
		$kode1 = $options['kode1'];
		$kode2 = $options['kode2'];
		$kode3 = $options['kode3'];
		$kode4 = $options['kode4'];
		$kode5 = $options['kode5'];
		$kode6 = $options['kode6'];
		
		echo '<p>';
		echo '<label for="RandomAds-Title"><b>Title:</b> </label><br>';
		echo '<input type="text" id="RandomAds-Title" name="RandomAds-Title" value="'.$title.'" size="50" />'; 
		echo '</p>';
		
		echo '<p>';
		echo '<label for="kode1"><b>Ads Code One:</b> </label><br>';
		echo '<textarea cols="45" rows="5" name="kode1" id="kode1">'.$kode1.'</textarea>';
		echo '</p>';
		
		echo '<p>';
		echo '<label for="kode2"><b>Ads Code Two:</b> </label><br>';
		echo '<textarea cols="45" rows="5" name="kode2" id="kode2">'.$kode2.'</textarea>';
		echo '</p>';
		
		echo '<p>';
		echo '<label for="kode3"><b>Ads Code Three:</b> </label><br>';
		echo '<textarea cols="45" rows="5" name="kode3" id="kode3">'.$kode3.'</textarea>';
		echo '</p>';
		
		echo '<p>';
		echo '<label for="kode4"><b>Ads Code Four:</b> </label><br>';
		echo '<textarea cols="45" rows="5" name="kode4" id="kode4">'.$kode4.'</textarea>';
		echo '</p>';
		
		echo '<p>';
		echo '<label for="kode5"><b>Ads Code Five:</b> </label><br>';
		echo '<textarea cols="45" rows="5" name="kode5" id="kode5">'.$kode5.'</textarea>';
		echo '</p>';
		
		echo '<p>';
		echo '<label for="kode6"><b>Ads Code Six:</b> </label><br>';
		echo '<textarea cols="45" rows="5" name="kode6" id="kode6">'.$kode6.'</textarea>';
		echo '</p>';
		
		echo '<input type="hidden" id="RandomAds-submit" name="RandomAds-submit" value="1" />';
	}
	
	register_sidebar_widget(array('Random Ads', 'widgets'), 'widget_randomads');
	register_widget_control(array('Random Ads', 'widgets'), 'widget_randomads_control', 300, 100);
}
add_action('widgets_init', 'widget_randomads_init');
?>