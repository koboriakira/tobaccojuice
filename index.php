<?php get_header(); ?>

    <div class="hero-cmn">
    </div>
    <!-- .hero-cmn -->

    <div class="nav-breadcrumb">

    </div>
    <!-- .nav-breadcrumb -->

    <div class="contents">
      <article class="contents-main">
        <!-- 最新の記事、ページネーション-->
        <div class="area-article-summary">
          <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $tag = (get_query_var('tag')) ? get_query_var('tag') : '';
            $cat = (get_query_var('cat')) ? get_query_var('cat') : '';
            $args = array(
              'posts_per_page' => 5,
              'order'          => 'DESC',
              'paged'          => $paged,
              'tag'            => $tag,
              'cat'       => $cat,
            );
            $lastposts = get_posts( $args );
            foreach ( $lastposts as $post ) : setup_postdata( $post ); ?>
            <section class="box-article-summary">
              <ul class="box-article-meta-info box-article-summary-meta-info">
                <li><i class="fa fa-clock-o fa-1x" aria-hidden="true"></i> <?php the_time('Y/m/d'); ?></<li>
                <li><i class="fa fa-folder fa-1x"></i> <?php the_category(); ?></li>
                <li><i class="fa fa-tags fa-1x"></i> <?php the_tags(''); ?></li>
              </ul>
              <a href="<?php the_permalink() ?>">
                <hi class="ttl-article-summary"><?php the_title() ?></hi><!-- .ttl-article -->
              </a>
              <div class="mod-article-lead-cmn box-article-summary-lead">
                <?php $ccc = get_post_meta($post->ID, 'intro', true);?>
                <?php if(empty($ccc)):?>
                  <?php echo mb_substr(get_the_excerpt(),0,150); ?>
                <?php else:?>
                  <?php echo post_custom('intro');?>
                <?php endif;?>
              </div><!-- .article-summary-lead -->
            </section><!-- .box-article -->
          <?php endforeach; wp_reset_postdata();?>
        </div>
        <!-- ページナビゲーション -->

        <section class="page-navigation">
          <div class="is-pc">
            <?php
              $arg_pagenation = array(
                'prev_text' => '&laquo; PREV',
                'next_text' => 'NEXT &raquo;',
                'show_all'  => false,
                'mid_size'  => 1
              );
              the_posts_pagination($arg_pagenation); ?>
          </div>
          <div class="is-mobile">
            <?php if($wp_query -> max_num_pages > 1) : ?>
              <div class="link-pager prev-post-link">
                <?php previous_posts_link('&laquo; PREV'); ?>
              </div>
              <div class="link-pager next-post-link">
                <?php next_posts_link('NEXT &raquo;'); ?>
              </div>
              <br style="clear:both;"/>
            <?php endif; ?>
          </div>
        </section>
      </article>
      <!-- .contents-main -->

      <div class="contents-sub">
        <div class="area-recommend">
          <?php get_popular_entries(); ?>
        </div>
        <!-- .area-recommend -->
        <div class="area-contact-form">
          <h3 class="ttl-contact-form">お問い合わせ</h3>
          <p class="box-contact-form-detail">イベントや執筆の依頼など、有償／無償問わずお気軽にお問い合わせください。</p>
          <?php echo do_shortcode('[contact-form-7 id="2511" title="Contact form 1"]') ?>
        </div>
        <div style="clear:both;"></div>
      </div>
      <!-- .contents-sub -->



    </div>
    <!-- .contents -->
<?php get_footer(); ?>
