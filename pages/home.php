<!DOCTYPE html>
<html>
    <header>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/App.css"/>
    </header>
    <body>
    <?php include 'header.php'; ?>
        <div class="banner">
            <div class="container bannerText">
              <h1>
                Eating Healty<br /> Never Been Easier
              </h1>
              <div class="bannerButton">
                <a href="Register">
                  <button class="btn btn-dark navButton" style="margin: 0;">Get Started</button>
                </a>
                <a href="Menu.php">
                  <button
                    class="navButton menuButton"
                    style="background: rgba(0, 0, 0, 0); padding-left: 40px; padding-right: 40px;"
                  >
                    Menu
                  </button>
                </a>
              </div>
            </div>
            <img src="../image/mainBanner.jpg" alt="Banner" />
          </div>
          
          <div class="whyUs">
            <div class="container">
              <div class="row" style="padding-bottom: 50px;">
                <div class="col-md-12" style="text-align: center; margin: 50px 0;">
                  <h1 style="font-weight: bolder;">Why EasyFit</h1>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                  <h3>Food you can Love</h3>
                  <p>Pick from a variety of healthy and frozen food</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                  <h3>Prepared by Chefs</h3>
                  <p>Cooked and prepared by professional chefs</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                  <h3>Delivered Fresh</h3>
                  <p>Delivery to your door fast</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                  <h3>Meal Plans</h3>
                  <p>A variety of meal plans you can choose from</p>
                </div>
              </div>
            </div>
          </div>
          
          <img src="../image/meat-platter.jpg" width="100%" height="100%" alt="Meal" />
          
          <div class="userInfoContainer" style="margin-bottom: 0;">
            <div class="container" style="padding: 150px 0;">
              <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 bestMeal">
                  <h1 style="font-size: 60px; line-height: 60px; font-weight: bolder;">
                    Why Our <br />
                    meals are <br />
                    the best
                  </h1>
                  <button class="btn btn-dark reciveButton" style="margin-top: 20px;">See Menu</button>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12">
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 bestMealOption">
                      <h4>Quality comes first</h4>
                      <p>We hold ourselves to a high standard of excellence...</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 bestMealOption">
                      <h4>Gluten-free</h4>
                      <p>All of our meals are perfectly portioned...</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 bestMealOption">
                      <h4>Experience eating clean</h4>
                      <p>Our food contains zero preservatives...</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 bestMealOption">
                      <h4>Impossibly delicious</h4>
                      <p>Wholesome, savory comfort food made healthy</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="container" style="margin-top: 100px; margin-bottom: 100px;">
            <div style="padding: 50px; background-color: #f3f3f3;">
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                  <h1 style="font-weight: bold; margin-bottom: 20px;">
                    No shopping. <br />
                    No cooking. <br />
                    No dishes.
                  </h1>
                  <p>Our customers on average save over 4 hours a week...</p>
                  <button class="btn btn-dark reciveButton" style="margin-top: 20px;">See Menu</button>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12"></div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                  <div class="reason">
                    <img src="../image/delivery.png" height="100px" alt="Delivery" />
                    <div style="margin-top: 30px;">
                      <h4>Healthy and delicious</h4>
                      <p>Registered Dietitian directed and chef prepared</p>
                    </div>
                  </div>
                  <div class="reason">
                    <img src="../image/plate.png" height="100px" alt="Plate" />
                    <div style="margin-top: 30px;">
                      <h4>One size doesn't fit all</h4>
                      <p>Rotating menu and customizable plans</p>
                    </div>
                  </div>
                  <div class="reason">
                    <img src="../image/phone.png" height="100px" alt="Phone" />
                    <div style="margin-top: 30px;">
                      <h4>Our customers love us</h4>
                      <p>Thousands of 5-star reviews</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php include 'footer.php'; ?>
    </body>
    </html>