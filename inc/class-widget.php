<?php
if ( ! defined( 'WPINC' ) ) {
    die;
}

class Fade_Image_Widget extends WP_Widget {
     
    function __construct() {

        $widget_ops = array(
            'description' => __( 'Specify an image you can hover over and it will fade to the second image. Linkable.', 'tutsplus' ),
            'classname' => 'dhg-fade-in-image',
        );

        parent::__construct(
                //ID of the Widget
                'dhg_fade_in',
                //Name of Widget
                __('Devons Tools Hover Fade Widget', 'tutsplus'),
                //Widget Options
                $widget_ops
            );
    }

     
    function form( $instance ) {

        //Defaults are defined in this array
        $defaults = array(
            'title' => '',
            'link_title' => '',
            'image_main' => '',
            'image_fade' => '',
            'link' => '',
            'width' => '150px',
            'height' => '150px',
            'align' => 'center',
            'length' => '1',
            'crop' => 'no',
        );

        if (isset( $instance[ 'image_main' ] )) { $image_main = $instance[ 'image_main' ]; } else  $image_main = "";
        if (isset( $instance[ 'image_fade' ] )) { $image_fade = $instance[ 'image_fade' ]; } else  $image_fade = "";
        if (isset( $instance[ 'link' ] )) { $link = $instance[ 'link' ]; } else  $link = "";
        if (isset( $instance[ 'title' ] )) { $title = $instance[ 'title' ]; } else  $title = "";
        if (isset( $instance[ 'link_title' ] )) { $link_title = $instance[ 'link_title' ]; } else  $link_title = "";
        if (isset( $instance[ 'width' ] )) { $width = $instance[ 'width' ]; } else  $width = '150px';
        if (isset( $instance[ 'height' ] )) { $height = $instance[ 'height' ]; } else  $height = '150px';
        if (isset( $instance[ 'align' ] )) { $align = $instance[ 'align' ]; } else  $align = 'center';
        if (isset( $instance[ 'length' ] )) { $length = $instance[ 'length' ]; } else  $length = '1';
        if (isset( $instance[ 'crop' ] )) { $crop = $instance[ 'crop' ]; } else  $crop = 'no';
         
        // markup for form ?>



        <p>
            <h2><label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label></h2>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>">
        </p>


        <h2>Images</h2>
        <sub>Note: Images should have the same dimensions</sub>

        <p>
            <label for="<?php echo $this->get_field_name( 'image_main' ); ?>"><?php _e( 'Main Image: Primary Image.' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'image_main' ); ?>" id="<?php echo $this->get_field_id( 'image_main' ); ?>" class="widefat" type="text"  value="<?php echo esc_attr( $image_main ); ?>" />
            <input class="upload_image_button button button-primary" type="button" value="Upload Image" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'image_fade' ); ?>"><?php _e( 'Hover Image: The image it fades to when hovering.' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'image_fade' ); ?>" id="<?php echo $this->get_field_id( 'image_fade' ); ?>" class="widefat" type="text"  value="<?php echo esc_attr( $image_fade ); ?>" />
            <input class="upload_image_button button button-primary" type="button" value="Upload Image" />
        </p>
       
        <h2>Link Attributes</h2>
        <sub>Leave blank if you don't want them linked.</sub>
        <p>
            <label for="<?php echo $this->get_field_id( 'link' ); ?>">Link: The link that the image goes to.</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" value="<?php echo esc_attr( $link ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'link_title' ); ?>">Link Title: The hover link. </label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'link_title' ); ?>" name="<?php echo $this->get_field_name( 'link_title' ); ?>" value="<?php echo esc_attr( $link_title ); ?>">
        </p>

