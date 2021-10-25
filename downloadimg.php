<?php
function urlImageProductGetDop( $dataUrl = array() ) { 
		//get from url download and ful in folder 
		
		foreach ( $dataUrl as $url ) { 
			if ( $url ) { 
				
				$path_parts = @pathinfo($url);
				$path = 'uploads/posts/product/'.$path_parts['basename'];
				$upPath = 'uploads/posts/product/thumbs/'.$path_parts['basename'];
				
				if ( ! file_exists( $path ) ) { 
					downloadFile( $url, $path , $upPath); 
				} 
			} 
		} 
		return true; 
	}	
function downloadFile( $URL, $PATH , $upPath) { 
		// url файла для проверки на существование 
		$dirname = dirname( $PATH ); 
		
		if ( ! is_dir( $dirname ) ) { 
			mkdir( $dirname, 0755, true ); 
		} 
		$dirname1 = dirname( $upPath ); 
		
		if ( ! is_dir( $dirname1 ) ) { 
			mkdir( $dirname1, 0755, true ); 
		} 
		// открываем файл для чтения 
		if ( $URL ) { 
			$ReadFile = fopen( $URL, "rb" ); 
			if ( $ReadFile ) { 
				$WriteFile = fopen( $PATH, "wb" ); 
				if ( $WriteFile ) { 
					while ( ! feof( $ReadFile ) ) { 
						// fwrite( $WriteFile, fread( $ReadFile, 4096 ) ); 
						fwrite( $WriteFile, fread( $ReadFile,10000000) ); 
					} 
						fclose( $WriteFile ); 
				} 
				fclose( $ReadFile ); 
			}	
			$ReadFile = fopen( $URL, "rb" ); 
			if ( $ReadFile ) { 	
				$WriteFile = fopen( $upPath, "wb" ); 
				if ( $WriteFile ) { 
					while ( ! feof( $ReadFile ) ) { 
						// fwrite( $WriteFile, fread( $ReadFile, 4096 ) ); 
						fwrite( $WriteFile, fread( $ReadFile,10000000) ); 
					} 
						fclose( $WriteFile ); 
				}
				fclose( $ReadFile ); 
			}		
		} else { 
			return false; 
		} 

	}
	?>