<?php
   include 'components/connect.php';
   session_start();
   if(isset($_SESSION['user_id'])){
      $user_id = $_SESSION['user_id'];
   }else{
      $user_id = '';
   };
   include 'components/wishlist_cart.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>quick view</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>  
   <?php include 'components/user_header.php'; ?>
   <section class="quick-view">
      <h1 class="heading">quick view</h1>
      <?php
         $pid = $_GET['pid'];
         $select_products = $conn->prepare("SELECT * FROM `products` WHERE id = ?"); 
         $select_products->execute([$pid]);
         if($select_products->rowCount() > 0){
            while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box">
         <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
         <div class="row">
            <div class="image-container">
               <div class="main-image">
                  <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
               </div>
               <div class="sub-image">
                  <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
                  <img src="uploaded_img/<?= $fetch_product['image_02']; ?>" alt="">
               </div>
            </div>
            <div class="content">
               <div class="name"><?= $fetch_product['name']; ?></div>
               <div class="flex">
                  <div class="price"><span>Rs.</span><?= $fetch_product['price']; ?><span>/-</span></div>
                  <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
               </div>
               <div class="details"><?= $fetch_product['details']; ?></div>
               <div class="size_btn">
                  <a href="#" id="popup_btn"> Size Chart</a>
                  <div id="pop_Modal" class="modal">
                     <div class="modal-content animate">
                        <span class="close">&times;</span>
                        <img src="images/about-img.svg" class="popup_img">
                     </div>
                  </div>
                  <div class="sizes">
                     <p>Size: </p>
                     <form action="" method="post">
                        <select name="sizes" class="select">
                           <option value="select size">select size</option>
                           <option value="XS">XS</option>
                           <option value="XS">S</option>
                           <option value="XS">M</option>
                           <option value="XS">L</option>
                           <option value="XS">XL</option>
                           <option value="XS">XXL</option>
                        </select>
                  </form>
                  </div>
               </div>
               <div class="flex-btn">
                  <input type="submit" value="add to cart" class="btn" name="add_to_cart">
                  <input class="option-btn" type="submit" name="add_to_wishlist" value="add to wishlist">
               </div>
            </div>
         </div>
      </form>
      <?php
         }
         }else{
            echo '<p class="empty">no products added yet!</p>';
         }
      ?>
   </section>
   <section>
      <div class="hero">
         <div class="button-box">
            <button id="btn1" onclick="openDescription()">Description</button>
            <button id="btn2" onclick="openSpecification()">Specification</button>
            <button id="btn3" onclick="openReviews()">Reviews</button>
         </div>
         <div class="btncontent" id="btncontent1">
            <h3>HTML</h3>
            <p>Made with comfortable high-quality materials, fine durable stitches and export-ready production standards to give you the best value and comfort. Our modern-fit is a shape which falls between regular and slim fit. Relaxed on shoulders and neck, slightly slimmer yet comfortable on the body. A precise tailor-made fit to suit all body types.
               Warranty
               This product is eligible for a satisfaction money-back guarantee or exchange of sizes if required. Please read our Return & Exchange Policy for more information.  
               Payments & Delivery
               We accept all major credit & debit cards, cash on delivery payments.
               The delivery fee is only Rs.240/- flat-rate to any location and for any number of items you order. Deliveries will usually take 1-3 working days within Colombo and suburbs. 3-5 working days outstation.
               We highly recommend using a Credit or Debit card as the payment method to avoid possible contact and for faster delivery arrangements during the Covid-19 pandemic restrictions. Deliveries are handled by third-party courier services. Delivery times mentioned may vary according to the scheduling of deliveries by the courier services.</p>
         </div>
         <div class="btncontent" id="btncontent2">
         <h3>CSS</h3>
            <p>
               Dimensions	40 × 32 × 1 cm
               Size	
               XS, S, M, L, XL, XXL</p>
         </div>
         <div class="btncontent" id="btncontent3">
         <h3>JAVA</h3>
            <p>Made with comfortable high-quality materials, fine durable stitches and export-ready production standards to give you the best value and comfort. Our modern-fit is a shape which falls between regular and slim fit. Relaxed on shoulders and neck, slightly slimmer yet comfortable on the body. A precise tailor-made fit to suit all body types.
               Warranty
               This product is eligible for a satisfaction money-back guarantee or exchange of sizes if required. Please read our Return & Exchange Policy for more information.  
               Payments & Delivery
               We accept all major credit & debit cards, cash on delivery payments.
               The delivery fee is only Rs.240/- flat-rate to any location and for any number of items you order. Deliveries will usually take 1-3 working days within Colombo and suburbs. 3-5 working days outstation.
               We highly recommend using a Credit or Debit card as the payment method to avoid possible contact and for faster delivery arrangements during the Covid-19 pandemic restrictions. Deliveries are handled by third-party courier services. Delivery times mentioned may vary according to the scheduling of deliveries by the courier services.</p>
         </div>
      </div>
      
   </section>
   <?php include 'components/footer.php'; ?>
   <script src="js/script.js"></script>
   <script>
      // Get the modal
      var modal = document.getElementById("pop_Modal");
      // Get the button that opens the modal
      var btn = document.getElementById("popup_btn");
      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];
      // When the user clicks the button, open the modal 
      btn.onclick = function() {
         modal.style.display = "block";
      }
      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
      modal.style.display = "none";
      }
      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
         if (event.target == modal) {
            modal.style.display = "none";
         }
      }


      //tabs 
      var btncontent1 = document.getElementById("btncontent1");
      var btncontent2 = document.getElementById("btncontent2");
      var btncontent3 = document.getElementById("btncontent3");
      var btn1 = document.getElementById("btn1");
      var btn2 = document.getElementById("btn2");
      var btn3 = document.getElementById("btn3");

      function openDescription(){
         btncontent1.style.transform = "translateX(0)";
         btncontent2.style.transform = "translateX(250%)";
         btncontent3.style.transform = "translateX(250%)";
         btn1.style.color = "#ff7846";
         btn2.style.color = "#000";
         btn3.style.color = "#000";
         btncontent1.style.transitionDelay = "0.3s";
         btncontent2.style.transitionDelay = "0s";
         btncontent3.style.transitionDelay = "0s";
      }
      function openSpecification(){
         btncontent1.style.transform = "translateX(100%)";
         btncontent2.style.transform = "translateX(0)";
         btncontent3.style.transform = "translateX(100%)";
         btn2.style.color = "#ff7846";
         btn1.style.color = "#000";
         btn3.style.color = "#000";
         btncontent1.style.transitionDelay = "0s";
         btncontent2.style.transitionDelay = "0.3s";
         btncontent3.style.transitionDelay = "0s";
      }
      function openReviews(){
         btncontent1.style.transform = "translateX(100%)";
         btncontent2.style.transform = "translateX(250%)";
         btncontent3.style.transform = "translateX(0)";
         btn3.style.color = "#ff7846";
         btn2.style.color = "#000";
         btn1.style.color = "#000";
         btncontent1.style.transitionDelay = "0s";
         btncontent2.style.transitionDelay = "0s";
         btncontent3.style.transitionDelay = "0.3s";
      }
   </script>
    
</body>
</html>