<?php get_header(); ?>
<div class="container profile">
<h1 class="profile-name text-center"><?php the_author_meta('nickname'); ?> Profile</h1>
<span class="hr"></span>
<div class="profile-container">
    <div class="row">
        <div class="col-md-3">
            <?php 
                $avatar_arg = array(
                    'class' => 'img-responsive img-thumbnail center-block'
                );
               echo get_avatar(get_the_author_meta('ID'), 196, '', 'User Avatar', $avatar_arg);  ?>
        </div>
        <div class="col-md-9">
            <ul class="list-unstyled">
                <li>First Name: <?php the_author_meta('first_name'); ?></li>
                <li>Last Name: <?php the_author_meta('last_name'); ?></li>
                <li>Nickname: <?php the_author_meta('nickname'); ?></li>
            </ul>
            <hr>
            <?php 
            if (get_the_author_meta('description')){ ?>
                   <p><?php the_author_meta('description') ?>
            <?php }else{
                echo 'There is No Description';
            }
            ?>
            </div>
    </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="stats">Posts <span class="count"><?php echo count_user_posts(get_the_author_meta('ID')); ?></span> </div>
        </div>
        <div class="col-md-3">
        <div class="stats">Comments <span class="count">
            <?php 
            $commentcount = array(
                'user-id' => get_the_author_meta('ID'),
                'count' => true
            );
       echo get_comments($commentcount); ?></span> </div>
            </div>
            <div class="col-md-3">
            <div class="stats">Posts <span class="count">50</span> </div>
        </div>
        <div class="col-md-3">
        <div class="stats">Posts <span class="count">50</span> </div>
            </div>
    </div>
</div>
        


<?php get_footer(); ?>