<?php
/**
* 
* This program is a free software; you can use it and/or modify it under the terms of the GNU 
* General Public License as published by the Free Software Foundation; either version 2 of the License, 
* or (at your option) any later version.
*
* This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without 
* even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*
* You should have received a copy of the GNU General Public License along with this program; if not, write 
* to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
*
* @package   	Customizr
* @subpackage 	functions
* @since     	1.0
* @author    	Nicolas GUILLAUME <nicolas@themesandco.com>
* @copyright 	Copyright (c) 2013, Nicolas GUILLAUME
* @link      	http://themesandco.com/customizr
* @license   	http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/



/**
* This is where Customizr starts. This file defines and loads the theme's components :
* 1) A function tc__f() used everywhere in the theme, extension of WP built-in apply_filters()
* 2) Constants : CUSTOMIZR_VER, TC_BASE, TC_BASE_CHILD, TC_BASE_URL, TC_BASE_URL_CHILD, THEMENAME, TC_WEBSITE
* 3) Default filtered values : images sizes, skins, featured pages, social networks, widgets, post list layout
* 4) Text Domain
* 5) Theme supports : editor style, automatic-feed-links, post formats, navigation menu, post-thumbnails, retina support
* 6) Plugins compatibility : jetpack, bbpress, qtranslate, woocommerce and more to come
* 7) Default filtered options for the customizer
* 8) Customizr theme's hooks API : front end components are rendered with action and filter hooks
* 
* The method TC__::tc__() loads the php files and instanciates all theme's classes.
* All classes files (except the class__.php file which loads the other) are named with the following convention : class-[group]-[class_name].php
* 
* The theme is entirely built on an extensible filter and action hooks API, which makes customizations easy as breeze, without ever needing to modify the core structure.
* Customizr's code acts like a collection of plugins that can be enabled, disabled or extended.
* 
*/



/**
* The best and safest way to extend Customizr with your own custom functions is to create a child theme.
* You can add functions here but they will be lost on upgrade. If you use a child theme, you are safe!
* More informations on how to create a child theme with Customizr here : http://themesandco.com/customizr/#child-theme
*/



/**
* The tc__f() function is an extension of WP built-in apply_filters() where the $value param becomes optional.
* It is shorter than the original apply_filters() and only used on already defined filters.
* 
* By convention in Customizr, filter hooks are used as follow :
* 1) declared with add_filters in class constructors (mainly) to hook on WP built-in callbacks or create "getters" used everywhere
* 2) declared with apply_filters in methods to make the code extensible for developers
* 3) accessed with tc__f() to return values (while front end content is handled with action hooks)
* 
* Used everywhere in Customizr. Can pass up to five variables to the filter callback.
*
* @since Customizr 3.0
*/
if( !function_exists( 'tc__f' )) :
    function tc__f ( $tag , $value = null , $arg_one = null , $arg_two = null , $arg_three = null , $arg_four = null , $arg_five = null) {
       return apply_filters( $tag , $value , $arg_one , $arg_two , $arg_three , $arg_four , $arg_five );
    }
endif;



