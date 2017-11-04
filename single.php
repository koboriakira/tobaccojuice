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
        <!-- 簡易プロフィール -->
        <?php get_smart_profile(); ?>

        <!-- おすすめ記事 -->
        <div class="area-recommend">
          <?php get_related_entries(); ?>
          <?php get_popular_entries(); ?>
        </div><!-- .area-recommend -->

        <!-- 問い合わせフォーム -->
        <div class="area-contact-form">
          <h3 class="ttl-contact-form">お問い合わせ</h3>
          <p class="box-contact-form-detail">ブログのご感想などお気軽にご連絡ください。</p>
          <?php echo do_shortcode('[contact-form-7 id="3099" title="Contact form 1"]') ?>
        </div><!-- .area-contact-form -->
      </div>
      <!-- .contents-sub -->

    </div>
    <!-- .contents -->

  </div>
  <!-- .wrapper -->
<?php get_footer(); ?>
