<?
/**
 * 获取当前目录及子目录下的所有文件
 * @param string $dir 路径名
 * @return array 所有文件的路径数组
 */
function get_files1($dir) {
    $files = array();
 
    if(!is_dir($dir)) {
        return $files;
    }
 
    $handle = opendir($dir);
    if($handle) {
        while(false !== ($file = readdir($handle))) {
            if ($file != '.' && $file != '..') {
                $filename = $dir . "/"  . $file;
                if(is_file($filename)) {
                    $files[] = $filename;
                }else {
                    $files = array_merge($files, get_files($filename));
                }
            }
        }   //  end while
        closedir($handle);
    }
    return $files;
}  


/*
glob() 函数依照 libc glob() 函数使用的规则寻找所有与 pattern 匹配的文件路径，类似于一般 shells 所用的规则一样。不进行缩写扩展或参数替代。
返回一个包含有匹配文件／目录的数组。如果出错返回 FALSE。
此函数不能作用于远程文件，被检查的文件必须通过服务器的文件系统访问。

*/
/**
 * 获取当前目录下的所有文件
 * @param string $dir 路径名
 * @return array 所有文件的路径数组
 */
function get_files($dir) {
    $dir = realpath($dir) . "/";
    $files  = array();
 
    if (!is_dir($dir)) {
        return $files;
    }
 
    $pattern =  $dir . "*";
    $file_arr = glob($pattern);
 
    foreach ($file_arr as $file) {
        if (is_dir($file)) {
            $temp = get_files($file);
 
            if (is_array($temp)) {
                $files = array_merge($files, $temp);
            }
        }else {
            $files[] = $file;
        }   //  end if
    }
    return $files;
}   //  end function


/*
这是个仿冒面向对象的机制来读取一个目录。
dir() 函数打开一个目录句柄，并返回一个对象。这个对象包含三个方法：read() , rewind() 以及 close()。并且有两个属性可用。handle 属性可以用在其它目录函数例如 readdir()，rewinddir() 和 closedir() 中。path 属性被设为被打开的目录路径。
若成功，则该函数返回一个目录流，否则返回 false 以及一个 error。可以通过在函数名前加上 “@” 来隐藏 error 的输出。

注意: read 方法返回的目录项的顺序依赖于系统。
注意: 本函数定义了内部类 Directory，意味着不能再用同样的名字定义用户自己的类。

*/

/**
 * 递归显示当前指定目录下所有文件
 * 使用dir函数
 * @param string $dir 目录地址
 * @return array $files 文件列表
 */
function get_files3($dir) {
    $files = array();
 
    if (!is_dir($dir)) {
        return $files;
    }
 
    $d = dir($dir);
    while (false !== ($file = $d->read())) {
        if ($file != '.' && $file != '..') {
            $filename = $dir . "/"  . $file;
 
            if(is_file($filename)) {
                $files[] = $filename;
            }else {
                $files = array_merge($files, get_files($filename));
            }
        }
    }
    $d->close();
    return $files;
}



/**
 * 此方法自PHP 5.0有效
 * 使用RecursiveDirectoryIterator遍历文件，列出所有文件路径
 * @param RecursiveDirectoryIterator $dir 指定了目录的RecursiveDirectoryIterator实例
 * @return array $files 文件列表
 */
function get_files4($dir) {
    $files = array();
 
    for (; $dir->valid(); $dir->next()) {
        if ($dir->isDir() && !$dir->isDot()) {
            if ($dir->haschildren()) {
                $files = array_merge($files, get_files($dir->getChildren()));
            };
        }else if($dir->isFile()){
            $files[] = $dir->getPathName();
        }
    }
    return $files;
}
/*$path = "/var/www";
$dir = new RecursiveDirectoryIterator($path);
print_r(get_files($dir));
*/ 

$dir = "K:\picture\0a";
var_dump(get_files1($dir));
?>