<?php

	/*
	* To do:
	* Map reduce all the images already available in JSON
	* 
	* 
	* 
	* 
	* 
	*/

	class imageIpsum
	{
		private $originalImageDirectory = '';
		private $duplicateImageDirectory = '';

		private function getOriginalFiles()
		{
			$orgDirFiles = scandir($this->originalImageDirectory);
			unset($orgDirFiles[0]);
			unset($orgDirFiles[1]);

			return $orgDirFiles;
		}

		function imageIpsum($originals, $duplicates){
			$this->originalImageDirectory = $originals;
			$this->duplicateImageDirectory = $duplicates;
		}

		public function test(){
			echo $this->originalImageDirectory;
			echo $this->duplicateImageDirectory.'<br>';

			$files = $this->getOriginalFiles();
			foreach ($files as $file) {
				echo '<br>'.$file;
			}
		}
	}