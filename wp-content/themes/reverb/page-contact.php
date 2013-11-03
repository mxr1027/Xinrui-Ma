<?php
/*
Template Name: Contact Page
*/
?>
<?php 
//If the form is submitted
if(isset($_POST['submitted'])) {

	//Check to see if the honeypot captcha field was filled in
	if(trim($_POST['checking']) !== '') {
		$captchaError = true;
	} else {
	
		//Check to make sure that the name field is not empty
		if(trim($_POST['firstname']) === '') {
			$nameError =  __( 'You forgot to enter your name', 'reverb' );;
			$hasError = true;
		} else {
			$name = trim($_POST['firstname']);
		}
		
		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['email']) === '')  {
			$emailError =  __( 'You forgot to enter your email address', 'reverb' );
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError =  __( 'You entered an invalid email address', 'reverb' );
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}
		
		//Get phone field
		
			$phone = trim($_POST['phone']);
		
			
		//Check to make sure comments were entered	
		if(trim($_POST['comments']) === '') {
			$commentError =  __( 'You forgot to enter your comments', 'reverb' );
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}
		//If there is no error, send the email
		if(!isset($hasError)) {

			$emailTo = ''. get_bloginfo('admin_email') .'';
			$subject = 'Support Request from '.$name;
			$sendCopy = trim($_POST['sendCopy']);
			$body = "Name: $name \n\nEmail: $email \n\nPhone: $phone \n\nComments: $comments";
			$headers = 'From: '.$name.'<'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
			mail($emailTo, $subject, $body, $headers);

			

			$emailSent = true;

		}
	}
} ?>
<?php get_header();?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="contact">
<div>
 <div class="banner-inner"><div class="container box">
  <h3>
    <?php the_title(); ?></h3>
  <h2> <small><?php echo get_post_meta($post->ID, 'ad_header_subtitle', true) ?></small></h2>
</div></div><div class="container box">
<?php  $checked = get_option('reverb_gmap_check');?>
<?php if ($checked == "true") echo ' <div id="googlemap"></div>'; else {echo'<div class="arrow-insert"> <div class="arrow-down"></div></div>';};?>

<div class="row">
  <div class="span8">
    <?php the_content(); ?>
    <form id="contactForm" method="post" class="form-horizontal"  action="<?php the_permalink(); ?>">
      <fieldset>
      <div class="row"><div class="span4">
        <div class="control-group">
          <div class="controls">
            <input type="text" name="firstname" id="firstname" placeholder="First Name" class="input-xlarge">
            <?php     if (!isset($nameError))
{
    $nameError = NULL;
} ?>
            <?php if($nameError != '') { ?>
            <span class="error">
            <?php  echo $nameError;?>
            </span>
            <?php } ?>
          </div>
        </div>
        <div class="control-group"> 
          
          <!-- Text input-->
          
          <div class="controls">
            <input type="text" name="email" id="email" placeholder="Email" class="input-xlarge">
            <?php     if (!isset($emailError))
{
    $emailError = NULL;
} ?>
            <?php if($emailError != '') { ?>
            <span class="error"> <?php echo $emailError;?> </span>
            <?php } ?>
          </div>
        </div>
        <div class="control-group"> 
          
          <!-- Text input-->
          
          <div class="controls">
            <input type="text" name="phone" id="phone" placeholder="Phone" class="input-xlarge">
         
          </div>
        </div>
        </div>
        <div class="span4">
        <div class="control-group"> 
          
          <!-- Text input-->
          
          <div class="controls">
            <textarea rows="7" name="comments" id="comments" placeholder="Comments" class="input-xlarge"></textarea>
            <?php     if (!isset($commentError))
{
    $commentError = NULL;
} ?>
            <?php if($commentError != '') { ?>
            <span class="error"> <?php echo $commentError;?> </span>
            <?php } ?>
          </div>
        </div>
        <div class="control-group"> 
          
          <!-- Button -->
          <div class="controls">
            <input type="hidden"  name="submitted" id="submit" value="Send Message" class="required requiredField" />
            <input type="submit"  class="btn" name="submit" id="submitted" value="Send Message" />
          </div>
        </div>
        <br/>
        <div class="screenReader">
          <label for="checking" class="screenReader">If you want to submit this form, do not enter anything in this field</label>
          <input type="text" name="checking" id="checking" class="screenReader" value="<?php if(isset($_POST['checking']))  echo $_POST['checking'];?>" />
        </div>
        </div>
      </fieldset>
    </form>
  </div>
  <?php endwhile; ?>
  <?php endif; ?>
  
  
  <?php get_sidebar();?>
</div>

<script type="text/javascript">

function initGoogleMaps() {
	/* Google Maps Init */
	var myLatlng = new google.maps.LatLng(<?php echo get_option('reverb_gmap_lat', ''); ?>, <?php echo get_option('reverb_gmap_long', ''); ?>);
	var myOptions = {
		zoom: <?php echo get_option('reverb_gmap_zoom', ''); ?>	,
		center: myLatlng,
		popup: true,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	var map = new google.maps.Map(document.getElementById("googlemap"), myOptions);
	
	var marker = new google.maps.Marker({
		position: myLatlng, 
		map: map,
		title: "Our Location"
	});
	google.maps.event.addListener(marker, 'click', function() {
		map.setZoom(<?php echo get_option('reverb_gmap_zoom', ''); ?>);
	});
}

</script> 
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&amp;callback=initGoogleMaps"></script>
<?php get_footer();?>
