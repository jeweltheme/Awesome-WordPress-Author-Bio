<?php
/**
 * Plugin Name: WP Author Bio
 * Plugin URI: https://jeweltheme.com
 * Description: WP Author Bio comes with rich customisable settings. Add author bio at the end of every post or Pages. See Live Social Updates of every Author.
 * Version: 1.0.1
 * Author: Liton Arefin
 * Author URI: https://jeweltheme.com
*/


/** 
 * Include Plugin related files
 */
include(plugin_dir_path( __FILE__ ) . 'inc/author.css.php');

include( plugin_dir_path( __FILE__ ) . 'inc/class.settings-api.php');


/** 
 * Load Scripts
 * External Stylesheet and JavaScripts
 */

add_action('wp_enqueue_scripts', 'jeweltheme_wp_author_bio_style');

function jeweltheme_wp_author_bio_style() {

    if( !is_admin() ){

        wp_enqueue_style( 'jeweltheme-wp-author-bio-style', plugins_url( 'css/author-style.css', __FILE__ ) );

        wp_enqueue_style( 'jeweltheme-wp-font-awesome-author-bio', plugins_url( 'css/font-awesome.min.css', __FILE__ ) );
        
        wp_register_script( 'jeweltheme-wp-author-bio-responsive-js', plugins_url( 'js/easy-responsive-tabs.js', __FILE__ ), false, '1.0', true );    
        wp_enqueue_script( 'jeweltheme-wp-author-bio-responsive-js' );

        wp_register_script( 'jeweltheme-wp-author-bio-js', plugins_url( 'js/scripts.js', __FILE__ ), false, '1.0', true );    
        wp_enqueue_script( 'jeweltheme-wp-author-bio-js' );

    } 

    if( is_admin() ){ ?>
        <style type="text/css">
        .postbox {
            padding-left: 20px;
        }
        </style>
    <?php }



}



