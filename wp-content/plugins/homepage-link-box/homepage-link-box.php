<?php
/*
* Plugin Name: Link Box Widget
* Description: Widget for homepage link boxes.
* Version: 1.0
* Author: despot
*/
/**
 * Register the Widget
 */
add_action( 'widgets_init', create_function( '', 'register_widget("linkbox_widget");' ) );

require_once("img_resizer.php");

class linkbox_widget extends WP_Widget
{
    /**
     * Constructor
     **/
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'linkbox_widget',
            'description' => 'Link Box Widget displayed on homepage.'
        );

        parent::__construct( 'linkbox_widget', 'Link Box', $widget_ops );

        add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
        add_action('admin_enqueue_styles', array($this, 'upload_styles'));
    }

    /**
     * Upload the Javascripts for the media uploader
     */
    public function upload_scripts()
    {
        wp_enqueue_script('jquery');
        wp_enqueue_script('media-upload');

        wp_enqueue_script('thickbox');
        wp_enqueue_script('upload_media_widget', plugin_dir_url(__FILE__) . 'upload-media.js', array('jquery'));

        wp_enqueue_style('thickbox');
        wp_enqueue_style('thickbox.css', '/wp-includes/js/thickbox/thickbox.css', null, '1.0');
    }

    /**
     * Add the styles for the upload media box
     */
    public function upload_styles()
    {

        wp_enqueue_style('thickbox');
        wp_enqueue_style('thickbox.css', '/wp-includes/js/thickbox/thickbox.css', null, '1.0');
    }

    /**
     * Outputs the HTML for this widget.
     *
     * @param array  An array of standard parameters for widgets in this theme
     * @param array  An array of settings for this widget instance
     * @return void Echoes it's output
     **/
    public function widget( $args, $instance )

    {
        if(isset($instance['class'])) {
            $class = $instance['class'];
        }else {
            $class = "";
        }

        if($class != '' && $class != ' ') {

            if(strpos($instance['class'],'6') > 0){
                $image = aq_resize($instance['image'], 800, 400, true);
            }elseif(strpos($instance['class'],'3') > 0) {
                $image = aq_resize($instance['image'], 400, 500, true);
            }else {
                $image =$instance['image'];
               // $image = aq_resize($instance['image'], 400, 500, true);
                $class = "col-sm-12";
            }

        }else {
            //$instance['class'] = 'col-sm-3';
            $image =$instance['image'];
        }

        echo '
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="homepageLinkBox" style="background-image:url('.$image.')">
                <h3 class="">'.$instance['title'].'</h3>
                <div class="linksHolder">'.$instance['text'].'</div>
            </div>
        </div>
        ';
    }

    /**
     * Deals with the settings when they are saved by the admin. Here is
     * where any validation should be dealt with.
     *
     * @param array  An array of new settings as submitted by the admin
     * @param array  An array of the previous settings
     * @return array The validated and (if necessary) amended settings
     **/
    public function update( $new_instance, $old_instance ) {

        // update logic goes here
        $updated_instance = $new_instance;
        return $updated_instance;
    }

    /**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *
     * @param array  An array of the current settings for this widget
     * @return void
     **/
    public function form( $instance )
    {
        $title = __('Box Title');
        if(isset($instance['title']))
        {
            $title = $instance['title'];
        }

        $image = '';
        if(isset($instance['image']))
        {
            $image = $instance['image'];
        }

        $text = __('');
        if(isset($instance['text']))
        {
            $text = $instance['text'];
        }

/*        $class = __('');
        if(isset($instance['class']))
        {
            $class = $instance['class'];
        }*/
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Box Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Background Image:' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $image ); ?>" />
            <input class="upload_image_button button-secondary" type="button" value="Upload Image" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'text' ); ?>"><?php _e( 'Text:' ); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo esc_attr( $text ); ?></textarea>
        </p>

<!--        <p>
            <label for="<?php /*echo $this->get_field_name( 'class' ); */?>"><?php /*_e( 'Class:' ); */?></label>
            <input class="widefat" id="<?php /*echo $this->get_field_id( 'class' ); */?>" name="<?php /*echo $this->get_field_name( 'class' ); */?>" type="text" value="<?php /*echo esc_attr( $class ); */?>"/>
        </p>-->
    <?php
    }
}
?>