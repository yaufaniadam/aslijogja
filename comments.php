 <!-- Comments -->
 <div class="comments" id="comments">
     <div class="comment_number">
         <?php

            if (have_comments()) {

                "Comments <span>" . (comments_number()) . "</span>";
            } else {
                echo "Leave Comments";
            }


            ?>
     </div>
     <div class="comment-list">
         <!-- Comment -->
         <div class="comment" id="comment-1">
             <?php
                wp_list_comments(
                    array(
                        'avatar_size' => 120,
                        'style' => 'div',
                    )
                );

                ?>
         </div>
         <!-- end: Comment -->

     </div>
 </div>
 <!-- end: Comments -->
 <div class="respond-form" id="respond">

     <?php

        if (comments_open()) {
            comment_form(
                array(
                    // Change the title of send button 
                    'label_submit' => __('Send', 'textdomain'),
                    // Change the title of the reply section
                    'title_reply' => __('Write a Reply or Comment', 'textdomain'),
                    // Remove "Text or HTML to be displayed after the set of comment fields".
                    'comment_notes_after' => '',
                    // Redefine your own textarea (the comment body).
                    'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x('Comment', 'noun') . '</label><br /><textarea class="form-control required" name="comment" rows="9" placeholder="Enter comment" id="comment" aria-required="true"></textarea></p>',
                )
            );
        }

        ?>
 </div>