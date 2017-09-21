<?php
/*
Template Name: contact template
 */

get_header(); ?>
<?php
// if(isset($_POST['submitted'])) {
//     $name = trim($_POST['contact_name']);
//     $email = trim($_POST['contact_email']);
 
//     $subject = '[PHP Snippets] From '.$name;
//     $body = "Name: $name \n\nEmail: $email \n\n";
//     $headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

//     wp_mail('nu2sik@gmail.com', $subject, $body, $headers);
//     //$emailSent = true;

 
// } 
?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="jumbotron">
				<div class="container">
					<?php 
						while( have_posts() ) : the_post();
							the_content();
						endwhile;
					?>
				</div>
			</div>

			 <!-- <form action="<?php the_permalink(); ?>" id="contactForm" method="post">

                <div class="form-group">
                     <input type="text" placeholder="Your name" name="contact_name" id="contact_name" value="<?php if(isset($_POST['contact_name'])) echo $_POST['contact_name'];?>" class="form-control">
                </div>
                <div class="form-group">
                     <input type="text" placeholder="Your email" name="contact_email" id="contact_email" value="<?php if(isset($_POST['contact_email']))  echo $_POST['contact_email'];?>" class="form-control" />
                </div>

                <button type="submit" class="btn btn-primary btn-block">Send</button>
                <input type="hidden" name="submitted" id="submitted" value="true" />
         </form> -->

			<!-- <form>
				<div class="form-group">
					<label>Your name:</label>
					<input type="text" name="user" class="form-control">
				</div>
				<div class="form-group">
					<label>Your email:</label>
					<input type="email" name="email" class="form-control">
				</div>
				<button type="submit" class="btn btn-primary btn-block">Send</button>
			</form> -->

<?php
	var_dump($_POST);  //посмотреть что отправляет форма

	$to = 'nu2sik@gmail.com';
	$subject = 'New message';
	$message = 'Name: ' . $_POST['my_name'] . "\n";
	$message = 'Name: ' . $_POST['my_name'] . "\n";
	$message .= 'Email: ' . $_POST['my_email'] . "\n";
	$message .= 'Text: ' . $_POST['text'] . "\n";

	wp_mail($to, $subject, $message);

?>

<form method="post">
	<div class="form-group">
		<input type="text" name="my_name">
	</div>
	<div class="form-group">
		<input type="email" name="my_email">
	</div>
	<div class="form-group">
		<textarea name="text"></textarea>
	</div>

	<input type="submit" value="Send" class="btn btn-primary btn-block">
</form>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();