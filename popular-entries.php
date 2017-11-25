<section class="box-recommend">
  <h4 class="ttl-relation-article">よく読まれている記事はこちら</h4>
  <ul class="mod-article-list">
  <?php
    setPostViews(get_the_ID()); // views post metaで記事のPV情報を取得する
    // ループ開始
    query_posts('meta_key=post_views_count&orderby=meta_value_num&posts_per_page=5&order=DESC'); while(have_posts()) : the_post(); ?>
      <li>
        <h5 class="mod-article-link">
          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
              <?php the_title();　?>
          </a>
        </h5>
      </li>
  <?php endwhile; ?>
  </ul>
</section>
