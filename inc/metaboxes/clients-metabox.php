<?php

/**
 * Metabox for the Clients custom post type
 *
 * @package    	Bizworx Tools
 * @link        http://themeworx.net
 * Author:      Themeworx
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */


function bizworx_tools_clients_metabox() {
    new Bizworx_Tools_Clients();
}

if ( is_admin() ) {
    add_action( 'load-post.php', 'bizworx_tools_clients_metabox' );
    add_action( 'load-post-new.php', 'bizworx_tools_clients_metabox' );
}

class Bizworx_Tools_Clients {

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	public function add_meta_box( $post_type ) {
        global $post;
		add_meta_box(
			'st_clients_metabox'
			,__( 'Client info', 'bizworx_tools' )
			,array( $this, 'render_meta_box_content' )
			,'clients'
			,'advanced'
			,'high'
		);
	}

	public function save( $post_id ) {
	
		if ( ! isset( $_POST['bizworx_tools_clients_nonce'] ) )
			return $post_id;

		$nonce = $_POST['bizworx_tools_clients_nonce'];

		if ( ! wp_verify_nonce( $nonce, 'bizworx_tools_clients' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return $post_id;

		if ( 'clients' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;
	
		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}

		$link 	= isset( $_POST['bizworx_tools_clients_info'] ) ? esc_url_raw($_POST['bizworx_tools_clients_info']) : false;
		update_post_meta( $post_id, 'wpcf-client-link', $link );

	}

	public function render_meta_box_content( $post ) {
		wp_nonce_field( 'bizworx_tools_clients', 'bizworx_tools_clients_nonce' );

		$link = get_post_meta( $post->ID, 'wpcf-client-link', true );

	?>
		<p><strong><label for="bizworx_tools_clients_info"><?php _e( 'Client link', 'bizworx_tools' ); ?></label></strong></p>
		<p><em><?php _e('Add a link for the client\'s website here [optional]', 'bizworx_tools'); ?></em></p>
		<p><input type="text" class="widefat" id="bizworx_tools_clients_info" name="bizworx_tools_clients_info" value="<?php echo esc_url($link); ?>"></p>	

	<?php
	}
}
