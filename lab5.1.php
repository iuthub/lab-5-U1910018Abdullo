<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
    "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Music Viewer</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link href="viewer.css" type="text/css" rel="stylesheet" />
</head>

<body>
<div id="header">
    <h1>190M Music Playlist Viewer</h1>
    <h2>Search Through Your Playlists and Music</h2>
</div>

<div id="listarea">
    <ul id="musiclist">
        <?php
        $musicSizeExt = "b";
        $musicFiles = glob("songs/*.mp3");
        foreach ($musicFiles as $music) {
            $musicName = basename($music);
            $musicSize = filesize($music);

            if ($musicSize > 1024 && $musicSize < 1048575){
                $musicSize = $musicSize / 1024;
                $musicSizeExt = "kb";
            }
            if ($musicSize > 1048575){
                $musicSize = (int) $musicSize / 1048575;
                $musicSizeExt = "mb";
            }
        ?>
        <li class="mp3item"> <a href="<?= $music ?>"><?= $musicName ?> </a> <?= " (".(int)$musicSize ." ". $musicSizeExt." )" ?> </li>
        <?php } ?>


        <?php
        $playlists = glob("songs/*.txt");
        foreach ($playlists as $playlist) {
            $playlistName = basename($playlist);
            ?>
            <li class="playlistitem"> <a href="./playlist.php?data=<?php echo $playlist ?>"><?= $playlistName ?> </a> </li>
        <?php } ?>
    </ul>
</div>
</body>
</html>
