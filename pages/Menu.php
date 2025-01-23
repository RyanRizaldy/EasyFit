<!DOCTYPE html>
<html>
    <header>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/App.css"/>
    </header>
    <body>
    <?php include 'header.php'; ?>
        <div class="m-5">
            <h3 class="fw-normal">
              No Prep, No Cooking.<span class="fw-bolder"> Just Enjoy.</span>
            </h3>
            <p class="fw-bolder ourMenu mt-3">Our menu</p>
          </div>
          <div class=" container-fluid" style="background:#D9D9D9; margin-bottom: 10%;">
            <div class="container">
              <div class="d-flex justify-content-start text-decoration-none py-4 text-black">
                <button
                  class="btn btn-outline-dark"
                  id="allMealButton"
                  onclick="handleOptionChange('all')"
                >
                  All Meal
                </button>
              </div>
            </div>
            <div class="container" >
              <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 cardWrapper">
                  <div class="card">
                    <img
                      src="../image/pancake.jpg"
                      alt="Menu"
                      class="card-img-top"
                    />
                    <div class="card-body">
                      <h6 class="card-title">pancake</h6>
                      <div class="mt-4 text-center">
                        <div>
                          <button
                            class="btn btn-dark rounded-4 mt-3 px-3 border-0"
                            onclick="handleOrder('[Menu ID]')"
                          >
                            + Add
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Tambahkan kolom menu tambahan di sini jika diperlukan -->
              </div>
            </div>
          </div>
          <?php include 'footer.php'; ?>
    </body>
</html>