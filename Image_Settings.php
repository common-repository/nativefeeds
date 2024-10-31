<?php
if(!defined('ABSPATH'))
{
	exit;
} 
include('Common_Admin.php');
wp_nonce_field( basename( __FILE__ ), 'nativefeeds_image_settings_nonce' );
test_handle_post();
$logo = get_post_meta(65,'native_logo',true);
if(empty($logo) || $logo[0] == '' )
{
	$logo = get_template_directory_uri() . '/img/logo.png';
}
$slider_one =get_post_meta(65,'nativefeeds_slider_one',true);
	if(empty($slider_one) || $slider_one[0] == '' )
	{
		$slider_one = get_template_directory_uri() . '/img/banner.jpg';
	}
	$slider_two = get_post_meta(65,'nativefeeds_slider_two',true);
	if(empty($slider_two) || $slider_two[0] == '' )
	{
		$slider_two = get_template_directory_uri() . '/img/banner.jpg';
	}
	$slider_three = get_post_meta(65,'nativefeeds_slider_three',true);
	if(empty($slider_three) || $slider_three[0] == '' )
	{
		$slider_three = get_template_directory_uri() . '/img/banner.jpg';
	}
	$header_one = get_post_meta(65,'nativefeeds_header_one',true);
	if(empty($header_one) || $header_one[0] == '' )
	{
		$header_one = get_template_directory_uri() . '/img/header.jpg';
	}
	$header_two = get_post_meta(65,'nativefeeds_header_two',true);
	if(empty($header_two) || $header_two[0] == '' )
	{
		$header_two = get_template_directory_uri() . '/img/header.jpg';
	}
	$header_three = get_post_meta(65,'nativefeeds_header_three',true);
	if(empty($header_three) || $header_three[0] == '' )
	{
		$header_three = get_template_directory_uri() . '/img/header.jpg';
	}
