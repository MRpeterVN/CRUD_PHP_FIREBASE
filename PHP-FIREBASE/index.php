<?php

session_start();

if(isset($_SESSION['status'])) {
    echo $_SESSION['status'];
   
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <title>Hang Music</title>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <link href=".\asset\style.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>

<body>
    <section id="menu">
        <!-- LOGOO -->
        <div class="logo" id="logo">
            <a href="index.php" target="_self">
                <img ismap src="https://png.pngtree.com/element_our/png/20181022/music-and-live-music-logo-with-neon-light-effect-vector-png_199406.jpg" alt="" />
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
     <!-- navigation -->
    <div class="navigation">
            <div class="n1">
                <i id="menu-btn" class="fas fa-bars"></i>
                <div class="search">
                    <i class="far fa-search"></i>
                    <input type="text" placeholder="search">
                </div>
            </div>
            <div class="profil">
                <i class="far fa-bell"></i>
                <img src="img/img4.jpg" alt="">
            </div>
        </div>

      <!-- end -->

        <h3 class="i-name">
            Dasboard
        </h3>



        <div class="values">
            <div class="val-box">
                <i class="fas fa-users"></i>
                <div>
                    <h3>10</h3>
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



        <?php
     include('dbcon.php');
    $ref_tablde = 'DataSong';
    $data = $database->getReference($ref_tablde)->getValue();  
    $file = $bucket->object('Anh/');
    $url = $file->signedUrl(new \DateTime('tomorrow'));
    $i = 0;
         ?>
    


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
        
    <?php foreach ($data as $key => $row): ?>
        <tr>
        <td><?php echo $i++; ?></td>
            <td class="people">
              <?php echo '<img src="' . $row['urlImg'] . '">'; ?>
    
                    <div class="people-de">
                    <h5><?php echo $row['name']; ?></h5>
                </div>
            </td>
            <td class="people-job">
                <h5><?php echo $row['class']; ?></h5>
            </td>
          
            <td class="role"><?php echo $row['category']; ?></td>
            <td> <?php  echo '<audio controls>';
                         echo '<source src="' . $row['urlFile'] . '" type="audio/mpeg">';
                        echo '</audio>'; ?></td>
          

            <td class="active">
                <p> Hiện</p>
            </td>
            <td style="width: 2%"><a href="edit.php?id=<?=$key?>" class="edit">Edit</a></td>
            <td style =" width: 2%";>
         <form action="code.php" method="Post">
       <button type ="submit" name = "delete_btn" value ="<?=$key?>">Xóa </button>
         </form>
        </td>
        </tr>
        <?php endforeach; ?>
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