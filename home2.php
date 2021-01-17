<?php
include 'config.php';
?>



<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="fontawesome/js/all.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="fontawesome/css/all.css">
<!--    <link rel="stylesheet" href="css/home.css"> -->
</head>

<body class="body">
    <header>
        <nav class="navbar navbar-expand-sm header-top">
            <a class="navbar-brand logo" href="home.php">
                    Trần Nhật Duật
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
            </div>
            <div class="narr">
                <ul class="nav justify-content-end">
                    <?php
                    session_start();
                    if (!isset($_SESSION['username'])) {
                    ?>
                        <li class="nav-item">
                            <a type="button" class="nav-link active " href="#" data-toggle="modal" data-target="#sign-up">
                                Đăng ký theo dõi
                            </a>
                            
                        </li>
                        
                        <?php
                    } else {
                        $a = $_SESSION['username'];
                        $us = mysqli_query($conn, "SELECT * FROM users WHERE email = '$a'");
                        $uss = mysqli_fetch_all($us);
                        foreach ($uss as $u) {
                        ?>
                            <li class="users">
                                <a class="nav-link active" href=""><i class="fa fa-user"></i>&nbsp;<?php echo $u[15] ?></a>
                            </li>
                            <?php
                            if ($u[6] >= 1) {
                            ?>
                                
                            <?php
                            } ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="logout.php">Logout</a>
                            </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-light header-bottom">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="home.php">Trang chủ<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Giới thiệu</a>
                    </li>
                  
                    
                   
                    <li class="nav-item">
                        <a class="nav-link" href="#">Liên hệ</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </header>
    <div class="contain" style="width: 100%;">
        









        <!--modal sign up -->
        <div class="modal fade" id="sign-up" tabindex="-2" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="overflow: auto;">
            <form action="modal-sign-up1.php" method="post">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Sign Up</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationDefault01">Name</label>
                                    <input type="text" name="name" class="form-control" id="validationDefault01" placeholder="..." required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationDefault02">Sđt</label>
                                    <input type="text" name="sdt" class="form-control" id="validationDefault02" placeholder="..." required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationDefault02">Email</label>
                                    <input type="email" name="email" class="form-control" id="validationDefault02" placeholder="..." required>
                                </div>
                            </div>
                            
                            
                            
                            <div class="dropdown-divider"></div>
                            <button type="submit" class="btn btn-primary">Sign up</button>
                            <div class="dropdown-divider"></div>
                            <a type="button" class="dropdown-item" href="#" data-dismiss="modal" data-toggle="modal" data-target="#login">
                                Have you around ? Sign In
                            </a>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>









        <!-- Modal login -->
        <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <form action="login.php" method="post">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleDropdownFormEmail1">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Email..." required>
                            </div>
                            <div class="form-group">
                                <label for="exampleDropdownFormPassword1">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password..." required>
                            </div>
                            <!-- <div class="form-check">
                            <input type="checkbox" class="form-check-input">
                            <label class="form-check-label" for="dropdownCheck">
                                Remember me
                            </label>
                        </div> -->
                            <button type="submit" class="btn btn-primary" name="sign-in">Sign in</button>
                            <div class="dropdown-divider"></div>
                            <a type="button" class="dropdown-item" href="#" data-dismiss="modal" data-toggle="modal" data-target="#sign-up">
                                New around here? Sign Up
                            </a>

                            <a class="dropdown-item" href="#">Forgot password?</a>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>




        <br>
        <br>
        <br>



        <div class="profile-page">
  <div class="wrapper">
    <div class="page-header page-header-small" filter-color="green">
      
      <div class="container">
        <div class="content-center">
          <div class="cc-profile-image"> <a href="#"><img src="images/1.jpg" alt="Image"/></a></div>
          <div class="h2 title">Trần Nhật Duật</div>
          <p class="category text-black">Sinh Viên Ngành CNTT</p><a class="btn btn-primary" href="#" data-aos="zoom-in" data-aos-anchor="data-aos-anchor">Download CV</a>
        </div>
      </div>
      
    </div>
  </div>
</div>







<br>




        <div class="section" id="about">
  <div class="container">
    <div class="card" data-aos="fade-up" data-aos-offset="10">
      <div class="row">
        <div class="col-lg-6 col-md-12">
          <div class="card-body">
            <div class="h4 mt-0 title">Giới Thiệu</div>
            <p>Xin Chào! Mình tên là Duật. Hiện tại mình đang theo học nghành <b>Công Nghệ Thông Tin </b>.</p>
            <p style="text-align: justify;">Hiểu một cách đơn giản, Công nghệ thông tin là ngành sử dụng máy tính và phần mềm máy tính để chuyển đổi, lưu trữ, bảo vệ, xử lý, truyền và thu thập thông tin. Người làm việc trong trong ngành này thường được gọi là IT (Information Technology).. <a href="https://vi.wikipedia.org/wiki/C%C3%B4ng_ngh%E1%BB%87_th%C3%B4ng_tin" target="_blank">Tìm hiểu thêm</a></p>
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="card-body">
            <div class="h4 mt-0 title">Thông Tin Cơ Bản</div>
            <div class="row">
              <div class="col-sm-4"><strong class="text-uppercase">Age:</strong></div>
              <div class="col-sm-8">20</div>
            </div>
            <div class="row mt-3">
              <div class="col-sm-4"><strong class="text-uppercase">Email:</strong></div>
              <div class="col-sm-8">1851061357@e.tlu.edu.vn</div>
            </div>
            <div class="row mt-3">
              <div class="col-sm-4"><strong class="text-uppercase">Phone:</strong></div>
              <div class="col-sm-8">0866546300</div>
            </div>
            <div class="row mt-3">
              <div class="col-sm-4"><strong class="text-uppercase">Address:</strong></div>
              <div class="col-sm-8">Sa Hạ, Hoàng Nam, Nghĩa Hưng, Nam Định</div>
            </div>
            <div class="row mt-3">
              <div class="col-sm-4"><strong class="text-uppercase">Language:</strong></div>
              <div class="col-sm-8">Vietnamese, English</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




<br>
<br>

<!-- Kỹ năng chuyên nghiệp -->



<div>
<?php 
        // PHẦN XỬ LÝ PHP
        // BƯỚC 1: KẾT NỐI CSDL
        
        $conn = mysqli_connect('localhost', 'root','', 'btl2');
 
        // BƯỚC 2: TÌM TỔNG SỐ RECORDS
        $result = mysqli_query($conn, 'select count(idskin) as total from skin');
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
 
        // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 5;
 
        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_records / $limit);
 
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
 
        // Tìm Start
        $start = ($current_page - 1) * $limit;
 
        // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
        // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
        //$result = mysqli_query($conn, "SELECT * FROM users LIMIT $start, $limit");
 
        ?>

   
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">KỸ NĂNG CHUYÊN MÔN</h2>
                        
                    </div>
                    


                    
                    


                    
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM skin";
                    if($result = mysqli_query($conn, "SELECT * FROM skin LIMIT $start, $limit")){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        
                                        echo "<th>Tên kỹ năng</th>";
                                        echo "<th>Nội dung</th>";
                                        echo "<th>Độ hiểu biết(%)</th>";
                                        
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while ($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>";
                                       
                                        echo "<td>" . $row['nameskin'] . "</td>";
                                        echo "<td>" . $row['noidung'] . "</td>";
                                        echo "<td>" . $row['phantram'] . "</td>";
                                        
                                        
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            
                        } 
                        
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }





                    
 
                    // Close connection
                    mysqli_close($conn);
                    ?>
                </div>
                <div class="pagination">
           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<a href="home2.php?page='.($current_page-1).'">Prev</a> | ';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="home2.php?page='.$i.'">'.$i.'</a> | ';
                }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="home2.php?page='.($current_page+1).'">Next</a> | ';
            }
           ?>
        </div>
            </div>        
        </div>
    </div>



