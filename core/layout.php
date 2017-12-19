<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>About Lavaughn Campbell</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="dist/css/main.css">

      <?php if(!empty($meta['description'])): ?>
        <meta name="description" content="<?php echo $meta['description']; ?>">

      <?php endif; ?>

      <?php if(!empty($meta['keywords'])): ?>
        <meta name="keywords" content="<?php echo $meta['keywords']; ?>">

      <?php endif; ?>
        <link rel="author"href="humans.txt">
  </head>

  <body>


    <div id="Wrapper">
      <nav class="top-nav">
          <a class="pull-left" href="/">Home</a>
          <ul class="nav-inline pull-right" role="navigation">
              <li><a href="index.php">Projects</a></li>
              <li><a href="resume.php">About Me</a></li>
              <li><a href="contact.php">Contact</a></li>
          </ul>
      </nav>

        <div class="row">
            <div id="Content">
                <?php echo $content; ?>
            </div>
            <div id="Sidebar">
              <div id="AboutMe">
                <div class="header">Lavaughn Campbell</div>
                <img src="https://www.gravatar.com/avatar/4678a33bf44c38e54a58745033b4d5c6?d=mm" alt="My Avatar" class="img-circle">
              </div>
            </div>
        </div>
        <div id="Footer">
            <small>&copy; 2017 - lavaughnccampbell.com</small>
            <ul  role="navigation">
                <li><a href="terms.html">Terms</a></li>
                <li><a href="privacy.html">Privacy</a></li>
            </ul>
        </div>
    </div>

  </body>

</html>
