<div id="comments">
	<?php if ($comments) : /* if comments exist */?>  
		<h1 id="comments_title">Comments</h1>
			<ol>
				<?php foreach ($comments as $comment) : /* comments loop start */?> 
				
				<li <?php echo $oddcomment; ?> id="comment-<?php comment_ID() ?>">
        			
        		<div class="comment_data">
        			
        			<div class="clearfix">

	        			<div class="comment_avatar floatleft"> <!-- Commentors Avatar -->
	        				<?php echo get_avatar( $comment, 50, '' ); /* get the avatar of the commentor */?>
	        			</div>
        			
	        			<div class="comment_date">
	        				<small class="date"><?php comment_date('F jS, Y') ?></small>
	        			</div>

	        			<div class="comment_author"> 
	            			<p>
	            				<strong><?php comment_author_link() ?></strong> wrote:
	            			</p>
	        			</div>
        			
        			</div>
        			
        			<div class="comment_content">
						<?php comment_text() /* comments content*/?> 
							
							<?php if ($comment->comment_approved == '0') : /* if comment is under moderation show this */ ?> 
								<em>Your comment is awaiting moderation.</em>
							<?php endif; ?>
        				<small class="float_right margin_top"><?php edit_comment_link('Edit Comment','',''); /* the edit link for the admin*/?></small>	
        			</div>	
        		
        		</div>
				
				</li>
	
				<?php
					/* Changes every other comment to a different class */
					$oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : ''; /* different style for the class named as "alt" */ ?>
				<?php endforeach; /* end for each comment */ ?> <!-- comments loop end*/ -->
			</ol>
 
 	<?php else : // this is displayed if there are no comments so far ?>
	
		<?php if ('open' == $post->comment_status) : ?>
			<!-- If comments are open, but there are no comments. -->
			<?php comment_form(); ?>
	 	<?php else : // comments are closed ?>
			<!-- If comments are closed. -->
			<p class="nocomments"></p>
		<?php endif; ?>
	
	<?php endif; ?>
	
</div>