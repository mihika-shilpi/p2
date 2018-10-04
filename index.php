<?php
require 'signature.php';
require 'logic.php';
?>

<!DOCTYPE html>
<html lang='en'>

<html>
<head>
    <title>Signature Architect</title>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <!--    <link rel="stylesheet" href="Styles/uikit.min.css"/>-->
    <link rel="stylesheet" href="Styles/WeldStyles.css"/>
    <link rel="stylesheet" href="Styles/Styles.css">
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
</head>

<body>
<header>

    <span tabindex="0" class="hamburger"><img src="Images/menu.svg" alt="menu"></span>

    <nav class="move">

        <a name="menuham">
            <ul>
                <li><a href="index.php" class="active">signature architect</a></li>
            </ul>
        </a>

        <img src="Images/AjitShilpi-01.png" alt="Ajit Shilpi">
    </nav>

</header>

<div id="content">

    <main>

        <div class="bandeau" style="background-image:url(Images/IMG_3289.jpg)">
            <h1 class="white">Ajit Shilpi's Signature Architect</h1>
            <p class="white">Generating your company email signature</p>
        </div>


        <div class="row">
            <div class="card-light col-span-3-6">
                <div>
                    <h1>Make Your Own Email Signature</h1>
                    <p>Fill this form out correctly to generate an HTML rich-text email signature to use with your new
                        company email ID. Be sure to use good spelling and write your phone number with an international
                        country code. Before you use the signature, check that the preview at the bottom of the page
                        displays correctly!</p>
                    <br>
                    <h2>Your Information</h2>
                    <br>

                    <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"
                          class="uk-form-stacked">

                        <label>Name
                            <input class="uk-input" type="text" name="name" value='<?= $name ?? '' ?>'>
                        </label>

                        <label>Email Address (Company)
                            <input class="uk-input" type="email" name="email" value='<?= $email ?? '' ?>'>
                        </label>

                        <label> Include my Phone Number
                            <input class="uk-checkbox" type="checkbox" name="ifphone">
                        </label>

                        <label>Mobile Phone Number (Company)
                            <input class="uk-input" type="tel" name="phone" value='<?= $phone ?? '' ?>'>
                        </label>

                        <label>Job Title
                            <select class="uk-select" name="title">
                                <?php foreach($jobs AS $key => $value) { ?>
                                    <option value="<?php echo $value; ?>" <?php if ($title = $value) echo 'selected'; ?>>
                                        <?php echo $value; ?>
                                    </option>
                                <?php } ?>

                            </select>
                        </label>


                        <button type='submit' class="primary" value="submit-true" name="Generate">
                            Generate
                        </button>

                    </form>
                </div>
            </div>


            <div class="card-light col-span-3-6">
                <div>

                    <?php if (isset($_POST['Generate']) && $form->hasErrors): ?>
                        <div class='errors alert alert-danger'>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li><?= $error ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif ?>

                    <?php if (isset($_POST['Generate']) && !$form->hasErrors): ?>
                        <?php include("includes/FormFilledCode.php") ?>
                    <?php endif ?>


                </div>

            </div>

            <?php
            if (isset($_POST['Generate'])) {
                include("includes/FormFilledDisplay.php");
            }
            ?>

    </main>

</div>

<footer>
    Copyright 2018 Ajit Shilpi
    All Rights Reserved
</footer>

</body>

</html>