$slider_one_url =  get_post_meta(65,'nativefeeds_slider_one_url',true);
$slider_two_url =  get_post_meta(65,'nativefeeds_slider_two_url',true);
$slider_three_url =  get_post_meta(65,'nativefeeds_slider_three_url',true);
?>
<div class="container row">
	<div class="page-header">
		<h1>NativeFeeds Image Upload</h1>
	</div>
        <!-- Form to handle the upload - The enctype value here is very important -->
        <form  class="form-horizontal col-sm-8" method="post" enctype="multipart/form-data">
           <div class="form-group">
			<label for="nativefeeds_logo" class="col-sm-3 control-label">Logo:</label>
			<div class="col-sm-9">
				<input type='file' accept="image/*" class = "form-control" id='nativefeeds_logo' value="" name='nativefeeds_logo'></input>
				<?php submit_button('Upload') ?>
			</div>
			</div>			                
		</form>
		<div class="col-sm-4"><img class="img-responsive" style="padding-top:5px" src ="<?php echo $logo ?>"></div><br />
		<form  class="form-horizontal col-sm-8" method="post" enctype="multipart/form-data">
			<div class="form-group">
			<label for="nativefeeds_slider_one" class="col-sm-3 control-label">Slider 1:</label>
			<div class="col-sm-9">
				<input type='file' accept="image/*" class = "form-control" id='nativefeeds_slider_one' value="" name='nativefeeds_slider_one'></input>
				<?php submit_button('Upload') ?>
			</div>
			</div>			                
		</form>
		<div class="col-sm-4"><img class="img-responsive" style="padding-top:5px" src ="<?php echo $slider_one ?>"></div><br />
		<form  class="form-horizontal col-sm-8" method="post" enctype="multipart/form-data">
			<div class="form-group">
			<label for="nativefeeds_slider_two" class="col-sm-3 control-label">Slider 2:</label>
			<div class="col-sm-9">
				<input type='file' accept="image/*" class = "form-control" id='nativefeeds_slider_two' value="" name='nativefeeds_slider_two'></input>
				<?php submit_button('Upload') ?>
			</div>
			</div>			
		</form>	
			<div class="col-sm-4"><img class="img-responsive" style="padding-top:5px" src ="<?php echo $slider_two ?>"></div><br />
		<form  class="form-horizontal col-sm-8" method="post" enctype="multipart/form-data">			
			<div class="form-group">
			<label for="nativefeeds_slider_three" class="col-sm-3 control-label">Slider 3:</label>
			<div class="col-sm-9">
				<input type='file' accept="image/*" class = "form-control" id='nativefeeds_slider_three' value="" name='nativefeeds_slider_three'></input>
				<?php submit_button('Upload') ?>
			</div>
			</div>			
		</form>
		<div class="col-sm-4"><img class="img-responsive" style="padding-top:5px" src ="<?php echo $slider_three ?>"></div><br />
		<form  class="form-horizontal col-sm-8" method="post" enctype="multipart/form-data">
			<div class="form-group">
			<label for="nativefeeds_header_one" class="col-sm-3 control-label">Header Image 1:</label>
			<div class="col-sm-9">
				<input type='file' accept="image/*" class = "form-control" id='nativefeeds_header_one' value="" name='nativefeeds_header_one'></input>
				<?php submit_button('Upload') ?>
			</div>
			</div>			
		</form>
		<div class="col-sm-4"><img class="img-responsive" style="padding-top:5px" src ="<?php echo $header_one ?>"></div><br />
		<form  class="form-horizontal col-sm-8" method="post" enctype="multipart/form-data">
			<div class="form-group">
			<label for="nativefeeds_header_two" class="col-sm-3 control-label">Header Image 2:</label>
			<div class="col-sm-9">
				<input type='file' accept="image/*" class = "form-control" id='nativefeeds_header_two' value="" name='nativefeeds_header_two'></input>
				<?php submit_button('Upload') ?>
			</div>
			</div>			
		</form>
		<div class="col-sm-4"><img class="img-responsive" style="padding-top:5px"  src ="<?php echo $header_two ?>"></div><br />
		<form  class="form-horizontal col-sm-8" method="post" enctype="multipart/form-data">
			<div class="form-group">
			<label for="nativefeeds_header_three" class="col-sm-3 control-label">Header Image 3:</label>
			<div class="col-sm-9">
				<input type='file' accept="image/*" class = "form-control" id='nativefeeds_header_three' value="" name='nativefeeds_header_three'></input>
				<?php submit_button('Upload') ?>
			</div>
			</div>			
		</form>
		<div class="col-sm-4"><img class="img-responsive" style="padding-top:5px" src ="<?php echo $header_three ?>"></div><br />
		<form  class="form-horizontal col-sm-8" method="post">
			<div class="form-group">
			<label for="nativefeeds_slider_one_url" class="col-sm-3 control-label">Slider One Url:</label>
			<div class="col-sm-9">
				<input type='text' class = "form-control" id='nativefeeds_slider_one_url' value="<?php echo $slider_one_url ?>" name='nativefeeds_slider_one_url'></input>				
			</div>
			</div>	
			<div class="form-group">
			<label for="nativefeeds_slider_two_url" class="col-sm-3 control-label">Slider Two Url:</label>
			<div class="col-sm-9">
				<input type='text' class = "form-control" id='nativefeeds_slider_two_url' value="<?php echo $slider_two_url ?>" name='nativefeeds_slider_two_url'></input>				
			</div>
			</div>
			<div class="form-group">
			<label for="nativefeeds_slider_three_url" class="col-sm-3 control-label">Slider Three Url:</label>
			<div class="col-sm-9">
				<input type='text' class = "form-control" id='nativefeeds_slider_three_url' value="<?php echo $slider_three_url ?>" name='nativefeeds_slider_three_url'></input>				
			</div>
			</div>
			<input class="button button-primary" type="submit"></input>			
		</form>
		</div>
<?php
 
