<?php

use App\Blog;

require_once './vendor/autoload.php';

$blog = new Blog();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <title>Blogger</title>
</head>

<body>
    <?php echo $blog->blogheader(); ?>
    <main class="container">
        <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
                <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
                <p class="lead mb-0"><a href="./blog/signup.php" class="text-white fw-bold">Get Started .....</a></p>
            </div>
        </div>


        <div class="row g-5 mt-5">
            <div class="col-md-8">
                <h3 class="pb-4 mb-4 fst-italic border-bottom">
                    Read
                </h3>

                <?php echo $blog->article(); ?>

            </div>
            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem;">
                    <div class="p-4 mb-3 bg-light rounded">
                        <h4 class="fst-italic h3 mb-3">Trending</h4>
                        <?php echo $blog->trending(); ?>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php echo $blog->blogfooter(); ?>


</body>

</html>