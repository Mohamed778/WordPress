<?php get_header(); ?>
    <div class="posts">
        <div class="container">
             <h2>Our Posts</h2>
             <span class="hr"></span>
             <div class="row">
             
                <?php if(have_posts()){
                    
                        while(have_posts()){
                        the_post(); ?>
                        <div class="col-sm-9">
                        <div class="main-post">
                            <h3 class="post-title">
                                <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?></a>
                            </h3>
                            <span class="post-author">
                            <?php the_author_posts_link(); ?> 
                            <i class="fas fa-user fa-fw"></i>
                            </span>
                            <span class="post-date">
                            <?php the_time('F ,j,Y');?> 
                            <i class="fas fa-calendar-alt fa-fw"></i>
                            </span>
                            <span class="post-comments">
                            <?php comments_popup_link('no comments','1 comment','% comments','comment-url','disabled'); ?> 
                            <i class="fas fa-comment fa-fw"></i>
                            </span>
                            <?php the_post_thumbnail('', ['class' => "img-responsive img-thumbnail" ]); ?>
                            <p class="post-content"><?php the_excerpt(); ?></p>
                            <hr>
                            <p class="categories"><i class="fas fa-tags"></i>: <?php the_category(', ') ?>
                            </p>
                            <p class="categories">
                                <?php 
                                    if(has_tag()){
                                        the_tags();
                                        }else{
                                           echo 'tags: there is no tag';
                                             }
                                ?>
                             </p>

                                             
                         </div>
                         
                        </div>

                        <?php 
                        }
                    }?>
                        <div class="col-sm-3">
                             <?php if (is_active_sidebar('main-sidebar')){
                                        dynamic_sidebar('main-sidebar');
                             }?>
                         
                </div> 
                            </div>
                     <?php
                        echo '<div class="clearfix"></div>';
                        echo '<div class="post-pagination">';
                        if(get_previous_posts_link()){
                            previous_posts_link('<i class="fas fa-chevron-left fa-lg"></i> Prev');
                        } else{
                            echo '<span class="prev-span"><i class="fas fa-chevron-left fa-lg"></i> Prev</span>';
                        }
                        
                        if(get_next_posts_link()){
                            next_posts_link('Next <i class="fas fa-chevron-right fa-lg"></i>');
                        } else{
                            echo '<span class="next-span">Next <i class="fas fa-chevron-right fa-lg"></i> </span>';
                        }
                        echo '</div>';
                        echo pagination_numbering();
                        
                 ?>   
                </div>
             </div>
<?php get_footer(); 