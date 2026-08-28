<?php
/** Secure contact-form handling. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

function northform_contact_redirect( $status ) {
	$url = add_query_arg( 'contact', sanitize_key( $status ), home_url( '/' ) ) . '#contact';
	wp_safe_redirect( $url );
	exit;
}

function northform_handle_contact_form() {
	if ( ! isset( $_POST['northform_contact_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['northform_contact_nonce'] ) ), 'northform_contact' ) ) {
		northform_contact_redirect( 'error' );
	}
	if ( ! empty( $_POST['company_website'] ) ) { northform_contact_redirect( 'success' ); }
	$started = isset( $_POST['form_started'] ) ? absint( $_POST['form_started'] ) : 0;
	if ( ! $started || time() - $started < 3 ) { northform_contact_redirect( 'error' ); }
	$ip_key = 'nf_contact_' . md5( wp_salt( 'nonce' ) . ( isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : 'unknown' ) );
	if ( get_transient( $ip_key ) ) { northform_contact_redirect( 'rate' ); }

	$name    = isset( $_POST['contact_name'] ) ? sanitize_text_field( wp_unslash( $_POST['contact_name'] ) ) : '';
	$email   = isset( $_POST['contact_email'] ) ? sanitize_email( wp_unslash( $_POST['contact_email'] ) ) : '';
	$phone   = isset( $_POST['contact_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['contact_phone'] ) ) : '';
	$type    = isset( $_POST['project_type'] ) ? sanitize_text_field( wp_unslash( $_POST['project_type'] ) ) : '';
	$message = isset( $_POST['contact_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['contact_message'] ) ) : '';
	$consent = ! empty( $_POST['privacy_consent'] );
	if ( ! $name || ! is_email( $email ) || ! $message || ! $consent ) { northform_contact_redirect( 'error' ); }

	$recipient = defined( 'NORTHFORM_CONTACT_EMAIL' ) && is_email( NORTHFORM_CONTACT_EMAIL ) ? NORTHFORM_CONTACT_EMAIL : '';
	if ( ! $recipient ) {
		$front_id = absint( get_option( 'page_on_front' ) );
		foreach ( parse_blocks( (string) get_post_field( 'post_content', $front_id ) ) as $content_block ) {
			if ( 'acf/northform-commission-cta' === ( $content_block['blockName'] ?? '' ) ) {
				$recipient = sanitize_email( $content_block['attrs']['data']['primary_email'] ?? '' );
				break;
			}
		}
	}
	if ( ! is_email( $recipient ) ) { $recipient = sanitize_email( get_option( 'admin_email' ) ); }
	$body = "Name: {$name}\nEmail: {$email}\nPhone: {$phone}\nProject type: {$type}\n\n{$message}";
	$sent = wp_mail( $recipient, sprintf( '[NORTH/FORM] Project enquiry from %s', $name ), $body, array( 'Reply-To: ' . $name . ' <' . $email . '>' ) );
	if ( $sent ) { set_transient( $ip_key, 1, MINUTE_IN_SECONDS ); }
	northform_contact_redirect( $sent ? 'success' : 'error' );
}
add_action( 'admin_post_nopriv_northform_contact', 'northform_handle_contact_form' );
add_action( 'admin_post_northform_contact', 'northform_handle_contact_form' );

function northform_contact_form() {
	$status = isset( $_GET['contact'] ) ? sanitize_key( wp_unslash( $_GET['contact'] ) ) : '';
	if ( 'success' === $status ) { echo '<p class="nf-contact__status" role="status">' . esc_html__( 'Thank you. Your project enquiry has been sent.', 'northform' ) . '</p>'; }
	elseif ( 'rate' === $status ) { echo '<p class="nf-contact__status" role="alert">' . esc_html__( 'Please wait a moment before sending another enquiry.', 'northform' ) . '</p>'; }
	elseif ( 'error' === $status ) { echo '<p class="nf-contact__status" role="alert">' . esc_html__( 'We could not send your enquiry. Please check the fields or email us directly.', 'northform' ) . '</p>'; }
	?>
	<form class="nf-contact-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" data-contact-form>
		<input type="hidden" name="action" value="northform_contact"><?php wp_nonce_field( 'northform_contact', 'northform_contact_nonce' ); ?><input type="hidden" name="form_started" value="<?php echo esc_attr( time() ); ?>">
		<div class="nf-contact-form__trap" aria-hidden="true"><label>Company website <input type="text" name="company_website" tabindex="-1" autocomplete="off"></label></div>
		<label><?php esc_html_e( 'Name', 'northform' ); ?> <input required name="contact_name" autocomplete="name"></label>
		<label><?php esc_html_e( 'Email', 'northform' ); ?> <input required type="email" name="contact_email" autocomplete="email"></label>
		<label><?php esc_html_e( 'Phone (optional)', 'northform' ); ?> <input type="tel" name="contact_phone" autocomplete="tel"></label>
		<label><?php esc_html_e( 'Project type', 'northform' ); ?> <select name="project_type"><option value="">Select one</option><option>New build</option><option>Renovation</option><option>Commercial</option><option>Consultation</option><option>Other</option></select></label>
		<label class="nf-contact-form__message"><?php esc_html_e( 'Tell us about your project', 'northform' ); ?> <textarea required name="contact_message" rows="5"></textarea></label>
		<label class="nf-contact-form__consent"><input required type="checkbox" name="privacy_consent" value="1"> <span><?php esc_html_e( 'I consent to NORTH/FORM using these details to respond to my enquiry.', 'northform' ); ?></span></label>
		<button type="submit"><?php esc_html_e( 'Send project enquiry', 'northform' ); ?> <span aria-hidden="true">↗</span></button>
	</form><?php
}
