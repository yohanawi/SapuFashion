<?php
include '../components/connect.php';
session_start();
$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
   header('location:admin_login.php');
};
if (isset($_GET['delete'])) {
   $delete_id = $_GET['delete'];
   $delete_review = $conn->prepare("DELETE FROM `review_table` WHERE review_id = ?");
   $delete_review->execute([$delete_review_id]);
   header('location:review.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sapu Fashion Admin Shop</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>

<body>

   <?php include '../components/admin_header.php'; ?>
   <section class="contacts">
      <h1 class="heading">Review</h1>
      <div class="box-container">
         <?php
         $select_review = $conn->prepare("SELECT * FROM `review_table`");
         $select_review->execute();
         if ($select_review->rowCount() > 0) {
            while ($fetch_review = $select_review->fetch(PDO::FETCH_ASSOC)) {
         ?>
               <div class="box">
                  <p> review id : <span><?= $fetch_review['review_id']; ?></span></p>
                  <p> name : <span><?= $fetch_review['user_name']; ?></span></p>
                  <p> rating : <span><?= $fetch_review['user_rating']; ?></span></p>
                  <p> review : <span><?= $fetch_review['user_review']; ?></span></p>
                  <p> datatime : <span><?= $fetch_review['datetime']; ?></span></p>
                  <a href="review.php??delete=<?= $fetch_review['review_id']; ?>" onclick="return confirm('delete this review?');" class="delete-btn">delete</a>
               </div>
         <?php
            }
         } else {
            echo '<p class="empty">you have no review</p>';
         }
         ?>
      </div>
   </section>

   <script src="../js/admin_script.js"></script>

</body>

</html>