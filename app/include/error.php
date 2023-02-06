<?php if (isset($_SESSION["errors"])):
    $errors = $_SESSION["errors"];
    if ($errors > 0) :?>
        <ul>
            <?php foreach ($errors as $error) :?>
                <li class="form-warning">
                    <?php echo $error ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
<?php endif; ?>



