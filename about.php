<?php
    include 'components/connect.php';

    session_start();
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
    }else{
        $user_id = '';
    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sapu Fashion Shop</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>  
    <?php include 'components/user_header.php'; ?>
    <section class="about">
        <div class="row">
            <div class="image">
                <img src="images/about-img.svg" alt="">
            </div>
            <div class="content">
                <h3>why choose us?</h3>
                <p>T-Shirt Republic was launched in the year 2019, with the aim of providing Sri Lankans the benefit of accessing export quality garments at a good value price. Staying at the forefront of manufacturing, T-Shirt Republic sells products that are accessible to all, with a focus on both fit and comfort. All garments are manufactured in Sri Lanka at our own production facilities laid out for export production.
                    T-Shirt Republic also collaborates with a variety of other professionals from artists, designers and university interns to create one-off, exclusive capsule collections. We at T-Shirt Republic think it is important to invest in the young generation by providing opportunities for creativity to rise in Sri Lanka.
                    We exercise meticulous attention to detail throughout the manufacturing process to ensure our products meet best quality standards. With an unrivaled choice of colours  and trend-driven tailored shapes, T-Shirt Republic is one of a kind in Sri Lanka.</p>
                <a href="contact.php" class="btn">contact us</a>
            </div>
        </div>
    </section>

    <?php include 'components/footer.php'; ?>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        var swiper = new Swiper(".reviews-slider", {
            loop:true,
            spaceBetween: 20,
            pagination: {
                el: ".swiper-pagination",
                clickable:true,
            },
            breakpoints: {
                0: {
                    slidesPerView:1,
                },
                768: {
                    slidesPerView: 2,
                },
                991: {
                    slidesPerView: 3,
                },
            },
        });
    </script>

</body>
</html>