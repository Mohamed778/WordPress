<?php get_header(); ?>
    <div class="posts">
        <div class="container">
             <h2><?php the_title(); ?></h2>
             <span class="hr"></span>
             
                <?php if(have_posts()){
                    
                        while(have_posts()){
                        the_post(); ?>
                        
                        <div class="main-post">
                        <?php edit_post_link('Edit','<i class="fas fa-pencil-alt"></i>'); ?>
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
                            <div class="row">
                                <div class="col-sm-6">
                            <?php the_post_thumbnail('', ['class' => "img-responsive img-thumbnail" ]); ?>
                        </div>
                        <div class="col-sm-6">
                            <p class="post-content"><?php the_content(); ?></p>
                        </div>
                        </div>
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
                     <?php 
                            }
                        }
                        echo '<div class="clearfix"></div>';
                        echo '<div class="post-pagination">';
                        if(get_previous_post_link()){
                            previous_post_link();
                        } else{
                            echo '<span class="prev-span"><i class="fas fa-chevron-left fa-lg"></i> Prev</span>';
                        }
                        
                        if(get_next_post_link()){
                            next_post_link();
                        } else{
                            echo '<span class="next-span">Next <i class="fas fa-chevron-right fa-lg"></i> </span>';
                        }
                        echo '</div>';
                        comments_template();
                        
                 ?>   
               
             </div>
         </div>       
<?php get_footer(); 