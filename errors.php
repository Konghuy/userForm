<?php if (count($_SESSION['errors']) > 0 ) { ?> 
        <div class="errors">
            <?php foreach ((array)$_SESSION['errors'] as $error) { ?>
                <p> <?php echo $error; ?> </p>
            <?php } ?>

        </div>
<?php } ?>