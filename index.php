<!DOCTYPE html>
<html lang="en">

<?php 

require_once('./session.php'); 
require_once('includes/head.php');

$result = $db->query('SELECT * from categories limit 6');
$categories = [];
  while ($row = $result->fetch_assoc()) {
    $categories[] = $row;
  }

?> 




<body id="page-top">
  <?php require_once('includes/nav.php'); ?> 
  <!-- Masthead -->
  <header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <h1 class="text-uppercase text-white font-weight-bold">Your Easy choice for gift ideas!</h1>
          <hr class="divider my-4">
        </div>
        <div class="col-lg-8 align-self-baseline">
          <p class="text-white-75 font-weight-light mb-5">Free shipping all over the world with purchase over $5m00.</p>
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
        </div>
      </div>
    </div>
  </header>

  <!-- About Section -->
  <section class="page-section bg-primary" id="about">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="text-white mt-0">We've got what you exactly need !</h2>
          <hr class="divider light my-4">
          <p class="text-white-50 mb-4">Our site contains everything you need, search through and find your choice in no time! Make your loved ones happy!</p>
          <a class="btn btn-light btn-xl js-scroll-trigger" href="categories/allproducts.php">Buy Products!</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class="page-section" id="services">
    <div class="container">
      <h2 class="text-center mt-0">At Your Service</h2>
      <hr class="divider my-4">
      <div class="row">
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-gem text-primary mb-4"></i>
            <h3 class="h4 mb-2">Sturdy Products</h3>
            <p class="text-muted mb-0">Our products branded and have warrenties and guaranties</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>
            <h3 class="h4 mb-2">Up to Date</h3>
            <p class="text-muted mb-0">Our products are updated to keep things fresh.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-globe text-primary mb-4"></i>
            <h3 class="h4 mb-2">Ships all over the world</h3>
            <p class="text-muted mb-0">Also country friendly!</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-heart text-primary mb-4"></i>
            <h3 class="h4 mb-2">Made with Love</h3>
            <p class="text-muted mb-0">Is it really a gift galore if it's not made with love?</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Portfolio Section -->
  <section id="portfolio">
    <div class="container-fluid p-0">
      
      <div class="row no-gutters">
        <?php foreach ($categories as $value) { ?>
          <div class="col-lg-4 col-sm-6">
          <a  href="/categories/<?php $value['id'] ?>">
            <img class="img-fluid" src="./admin/uploads/images/<?php print $value['image'] ?>" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                <?php print $value['name'] ?>
              </div>
            </div>
          </a>
        </div>
       <?php } ?>
        
      </div>
    </div>
  </section>

  <!-- Call to Action Section -->
  <section class="page-section bg-dark text-white">
    <div class="container text-center">
      <h2 class="mb-4">Fast and Easy!</h2>
      <a class="btn btn-light btn-xl" href="categories/allproducts.php">Buy Now!</a>
    </div>
  </section>

  <?php include('includes/footer.php'); ?>
  <?php require_once('includes/script.php'); ?>

</body>

</html>
