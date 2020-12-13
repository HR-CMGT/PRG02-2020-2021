<?php if (isset($errors)): ?>
    <ul class="errors">
        <?php foreach ($errors as $error): ?>
            <li><?= $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if (isset($album)): ?>
    <h1><?= $album->artist . ' - ' . $album->name; ?></h1>

    <div>
        <img src="<?= $album->image; ?>" alt="<?= $album->name; ?>"/>
    </div>
    <ul>
        <li>Genre: <?= $album->genre; ?></li>
        <li>Year: <?= $album->year; ?></li>
        <li>Tracks: <?= $album->tracks; ?></li>
    </ul>
<?php endif; ?>

<div>
    <a href="<?= BASE_PATH; ?>home">Go back to the list</a>
</div>

