<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
// if ( post_password_required() ) {
// 	return;
// }
?>

<div class="area-article-comment">
	<?php if ( have_comments() ) : // You can start editing here -- including this comment! ?>
		<h2 class="ttl-article-comments">
		    コメントを見る(<?php echo get_comments_number() ?>件)
		</h2>
    <ul id="comments-list">
      <?php wp_list_comments($args); ?>
    </ul>
  <?php endif; // Check for have_comments(). ?>

	<?php comment_form();?>
</div><!-- .area-article-comment -->
