<?php
/**
 * Template for ElasticPress settings page
 *
 * @since  2.1
 * @package elasticpress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$action = 'options.php';

if ( defined( 'EP_IS_NETWORK' ) && EP_IS_NETWORK ) {
	$index_meta = get_site_option( 'ep_index_meta', false );
	$action = '';
} else {
	$index_meta = get_option( 'ep_index_meta', false );
}
?>

<?php require_once( dirname( __FILE__ ) . '/header.php' ); ?>

<div class="wrap js-ep-wrap">
	<h2><?php esc_html_e( 'Settings', 'elasticpress' ); ?></h2>
	
	<form action="<?php echo esc_attr( $action ); ?>" method="post">
		<?php settings_fields( 'elasticpress' ); ?>
		<?php settings_errors(); ?>

		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row"><label for="ep_host"><?php esc_html_e( 'Elasticsearch Host', 'elasticpress' ); ?></label></th>
					<td>
						<input <?php if ( defined( 'EP_HOST' ) && EP_HOST && ! ep_host_by_option() ) : ?>disabled<?php endif; ?> placeholder="http://" type="text" value="<?php echo esc_url( ep_get_host() ); ?>" name="ep_host" id="ep_host">
						<?php if ( defined( 'EP_HOST' ) && EP_HOST && ! ep_host_by_option() ) : ?>
							<?php esc_html_e( 'Your Elasticsearch host is set in wp-config.php', 'elasticpress' ); ?>
						<?php endif; ?>
					</td>
				</tr>
				<tr>
			</tbody>
		</table>

		<input type="submit" <?php if ( ! empty( $index_meta ) ) : ?>disabled<?php endif; ?> name="submit" id="submit" class="button button-primary" value="<?php esc_html_e( 'Save Changes', 'elasticpress' ); ?>">
	</form>
</div>
