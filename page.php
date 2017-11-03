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
            <!-- タイトル -->
            <div class="area-article-ttl">
              <h1 class="ttl-article">
                <?php the_title() ?>
              </h1>
            </div><!-- .area-article-ttl -->
            <!-- メイン -->
            <div class="article-main">
              <?php the_content(); ?>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
      </article>
      <!-- .contents-main -->

      <div class="contents-sub">
        <div class="area-recommend">
          <?php get_popular_entries(); ?>
        </div>
        <!-- .area-recommend -->
      </div>
      <!-- .contents-sub -->

    </div>
    <!-- .contents -->

  </div>
  <!-- .wrapper -->
<?php get_footer(); ?>
