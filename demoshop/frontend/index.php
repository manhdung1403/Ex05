<!DOCTYPE html>
<html lang="en">
    <?php
    session_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Myshop</title>
    <?php include_once(__DIR__. '/layout/styles.php') ?>
</head>
<body>
    <?php include_once(__DIR__ . '/layout/partials/header.php'); ?>
    
    <main>
             <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            
            <div class="carousel-inner">
           
                <div class="carousel-item active">
                    <img src="../assets/uploads/slider/slider1.webp" class="d-block w-100" alt="Slide 1" style="height: 500px; object-fit: cover;">
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>Example headline.</h1>
                            <p class="opacity-75">Some representative placeholder content for the first slide of the carousel.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
                        </div>
                    </div>
                </div>
                
    
                <div class="carousel-item">
                    <img src="../assets/uploads/slider/slider2.png" class="d-block w-100" alt="Slide 2" style="height: 500px; object-fit: cover;">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Another example headline.</h1>
                            <p>Some representative placeholder content for the second slide of the carousel.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
                        </div>
                    </div>
                </div>
                
  
                <div class="carousel-item">
                    <img src="../assets/uploads/slider/slider2.png" class="d-block w-100" alt="Slide 3" style="height: 500px; object-fit: cover;"> 
                    <svg class="bd-placeholder-img" width="100%" height="500px" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Third slide" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#555" dy=".3em">Third slide</text></svg>
                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h1>One more for good measure.</h1>
                            <p>Some representative placeholder content for the third slide of this carousel.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- Marketing messaging and featurettes -->
        <!-- Wrap the rest of the page in another container to center all the content. -->
        <div class="container marketing">
            <div class="row">
                <div class="col-lg-4">
                    <div class = "icon" >
                        <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                    </div>
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect>
                    </svg>
                    <h2 class="fw-normal">Heading</h2>
                    <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
                    <p><a class="btn btn-secondary" href="#">View details »</a></p>
                </div><!-- /.col-lg-4 -->
                
                <div class="col-lg-4">
                    <div class = "icon" >
                        <i class="fa fa-archive" aria-hidden="true"></i>
                    </div>
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect>
                    </svg>
                    <h2 class="fw-normal">Heading</h2>
                    <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
                    <p><a class="btn btn-secondary" href="#">View details »</a></p>
                </div><!-- /.col-lg-4 -->
                
                <div class="col-lg-4">
                    <div class = "icon" >
                        <i class="fa fa-line-chart" aria-hidden="true"></i>
                    </div>
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect>
                    </svg>
                    <h2 class="fw-normal">Heading</h2>
                    <p>And lastly this, the third column of representative placeholder content.</p>
                    <p><a class="btn btn-secondary" href="#">View details »</a></p>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
        <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php
        include_once('../dbconnect.php');
        $sql = "SELECT id,name,description,price,stock_quantity,image_url FROM products";
        $result =$conn->query($sql);
        $data =[];
        if($result->num_rows > 0){
            while($row = $result->fetch_array(MYSQLI_NUM)){
                $data[]=$row;
            }
            $result->free_result();
        }
        $conn->close();

        foreach($data as $item):
        ?>
        <div class="col">
          <div class="card shadow-sm"> 
              <img src="/demoshop/assets/<?= $item[5] ?>" alt="<?= $item[1] ?>" class="img-fluid" style="height: 225px; object-fit: cover;"> 
            <div class="card-body">
              <h5 class="card-title">Tên: <?= htmlspecialchars($item[1]) ?></h5>
              <p class="card-text">Giá: <?= number_format($item[3], 0, ',', '.') ?> đ</p>
              <p class="card-text">Tồn kho: <?= (int)$item[4] ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="/demoshop/frontend/pages/details.php?id=<?= $item[0] ?>" class="btn btn-sm btn-outline-primary">View</a>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
    </div>
     </div>
    </main>

    <?php include_once(__DIR__ . '/layout/partials/footer.php'); ?>
    <?php include_once(__DIR__ . '/layout/scripts.php'); ?>
</body>
</html>