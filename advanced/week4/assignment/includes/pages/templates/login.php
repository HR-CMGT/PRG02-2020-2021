<h1>Login</h1>
<?php if (isset($errors) && !empty($errors)) { ?>
    <ul class="errors">
        <?php for ($i = 0; $i < count($errors); $i++) { ?>
            <li><?= $errors[$i]; ?></li>
        <?php } ?>
    </ul>
<?php } ?>

<form id="login" method="post" action="<?= $_SERVER['REQUEST_URI']; ?>">
    <div>
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" value="<?= (isset($email) ? $email : ''); ?>"/>
    </div>
    <div>
        <label for="password">Wachtwoord</label>
        <input type="password" name="password" id="password"/>
    </div>
    <div>
        <input type="submit" name="submit" value="Login"/>
    </div>
</form>
<div>
    <a href="<?= BASE_PATH; ?>home">Go back to the list</a>
</div>
