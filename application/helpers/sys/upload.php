<?php

Class Upload {

	/**
	 *	get the uploaded image when the post is save
	 *	@param array $linker
	 *	@return void
	 */
	public function processUplaod( $linker = [] ) {
		# temp directory path 
		$temp = Core::getBasePath() . 'uploads/temp/';
		# distanation path
		$dist = Core::getBasePath() . 'uploads/image/';
		Core::logger($linker, true);
		$linker = $linker['linker'];
		$images = $linker['images'];

		# get all the files within the linker id
		$files = glob($temp . '*' . $linker . '*');

		# if there are no files then dont do anything.
		if(! $files ) {
			return false;
		}
		

		# start the transfer of the files
		# from temp to main distanation
		foreach( $files as $file ) {
			# old path
			$oldP = $file;
			# new path
			$newP = $dist . str_replace($temp, '', $file);

			# check if the user submited the image before moing
			# to the final destination


			# check if the file exist before renaming
			if(! file_exists($oldP) ) {
				Core::logger('Error moving this file -> ' . $oldP);
				$_error = true;
			}

			# move the file from the temp directory
			if(! rename($oldP, $newP) ) {
				# logs the error and continue
				Core::logger('Error moving this file -> ' . $oldP);
				$_error = true;
			}
		}

		# last step is check 

		# check in the process if error were encountered
		if( isset($_error) ) {
			return false;
		}
		return true;		
	}
}