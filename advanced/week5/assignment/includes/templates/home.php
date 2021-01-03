<h1>Music Collection</h1>
<?php if (isset($errors)): ?>
    <ul class="errors">
        <?php foreach ($errors as $error): ?>
            <li><?= $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<a href="<?= BASE_PATH; ?>add">Add new album</a>
<?php if (isset($albums)): ?>
    <table>
        <thead>
        <tr>
            <th></th>
            <th>#</th>
            <th>Artist</th>
            <th>Album</th>
            <th>Genre</th>
            <th>Year</th>
            <th>Tracks</th>
            <th colspan="3"></th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="10">&copy; My Collection with <?= $totalAlbums; ?> albums</td>
        </tr>
        </tfoot>
        <tbody>
        <?php foreach ($albums as $album): ?>
            <tr>
                <td class="image"><img src="<?= $album->image; ?>" alt="<?= $album->name; ?>"/></td>
                <td><?= $album->id; ?></td>
                <td><?= $album->artist; ?></td>
                <td><?= $album->name; ?></td>
                <td><?= $album->genre; ?></td>
                <td><?= $album->year; ?></td>
                <td><?= $album->tracks; ?></td>
                <td><a href="<?= BASE_PATH; ?>detail?id=<?= $album->id; ?>">Details</a></td>
                <td><a href="<?= BASE_PATH; ?>edit?id=<?= $album->id; ?>">Edit</a></td>
                <td><a href="<?= BASE_PATH; ?>delete?id=<?= $album->id; ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
