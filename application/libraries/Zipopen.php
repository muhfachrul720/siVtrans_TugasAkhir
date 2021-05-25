<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Zipopen {

    public function extract_to($path, $extractpath)
    {
        $zip = new ZipArchive;
        $zipdata = array();
        
        if($zip->open($path) === TRUE) {
            
            if($zip->numFiles == 2) {
                for($i = 0; $i < $zip->numFiles; $i++){
                    array_push($zipdata, $zip->getNameIndex($i));
                };
                
                $zip->extractTo($extractpath);
                $zip->close();

                return $zipdata;
            } else {return false;}
        } else {echo 'Fail';}
    }

}

?>