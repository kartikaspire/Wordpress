<?php

get_header(); 

?>

<h1>Display State</h1>
<br/>
<!-- Form section -->
<div id="contact-form">  
        <div> 
            <label for="fullname"> 
                Email: <?php echo $_POST['email']?>
            </label> 
            
        </div> 
        <div> 
            <label for="email"> 
                States: <?php echo $_POST['state']?>
            </label>
			
            
        </div> 
      
</div> 

<?php get_footer(); ?>
