<?php

/**
 * All functions that not related to cakephp should be here
 */
class Tool 
{
    public static function uploadFile($dirPath,$data,$allow=null)
    {

        if(empty($data['name']))
        {
            return null; // No file uploaded
        }
        $name = $data['name'];
        $alias = Tool::getAlias($name);
        $tmp = $data['tmp_name'];
        
        /* ---------- Check size { ---------- */
        if($data['size'] > MAX_IMAGE_SIZE)
        {
            return UPLOAD_INVALID_SIZE;
        }
        /* ---------- Check size } ---------- */
        
        /* ---------- Check ext { ---------- */
        $ext = substr($name, strrpos($name, '.') + 1);
        $ext = strtolower($ext);
                
        if(empty($allow))
        {
            $allow = array
            (
                'jpg','png','gif','bmp',
                'flv','swf','mp3','wav',
                'pdf','doc','docx','xls','xlsx','ppt','pptx','txt',
                'xml','sql',
                'rar','zip','gz','psd'
            );
        }
        else if($allow == 'image')
        {
            $allow = array('jpg','png','gif','bmp');
        }

        $has = false;
        
        if(!is_array($allow))
        {
            $allow = array($allow);
        }
        
        foreach($allow as $item)
        {           
            if($ext == $item)
            {
                $has = true;
                break;
            }
        }
        
        if($has == false)
        {
            return UPLOAD_INVALID_TYPE;
        }
        /* ---------- Check ext } ---------- */
        
        Tool::createDir($dirPath);
        
        $newName = time().'_'.$name;
        move_uploaded_file($tmp, $dirPath.DS.$newName);
        chmod($dirPath.DS.$newName, 0777);
        return $newName;
    }
    
    /**
     * upload multiple file at a time
     *
     * @throws NotFoundException
     * @param string $dirPath: dir path to upload
     * @param array $data: data uploaded
     * @param array $allow: extensions allowed to upload
     * @return void
     */
    public static function uploadMultipleFile($dirPath,$data,$allow=null)
    {
        $fileNames = array();
        foreach($data as $key=>$item)
        {
            if(!empty($item['name']))
            {
                $fileNames[$key] = Tool::uploadFile($dirPath,$item,$allow);
            }
        }
        
        return $fileNames;
    }
    
    /**
     * move files uploaded from tmp directory to destination directory
     *
     * @throws NotFoundException
     * @param string $toDir: destination directory
     * @param array $files: list of file names to move
     * @return void
     */
    public static function moveUploadFile($toDir,$files)
    {
        Tool::createDir($toDir);
        $fromDir = Configure::read('S.uploadDir.tmp');
        
        if(is_array($files))
        {
            foreach($files as $file)
            {
                if($file == UPLOAD_INVALID_TYPE || $file == UPLOAD_INVALID_SIZE)
                {
                    // Do nothing
                }
                else
                {
                    if(file_exists($fromDir.$file))
                    {
                        if (@copy($fromDir.$file,$toDir.$file))
                        {
                            unlink($fromDir.$file);
                        }     
                    }    
                }
            }
        }
        else
        {
            if(file_exists($fromDir.$files))
            {
                if (@copy($fromDir.$files,$toDir.$files))
                {
                    unlink($fromDir.$files);
                }     
            }
        }
    }
    
    public static function createDir($dirPath)
    {
        if(!is_dir($dirPath))
        {
            mkdir($dirPath, 0777);
            chmod($dirPath, 0777);
        }
    }
    
    public static function getFileExtension($str) 
    {
        $i = strrpos($str,".");
        if (!$i) { return ""; }
        $l = strlen($str) - $i;
        $ext = substr($str,$i+1,$l);
        return $ext;
    }
    
    public static function getAlias($str)
    {
        $result = trim($str);
        $result = str_replace(array('!','@','#','$','%','^','&','*','(',')','{','}','\"','\'','<','>',',','.','?','\\','/',':','|','+','=','~','`'),'',$result); // 1 byte
        $result = str_replace(array('！','＠','＃','＄','％','＾','＆','＊','（','）','｛','｝','\“','\‘','＜','＞','、','。','？','\￥','／','：','｜','＋','＝','～','‘'),'',$result); // 2 byte
        $result = str_replace(' ','-',$result); // 1 byte
        $result = str_replace('　','-',$result); // 2 byte
        
        while(strpos($result,'--') != false)
        {
            $result = str_replace('--','-',$result);
        }
        
        //$result = $result.URL_EXT;
        
        return mb_strtolower($result,'utf8');
    }
    
    public static function delDir($dirName)
    {
        if(is_dir($dirName))
        {
            if (is_dir($dirName))
            $dirHandle = opendir($dirName);
            if (!$dirHandle)
                return false;
            while($file = readdir($dirHandle))
            {
                if ($file != "." && $file != "..") 
                {
                    if (!is_dir($dirName."/".$file))
                    unlink($dirName."/".$file);
                    else
                    {
                        $a=$dirName.'/'.$file;
                        Tool::delDir($a);
                    }
                }
            }
            closedir($dirHandle);
            rmdir($dirName);
            return true;
        }
     }


    public static function saveImageFromUrl($url, $path = null) {
        $imageName = basename($url);
        if (!$path) {
            $path = Configure::read('S.uploadDir');
        }

        $file = @file_get_contents($url);
        if (trim($file)) {
            if (@file_put_contents(str_replace('//', '/', $path.'/'.$imageName), $file)) {
                return $imageName;
            };
        }
        return null;
    }
    
    public static function isURL($url)
    {
        return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
    }
    
    public static function isEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    
    public static function curl($url,$postData=null)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        if(!empty($postData))
        {
            $strData = "";
            foreach($postData as $key=>$value) 
            { 
                $strData .= $key.'='.$value.'&'; 
            }
            rtrim($strData,'&');
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $strData);
        }
        return curl_exec($curl);
        curl_close($curl);
    }
    
    public static function switchDate($date)
    {
        if(!empty($date))
        {
            if($date == '0000-00-00')
            {
                return null;
            }
            else
            {
                $arr = explode('-',$date);
                if(count($arr) == 3)
                {
                    return $arr[2].'-'.$arr[1].'-'.$arr[0];
                }
                else
                {
                    return $date;
                }
            }
        }
        else
        {
            return null;
        }
        
    }
}
