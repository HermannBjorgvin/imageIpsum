<?php

	/*
	* 
	* 
	* 
	*/

	class imageIpsum
	{
		private $originalImageDirectory = ''; // folder to store the original images
		private $duplicateImageDirectory = ''; // folder to store all the images we generate
		private $imageNameAddon = '.jpg'; // What to add on to the end of the filename

		// Initializer function
		function imageIpsum($originals, $duplicates, $customStringFilename)
		{
			$this->originalImageDirectory = $originals;
			$this->duplicateImageDirectory = $duplicates;
			$this->imageNameAddon = $customStringFilename.$this->imageNameAddon;
		}

		// Main function for serving images, returns something, idk yet
		public function serve($width, $height)
		{
			$imageExists = $this->checkImageExistance($width, $height);

			if (!$imageExists) {
				$this->resizeToFill(
					$this->originalImageDirectory.$this->findBestAspectRatio($width, $height),
					$this->duplicateImageDirectory,
					$width,
					$height,
					1
				);
			}

			return $this->duplicateImageDirectory.$width.'x'.$height.$this->imageNameAddon;
		}

		// Find the image with the best matching aspect ratio
		private function findBestAspectRatio($width, $height)
		{
			// Fetch all the original images
			$images = $this->getOriginalFiles();

			// Aspect ratio
			$ratio = $width/$height;

			// Selected image
			$sImage = array();

			foreach ($images as $image) {
				if // if the aspect ratio matches better than the selected image
				(
					empty($sImage) ||
					(
						(
							abs($image['x']/$image['y'] - $ratio) <
							abs($sImage['x']/$sImage['y'] - $ratio)
						) ||
						abs(
							abs($image['x']/$image['y'] - $ratio) - abs($sImage['x']/$sImage['y'] - $ratio)
						) < 0.035
					)
				) 
				{
					$sImage = $image;
				}
			}

			return $sImage['file'];
		}

		// Get a list of the original images
		private function getOriginalFiles()
		{
			// Scan the Original Imaged Directory
			$orgDirFiles = scandir($this->originalImageDirectory);

			// Unset the . and .. directories
			unset($orgDirFiles[0]);
			unset($orgDirFiles[1]);

			$imagesInfo = array();

			foreach ($orgDirFiles as $file) {
				$tempArr = array();

				$size = getimagesize($this->originalImageDirectory.$file);

				$tempArr['x'] = $size[0];
				$tempArr['y'] = $size[1];
				$tempArr['file'] = $file;

				$imagesInfo[] = $tempArr;
			}

			shuffle($imagesInfo);
			return $imagesInfo;
		}

		// Get a list of the original images
		private function getDuplicateFiles()
		{
			// Scan the Original Imaged Directory
			$orgDirFiles = scandir($this->duplicateImageDirectory);

			// Unset the . and .. directories
			unset($orgDirFiles[0]);
			unset($orgDirFiles[1]);

			return $orgDirFiles;
		}

		// So we're not wasting our time generating a million of these
		private function checkImageExistance($width, $height)
		{
			$images = $this->getDuplicateFiles();
			foreach ($images as $image) {
				if ($image == ($width.'x'.$height.$this->imageNameAddon)) {
					return true;
				}
			}
			return false;
		}

		// Resize and save an image to fit
		private function resizeToFill($filename, $destination, $newWidth, $newHeight, $forcefill)
		{
			list($x, $y) = getimagesize($filename); // Get some image dimensions
			$source = imagecreatefromjpeg($filename);

			// old images width will fit
			if(($x / $y) < ($newWidth/$newHeight)){
			    $scale = $newWidth/$x;
			    $newX = 0;
			    $newY = - ($scale * $y - $newHeight) / 2;

			// else old image's height will fit
			}else{
			    $scale = $newHeight/$y;
			    $newX = - ($scale * $x - $newWidth) / 2;
			    $newY = 0;
			}

			// new image
			$newImage = imagecreatetruecolor($newWidth, $newHeight);
			$newFilename = $newWidth.'x'.$newHeight.$this->imageNameAddon;

			// now use imagecopyresampled
			imagecopyresampled($newImage, $source, $newX, $newY, 0, 0, $scale * $x, $scale * $y, $x, $y);
			
			imagejpeg($newImage, $destination.$newFilename);
		}
	}