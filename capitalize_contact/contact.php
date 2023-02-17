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

            $emailTo = "ackermarshall@live.com";
            $subject = $_POST['subject'];
            $content = $_POST['content'];
            $headers = "From: ".$_POST['email'];
            $captcha = check_input($_POST['captcha']);

            if (mail($emailTo, $subject, $content, $headers)) {

                $successMessage = '<div class="alert alert-success" role="alert">Your message was sent successfully. We\'ll get back to you ASAP!</div>';

            } else {

                $error = '<div class="alert alert-danger" role="alert"><p>Your message couldn\'t be sent - please try again later.</div>';

            }

        }
    }
    
    $public_key = "6LcvUZEUAAAAACvvDRko6BodeD2TkErKal6JaA5p";
    $private_key = "6LcvUZEUAAAAADPXMpKoA0FlLWHqS1VC0rNs3mxR";
    $url = "https://www.google.com/recaptcha/api/siteverify";
    
    if(array_key_exists('submit', $_POST)) {
        //echo "<pre>";print_r($_POST);echo"</pre>";
        $response_key = $_POST['g-recaptcha-response'];
        $response = file_get_contents($url.'?secret='.$private_key.'&response='.$response_key.'&remoteip='.$_SERVER['REMOTE_ADDR']);
        $response = json_decode($response);
        //echo "<pre>";print_r($response);echo"</pre>";
        
        if($response -> success == 1) {
            echo '<div><p>Success! You are not a robot.</p></div>';
        } else {
            echo '<div><p>Captcha failed. Try again.</p></div>';
        }
    }
    
?>

<?php
    include 'header.php';
?>

    <section id="trainingOptions">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 style="margin-top:1em; color:#f1f2f6;">Contact Marshall</h2>
                <h5 class="text-center" style="padding-top:0; line-height: 1.7rem; color:#f1f2f6;">Trainer Marshall Shepard offers a variety of training disciplines. Your training plan is completely customized to you. Specify what you're looking for or let him use his trainer magic to come up with the perfect plan for you. Contact him below to let him know you're interested and to get your free consultation!</h5>
                <div id="tagcloud01" class="text-center">
                    <ul style="list-style-type: none; color: #fff;">
                        <li class="p-tag">Body Building</li>
                        <li class="p-tag">Cardio</li>
                        <li>Personal <br>Training</li>
                        <li class="p-tag">Core</li>
                        <li>Strength and <br>Conditioning</li>
                        <li class="p-tag">Resistance</li>
                        <li class="p-tag">High Intensity</li>
                        <li class="p-tag">Bootcamps</li>
                        <li class="p-tag">Kettlebell</li>
                        <li class="p-tag">Endurance</li>
                        <li class="p-tag">Youth Training</li>
                        <li class="p-tag">Senior Fitness</li>
                        <li class="p-tag">Circuit Training</li>
                        <li class="p-tag">Group Sessions</li>
                        <li>Athletic <br>Performance</li>
                        <li class="p-tag">Other</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- CONTACT FORM -->

    <div class="container my-5 pb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card p-4" style="color:#fff; background-color: #1a1a1a;">
                    <div class="card-body">
                        <h3>Get In Touch</h3>
                        <p>Contact Marshall using the form or give him a call today!</p>
                        <h4>Phone</h4>
                        <p>(903) 245-0801</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="container pt-5" id="contact-form">
                    <div id="error"><? echo $error.$successMessage; ?></div>
            
                    <form method="POST">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter your email address">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" name="subject" class="form-control" id="subject" placeholder="Enter subject">
                        </div>
                        <div class="form-group">
                            <label for="content">Message</label>
                            <textarea name="content" class="form-control" id="content" rows="3" placeholder="Tell us which services you're interested in..."></textarea>
                        </div>
                        <div class="g-recaptcha" <?php $public_key ?>></div>
                        <input type="submit" id="submit" value="Submit" class="btn btn-outline-danger btn-block mb-5">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php 
    include 'footer.php';
    ?>
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