<?php

    $error = "";
    $successMessage = "";

    if ($_POST) {

        if (!$_POST["firstName"]) {
            $error .= "A first name is required<br>";
        }

        if (!$_POST["lastName"]) {
            $error .= "A last name is required<br>";
        }

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
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $subject = $_POST['subject'];
            $content = $_POST['content'];
            $headers = "From: ".$_POST['email'];

            if (mail($emailTo, $firstName, $lastName, $subject, $content, $headers)) {

                $successMessage = '<div class="alert alert-success" role="alert">Your message was sent successfully. We\'ll get back to you ASAP!</div>';

            } else {

                $error = '<div class="alert alert-danger" role="alert">Your message couldn\'t be sent - please try again later.</div>';

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
                <label for="firstName">First Name</label>
                <input type="text" name="firstName" class="form-control" id="firstName" placeholder="First Name">
            </div>
            <div class="form-group">
                <label for="lastName">First Name</label>
                <input type="text" name="lastName" class="form-control" id="lastName" placeholder="Last Name">
            </div>
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

    <?php 
    include 'footer.php';
    ?>
        <script type="text/javascript">
    
            $("form").submit(function(e) {

                var error = "";

                if ($("#firstName").val() === "") {
                    error += "A first name is required.<br>";
                }

                if ($("#lastName").val() === "") {
                    error += "A last name is required.<br>";
                }

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