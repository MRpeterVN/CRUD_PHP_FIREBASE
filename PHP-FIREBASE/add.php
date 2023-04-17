<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Bài Hát</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'><link rel="stylesheet" href=".\asset\style_up.css">
    <link href=".\asset\style.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>
<body>
    <section id="menu">
        <!-- LOGOO -->
        <div class="logo" id="logo">
            <a href="index.php" target="_self"> 
                <img ismap src="img/iconlogodialog.png" alt=""/> 
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



    <section>
    <form method="POST" action="code.php" enctype="multipart/form-data">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label">Upload Bài Hát</label>
                  <div class="preview-zone hidden">
                    <div class="box box-solid">
                      <div class="box-header with-border">
                        <div><b>Xem Trước</b></div>
                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-danger btn-xs remove-preview">
                            <i class="fa fa-times"></i> Reset This Form
                          </button>
                        </div>
                      </div>
                      <div class="box-body"></div>
                    </div>
                  </div>
                  <div style="display: flex; padding-bottom: 20px;">
                    <div>
                       <label for="Name">Tên Bài Hát</label>
                       <input type="text"  placeholder="ten bai hat" name="name">
                      </div>
                      <div>
                        <label for="Class">Ca Sĩ</label>
                        <input type="text" placeholder="ten ca si" name="class" >
                        
                      </div>  
                    
                      <div>
                        <label for="">Thể Loại</label>
                        <select name="category" id="song-select">
                            <option value="">--Please choose an option--</option>
                            <option value="pop">Pop</option>
                            <option value="rock">Rock</option>
                            <option value="edm">EDM</option>
                            <option value="dongque">Đồng Quê</option>
                            <option value="acoustic">Acoustic</option>
                            <option value="khác">Khác</option>
                        </select>
                      </div>    
                  </div>
                  <div style=" padding-bottom: 50px;">
                        <label for="Class">Ảnh Ca Sĩ</label>
                   
                        <input  type="file" name="imageSing"  accept="image/*" require  >
                      </div> 
                      <h5>Chọn Nhạc</h5>
                  <div class="dropzone-wrapper">
               
                    <div class="dropzone-desc">
                      <i class="glyphicon glyphicon-download-alt"></i>
                      <p>Chọn file nhạc</p>
                    </div>
                    <input  type="file" name="file" ac class="dropzone" accept="audio/mpeg,audio/wav" require  >
                  </div>
                </div>
              </div>
            </div>
      
            <div class="row">
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary pull-right"  name="save">Tải Lên</button>
              </div>
            </div>
          </div>
        </form>
      </section>
      
      <script src=".\asset\script.js"></script>
      <!-- partial -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script><script  src=".\asset\script.js"></script>
      

      
    </section>




<script>
    $('#menu-btn').click(function() {
        $('#menu').toggleClass("active");
    });
</script>    
    
</body>
</html>