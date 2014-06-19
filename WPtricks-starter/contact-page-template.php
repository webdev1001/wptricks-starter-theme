<?php
/*
Template Name: Contact Page Template
*/
?>
<?php get_header(); ?>

<?php
 
  //response generation function
 
  $response = "";
 
  //function to generate response
  function generate_response($type, $message){
 
    global $response;
 
    if($type == "success") $response = "<div class='success'>{$message}</div>";
    else $response = "<div class='error'>{$message}</div>";
 
  }
 
  //response messages
  $not_human       = "Human verification incorrect.";
  $missing_content = "Please supply all information.";
  $email_invalid   = "Email Address Invalid.";
  $message_unsent  = "Message was not sent. Try Again.";
  $message_sent    = "Thanks! Your message has been sent.";
 
  //user posted variables
  $name = $_POST['message_name'];
  $email = $_POST['message_email'];
  $message = $_POST['message_text'];
  $human = $_POST['message_human'];
 
  //php mailer variables
  $to = get_option('admin_email');// include the admin email
  $subject = "Someone sent a message from ".get_bloginfo('name');
  $headers = 'From: '. $email . "rn" .
    'Reply-To: ' . $email . "rn";
 
  if(!$human == 0){
    if($human != 2) generate_response("error", $not_human); //not human!
    else {
 
      //validate email
      if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        generate_response("error", $email_invalid);
      else //email is valid
      {
        //validate presence of name and message
        if(empty($name) || empty($message)){
          generate_response("error", $missing_content);
        }
        else //ready to go!
        {
          $sent = mail($to, $subject, $message, $headers);
          if($sent) generate_response("success", $message_sent); //message sent!
          else generate_response("error", $message_unsent); //message wasn't sent
        }
      }
    }
  }
  else if ($_POST['submitted']) generate_response("error", $missing_content);
 
?>

        <?php
/*
 * -  Start the actual page
 */
get_header(); ?>

 		<section>
            <div class="wrapper">
            <div class="left-content">
		  <?php while ( have_posts() ) : the_post(); ?>
 
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 
            <header class="entry-header">
              <h1 class="entry-title"> <?php the_title(); ?> </h1>
            </header>
 
            <div class="entry-content">
              <?php the_content(); ?>
 
<!-- Now for the actual form -->
 
              <div class="contact-form">
                <?php echo $response; ?>
                <form action="#contact-form" method="post">
                  <div class="left">
                  <p><label for="name">Name: <span>*</span> <br><input type="text" name="message_name" value="<?php echo $_POST['message_name']; ?>"></label></p>
                  <p><label for="message_email">Email: <span>*</span> <br><input type="text" name="message_email" value="<?php echo $_POST['message_email']; ?>"></label></p>
                  </div>
                  <div class="right">
                  <p><label for="message_text">Message: <span>*</span> <br><textarea type="text" name="message_text"><?php echo $_POST['message_text']; ?></textarea></label></p>
                  </div>
                  <p><input type="checkbox" name="sendCopy" id="sendCopy" value="true"<?php if(isset($_POST['sendCopy']) && $_POST['sendCopy'] == true) echo ' checked="checked"'; ?> /><label for="sendCopy">Send a copy of this email to yourself</label></p>
                  <p><label for="message_human">Human Verification: <span>*</span> <br><input type="text" style="width: 60px;" name="message_human"> + 3 = 5</label></p>
                  <input type="hidden" name="submitted" value="1">
                  <p><input type="submit"></p>
                </form>
              </div>
  
<!-- End of the form -->
 
            </div><!-- .entry-content -->
 
          </article><!-- #post -->
 
      <?php endwhile; // end of the loop. ?>
                </div> <!-- /.left-content -->
                <?php get_sidebar(); ?>
                
            </div> <!-- /.wrapper -->
		</section>
        
<?php get_footer(); ?>