</div>





<br>
<br>
<br>



<!-- giáo dục -->


<div>

<?php 
        // PHẦN XỬ LÝ PHP
        // BƯỚC 1: KẾT NỐI CSDL
        
        $conn = mysqli_connect('localhost', 'root','', 'btl2');
 
        // BƯỚC 2: TÌM TỔNG SỐ RECORDS
        $result = mysqli_query($conn, 'select count(idedu) as total from edu');
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
 
        // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 5;
 
        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_records / $limit);
 
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
 
        // Tìm Start
        $start = ($current_page - 1) * $limit;
 
        // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
        // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
        //$result = mysqli_query($conn, "SELECT * FROM users LIMIT $start, $limit");
 
        ?>

   
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">GIÁO DỤC</h2>
                        
                    </div>
                    


                    


                    
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM skin";
                    if($result = mysqli_query($conn, "SELECT * FROM edu LIMIT $start, $limit")){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        
                                        echo "<th>Tên</th>";
                                        echo "<th>Bắt đầu</th>";
                                        echo "<th>Kết thúc</th>";
                                        echo "<th>Nội dung</th>";
                                        

                                        
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while ($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>";
                                        
                                        echo "<td>" . $row['nameedu'] . "</td>";
                                        echo "<td>" . $row['timestart'] . "</td>";
                                        echo "<td>" . $row['timeend'] . "</td>";
                                        echo "<td>" . $row['noidungedu'] . "</td>";

                                        
                                        
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            
                        } 
                        
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }





                    
 
                    // Close connection
                    mysqli_close($conn);
                    ?>
                </div>
                <div class="pagination">
           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<a href="home2.php?page='.($current_page-1).'">Prev</a> | ';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="home2.php?page='.$i.'">'.$i.'</a> | ';
                }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="home2.php?page='.($current_page+1).'">Next</a> | ';
            }
           ?>
        </div>
            </div>        
        </div>
    </div>



