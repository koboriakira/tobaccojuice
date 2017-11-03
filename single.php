<?php get_header(); ?>

    <div class="hero-cmn">

    </div>
    <!-- .hero-cmn -->

    <div class="nav-breadcrumb">

    </div>
    <!-- .nav-breadcrumb -->

    <div class="contents">
      <article class="contents-main">
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>

          <!-- タイトル、メタ情報 -->
          <div class="area-article-ttl">
            <h1 class="ttl-article"><?php the_title() ?></h1>
            <div class="area-article-meta-info">
              <ul class="box-article-meta-info">
                <li><i class="fa fa-clock-o fa-1x" aria-hidden="true"></i> <?php the_time('Y/m/d'); ?></<li>
                <li><i class="fa fa-folder fa-1x"></i> <?php the_category(); ?></li>
                <li><i class="fa fa-tags fa-1x"></i> <?php the_tags(''); ?></li>
              </ul>
            </div><!-- .area-article-meta-info -->
          </div><!-- .area-article-ttl -->

          <!-- リード情報 -->
          <div class="mod-article-lead-cmn box-article-lead">
            <?php echo esc_html( get_post_meta( $post->ID, 'intro', true ) ); ?>
          </div>

          <!-- シェアボタン -->
          <?php get_share_sns_btn(); ?>

          <!-- メイン -->
          <div class="article-main"><?php the_content(); ?></div>

          <!-- メタ情報 -->
          <div class="area-article-meta-info">
            <ul class="box-article-meta-info">
              <li><i class="fa fa-clock-o fa-1x" aria-hidden="true"></i> <?php the_time('Y/m/d'); ?></<li>
              <li><i class="fa fa-folder fa-1x"></i> <?php the_category(); ?></li>
              <li><i class="fa fa-tags fa-1x"></i> <?php the_tags(''); ?></li>
            </ul>
          </div><!-- .area-article-meta-info -->
          <?php endwhile; ?>
        <?php endif; ?>
      </article>
      <!-- .contents-main -->

      <div class="contents-sub">
        <div class="area-recommend">
          <?php get_related_entries(); ?>
          <?php get_popular_entries(); ?>
        </div>
        <?php get_smart_profile(); ?>
        <!-- .area-recommend -->
      </div>
      <!-- .contents-sub -->

    </div>
    <!-- .contents -->

  </div>
  <!-- .wrapper -->
<?php get_footer(); ?>