function test_handle_post(){		
	// Checks save status
    $is_valid_nonce = ( isset( $_POST[ 'nativefeeds_image_settings_nonce' ] ) && wp_verify_nonce( $_POST[ 'nativefeeds_image_settings_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
        // First check if the file appears on the _FILES array
        if( $is_valid_nonce && isset( $_FILES['nativefeeds_logo'])){
                
                // Use the wordpress function to upload
                // test_upload_pdf corresponds to the position in the $_FILES array
                // 0 means the content is not associated with any other posts
                $uploaded = media_handle_upload('nativefeeds_logo', 0);
				$directory = wp_upload_dir();
				$dirurl = $directory['url'];
				if(!empty($_FILES['nativefeeds_logo']['name']))
				{
				update_post_meta(65,'native_logo',$dirurl .'/'.sanitize_file_name($_FILES['nativefeeds_logo']['name']));
                }else
				{
					update_post_meta(65,'native_logo',sanitize_file_name($_FILES['nativefeeds_logo']['name']));
				}
				// Error checking using WP functions
                if(is_wp_error($uploaded)){
                        echo "Error uploading file: " . $uploaded->get_error_message();
                }else{
                        echo "File upload successful!";
                }
        }
		if( $is_valid_nonce && isset( $_FILES['nativefeeds_slider_one'])){
                 
                // Use the wordpress function to upload
                // test_upload_pdf corresponds to the position in the $_FILES array
                // 0 means the content is not associated with any other posts
                $uploaded = media_handle_upload('nativefeeds_slider_one', 0);
				$directory = wp_upload_dir();
				$dirurl = $directory['url'];
				if(!empty($_FILES['nativefeeds_slider_one']['name']))
				{
				update_post_meta(65,'nativefeeds_slider_one',$dirurl .'/'.sanitize_file_name($_FILES['nativefeeds_slider_one']['name']));
                }
				else{
					update_post_meta(65,'nativefeeds_slider_one',sanitize_file_name($_FILES['nativefeeds_slider_one']['name']));
				}
				// Error checking using WP functions
                if(is_wp_error($uploaded)){
                        echo "Error uploading file: " . $uploaded->get_error_message();
                }else{
                        echo "File upload successful!";
                }
        }
		if( $is_valid_nonce && isset( $_FILES['nativefeeds_slider_two'])){
                $pdf = $_FILES['nativefeeds_slider_two']; 
                // Use the wordpress function to upload
                // test_upload_pdf corresponds to the position in the $_FILES array
                // 0 means the content is not associated with any other posts
                $uploaded = media_handle_upload('nativefeeds_slider_two', 0);
				$directory = wp_upload_dir();
				$dirurl = $directory['url'];
				if(!empty($_FILES['nativefeeds_slider_two']['name']))
				{
				update_post_meta(65,'nativefeeds_slider_two',$dirurl .'/'.sanitize_file_name($_FILES['nativefeeds_slider_two']['name']));
                }
				else{
				update_post_meta(65,'nativefeeds_slider_two',sanitize_file_name($_FILES['nativefeeds_slider_two']['name']));
				}
				// Error checking using WP functions
                if(is_wp_error($uploaded)){
                        echo "Error uploading file: " . $uploaded->get_error_message();
                }else{
                        echo "File upload successful!";
                }
        }
		if( $is_valid_nonce && isset( $_FILES['nativefeeds_slider_three'])){
                $pdf = $_FILES['nativefeeds_slider_three']; 
                // Use the wordpress function to upload
                // test_upload_pdf corresponds to the position in the $_FILES array
                // 0 means the content is not associated with any other posts
                $uploaded = media_handle_upload('nativefeeds_slider_three', 0);
				$directory = wp_upload_dir();
				$dirurl = $directory['url'];
				if(!empty($_FILES['nativefeeds_slider_three']['name']))
				{
				update_post_meta(65,'nativefeeds_slider_three',$dirurl .'/'.sanitize_file_name($_FILES['nativefeeds_slider_three']['name']));
                }
				else{
				update_post_meta(65,'nativefeeds_slider_three',sanitize_file_name($_FILES['nativefeeds_slider_three']['name']));
				}
				// Error checking using WP functions
                if(is_wp_error($uploaded)){
                        echo "Error uploading file: " . $uploaded->get_error_message();
                }else{
                        echo "File upload successful!";
                }
        }
		if( $is_valid_nonce && isset( $_FILES['nativefeeds_header_one'])){
                $pdf = $_FILES['nativefeeds_header_one']; 
                // Use the wordpress function to upload
                // test_upload_pdf corresponds to the position in the $_FILES array
                // 0 means the content is not associated with any other posts
                $uploaded = media_handle_upload('nativefeeds_header_one', 0);
				$directory = wp_upload_dir();
				$dirurl = $directory['url'];
				if(!empty($_FILES['nativefeeds_header_one']['name']))
				{
				update_post_meta(65,'nativefeeds_header_one',$dirurl .'/'.sanitize_file_name($_FILES['nativefeeds_header_one']['name']));
                }
				else{
				update_post_meta(65,'nativefeeds_header_one',sanitize_file_name($_FILES['nativefeeds_header_one']['name']));
				}
				// Error checking using WP functions
                if(is_wp_error($uploaded)){
                        echo "Error uploading file: " . $uploaded->get_error_message();
                }else{
                        echo "File upload successful!";
                }
        }
		if( $is_valid_nonce && isset( $_FILES['nativefeeds_header_two'])){
                $pdf = $_FILES['nativefeeds_header_two']; 
                // Use the wordpress function to upload
                // test_upload_pdf corresponds to the position in the $_FILES array
                // 0 means the content is not associated with any other posts
                $uploaded = media_handle_upload('nativefeeds_header_two', 0);
				$directory = wp_upload_dir();
				$dirurl = $directory['url'];
				if(!empty($_FILES['nativefeeds_header_two']['name']))
				{
				update_post_meta(65,'nativefeeds_header_two',$dirurl .'/'.sanitize_file_name($_FILES['nativefeeds_header_two']['name']));
                }
				else{
					update_post_meta(65,'nativefeeds_header_two',sanitize_file_name($_FILES['nativefeeds_header_two']['name']));
				}
				// Error checking using WP functions
                if(is_wp_error($uploaded)){
                        echo "Error uploading file: " . $uploaded->get_error_message();
                }else{
                        echo "File upload successful!";
                }
        }
		if( $is_valid_nonce && isset( $_FILES['nativefeeds_header_three'])){
                $pdf = $_FILES['nativefeeds_header_three']; 
                // Use the wordpress function to upload
                // test_upload_pdf corresponds to the position in the $_FILES array
                // 0 means the content is not associated with any other posts
                $uploaded = media_handle_upload('nativefeeds_header_three', 0);
				$directory = wp_upload_dir();
				$dirurl = $directory['url'];
				if(!empty($_FILES['nativefeeds_header_three']['name']))
				{
				update_post_meta(65,'nativefeeds_header_three',$dirurl .'/'.sanitize_file_name($_FILES['nativefeeds_header_three']['name']));
                }
				else{
					update_post_meta(65,'nativefeeds_header_three',sanitize_file_name($_FILES['nativefeeds_header_three']['name']));
				}
				// Error checking using WP functions
                if(is_wp_error($uploaded)){
                        echo "Error uploading file: " . $uploaded->get_error_message();
                }else{
                        echo "File upload successful!";
                }
        }
		if( $is_valid_nonce && isset( $_POST[ 'nativefeeds_slider_one_url' ]) && isset($_POST[ 'nativefeeds_slider_two_url' ]) && isset($_POST[ 'nativefeeds_slider_three_url' ]) ){               
				$slider_one_url = sanitize_text_field($_POST[ 'nativefeeds_slider_one_url' ]);
				$slider_two_url = sanitize_text_field($_POST[ 'nativefeeds_slider_two_url' ]);
				$slider_three_url = sanitize_text_field($_POST[ 'nativefeeds_slider_three_url' ]);
				update_post_meta(65,'nativefeeds_slider_one_url',$slider_one_url);
				update_post_meta(65,'nativefeeds_slider_two_url',$slider_two_url);
				update_post_meta(65,'nativefeeds_slider_three_url',$slider_three_url);
        }
}	
	?>