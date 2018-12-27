<?php

if(comments_open()){?>
    <h3 class="comment-number"> <?php comments_number(); ?> </h3>
    <?php
    echo '<ul class="list-unstyled comments">';
    $comment_arguments=array(
             'max_depth' => 2,
             'type' => 'comment',
             'avatar_size' => 64
    );
    wp_list_comments($comment_arguments);
    echo '</ul>';
    comment_form();
}else{
    echo 'Comments Disabled';
}