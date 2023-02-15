<?php
echo $_GET['state'];
echo $url = <?php echo get_site_url().'/school-list/'.$_GET['state']."/".$_GET['pincode']?>
wp_redirect($url);
?>