<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head><title>Simple Captcha</title></head>
<body>
<form method="post">
    <p><img src="captcha.php"></p>      <!--Captcha generated will show here-->
    <p>Enter Captcha: <input type="text" name="captcha_input"></p>
    <input type="submit" name="check" value="Verify">
</form>

<?php
if (isset($_POST['check'])) {
    if ($_POST['captcha_input'] == $_SESSION['captcha']) {  //captcha verify with stored on session
        echo "<p style='color:green'>✅ Correct Captcha</p>";
    } else {
        echo "<p style='color:red'>❌ Wrong Captcha</p>";
    }
}
?>
</body>
</html>
