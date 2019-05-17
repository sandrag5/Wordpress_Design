<?php // Do not delete these lines

	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))

		die ('No cargue esta página directamente. ¡Gracias!');



        if (!empty($post->post_password)) { // if there's a password

            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie

				?>

				

				<p><?php _e("Este post está protegido con contraseña. Pon la contraseña para entrar."); ?><p>

				

				<?php

				return;

            }

        }



		/* This variable is for alternating comment background, thanks Kubrick */

		$oddcomment = 'alt';

?>



<!-- You can start editing here. -->



<?php if ($comments) : ?>

	

	<?php foreach ($comments as $comment) : ?>






<div id="title">
<div class="title"><a href="<?php comment_author_url(); ?>"><span class="commenter-name"><?php comment_author(); ?></span></a></div>
<div class="posted"><?php comment_date('jS F, Y') ?></div></div>
</div>
   

<div <?php post_class() ?> id="post-<?php the_ID(); ?>">


<div class="content">
<p>     
<left><?php comment_text() ?></left>
</p>
</div>

<div id="contentbottom"></div><br/>

		


		</li>





		<?php 

			if ('alt' == $oddcomment) $oddcomment = '';

			else $oddcomment = 'alt';

		?>



	<?php endforeach; /* end for each comment */ ?>



	</ol>

	











<br /> <br />



<?php else : // this is displayed if there are no comments so far ?>



	<?php if ('open' == $post-> comment_status) : ?> 

		<?php /* No hay comentarios todavía. */ ?>

		

	<?php else : // comments are closed ?>

		<?php /* Comentarios cerrados. */ ?>

		<p><?php _e('Comentarios cerrados.'); ?></p>

		

	<?php endif; ?>

	

<?php endif; ?>



<?php if ('open' == $post-> comment_status) : ?>





	

	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>

	

		<p><?php _e('You must be'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>"><?php _e('logged in'); ?></a> <?php _e('to post a comment.'); ?></p>

	

	<?php else : ?>



		

		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

	

<?php if ( $user_ID ) : ?>



			<p><?php _e('Logged in as'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account') ?>"><?php _e('Logout'); ?> &raquo;</a></p>



		<?php else : ?>







<div id="title">
<div class="title">Comment</div>
</div>

<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

      <div class="content">

<p>    
<input type="text" class="input" name="author" id="author" value="<?php echo $comment_author; ?>" size="30" tabindex="1" />
<label><?php _e('Name'); ?> <?php if ($req) _e('(required)'); ?></label>
</p>
			

<p>

<input type="text" class="input" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="30" tabindex="2" />

<label><?php _e('E-mail'); ?> <?php if ($req) _e('(required)'); ?></label>

</p>

			

<p>

<input type="text" class="input" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="30" tabindex="3" />

<label>Website</label>

</p>





<?php endif; ?>









<textarea name="comment" class="textarea"  id="comment" cols="45" rows="5" tabindex="4"></textarea>

</p>

	

<p>

<input class="button" name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment'); ?>" />

<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />

</p>

	

<?php do_action('comment_form', $post->ID); ?>

</form>



</p>

</div>



<div id="contentbottom"></div><br/>



</div>







	<?php endif; // If registration required and not logged in ?>



<?php endif; // fin ?>

