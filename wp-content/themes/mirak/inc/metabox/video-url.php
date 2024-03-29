<?php
/**
 * Subtitle metabox file.
 *
 * @package BlogMelody
 * @since Mirak 1.0
 */

if ( ! function_exists( 'mirak_video_url_callback' ) ) :
    /** 
     * Outputs the content of the Video Url
     */
    function mirak_video_url_callback( $post ) {
        wp_nonce_field( basename( __FILE__ ), 'mirak_nonce' );
        $video_url = get_post_meta( $post->ID, 'mirak-video-url', true );
        ?>
        <p>
         <label for="mirak-video-url" class="mirak-row-title"><?php esc_html_e( 'Video Url', 'mirak' )?></label>
         <input class="widefat" type="url" name="mirak-video-url" id="mirak-video-url" value="<?php echo esc_url( $video_url ); ?>"/>     
        </p>

        <?php
    }
endif;

if ( ! function_exists( 'mirak_video_url_save' ) ) :
    /**
     * Saves the Video Url input
     */
    function mirak_video_url_save( $post_id ) {
        // Checks save status
        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision( $post_id );
        $is_valid_nonce = ( isset( $_POST[ 'mirak_nonce' ] ) && wp_verify_nonce( sanitize_key( $_POST[ 'mirak_nonce' ] ), basename( __FILE__ ) ) ) ? 'true' : 'false';

        // Exits script depending on save status
        if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
            return;
        }

        // Checks for input and sanitizes/saves if needed
        if( isset( $_POST[ 'mirak-video-url' ] ) ) {
            update_post_meta( $post_id, 'mirak-video-url', sanitize_text_field( wp_unslash( $_POST[ 'mirak-video-url' ] ) ) );
        }

    }
endif;
add_action( 'save_post', 'mirak_video_url_save' );

