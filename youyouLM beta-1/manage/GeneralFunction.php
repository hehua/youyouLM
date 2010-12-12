<?php
include 'define.php';

/**
 * Remove a folder.
 * @param string $dirName
 * @return bool Returns true on success or false on failure.  
 */
function removeDirectory($dirName) {
	print $dirName;
    if (!is_dir($dirName)) { print 'erron...'; return false; }
    
    //open a directory.
    $handle = opendir($dirName);
	
    //remove the directory recursively.
    while(($file = readdir($handle)) !== false) {
    	if ($file != '.' && $file != '..') {
    		$dir = $dirName.'/'.$file;
    		
    		is_dir($dir) ? removeDirectory($dir) : unlink($dir);
    	}
    }
    
    //close the directory
    closedir($handle);
    
    //remove the directory, and return result.
    return rmdir($dirName);
}
/**
 * Scan a folder.
 * @param string $iDirectory
 * @return array[string]<br /> the index of the folder.
 */
function ScanDirectory($iDirectory) {
	if (!is_dir($iDirectory)) { return FAILURE; }
	//print '-------ScanDirectory --$iDirectory:'.$iDirectory;
	$list = scan($iDirectory);
	//print 'count($list)'.count($list);
	if (count($list)==0) { return NULL; }
	
	
	//print "ooooooooooo:".count($list);
	// print '--------$list[0]:'.$list[0];
	return $list;
}

function scan($iDirectory){
	//print '------opendir($iDirectory):'.$iDirectory;
   $dh  = opendir($iDirectory);
   while (false !== ($filename = readdir($dh))) {
        $files[] = $filename;
    }
  
    //print '------count($files):'.count($files);
  // print '---1-----$files[2]:'.$files[2]; 
   sort($files);
  // print '----2----$files[2]:'.$files[2];
   rsort($files);
 // print '----3----$files[2]:'.$files[2];
   
   array_pop($files);
  // print '    1count($files):'.count($files);
  // print '    $files[0]:'.$files[0];

   array_pop($files);
  // print '     2count($files):'.count($files);
  // print '    $files[0]:'.$files[0];
  //print  'count($files)'.count($files);
  if(count($files) != 0)
  {
  	return $files;
  }
  else{
  	return NULL;
  }
  // print '--------$file[0]:'.$files[0];
   
}

function get_contents($path){
	$file = fopen("test.txt","r");
　　fread($file,filesize("test.txt"));
　　fclose($file); 
	return $file;
}
 

   

?>