        <h2>Dimensions</h2>
        <p>
            <label for="<?php echo $this->get_field_id( 'width' ); ?>">Width: The width, takes CSS measurement values. </label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" value="<?php echo esc_attr( $width ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'height' ); ?>">Height:  The height, takes CSS measurement values. </label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" value="<?php echo esc_attr( $height ); ?>">
        </p>
        <h2>Other Options</h2>
        <p>
            <label for="<?php echo $this->get_field_id( 'align' ); ?>">Alignment: </label><br>
            <input class="widefat" type="radio" id="<?php echo $this->get_field_id( 'align' ); ?>" name="<?php echo $this->get_field_name( 'align' ); ?>" value="center" <?php if ($align == 'center') echo 'checked'; ?> >Center<br>
            <input class="widefat" type="radio" id="<?php echo $this->get_field_id( 'align' ); ?>" name="<?php echo $this->get_field_name( 'align' ); ?>" value="left" <?php if ($align == 'left') echo 'checked';  ?> >Left<br>
            <input class="widefat" type="radio" id="<?php echo $this->get_field_id( 'align' ); ?>" name="<?php echo $this->get_field_name( 'align' ); ?>" value="right" <?php if ($align == 'right') echo 'checked';  ?> >Right
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'length' ); ?>">Length: The duration of the fade in seconds. </label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'length' ); ?>" name="<?php echo $this->get_field_name( 'length' ); ?>" value="<?php echo esc_attr( $length ); ?>">
        </p>

        <?php /*
        <p>
            <label for="<?php echo $this->get_field_id( 'align' ); ?>">Crop?: </label><br>
            <input class="widefat" type="radio" id="<?php echo $this->get_field_id( 'crop' ); ?>" name="<?php echo $this->get_field_name( 'crop' ); ?>" value="yes" <?php if ($crop == 'yes') echo 'checked'; ?> >Yes<br>
            <input class="widefat" type="radio" id="<?php echo $this->get_field_id( 'crop' ); ?>" name="<?php echo $this->get_field_name( 'crop' ); ?>" value="no" <?php if ($crop == 'no') echo 'checked';  ?> >No<br>
        </p>
        */
        

    }
     
    function update( $new_instance, $old_instance ) {      
        $instance = $old_instance;
        $instance[ 'image_main' ] = strip_tags( $new_instance[ 'image_main' ] );
        $instance[ 'image_fade' ] = strip_tags( $new_instance[ 'image_fade' ] );
        $instance[ 'link' ] = strip_tags( $new_instance[ 'link' ] );
        $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
        $instance[ 'link_title' ] = strip_tags( $new_instance[ 'link_title' ] );
        $instance[ 'width' ] = strip_tags( $new_instance[ 'width' ] );
        $instance[ 'height' ] = strip_tags( $new_instance[ 'height' ] );
        $instance[ 'align' ] = strip_tags( $new_instance[ 'align' ] );
        $instance[ 'length' ] = strip_tags( $new_instance[ 'length' ] );
        $instance[ 'crop' ] = strip_tags( $new_instance[ 'crop' ] );
        return $instance;
    }
     
    function widget( $args, $instance ) {
        extract( $args );
        echo $before_widget;  
        if ( $instance[ 'title' ] != "" ){  
            echo $before_title . $instance['title'] . $after_title;
        }

        ?>

            <style>
                .<?php echo $this->id ?>{
                    height:<?php echo $instance['height'] ?>;
                    width:<?php echo $instance['width'] ?>;
                    <?php if (  $instance['align'] == 'center' ){ ?>
                        margin: 0 auto;
                    <?php } elseif (  $instance['align'] == 'right' ) { ?>
                        float: right;
                    <?php } elseif (  $instance['align'] == 'left' ) { ?>
                        float: left;
                    <?php } ?>
                    <?php if( $instance['crop'] == 'yes' ){ ?>
                        overflow: hidden;
                    <?php } ?>
                }   

                .<?php echo $this->id ?> img{
                    height:<?php echo $instance['height'] ?>;
                    -webkit-transition: opacity <?php echo $instance['length'] ?>s ease-in-out;
                    -moz-transition: opacity <?php echo $instance['length'] ?>s ease-in-out;
                    -o-transition: opacity <?php echo $instance['length'] ?>s ease-in-out;
                    transition: opacity <?php echo $instance['length'] ?>s ease-in-out;
                }

            </style>

            <!--<div class="<?php /* echo $this->id */ ?>">-->
            <div class='dhg_clearfix dhg-fade-in-image'>
                <?php if ($instance['link'] != "") { ?>
                    <a class='<?php echo $this->id ?>' title='<?php echo $instance['link_title'] ?>' href='<?php echo $instance['link'] ?>'>  
                <?php } else { ?>
                    <div class='<?php echo $this->id ?> dhg-wrap-div'>      
                <?php } ?>
                    <?php if ($instance['image_fade'] != '') {?>
                        <img alt="<?php echo $this->id ?>" class="dhg-bottom" src='<?php echo $instance['image_fade']; ?>' />
                    <?php } else{ ?>
                        <img alt="<?php echo $this->id ?>" class="dhg-bottom" src='<?php echo DT_FIW_HOME_URL . "/images/fade_def.png" ?>' />
                    <?php } ?>

                    <?php if ($instance['image_main'] != '') {?>
                        <img alt="<?php echo $this->id ?>" class="dhg-top" src='<?php echo $instance['image_main']; ?>' />
                    <?php } else{ ?>
                        <img alt="<?php echo $this->id ?>" class="dhg-top" src='<?php echo DT_FIW_HOME_URL . "/images/base_def.png" ?>' />
                    <?php } ?>
                <?php if ($instance['link'] != "") { ?>
                    </a>  
                <?php } else { ?>
                    </div>      
                <?php } ?>                
            </div>
        <?php
        echo $after_widget;   
    }
}