/**
* Front-End Author Bio Display 
*/
function jeweltheme_wp_authorbio_display( $content ) {

    $jeweltheme_wp_show_bio = jeweltheme_wp_options( 'show-post-page', 'jeweltheme_wp_general' );

    if ( (($jeweltheme_wp_show_bio == "post") and is_single()) or (($jeweltheme_wp_show_bio == "page") and is_page()) or (($jeweltheme_wp_show_bio=="both") and (is_single() or is_page()))  ) {  

    ob_start();

?>
    <div class="jeweltheme-wp-authorbio-maindiv">

        <div class="jeweltheme-wp-authorbio-float-maindiv">

            <div class="jeweltheme-wp-author-image-area">

                <div class="jeweltheme-wp-author-image">

                    <?php echo get_avatar( get_the_author_meta( 'ID' ), jeweltheme_wp_options( 'avatar-size', 'jeweltheme_wp_general' ) ); ?>
                    
                </div> <!-- /.jeweltheme-wp-author-image -->                

                <div class="jeweltheme-wp-author-name">

                     <?php the_author_posts_link( );?>   

                </div>

            </div><!-- .jeweltheme-wp-author-image-area -->


            <div class="jeweltheme-wp-author-other">

                 <div id="jeweltheme-wp-author-tab"> 

                    <ul class="resp-tabs-list">

                        <li>
                            <i class="fa fa-user"></i>
                            <?php _e( 'Description', 'jeweltheme' );?>
                        </li>

                        <li>
                            <i class="fa fa-share"></i>
                            <?php _e('Socials', 'jeweltheme');?>
                        </li>

                        <li>
                                <i class="fa fa-list-ul"></i>
                                <?php _e('Recent Post', 'jeweltheme');?>
                        </li>

                        <li>
                                <i class="fa fa-comments-o"></i>
                                <?php _e('Comments', 'jeweltheme');?>
                        </li>
                        
                    </ul> 

                    <div class="resp-tabs-container"> 

                        <div>
                            <p><?php echo get_the_author_meta('description' );?></p>
                        </div>

                        <div class="jeweltheme-wp-social-tab">

                            <ul>

                            <?php 
                            
                                $facebook = get_the_author_meta('facebook' );
                                $twitter = get_the_author_meta('twitter' );
                                $linkedin = get_the_author_meta('linkedin' );
                                $googleplus = get_the_author_meta('googleplus' );
                                $pinterest = get_the_author_meta('pinterest' );
                                $thumbler = get_the_author_meta('thumbler' );
                                $flickr = get_the_author_meta('flickr' );
                                $instagram = get_the_author_meta('instagram' );
                                $dribbble = get_the_author_meta('dribbble' );
                                $youtube = get_the_author_meta('youtube' );

                                if( $facebook ){ ?>
                                    <li class="jeweltheme-wp-icon jeweltheme-wp-facebook"><a href="https://www.facebook.com/<?php echo $facebook;?>" target="_blank" ><i class="fa fa-facebook"></i></a></li>
                                <?php } ?>

                                <?php if ( $twitter ) { ?>
                                    <li class="jeweltheme-wp-icon jeweltheme-wp-twitter"><a href="https://twitter.com/<?php echo $twitter;?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <?php } ?>

                                <?php if ( $linkedin ) { ?>
                                    <li class="jeweltheme-wp-icon jeweltheme-wp-linkedin"><a href="http://www.linkedin.com/in/<?php echo $linkedin;?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <?php } ?>

                                <?php if( $googleplus ){ ?>
                                    <li class="jeweltheme-wp-icon jeweltheme-wp-googleplus"><a href="https://plus.google.com/+<?php echo $googleplus;?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                <?php } ?>

                                <?php if( $dribbble ){ ?>
                                    <li class="jeweltheme-wp-icon jeweltheme-wp-dribbble"><a href="http://dribbble.com/<?php echo $dribbble;?>" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                                <?php } ?>

                                <?php if( $pinterest ){  ?>
                                    <li class="jeweltheme-wp-icon jeweltheme-wp-pinterest"><a href="https://www.pinterest.com/<?php echo $pinterest;?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                                <?php } ?>

                                <?php if( $youtube ){ ?>
                                    <li class="jeweltheme-wp-icon jeweltheme-wp-youtube"><a href="https://www.youtube.com/user/<?php echo $youtube;?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                <?php } ?>

                                <?php if( $flickr ){ ?>
                                    <li class="jeweltheme-wp-icon jeweltheme-wp-flickr"><a href="http://www.flickr.com/people/<?php echo $flickr;?>" target="_blank"><i class="fa fa-flickr"></i></a></li>
                                <?php } ?>                               
                                
                            </ul>
                                
                        </div>

                        <div>
                            <ul>
                              <?php 

                                global $author_id;                  

                                global $post_limit;                             
                                
                                $post_limit = jeweltheme_wp_options( 'post-limit', 'jeweltheme_wp_recent'); 
                                
                                $author_id = get_the_author_meta( 'ID' );
                                
                                $query =new WP_Query(array('post_type' => 'post','author' => $author_id,'showposts' => $post_limit)); 

                                if ( $query->have_posts() ) { while ( $query->have_posts() ) { $query->the_post(); ?>

                                <li><a href="<?php the_permalink(); ?>">
                                     <?php   

                                                    global $jeweltheme_wp_post_length;
                                                    
                                                    $jeweltheme_wp_post_length = jeweltheme_wp_options( 'post-title-length', 'jeweltheme_wp_recent', '10');

                                                    $title = get_the_title(); 

                                                    if (strlen($title) > 10)

                                                    $title = substr( $title, 0 , $jeweltheme_wp_post_length ) . "..."; 

                                                    echo "$title";
                                                ?>
                                &nbsp; &nbsp;
                                <span>
                                  <?php 

                                        $jeweltheme_wp_show_comments = jeweltheme_wp_options( 'recent-show-comments', 'jeweltheme_wp_recent'); 

                                        if( $jeweltheme_wp_show_comments =="yes" ) {

                                        comments_number( '0 comment', '1 comment', '% Comments' ); } ?>  

                                </span> &nbsp; &nbsp; 
                            
                                </a>
                            </li>

                                 <?php 
                                        
                                        wp_reset_postdata();
                                        
                                        } 
                                    } else { 
                                    ?>

                                        <li> <p class="not_found">Sorry, no post is unavailable!</p> </li>
                                    
                                    <?php } ?>
                            
                            </ul>

                        </div>

                        <div>
                            <ul>
                                <?php 

                                    $jeweltheme_wp_num_of_comments = jeweltheme_wp_options( 'comment-post-limit', 'jeweltheme_wp_comments'); 

                                    $args = array('status' => 'approve','number' => $jeweltheme_wp_num_of_comments,'user_id' => get_the_author_meta( 'ID' ));
                                    
                                    $comments = get_comments($args);
                                    
                                    if( $comments ){

                                    foreach($comments as $comment) { ?>

                                <li>

                                    <a href="<?php echo get_permalink( $comment->comment_post_ID ) ?>#comment-<?php echo $comment->comment_ID; ?>">
                                       
                                        <?php

                                            $jeweltheme_wp_comment_title_length = jeweltheme_wp_options( 'comment-title-length', 'jeweltheme_wp_comments'); 
                        
                                            $contents = $comment->comment_content;

                                            $trimmed_content = wp_trim_words( $contents, $jeweltheme_wp_comment_title_length);

                                            echo $trimmed_content;

                                        ?>

                                        &nbsp; &nbsp; 


                                    </a>

                                </li>

                                <?php } } else{ ?>

                                    <li> <p class="not_found">Sorry, this author doesn't have any comments!</p> </li>

                                <?php } ?>                                
                                
                            </ul>

                        </div>
                        
                    </div><!-- /.resp-tabs-container -->
                </div> <!-- /.jeweltheme-wp-author-tab -->

            </div><!-- /.jeweltheme-wp-author-other -->
        </div><!-- /.jeweltheme-wp-authorbio-float-maindiv -->   
    </div><!-- /.jeweltheme-wp-authorbio-maindiv -->


    <?php

    $jeweltheme_wp_author_bio_box = ob_get_clean();

    ob_end_flush();

    return $content . $jeweltheme_wp_author_bio_box;  

    } else {  
        return $content;  
    }  
}




add_action('the_content', 'jeweltheme_wp_authorbio_display');


if ( !class_exists('jeweltheme_wp_Settings_Author_Bio' ) ):

class jeweltheme_wp_Settings_Author_Bio {

    private $settings_api;

    function __construct() {

        $this->settings_api = new jeweltheme_wp_Settings_API;

        add_action( 'admin_init', array($this, 'admin_init') );
        add_action( 'admin_menu', array($this, 'admin_menu') );
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }

    function admin_menu() {
        add_menu_page( 'WP Author Bio Settings', 'Author Bio', 'delete_posts', 'jeweltheme_wp_author_bio_settings', array($this, 'plugin_page') );
    }

    function get_settings_sections() {
        $sections = array(
            array(
                'id' => 'jeweltheme_wp_general',
                'title' => __( 'General', 'jeweltheme' )
            ),

            array(
                'id' => 'jeweltheme_wp_style',
                'title' => __( 'Style', 'jeweltheme' )
            ),            
            array(
                'id' => 'jeweltheme_wp_recent',
                'title' => __( 'Recent Posts', 'jeweltheme' )
            ),

            array(
                'id' => 'jeweltheme_wp_comments',
                'title' => __( 'Comments', 'wpuf' )
            )
        );
        return $sections;
    }


    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array(
            'jeweltheme_wp_general' => array(

                array(
                    'name' => 'show-post-page',
                    'label' => __( 'Author Bio Shows in', 'jeweltheme' ),
                    'desc' => __( 'Choose where to show Post/Page or Both?', 'jeweltheme' ),
                    'type' => 'select',
                    'default' => 'post',
                    'options' => array(
                        'post' => 'Post',
                        'page' => 'Page',
                        'both' => 'Both'
                    )
                ),

                array(
                    'name' => 'avatar-size',
                    'label' => __( 'Avatar Size', 'jeweltheme' ),
                    'desc' => __( 'px', 'jeweltheme' ),
                    'type' => 'text',
                    'default' => '100',
                    'sanitize_callback' => 'intval'
                ),

            ),


    /* Styles */
    'jeweltheme_wp_style' => array(

                array(
                    'name' => 'background-color',
                    'label' => __( 'Background Color', 'jeweltheme' ),
                    'desc' => __( 'Select Background Color. Default: #DDDDDD', 'jeweltheme' ),
                    'default' => '#DDDDDD',
                    'type' => 'color'
                ),  

                array(
                    'name' => 'tabbed-color',
                    'label' => __( 'Tabs Background Color', 'jeweltheme' ),
                    'desc' => __( 'Select Tabs Background Color. Default: #56AAA6', 'jeweltheme' ),
                    'default' => '#56AAA6',
                    'type' => 'color'
                )
            ),


            /* Author's Recent Post*/
            'jeweltheme_wp_recent' => array(

                array(
                    'name' => 'post-title-length',
                    'label' => __( 'Post Title Length', 'jeweltheme' ),
                    'desc' => __( 'Characters', 'jeweltheme' ),
                    'type' => 'text',
                    'default' => '35',
                    'sanitize_callback' => 'intval'
                ),
                
                array(
                    'name' => 'post-limit',
                    'label' => __( 'Show Posts', 'jeweltheme' ),
                    'desc' => __( 'Posts shows in Author Recent Post tab.', 'jeweltheme' ),
                    'type' => 'select',
                    'default' =>'3',
                    'options' => array(
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                        '5' => '5',
                        '6' => '6',
                        '7' => '7',
                        '8' => '8',
                        '9' => '9',
                        '10' => '10'
                    )
                ),

                array(
                    'name' => 'recent-show-comments',
                    'label' => __( 'Show Comments', 'jeweltheme' ),
                    'desc' => __( 'Show Comments in Author Recent Section.', 'jeweltheme' ),
                    'type' => 'select',
                    'default' => 'yes',
                    'options' => array(
                        'yes' => 'Yes',
                        'no' => 'No'
                    )
                ),

            ),


/* Author's Recent Comments Tab */
            'jeweltheme_wp_comments' => array(
               
                array(
                    'name' => 'comment-title-length',
                    'label' => __( 'Comment Title Length', 'jeweltheme' ),
                    'desc' => __( 'Characters', 'jeweltheme' ),
                    'type' => 'text',
                    'default' => '20',
                    'sanitize_callback' => 'intval'
                ),
                
                array(
                    'name' => 'comment-post-limit',
                    'label' => __( 'Number of Comments', 'jeweltheme' ),
                    'desc' => __( 'Comment Shows in Author Comment Post tab.', 'jeweltheme' ),
                    'type' => 'select',
                    'default' => '3',
                    'options' => array(
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                        '5' => '5',
                        '6' => '6',
                        '7' => '7',
                        '8' => '8',
                        '9' => '9',
                        '10' => '10'
                    )
                ),


            )
        );

        return $settings_fields;
    }

    function plugin_page() {
        echo '<div class="wrap">';

        $this->settings_api->show_navigation();
        $this->settings_api->show_forms();

        echo '</div>';
    }

    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    function get_pages() {
        $pages = get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }

}
endif; 

$settings = new jeweltheme_wp_Settings_Author_Bio();



/** 
 * Get Options Settings 
 */

function jeweltheme_wp_options( $option, $section, $default = '' ) {
 
    $options = get_option( $section );
 
    if ( isset( $options[$option] ) ) {
        return $options[$option];
    }
 
    return $default;
}



/** 
 * Modify User Contact Methods
 */
function jeweltheme_wp_user_contact_methods( $user_contact ){

    /* Add user contact methods */
    $user_contact['facebook'] = __('Facebook Username'); 
    $user_contact['twitter'] = __('Twitter Username'); 
    $user_contact['linkedin'] = __('Linkedin Username'); 
    $user_contact['googleplus'] = __('Google Plus Username'); 
    $user_contact['pinterest'] = __('Pinterest Username'); 
    $user_contact['thumbler'] = __('Thumbler Username'); 
    $user_contact['flickr'] = __('Flickr Username'); 
    $user_contact['instagram'] = __('Instagram Username'); 
    $user_contact['dribbble'] = __('Dribbble Username'); 
    $user_contact['youtube'] = __('Youtube Username'); 

    /* Remove user contact methods */
    unset($user_contact['yim']);
    unset($user_contact['aim']);
    unset($user_contact['jabber']);

    return $user_contact;
}

add_filter('user_contactmethods', 'jeweltheme_wp_user_contact_methods');


add_action('admin_enqueue_scripts', 'wp_author_bio_enqueue_scripts');
function wp_author_bio_enqueue_scripts() { ?>
    <style type="text/css">
        .metabox-holder .postbox{
            padding: 10px !important;
        }        
    </style>
<?php }