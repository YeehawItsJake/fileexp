<head>
    <title>FileeXp</title>
</head>
<body>

<?php

if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params(3600,"/");
    session_start();
}
if(isset($_SESSION['currentDir']) === false) {
    $_SESSION['currentDir'] = getcwd();
}
if(isset($_GET['moveTo']) === false) {
    $_SESSION['currentDir'] = getcwd();
}

echo '<div class="navBar">
    <h3 style="float: left; padding-left: 5px">File eXplorer v1.2al//</h3>
    <h3 style="float: right; padding-right: 5px">Directory: '.$_SESSION['currentDir'].'</h3>
</div>';
echo '<div class="navBar-push">
    <h3>File eXplorer v1.al</h3>
</div>';

echo '<div class="fileSpace"></div>';

if($_POST['Delete']) {
    if (!unlink($_POST['Delete'])) {
        echo ($_POST['Delete']." cannot be removed due to a permissions error.");
    }
    else {
        echo ($_POST['Delete']." has been deleted");
    }
}

?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    if( $('.fileSpace').is(':empty') ) {
        retrieveFilez();
    }
    function retrieveFilez(folder) {
        $(document).ready(function(){
            $.ajax({
                type: 'GET',
                url: 'getFilez.php?moveTo='+folder,
                success: function(data){
                    $('.fileSpace').html(data);
                }
            });
        });
    }
</script>
<style>
    .navBar {
        display: block ruby;
        background-color: #181818;
        width: 100%;
        height: 50px;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        margin-left: 0;
        margin-right: 0;
        margin-top: 0;
        border: none;
        text-align: left;
        z-index: 1;
    }
    .navBar-push {
        background-color: #000;
        width: 100%;
        height: 45px;
        position: static;
        top: 0;
        left: 0;
        right: 0;
        margin-left: 0;
        margin-right: 0;
        margin-top: 0;
        border: none;
        text-align: center;
        z-index: 0;
    }
    body {
        background-color: #000;
        color: aqua;
        display: flex;
        flex-wrap: wrap;
        font-family: "Cyberdyne Halftone";
    }
    a {
        color: aqua;
    }
    #desc {
        filter: invert(1);
    }
    .fileSpace {
        margin: 5px;
        display: flex;
        flex-wrap: wrap;
    }
    .file{
        margin: 5px;
        border-color: blueviolet;
        border-width: 3px;
        border-style: solid;
        width: 250px;
        height: 325px;
        overflow-wrap: break-word;
    }
    img {
        max-width: 98%;
        max-height: 70%;
        padding: 3px;
    }
    video {
        max-width: 98%;
        max-height: 70%;
        padding: 3px;
    }
</style>