/**
* Fires the theme : constants definition, core classes loading
*
* 
* @package      Customizr
* @subpackage   classes
* @since        3.0
* @author       Nicolas GUILLAUME <nicolas@themesandco.com>
* @copyright    Copyright (c) 2013, Nicolas GUILLAUME
* @link         http://themesandco.com/customizr
* @license      http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

class TC___ {
    
    //Access any method or var of the class with classname::$instance -> var or method():
    static $instance;

    public $tc_core;

    function __construct () {

        self::$instance =& $this;

        //this is the structure of the Customizr code : groups => ('path' , 'class_suffix')
        $this -> tc_core = apply_filters( 'tc_core',
                        array(
                            'fire'      =>   array(
                                            array('inc' , 'init'),//defines default values (layout, socials, default slider...) and theme supports (after_setup_theme)
                                            array('inc' , 'resources'),//loads style (skins) and scripts
                                            array('inc' , 'utils'),//those are helpers used everywhere
                                            array('inc' , 'widgets'),//widget factory
                                            array('inc/admin' , 'admin_init'),//fires the customizer and the metaboxes for slider and layout options
                                        ),
                            //the following files/classes define the action hooks for front end rendering : header, main content, footer
                            'header'    =>   array(
                                            array('parts' , 'header_main'),
                                            array('parts' , 'menu'),
                                            array('parts' , 'nav_walker'),
                                        ),
                            'content'   =>  array(
                                            array('parts', '404'),
                                            array('parts', 'attachment'),
                                            array('parts', 'breadcrumb'),
                                            array('parts', 'comments'),
                                            array('parts', 'featured_pages'),
                                            array('parts', 'gallery'),
                                            array('parts', 'headings'),
                                            array('parts', 'no_results'),
                                            array('parts', 'page'),
                                            array('parts', 'post'),
                                            array('parts', 'post_list'),
                                            array('parts', 'post_metas'),
                                            array('parts', 'post_navigation'),
                                            array('parts', 'sidebar'),
                                            array('parts', 'slider'),
                                        ),
                            'footer'    => array(
                                            array('parts', 'footer_main'),
                                        ),
                            'addons'    => apply_filters('tc_addons_classes' , array() )
                        )//end of array                         
        );//end of filter
        
        /* GETS INFORMATIONS FROM STYLE.CSS */
        // get themedata version wp 3.4+
        if( function_exists( 'wp_get_theme' ) )
          {
            //get WP_Theme object of customizr
            $tc_theme                     = wp_get_theme();

            //Get infos from parent theme if using a child theme
            $tc_theme = $tc_theme -> parent() ? $tc_theme -> parent() : $tc_theme;

            $tc_base_data['prefix']       = $tc_base_data['title'] = $tc_theme -> name;
            $tc_base_data['version']      = $tc_theme -> version;
            $tc_base_data['authoruri']    = $tc_theme -> {'Author URI'};
          }

        // get themedata for lower versions (get_stylesheet_directory() points to the current theme root, child or parent)
        else
          {
             $tc_base_data                = get_theme_data( get_stylesheet_directory().'/style.css' );
             $tc_base_data['prefix']      = $tc_base_data['title'];
          }

        /* CUSTOMIZR_VER is the Version */
        if( ! defined( 'CUSTOMIZR_VER' ) )      { define( 'CUSTOMIZR_VER' , $tc_base_data['version'] ); }

        /* TC_BASE is the root server path of the parent theme */
        if( ! defined( 'TC_BASE' ) )            { define( 'TC_BASE' , get_template_directory().'/' ); }

        /* TC_BASE_CHILD is the root server path of the child theme */
        if( ! defined( 'TC_BASE_CHILD' ) )      { define( 'TC_BASE_CHILD' , get_stylesheet_directory().'/' ); }

        /* TC_BASE_URL http url of the loaded parent theme*/
        if( ! defined( 'TC_BASE_URL' ) )        { define( 'TC_BASE_URL' , get_template_directory_uri() . '/' ); }

        /* TC_BASE_URL_CHILD http url of the loaded child theme*/
        if( ! defined( 'TC_BASE_URL_CHILD' ) )  { define( 'TC_BASE_URL_CHILD' , get_stylesheet_directory_uri() . '/' ); }

        /* THEMENAME contains the Name of the currently loaded theme */
        if( ! defined( 'THEMENAME' ) )          { define( 'THEMENAME' , $tc_base_data['title'] ); }

        /* TC_WEBSITE is the home website of Customizr */
        if( ! defined( 'TC_WEBSITE' ) )         { define( 'TC_WEBSITE' , $tc_base_data['authoruri'] ); }

        /* theme class groups instanciation */
        $this -> tc__ ( $this -> tc_core );

    }//end of __construct()



    /**
    * Class instanciation with a singleton factory : 
    * Thanks to Ben Doherty (https://github.com/bendoh) for the great programming approach
    * 
    *
    * @since Customizr 3.0
    */
    function tc__ ( $load ) {
        
        static $instances;

        foreach ( $load as $group => $files ) {
            foreach ($files as $path_suffix ) {
                //checks if a child theme is used and if the required file has to be overriden
                if ( $this -> tc_is_child() && file_exists( TC_BASE_CHILD . $path_suffix[0] . '/class-' . $group . '-' .$path_suffix[1] .'.php') ) {
                    require_once ( TC_BASE_CHILD . $path_suffix[0] . '/class-' . $group . '-' .$path_suffix[1] .'.php') ;
                }
                else {
                    require_once ( TC_BASE . $path_suffix[0] . '/class-' . $group . '-' .$path_suffix[1] .'.php') ;
                }
                
                $classname = 'TC_' . $path_suffix[1];
                if( ! isset( $instances[ $classname ] ) ) 
                {
                    $instances[ $classname ] = class_exists($classname)  ? new $classname : '';
                }
            }
        }
        return $instances[ $classname ];
    }



    /**
    * Checks if we use a child theme. Uses a deprecated WP functions (get_theme_data) for versions <3.4
    * @return boolean
    * 
    * @since  Customizr 3.0.11
    */
    function tc_is_child() {
        // get themedata version wp 3.4+
        if( function_exists( 'wp_get_theme' ) ) {
            //get WP_Theme object of customizr
            $tc_theme       = wp_get_theme();
            //define a boolean if using a child theme
            $is_child       = ( $tc_theme -> parent() ) ? true : false;
         }
         else {
            $tc_theme       = get_theme_data( get_stylesheet_directory() . '/style.css' );
            $is_child       = ( ! empty($tc_theme['Template']) ) ? true : false;
        }

        return $is_child;
    }

}//end of class

//Creates a new instance
new TC___;