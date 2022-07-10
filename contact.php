<?php
    include 'components/connect.php';
    session_start();
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
    }else{
        $user_id = '';
    };

    if(isset($_POST['send'])){
        $name = $_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_STRING);
        $number = $_POST['number'];
        $number = filter_var($number, FILTER_SANITIZE_STRING);
        $subject = $_POST['subject'];
        $subject = filter_var($subject, FILTER_SANITIZE_STRING);
        $msg = $_POST['msg'];
        $msg = filter_var($msg, FILTER_SANITIZE_STRING);

        $select_message = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND subject = ? AND message = ?");
        $select_message->execute([$name, $email, $number, $subject, $msg]);

        if($select_message->rowCount() > 0){
            $message[] = 'already sent message!';
        }else{

            $insert_message = $conn->prepare("INSERT INTO `messages`(user_id, name, email, number, subject, message) VALUES(?,?,?,?,?,?)");
            $insert_message->execute([$user_id, $name, $email, $number, $subject, $msg]);

            $message[] = 'sent message successfully!';

        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>contact</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>
<!-- contact section starts  -->
<section class="contact" id="contact">
    <h1 class="heading"> <span>contact</span> us </h1>
    <div class="icons-container">
        <div class="icons">
            <i class="fas fa-map-marker-alt"></i>
            <h3>address</h3>
            <p>137/2, Meerigama Road, Divulapitiya</p>
        </div>
        <div class="icons">
            <i class="fas fa-envelope"></i>
            <h3>email</h3>
            <p>saputext@gmail.com</p>
        </div>
        <div class="icons">
            <i class="fas fa-phone"></i>
            <h3>phone</h3>
            <p>+94 76 025 6656</p>
            <p>+94 70 523 0139</p>
        </div>
    </div>
    <div class="row">
        <form action="" method="POST">
            <h3>get in touch</h3>
            <div class="inputBox">
                <input type="text" name="name" placeholder="your name" required maxlength="20" class="box">
                <input type="email" name="email" placeholder="your email" required maxlength="50" class="box">
            </div>
            <div class="inputBox">
                <input type="number" name="number" min="0" max="9999999999" placeholder="enter your number" required onkeypress="if(this.value.length == 10) return false;" class="box">
                <input type="text" name="subject" placeholder="your subject" class="box">
            </div>
            <textarea name="msg" placeholder="your message" cols="30" rows="10" class="box"></textarea>
            <input type="submit" value="send message" name="send" class="btn">
        </form>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2283.146426885366!2d80.02078967705012!3d7.2247423166488804!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbdb19775896da9ff!2zN8KwMTMnMjkuMSJOIDgwwrAwMScyMi43IkU!5e1!3m2!1sen!2sin!4v1657437780916!5m2!1sen!2sin" width="640" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
</section>

<!-- contact section ends -->
<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>