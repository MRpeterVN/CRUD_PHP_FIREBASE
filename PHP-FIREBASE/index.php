
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <title>Hang Music</title>
    <link rel="icon" type="image/x-icon" href="https://image-us.24h.com.vn/upload/1-2018/images/2018-01-22/1516593555-411-thumbnail.jpg">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <link href=".\asset\style.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>

<body>
    <section id="menu">
        <!-- LOGOO -->
        <div class="logo" id="logo">
            <a href="index.php" target="_self">
                <img ismap src="https://image-us.24h.com.vn/upload/1-2018/images/2018-01-22/1516593555-411-thumbnail.jpg" alt="" />
            </a>
            <h3>HANG MUSIC</h3>
        </div>
        <!-- END LOGO -->

        <!-- ITEMS -->
        <div class="items">
            <li><i class="fad fa-chart-pie-alt"></i> <a href="index.php">Dasboard</a></li>
            <li> <i class="fab fa-uikit"></i><a href="add.php">Upload</a></li>
        </div>
        <!-- END ITEMS -->
    </section>
 
    <section id="interface">

    <div class="navigation" style="z-index: 100;";>
            <div class="n1">
                <i id="menu-btn" class="fas fa-bars"></i>
                <div class="search">
                    <i class="far fa-search"></i>
                    <input type="text" placeholder="search">
                </div>
            </div>
            <div class="profil">
                <i class="far fa-bell"></i>
                <img src="https://th.bing.com/th/id/R.0c86caa79bcecba8da8b8c0f51bec4a4?rik=tqBlDVm1hzuTqg&pid=ImgRaw&r=0" alt="">
            </div>
        </div>

      <!-- end -->

        <h3 class="i-name">
            Dasboard
        </h3>
        <?php
     include('dbcon.php');
    $ref_tablde = 'DataSong';
    $data = $database->getReference($ref_tablde)->getValue();  
    $file = $bucket->object('test');
    $url = $file->signedUrl(new \DateTime('+3 year'));


    // count
    $database = $factory->createDatabase();
    $SingRef = $database->getReference('DataSong');
    $snapshot = $SingRef->getSnapshot();
    $count = $snapshot->numChildren();
   
    

  
    $i = 0;
         ?>


        <div class="values">
            <div class="val-box">
                <i class="fas fa-users"></i>
                <div>
                    <h3><?php echo $count; ?> </h3>
                    <span>Bài hát</span>
                </div>
            </div>
            <div class="val-box">
                <i class="fas fa-users"></i>
                <div>
                    <h3>2</h3>
                    <span>Thể loại</span>
                </div>
            </div>
            <div class="val-box">
                <i class="fas fa-users"></i>
                <div>
                    <h3>12</h3>
                    <span>Ca sĩ</span>
                </div>
            </div>
            <div class="val-box">
                <i class="fas fa-users"></i>
                <div>
                    <h3>1000000</h3>
                    <span>Tài Khoản</span>
                </div>
            </div>
        </div>
        <div class="board">
        </div>



     
    

    <div id="content_ss"></script>
    <?php
 session_start();
 if(isset($_SESSION['status'])) {
    echo $_SESSION['status'];
   
}
 ?></div>

<script>
    // Ẩn nội dung sau 5s
    setTimeout(function() {
        document.getElementById('content_ss').style.display = 'none';
    }, 3000); // 5000ms = 5s
</script>

<div class="board">
<table width="100%">
    <thead>
        <tr>
          <td></td>
            <td>Tên Bài Hát</td>
            <td>Ca Sĩ</td>
            <td>Thể Loại</td>
            <td style="text-align: center;">File</td>
            <td >Trạng Thái</td>
            <td></td>
            
        </tr>
    </thead>
    <tbody>
  <?php if (empty($data)): ?>
    <p>Không có dữ liệu</p>
<?php else: ?>
    <?php foreach ($data as $key => $row): ?>
        <!-- Các lệnh để hiển thị dữ liệu -->

        <tr>
        <td><?php echo $i++; ?></td>
            <td class="people">
              <?php 
              $url = $row['urlImg'];

              if (strpos($url, 'gs://laravel-test-625e8.appspot.com') !== false) {
                $url = $file->signedUrl(new \DateTime('+3 year'));
           }
           
             echo '<img src="' . $url . '">';
               ?>
    
                    <div class="people-de">
                    <h5><?php echo $row['song_name']; ?></h5>
                </div>
            </td>
            <td class="people-job">
                <h5><?php echo $row['singer_name']; ?></h5>
            </td>
          
            <td class="role"><?php echo $row['category']; ?></td>

            
            <td style ="z-index: -11;" > <?php  echo '<audio controls>';
                         echo '<source src="' . $row['urlFile'] . '" type="audio/mpeg">';
                        echo '</audio>'; ?></td>
          

            <td class="active">
                <p><?php echo $row['ngaydang']; ?></p>
            </td>
            <td style="width: 2%"><a href="edit.php?id=<?=$key?>" class="edit">Edit</a></td>
            <td style =" width: 2%";>
         <form action="code.php" method="Post">
       <button type ="submit" name = "delete_btn" value ="<?=$key?>">Xóa </button>
         </form>
        </td>
        </tr>
    <?php endforeach; ?>
<?php endif; ?>
    </tbody>
</table>
</div>




    </section>




    <script>
    $('#menu-btn').click(function() {
        $('#menu').toggleClass("active");
    });
    </script>

</body>

</html>