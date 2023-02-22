<div class="wrap">
			<h1><?php echo get_admin_page_title() ?></h1>
			<form method="post" action="options.php" enctype="multipart/form-data">
				<?php
					settings_fields( 'admin_menu_settings' );
					do_settings_sections( 'admin_form_form_fields' );
				?>
				<?php
				submit_button();
				?>
			</form>
		</div>