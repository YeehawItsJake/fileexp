<?php
if(!isset($_GET['moveTo'])) {
    $_GET['moveTo'] = 'Insert your server directory here. NOT YOUR URL!';
    $_SESSION['directory'] = '/';
}
$debugAct = false;

$folder = glob($_GET['moveTo'] . '/*',GLOB_ONLYDIR);
$phpFile = glob($_GET['moveTo'] . '/*.php');
$jpgFile = glob($_GET['moveTo'] . '/*.jpg');
$jpegFile = glob($_GET['moveTo'] . '/*.jpeg');
$pngFile = glob($_GET['moveTo'] . '/*.png');
$mpegFile = glob($_GET['moveTo'] . '/*.mp4');
$gifFile = glob($_GET['moveTo'] . '*.gif');
$pdfFile = glob($_GET['moveTo'] . '/*.pdf');
$docxFile = glob($_GET['moveTo'] . '/*.docx');
$txtFile = glob($_GET['moveTo'] . '/*.txt');

if($debugAct === true) {
    echo '<div class="debugBox">';
    echo '<p>Folders discovered:</p>';
    echo  var_dump($folder);
    echo '<p>GIFs discovered:</p>';
    echo  var_dump($gifFile);
    echo '<p>Current WebDir:</p>';
    echo '</div>';
}
else {
    echo '<div class="file">';
    echo '<img id="desc" src="/fileexp_imgs/folder.png"><br>';
    echo '<a href="/..">...</a>';
    echo '</div>';
//List folders
    foreach($folder as $filename){
        $fileDir = $filename;
        $filename = basename($filename);
        if(!is_file($fileDir)){
            echo '<div class="file">';
            echo '<img id="desc" src="/fileexp_imgs/folder.png"><br>';
            echo '<a href="#" onclick=retrieveFilez("'.$fileDir.'")>'.$filename.'</a>';
            echo '</div>';
        }
    }


    foreach($gifFile as $filename){
        $fileDir = $filename;
        $fileWebDir = str_replace('/NexiumZFS/Nexus/Private',"",$filename);
        $filename = basename($filename);
        if(is_file($fileDir)){
            echo '<div class="file">';
            echo '<img src="'.$filename.'"><br>';
            echo '<a href="'.$fileWebDir.'">'.$filename.'</a>';
            echo '<form method="post"><button type="submit" name="Delete" value="'.$filename.'">Delete</button></form>';
            echo '</div>';
        }
    }
//List PHP files
    foreach($phpFile as $filename){
        $fileDir = $filename;
        $fileWebDir = str_replace('/NexiumZFS/Nexus/Private',"",$filename);
        $filename = basename($filename);
        if(is_file($fileDir)){
            echo '<div class="file">';
            echo '<img id="desc" src="/fileexp_imgs/internet.png"><br>';
            echo '<a href="'.$filename.'">'.$filename.'</a>';
            echo '</div>';
        }
    }
//List media files
    foreach($mpegFile as $filename){
        $fileDir = $filename;
        $fileWebDir = str_replace('/NexiumZFS/Nexus/Private',"",$filename);
        $filename = basename($filename);
        if(is_file($fileDir)){
            echo '<div class="file">';
            echo '<img id="desc" src="/fileexp_imgs/video.png"><br>';
            echo '<a href="'.$fileDir.'">'.$filename.'</a>';
            echo '<form method="post"><button type="submit" name="Delete" value="'.$filename.'">Delete</button></form>';
            echo '</div>';
        }
    }

    foreach($jpgFile as $filename){
        $fileDir = $filename;
        $fileWebDir = str_replace('/NexiumZFS/Nexus/Private',"",$filename);
        $filename = basename($filename);
        if(is_file($fileDir)){
            echo '<div class="file">';
            echo '<img src="'.$filename.'"><br>';
            echo '<a href="'.$fileDir.'">'.$filename.'</a>';
            echo '<form method="post"><button type="submit" name="Delete" value="'.$filename.'">Delete</button></form>';
            echo '</div>';
        }
    }
    foreach($jpegFile as $filename){
        $fileDir = $filename;
        $filename = basename($filename);
        if(is_file($fileDir)){
            echo '<div class="file">';
            echo '<img src="'.$filename.'"><br>';
            echo '<a href="'.$fileDir.'">'.$filename.'</a>';
            echo '<form method="post"><button type="submit" name="Delete" value="'.$filename.'">Delete</button></form>';
            echo '</div>';
        }
    }
    foreach($pngFile as $filename){
        $fileDir = $filename;
        $filename = basename($filename);
        if(is_file($fileDir)){
            echo '<div class="file">';
            echo '<img src="'.$filename.'"><br>';
            echo '<a href="'.$fileDir.'">'.$filename.'</a>';
            echo '<form method="post"><button type="submit" name="Delete" value="'.$filename.'">Delete</button></form>';
            echo '</div>';
        }
    }
}
?>