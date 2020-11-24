<?php
//Multi dimensional array with the music collection data
$musicAlbums =
[
    // fill the collection with albums (also arrays)
    [
        'artist'    => 'Muse',
        'album'     => 'Live At Rome Olympic Stadium',
        'genre'     => 'Rock',
        'year'      => '2013',
        'tracks'    => '13'
    ],
    [
        'artist'    => 'Dream Theater',
        'album'     => 'Systematic Chaos',
        'genre'     => 'Progressive Rock',
        'year'      => '2007',
        'tracks'    => '8'
    ],
    [
        'artist'    => 'Hardwell',
        'album'     => 'United We Are',
        'genre'     => 'House',
        'year'      => '2015',
        'tracks'    => '14'
    ],
    [
        'artist'    => 'Robbie Williams',
        'album'     => 'Greatest Hits',
        'genre'     => 'Pop',
        'year'      => '2010',
        'tracks'    => '57'
    ],
    [
        'artist'    => 'Limp Bizkit',
        'album'     => 'Gold Cobra',
        'genre'     => 'Rock / Rap',
        'year'      => '2011',
        'tracks'    => '16'
    ],
    [
        'artist'    => 'Harrie Jekkers',
        'album'     => 'Mijn Ikken',
        'genre'     => 'Nederpop',
        'year'      => '2005',
        'tracks'    => '12'
    ],
    [
        'artist'    => 'Angels & Airwaves',
        'album'     => 'Love Part 1',
        'genre'     => 'Rock',
        'year'      => '2011',
        'tracks'    => '11'
    ],
    [
        'artist'    => 'Joe Satriani',
        'album'     => 'Unstoppable Momentum',
        'genre'     => 'Rock',
        'year'      => '2013',
        'tracks'    => '11'
    ],
    [
        'artist'    => 'Kygo',
        'album'     => 'Cut Your Teeth',
        'genre'     => 'Chillstep',
        'year'      => '2014',
        'tracks'    => '3'
    ],
    [
        'artist'    => '30 Seconds To Mars',
        'album'     => 'This Is War',
        'genre'     => 'Rock',
        'year'      => '2009',
        'tracks'    => '15'
    ]
];
?>
<!doctype html>
<html lang="en">
<head>
    <title>Music Collection</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
    <h1>Music Collection</h1>
    <hr/>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Artist</th>
                <th>Album</th>
                <th>Genre</th>
                <th>Year</th>
                <th>Tracks</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="6">&copy; My Collection</td>
            </tr>
        </tfoot>
        <tbody>
    <!--        Loop through all albums in the collection-->
        <?php foreach ($musicAlbums as $index => $album) { ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= $album['artist'] ?></td>
                <td><?= $album['album'] ?></td>
                <td><?= $album['genre'] ?></td>
                <td><?= $album['year'] ?></td>
                <td><?= $album['tracks'] ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</body>
</html>