</div>







 <br>
 <br>
 <br>











<!-- sở thích -->



<div>

<?php 
        // PHẦN XỬ LÝ PHP
        // BƯỚC 1: KẾT NỐI CSDL
        
        $conn = mysqli_connect('localhost', 'root','', 'btl2');
 
        // BƯỚC 2: TÌM TỔNG SỐ RECORDS
        $result = mysqli_query($conn, 'select count(idst) as total from st');
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
 
        // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 4;
 
        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_records / $limit);
 
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
 
        // Tìm Start
        $start = ($current_page - 1) * $limit;
 
        // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
        // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
        //$result = mysqli_query($conn, "SELECT * FROM users LIMIT $start, $limit");
 
        ?>

   
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Quản lý sở thích</h2>
                        
                    </div>
                    


                    <br>
                    <br>
                    <br>
                    


                    
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM st";
                    if($result = mysqli_query($conn, "SELECT * FROM st LIMIT $start, $limit")){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        
                                        echo "<th>Tên</th>";
                                        echo "<th>Nội dung</th>";
                                       
                                        
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while ($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>";
                                        
                                        echo "<td>" . $row['namest'] . "</td>";
                                        echo "<td>" . $row['noidungst'] . "</td>";
                                        
                                        
                                        
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            
                        } 
                        
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }





                    
 
                    // Close connection
                    mysqli_close($conn);
                    ?>
                </div>
                <div class="pagination">
           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<a href="home2.php?page='.($current_page-1).'">Prev</a> | ';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="home2.php?page='.$i.'">'.$i.'</a> | ';
                }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="home2.php?page='.($current_page+1).'">Next</a> | ';
            }
           ?>
        </div>
            </div>        
        </div>
    </div>


</div>









<br>
<br>
<br>







<!-- liên hệ -->





<br>
<br>
<br>












<!-- đăng ký theo dõi -->




                            <a type="button" class="nav-link active " href="#" data-toggle="modal" data-target="#login">
                                Login
                            </a>



        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>