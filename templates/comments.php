<?php
$wp_comments = get_comments( [
	'post_id' => get_the_ID(),
	'parent'  => 0,
	'status'  => 1,
	'count'   => true,
] );

$options = get_option( 'rtc_general_settings' );





?>
<div id="real-time-comments-container" class="rtc-w-full rtc-container rtc-mx-auto rtc-p-5">
	<?php do_action( 'comment_form_before' ); ?>
    <div class="rtc-flex rtc-flex-col">
        <h1 class="rtc-comment-form-heading rtc-main-color"><?php _e( 'Write a comment', 'real-time-comments' ) ?></h1>
		<?php do_action( 'comment_form_top' ); ?>
        <div>
            <comments-form :post_id="<?php echo get_the_ID() ?>" :user_id="<?php echo (int) get_current_user_id() ?>"></comments-form>
			<?php do_action( 'comment_form_after_fields' ); ?>
        </div>
        <hr class="rtc-py-3 rtc-my-3">
        <div class="rtc-w-full rtc-overflow-y-scroll rtc-overflow-x-hidden rtc-scrollbar rtc-scrollbar-thumb-gray-900 rtc-scrollbar-track-gray-100">
            <comments
                    :post_id="<?php echo get_the_ID() ?>"
                    :count="<?php echo esc_attr( $wp_comments ) ?>"
                    :user_id="<?php echo (int) get_current_user_id() ?>"
                    :paged="<?php echo empty( $options['comments_page'] ) ? 10 : esc_attr($options['comments_page']) ?>"
                    app_key="<?php echo esc_attr( $options['pusher_auth_key'] ) ?>"
                    load_via="<?php echo esc_attr( $options['comments_load_via'] ) ?>"
            >
            </comments>
        </div>
		<?php do_action( 'comment_form' ); ?>
		<?php do_action( 'comment_form_after' ); ?>
    </div>
</div>
