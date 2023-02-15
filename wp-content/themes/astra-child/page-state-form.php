<?php

//get_header(); ?>
<div class="title">
<h1>Custom Form</h1>
</div>
<br/>
<!-- Form section -->
<div id="contact-form"> 
    <form action="<?php echo home_url().'/display-state'; ?>" method="post" name="custom_contact_form"> 
        <div> 
            <label for="email"> 
                Email: 
            </label> 
            <input type="text" name="email" id="email" required /> 
        </div> 
        <div> 
            <label for="states"> 
                States: 
            </label>
			
            <?php echo do_shortcode ("[getstate]");
			?> 
        </div> 
 
        <input type="submit" value="Send" name="send_message" />  
 
    </form> 
</div> 

<?php //get_footer(); ?>
