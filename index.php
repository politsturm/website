<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package politsturm
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="mp-top padhed">
				<div class="top-white-background"> </div>
				<div class="mp-top-container">
					<div class="top-hitems">
					<?php $query = new WP_Query('meta_key=choce&meta_value=s1&showposts=2'); 
					if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
					
					<div class="top-hitem" itemscope itemtype=http://schema.org/Article>
						<a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'large' );?>" width="100%"  hspace="0" vspace="0" style="display:block;">
						
						<!-- Начало микроразметки -->
							<div class="microrazmetka" style="display:none;">
								<?php $iurl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
								<span itemprop="headline name"> <?php the_title(); ?></span>
								<span itemprop="datePublished"> <?php echo get_the_date('Y-M-D'); ?></span>
								<span itemprop="description"> <?php echo get_the_excerpt(); ?> </span>
								<span itemprop="image"><?php echo $iurl; ?></span>
								<span style="display:none;" itemprop="keywords"><?php echo get_the_tag_list( '', ', ' ); ?> ,<?php echo get_the_category_list(', '); ?></span>
								
								<span style="display:none;" itemprop="publisher" itemscope="itemscope" itemtype="http://schema.org/Organization">
									<span style="display:none;" itemprop="name">politsturm.com - Социалистический информационный ресурс</span>
									<img src="https://politsturm.com/wp-content/uploads/2017/02/Без-имени-1.png" style="display:none;" itemprop="logo">
									<span style="display:none;" itemprop="email">politsturm@gmail.com</span>
									<a href="https://politsturm.com/" itemprop="url" style="display:none;">politsturm.com - Социалистический информационный ресурс</a>
									<span style="display:none;" itemprop="address">USSR</span>
									<span style="display:none;" itemprop="telephone">+79192335725</span>
								</span>
							</div>
						<!-- Конец микроразметки -->
						
					</div>
					
					<?php endwhile; 
					wp_reset_postdata();
					else : ?>
					<p><?php _e( 'Подходящих материалов не найдено' ); ?></p>
					<?php endif; ?>
					
					</div>
					
					<?php $query = new WP_Query('meta_key=choce&meta_value=s2&showposts=1');
					if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
					
					<div class="top-vitem" itemscope itemtype=http://schema.org/Article>
						<a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'large' );?>" width="100%"  hspace="0" vspace="0" style="display:block;">
					<div class="figcaption">
						<h2><?php the_title(); ?></h2>
						<p><?php echo get_the_excerpt(); ?></p>
					</div></a>
						
						<!-- Начало микроразметки -->
							<div class="microrazmetka" style="display:none;">
								<?php $iurl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
								<span itemprop="headline name"> <?php the_title(); ?></span>
								<span itemprop="datePublished"> <?php echo get_the_date('Y-M-D'); ?></span>
								<span itemprop="description"> <?php echo get_the_excerpt(); ?> </span>
								<span itemprop="image"><?php echo $iurl; ?></span>
								<span style="display:none;" itemprop="keywords"><?php echo get_the_tag_list( '', ', ' ); ?> ,<?php echo get_the_category_list(', '); ?></span>
								
								<span style="display:none;" itemprop="publisher" itemscope="itemscope" itemtype="http://schema.org/Organization">
									<span style="display:none;" itemprop="name">politsturm.com - Социалистический информационный ресурс</span>
									<img src="https://politsturm.com/wp-content/uploads/2017/02/Без-имени-1.png" style="display:none;" itemprop="logo">
									<span style="display:none;" itemprop="email">politsturm@gmail.com</span>
									<a href="https://politsturm.com/" itemprop="url" style="display:none;">politsturm.com - Социалистический информационный ресурс</a>
									<span style="display:none;" itemprop="address">USSR</span>
									<span style="display:none;" itemprop="telephone">+79192335725</span>
								</span>
							</div>
						<!-- Конец микроразметки -->
						
					</div>
					
					<?php endwhile; 
					wp_reset_postdata();
					else : ?>
					<p><?php _e( 'Подходящих материалов не найдено' ); ?></p>
					<?php endif; ?>


				</div>
				<div class="mnews">
					<div class="news-title">Новости</div>

					<?php
						global $post;
						$args = array( 'numberposts' => 5, 'category' => 'news' );
						$posts = get_posts( $args );
						foreach( $posts as $post ) {
							setup_postdata($post);
							get_template_part( 'template-parts/news-post' );
						}
						wp_reset_postdata();
					?>

					<div class="news-more">
						<a href="/category/news/">
							Больше новостей <span class="news-more-arrow">&gt;</span>
						</a>
					</div>
				</div>
			</div>
			
			<div class="main-news">
				<?php
					while (have_posts()) {
						get_template_part( 'template-parts/article' );
					}
				?>
			</div>
			<div class="news-loadmore">Загрузить ещё</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
