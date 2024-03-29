<?php
	// I M A G E   R E S I Z I N G
	//---------------------------------------------------------
	function atp_resize($atppostid,$src,$width,$height,$class,$alt) {
		if($class!="") {
			$class = ' class="'.$class.'"';
		}
		if($atppostid!="") {
			$title = ' title="'.get_the_title($atppostid).'"';
		} else {
		    $title = '';
		}
		
		if($src=='') {
				$imagesrc = wp_get_attachment_image_src( get_post_thumbnail_id($atppostid), 'full', false, '' );
				$src=$imagesrc[0];
			}
		/* T I M T H U M B E N A B L E */
		if(get_option('atp_timthumb')!='on') {
			global $atppostid, $blog_id;
		
			
			if (isset($blog_id) && $blog_id > 0) {
				 $imageParts = explode('/files/', $src);
				if (isset($imageParts[1])) {
					$src = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
				}
			}
			
			$out = '<img alt="'.$alt.'" '.$class.' src="'.THEME_URI.'/timthumb.php?src='.$src.'&amp;w='.$width.'&amp;h='.$height.'&amp;zc=1&amp;q=100"  '.$title.'  />';
		}else{
		
			/* T I M T H U M B D I S A B L E */
			$thumb = get_post_thumbnail_id($atppostid);
			if($src==''){
				$image = vt_resize($thumb,'', $width,$height,true );
			}else{
				$image = vt_resize('',$src, $width,$height,true );
			}
			$out = '<img  alt="'.$alt.'" '.$class.' alt="'.get_the_title($postid).'" '.$title.' src="'.$image['url'].'">';
		}
		return  $out;
	}

/*
 * Resize images dynamically using wp built in functions
 * Victor Teixeira
 * <?php 
 * $thumb = get_post_thumbnail_id(); 
 * $image = vt_resize( $thumb, '', 140, 110, true );
 * ?>
 * <img src="<?php echo $image['url']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" />
 *
 * @param int $attach_id
 * @param string $img_url
 * @param int $width
 * @param int $height
 * @param bool $crop
 * @return array
 */
function vt_resize( $attach_id = null, $img_url = null, $width, $height, $crop = false ) {
	// this is an attachment, so we have the ID
	if ( $attach_id ) {
	
		$image_src = wp_get_attachment_image_src( $attach_id, 'full' );
		$file_path = get_attached_file( $attach_id );
	
	// this is not an attachment, let's use the image url
	} else if ( $img_url ) {
		
		$file_path = parse_url( $img_url );

		$file_path = ltrim( $file_path['path'], '/' );
		
		$orig_size = @getimagesize( $file_path );
		
		$image_src[0] = $img_url;
		$image_src[1] = $orig_size[0];
		$image_src[2] = $orig_size[1];
	}
	
	$file_info = @pathinfo( $file_path );
	$extension = '.'. $file_info['extension'];

	// the image path without the extension
	$no_ext_path = $file_info['dirname'].'/'.$file_info['filename'];

	$cropped_img_path = $no_ext_path.'-'.$width.'x'.$height.$extension;

	// checking if the file size is larger than the target size
	// if it is smaller or the same size, stop right here and return
	if ( $image_src[1] > $width || $image_src[2] > $height ) {

		// the file is larger, check if the resized version already exists (for $crop = true but will also work for $crop = false if the sizes match)
		if ( file_exists( $cropped_img_path ) ) {

			$cropped_img_url = str_replace( basename( $image_src[0] ), basename( $cropped_img_path ), $image_src[0] );
			
			$vt_image = array (
				'url' => $cropped_img_url,
				'width' => $width,
				'height' => $height
			);
			
			return $vt_image;
		}

		// $crop = false
		if ( $crop == false ) {
		
			// calculate the size proportionaly
			$proportional_size = wp_constrain_dimensions( $image_src[1], $image_src[2], $width, $height );
			$resized_img_path = $no_ext_path.'-'.$proportional_size[0].'x'.$proportional_size[1].$extension;			

			// checking if the file already exists
			if ( file_exists( $resized_img_path ) ) {
			
				$resized_img_url = str_replace( basename( $image_src[0] ), basename( $resized_img_path ), $image_src[0] );

				$vt_image = array (
					'url' => $resized_img_url,
					'width' => $proportional_size[0],
					'height' => $proportional_size[1]
				);
				
				return $vt_image;
			}
		}

		// no cache files - let's finally resize it
		$new_img_path = image_resize( $file_path, $width, $height, $crop );
		$new_img_size = @getimagesize( $new_img_path );
		$new_img = str_replace( basename( $image_src[0] ), basename( $new_img_path ), $image_src[0] );

		// resized output
		$vt_image = array (
			'url' => $new_img,
			'width' => $new_img_size[0],
			'height' => $new_img_size[1]
		);
		
		return $vt_image;
	}

	// default output - without resizing
	$vt_image = array (
		'url' => $image_src[0],
		'width' => $image_src[1],
		'height' => $image_src[2]
	);
	
	return $vt_image;
}