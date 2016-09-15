<?php
    /*  Copyright 2010 Eric P. Isenhauer
        This program is free software; you can redistribute it and/or modify
        it under the terms of the GNU General Public License, version 2, as 
        published by the Free Software Foundation.

        This program is distributed in the hope that it will be useful,
        but WITHOUT ANY WARRANTY; without even the implied warranty of
        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
        GNU General Public License for more details.

        You should have received a copy of the GNU General Public License
        along with this program; if not, write to the Free Software
        Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
    */
?>
<?php
      /* 
      Plugin Name: WordPress Hit Counter
      Plugin URI: http://wordpress.org/extend/plugins/wordpress-hit-counter/
      Description: Displays an odometer hit counter on your blog, simple and easy to configure. Visit Settings->Hit Counter after activating.
      Version: 2.6
      Author: Eric P. Isenhauer 
      */
      

      // leave this in here until all 1.x users are migrated off
      perform_install();

      class HitCounter  {
          
          function __construct($arg) {
              if (get_option('wphc_display_footer')) {
                  add_action('wp_footer', array(&$this,'display'));
              }
          }
          function HitCounter() {
              $args = func_get_args();
              call_user_func_array(array(&$this, '__construct'), $args);
          }
          
          function counter() {
              $hits = get_option('wphc_data');
              if (is_404()) {
                  if (!get_option('wphc_count_404')) {
                      // if its a 404 page and theres no explicit rule to count 404s, lets bail
                      return;
                  }
              }
              
              if (get_option('wphc_count_only_unique')) {
                  if (!$_COOKIE['wphc_seen']) {
                      setCookie("wphc_seen", "1", time() + (3600 * 24));
                  } else {
                      // bail if non unique and we're only counting uniques
                      return;
                  }
              }
              
              /* check if hit comes from wp-admin */
              if (is_admin()) {
                  if (get_option('wphc_count_admin')) {
                      update_option('wphc_data', $hits+1);
                  }
              } else {
              		$exclude_list = split("\n",get_option('wphc_exclude_ips'));

              		if(!in_array($_SERVER['REMOTE_ADDR'],$exclude_list)) {
	                  update_option('wphc_data', $hits+1);
	                }
              }
          }
          
          function display() {
              $hits = get_option('wphc_data');
              $style = get_option('wphc_style');
              $align = get_option('wphc_align');
              if ($align) {
                  $alignment_options = ' align="'.$align.'"';
              }

              echo '<div class="wordpress-hit-counter"'.$alignment_options.'>';
              if (get_option('wphc_pad_zeros') && strlen($hits) < 7) {
                  for ($i = 0; $i < (7 - strlen($hits)); $i++) {
                      echo "<img src='".WP_PLUGIN_URL."/wordpress-hit-counter/styles/$style/0.gif'>";
                  }
              }                       
              echo preg_replace('/(\d)/', "<img src='".WP_PLUGIN_URL."/wordpress-hit-counter/styles/$style/$1.gif'>", $hits);
              echo '</div>';
          }
      }
      function perform_install() {
          global $wpdb;
          if (!get_option('wphc_data')) {
              /* upgrade yucky 1.x releases to 2.0 system */
              $migration = $wpdb->get_row( "SELECT hitcounter, imagename, flag FROM wp_imagecounter" );
              if ($migration) {
                  update_option('wphc_data', $migration->hitcounter);
                  update_option('wphc_style', 'Basic/' . $migration->imagename);
                  update_option('wphc_display_footer', $migration->flag);
                  update_option('wphc_display_credit', 1);
                  update_option('wphc_count_only_unique', 0);
                  update_option('wphc_check_update', 1);
                  $wpdb->query( "DROP TABLE wp_imagecounter" );
              }

              /* setup defaults for new installs */
              add_option('wphc_data', 0);
              add_option('wphc_style', 'Basic/1');
              add_option('wphc_display_footer', 1);
              add_option('wphc_display_credit', 1);
              add_option('wphc_count_only_unique', 0);
              add_option('wphc_check_update', 1);
          }
      }
      
      function perform_uninstall() {
          delete_option('wphc_data');
          delete_option('wphc_style');
          delete_option('wphc_display_footer');
          delete_option('wphc_display_credit');
          delete_option('wphc_count_admin');
          delete_option('wphc_count_only_unique');
          delete_option('wphc_algin');
          delete_option('wphc_check_update');
      }

      include("hitcounter_menu.php");

      class wHitCounter extends WP_Widget {
          function wHitCounter() {
              parent::__construct(false, $name = 'WordPress Hit Counter',array("description"=>"Hit Counter"));
          }

          function form($instance) {
              echo 'Please go to <a href="options-general.php?page=wordpress-hit-counter">Settings -> Hit Counter</a> to configure this sidebar widget';
          }

          function update($new_instance, $old_instance) {
              return $new_instance;
          }

          function widget($args, $instance) {
              $hits = get_option('wphc_data');
              $style = get_option('wphc_style');
              $align = get_option('wphc_align');
              
              if ($align) {
                  $alignment_options = ' align="'.$align.'"';
              }              
              extract( $args );
              $title = apply_filters('widget_title', $instance['title']);
              echo $before_widget;
              if ( $title )
                  echo $before_title . $title . $after_title;
              
              echo '<div class="wordpress-hit-counter"'.$alignment_options.'>';
              if (get_option('wphc_pad_zeros') && strlen($hits) < 7) {
                  for ($i = 0; $i < (7 - strlen($hits)); $i++) {
                      echo "<img src='".WP_PLUGIN_URL."/wordpress-hit-counter/styles/$style/0.gif'>";
                  }
              }
              echo preg_replace('/(\d)/', "<img src='".WP_PLUGIN_URL."/wordpress-hit-counter/styles/$style/$1.gif'>", $hits);
              echo '</div>';
              echo $after_widget;
          }
      }


      add_action('widgets_init', create_function('', 'return register_widget("wHitCounter");'));
      $HitCounter = new HitCounter('8b8203326e2a9c70947a');

      /* perform count */
      add_action('wp', array(&$HitCounter, 'counter'));
?>
