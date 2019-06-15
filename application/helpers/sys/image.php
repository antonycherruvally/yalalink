<?php
/**
 *	image helper
 *	@author Ramon Alexis Celis
 *	@since 9.10.18
 */
Class Image {

	// image table on the database
	protected $table = 'tbl_post_images';

	// image paths
	public $paths = [
		'uploads/images/thumbnail/',
		'uploads/images/'
	];

	// Link image type to correct image loader and saver
	// - makes it easier to add additional types later on
	// - makes the function easier to read
	const IMAGE_HANDLERS = [
		IMAGETYPE_JPEG => [
			'load' => 'imagecreatefromjpeg',
			'save' => 'imagejpeg',
			'quality' => 100
		],
		IMAGETYPE_PNG => [
			'load' => 'imagecreatefrompng',
			'save' => 'imagepng',
			'quality' => 0
		],
		IMAGETYPE_GIF => [
			'load' => 'imagecreatefromgif',
			'save' => 'imagegif'
		]
	];

	/**
	 *	get the main image of a single post
	 *	@param int $id
	 *	@return string $image
	 */
	public function getMainImage( $id ) {
		$db = $this->getDb();
		$cmd = $db->where('post_id', $id)
			->where('main', 1)
			->get();
		$rs = $cmd->first_row();
		foreach( $this->paths as $path ) {
			$fpath = FCPATH . $path . $rs->image;
			if( file_exists($fpath) and is_file($fpath) ) {
				return str_replace(FCPATH, Core::getBaseUrl(), $fpath);
			}
		}
		return Core::getBaseUrl() . 'assets/front_end/images/no_image_available.jpg';
	}

	/**
	 *	get all ad images
	 */
	public function getImages( $id ){
		$query = Core::getHelper('db')->get('tbl_post_images')
			->select('image')
			->where('post_id', $id)
			->order_by('main', 'DESC')
			->get();
		return ($query->num_rows()) ? $query->result() : false;
	}

	/**
	 *	get user image
	 *	@param int $id
	 *	@return string
	 */
	public function getUserImage( $id = false ) {
		$bp = Core::getBaseUrl() . 'uploads/users/thumb/';

		if( $id ) {
			$db = Core::getHelper('db')->get('tbl_users');
			$cmd = $db
				->select('image')
				->where('id', $id)
				->get();
			$rs = $cmd->first_row();
			if(! empty($rs->image ) ) {
				return $bp . $rs->image;
			}
			return Core::getBaseUrl() . 'assets/front_end/images/user-thumb.jpg';
		}

		if( isset($_SESSION['logged_yalalink_userdata']) ) {
			return $bp . $_SESSION['logged_yalalink_userdata']['image'];
		}
		return Core::getBaseUrl() . 'assets/front_end/images/user-thumb.jpg';
	}

	/**
	 *	get current table
	 */
	public function getDb() {
		return Core::getHelper('db')->get($this->table);
	}

	/**
	 *	make thumb size image
	 *	@param array $config
	 *	@return void
	 */
	public function makeThumbnail( $config = [] ) {
		$CI =& get_instance();
		$config_manip = array(
			'image_library' => 'gd2',
			'source_image' 	=> $config['source'],
			'new_image' 	=> $config['dist'],
			'maintain_ratio' => TRUE,
			'width' 		=> $config['width'],
			'height' 		=> $config['height']
		);
		$CI->load->library('image_lib', $config_manip);
		if (!$CI->image_lib->resize()) {
			Core::logger( $config_manip['source_image'] .' -> '. $CI->image_lib->display_errors() );
			$_error = true;
		}else{
			Core::logger( "resize to " . $config['width'] . ': '  . $config_manip['source_image'] .' -> '. $CI->image_lib->display_errors() );
		}
		$CI->image_lib->clear();
		$CI = null;
		if( isset($_error) ) {
			return false;
		}

		return true;
	}


	/**
	 * @param $src - a valid file location
	 * @param $dest - a valid file target
	 * @param $targetWidth - desired output width
	 * @param $targetHeight - desired output height or null
	 */
	public function createThumbnail( $config ) {
		$src 			= $config['source'];
		$dest 			= $config['dest'];
		$targetWidth 	= $config['width'];
		$targetHeight 	= $config['height'];
		// 1. Load the image from the given $src
		// - see if the file actually exists
		// - check if it's of a valid image type
		// - load the image resource
		// get the type of the image
		// we need the type to determine the correct loader
		$type = exif_imagetype($src);
		// if no valid type or no handler found -> exit
		if (!$type || !self::IMAGE_HANDLERS[$type]) {
			return null;
		}
		// load the image with the correct loader
		$image = call_user_func(self::IMAGE_HANDLERS[$type]['load'], $src);
		// no image found at supplied location -> exit
		if (!$image) {
			return null;
		}
		// 2. Create a thumbnail and resize the loaded $image
		// - get the image dimensions
		// - define the output size appropriately
		// - create a thumbnail based on that size
		// - set alpha transparency for GIFs and PNGs
		// - draw the final thumbnail
		// get original image width and height
		$width = imagesx($image);
		$height = imagesy($image);
		// maintain aspect ratio when no height set
		if ($targetHeight == null) {
			// get width to height ratio
			$ratio = $width / $height;
			// if is portrait
			// use ratio to scale height to fit in square
			if ($width > $height) {
				$targetHeight = floor($targetWidth / $ratio);
			}
			// if is landscape
			// use ratio to scale width to fit in square
			else {
				$targetHeight = $targetWidth;
				$targetWidth = floor($targetWidth * $ratio);
			}
		}
		// create duplicate image based on calculated target size
		$thumbnail = imagecreatetruecolor($targetWidth, $targetHeight);
		// set transparency options for GIFs and PNGs
		if ($type == IMAGETYPE_GIF || $type == IMAGETYPE_PNG) {
			// make image transparent
			imagecolortransparent(
				$thumbnail,
				imagecolorallocate($thumbnail, 0, 0, 0)
			);
			// additional settings for PNGs
			if ($type == IMAGETYPE_PNG) {
				imagealphablending($thumbnail, false);
				imagesavealpha($thumbnail, true);
			}
		}
		// copy entire source image to duplicate image and resize
		imagecopyresampled(
			$thumbnail,
			$image,
			0, 0, 0, 0,
			$targetWidth, $targetHeight,
			$width, $height
		);
		// 3. Save the $thumbnail to disk
		// - call the correct save method
		// - set the correct quality level
		// save the duplicate version of the image to disk
		return call_user_func(
			self::IMAGE_HANDLERS[$type]['save'],
			$thumbnail,
			$dest,
			self::IMAGE_HANDLERS[$type]['quality']
		);
	}


}