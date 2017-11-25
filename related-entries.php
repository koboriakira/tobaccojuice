<?php
//カテゴリ情報から関連記事を10個ランダムに呼び出す
$categories = get_the_category($post->ID);
$category_ID = array();
foreach($categories as $category):
  array_push( $category_ID, $category -> cat_ID);
endforeach ;
$args = array(
  'post__not_in' => array($post -> ID),
  'posts_per_page'=> 5,
  'category__in' => $category_ID,
  'orderby' => 'rand',
);
$query = new WP_Query($args); ?>
  <?php if( $query -> have_posts() ): ?>
    <section class="box-recommend">
      <h4 class="ttl-relation-article">関連する記事</h4>
      <ul class="mod-article-list">
        <?php while ($query -> have_posts()) : $query -> the_post(); ?>
          <li>
            <h5 class="mod-article-link">
              <a href="<?php the_permalink(); ?>"><?php the_title();　?></a>
            </h5>
          </li>
        <?php endwhile;?>
      </ul>
    </section>
  <?php else:?>
  <?php
endif;
wp_reset_postdata();
?>
<br style="clear:both;">
