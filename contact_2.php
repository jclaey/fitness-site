<?php

    $error = "";
    $successMessage = "";

    if ($_POST) {

        if (!$_POST["email"]) {
            $error .= "An email address is required.<br>";
        }

        if (!$_POST["content"]) {
            $error .= "The message field is required.<br>";
        }

        if (!$_POST["subject"]) {
            $error .= "The subject field is required.<br>";
        }

        if ($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
            $error .= "The email address is invalid.<br>";
        }

        if ($error !== "") {
            $error = '<div class="alert alert-danger" role="alert"><p>There were error(s) in your form.</p>' . $error . '</div>';
        } else {

            $emailTo = "jason@claeysdev.com";
            $subject = $_POST['subject'];
            $content = $_POST['content'];
            $headers = "From: ".$_POST['email'];

            if (mail($emailTo, $subject, $content, $headers)) {

                $successMessage = '<div class="alert alert-success" role="alert">Your message was sent successfully. We\'ll get back to you ASAP!</div>';

            } else {

                $error = '<div class="alert alert-danger" role="alert"><p>Your message couldn\'t be sent - please try again later.</div>';

            }

        }
    }

?>

<?php
    include 'header.php';
?>

    <!-- CONTACT FORM -->

    <div class="container">
        <h1>Get In Touch!</h1>
        <div id="error"><? echo $error.$successMessage; ?></div>

        <form method="POST">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter your email address">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" name="subject" class="form-control" id="subject">
            </div>
            <div class="form-group">
                <label for="content">Message</label>
                <textarea name="content" class="form-control" id="content" rows="3"></textarea>
            </div>
            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- FOOTER -->

    <footer id="main-footer" class="p-4">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <p>Follow Us on Social</p>
                </div>
            </div>
            <div class="row">
                <div class="col pb-4 pt-1 social-icons text-center">
                    <a href="#"><i class="text-white fab fa-facebook fa-3x"></i></a>
                    <a href="#"><i class="text-white pl-4 fab fa-instagram fa-3x"></i></a>
                    <a href="#"><i class="text-white pl-4 fab fa-twitter fa-3x"></i></a>
                </div>
            </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col text-center">
              <p>Copyright &copy; <span id="year"></span> Capitalize Fitness</p>
            </div>
          </div>
        </div>
      </footer>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
        </script>
        <script data-search-pseudo-elements></script>
        <script>
            //Get the current year for the copyright
            $('#year').text(new Date().getFullYear());
        </script>
        <script type="text/javascript">
    
            $("form").submit(function (e) {

                var error = "";

                if ($("#email").val() === "") {
                    error += "The email field is required.<br>";
                }

                if ($("#subject").val() === "") {
                    error += "The subject field is required.<br>";
                }

                if ($("#content").val() === "") {
                    error += "The content field is required.";
                }

                if (error !== "") {
                    $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form.</strong></p>' + error + '</div>');

                    return false;

                } else {
                    
                    return true;

                }

            });

        </script>
    
    </body>
</html>