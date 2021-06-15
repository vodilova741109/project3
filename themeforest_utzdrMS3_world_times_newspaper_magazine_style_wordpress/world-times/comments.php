<?php
    $args_comment = array(
        'callback' => 'world_times_comments',
        'type' => 'comment',
    );
    $args_pingback = array(
        'type' => 'pingback',
        'short_ping' => true,
    );
?>
<?php 
    if (post_password_required() == true) {
        return;
    }
?>

<div class="comment-container" id="comments">
<?php if ( have_comments() ) : ?>
    <div class="section-title">
        <span><?php comments_number( esc_html__('0 Comments', 'world-times'), esc_html__('1 Comment', 'world-times'), esc_html__('% Comments', 'world-times')); ?></span>
    </div>
    <ol>
        <?php wp_list_comments($args_comment); ?>
        <?php wp_list_comments($args_pingback); ?>
    </ol>
    <?php if( get_comment_pages_count() > 1) : ?>
        <div class="clearfix comment-pagination align-center">
            <div class="prev-comment pull-left"><?php previous_comments_link('<i class="fa fa-long-arrow-left"></i> ' . esc_html__('Older Comments', 'world-times')) ?></div>
            <div class="next-comment pull-right"><?php next_comments_link(esc_html__('Newer Comments', 'world-times') . ' <i class="fa fa-long-arrow-right fa-fw"></i>') ?></div>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php if ( ! comments_open() && get_comments_number()) : ?>
    <div class="comment-closed"><?php esc_html_e( 'Comments are closed.', 'world-times' ); ?></div>
<?php endif; ?>
<?php
    global $aria_req;
    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $allowed_html = array(
        'a' => array(
            'href' => array(),
            'title' => array()
        )
    );
    $args_comment_form = array(
        'class_submit' => 'btn btn-primary',
        'fields' => array(
            'author' => '<div class="row"><div class="col-sm-4"><div class="form-group comment-form-author"><label for="author">' . esc_html__( 'Name', 'world-times') . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div></div>',
            'email'  => '<div class="col-sm-4"><div class="form-group comment-form-email"><label for="email">' . esc_html__( 'Email', 'world-times') . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                        '<input class="form-control" id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div></div>',
            'url'    => '<div class="col-sm-4"><div class="form-group comment-form-url"><label for="url">' . esc_html__( 'Website', 'world-times') . '</label> ' .
                        '<input class="form-control" id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div></div></div>'
        ),
        'comment_field' => '<div>  <label for="comment">' . esc_html__( 'Comment', 'world-times') . '</label>
                                <textarea id="comment" name="comment" cols="45" rows="6" aria-required="true"></textarea></div>',
        'must_log_in' => '<p class="must-log-in">' .  sprintf( wp_kses( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'world-times' ), $allowed_html ), esc_url(wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) ) . '</p>',
        'logged_in_as' => '<p class="logged-in-as">' . sprintf( wp_kses( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'world-times' ), $allowed_html ), esc_url(admin_url( 'profile.php' )), $user_identity, esc_url(wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) ) . '</p>',
        'label_submit' => esc_html__('Submit Comment', 'world-times')
        // 'submit_button' => '<div class="form-group"><button  name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s">'.esc_html__('Submit Comment', 'world-times').'</button></div>'
    );
?>
<?php comment_form($args_comment_form); ?>
</div>