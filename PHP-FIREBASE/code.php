<?php
session_start();
include('dbcon.php');


// delete
if(isset($_POST['delete_btn']))
{
$del_id = $_POST['delete_btn'];


$ref_table = 'DataSong/'.$del_id;
$deleteQuery = $database->getReference($ref_table)->remove();
if($deleteQuery)
{
 $_SESSION['status'] = " Delete Successfully ";
 header('Location: index.php'); 
 exit();
}
else
{
 $_SESSION['status'] = " Delete Fail ";
 header('Location: index.php');
}


}




// edit
if(isset($_POST['update']))
{
    $key = $_POST['key'];
    $name = $_POST['name'];
    $class = $_POST['class'];
  
    $updateData = [
        'name' => $name,
        'class' => $class,
    ];
    
    $ref_table = 'DataSong/'.$key;
    
    $updateQuery = $database->getReference($ref_table)->update($updateData);

    if($updateQuery)
    {
        $_SESSION['status'] = "Update Successfully";
        header('Location: index.php'); 
    }
    else
    {
        $_SESSION['status'] = "Update Fail";
        header('Location: index.php');
    }
}




// add
if(isset($_POST['save'])){

    $name = $_POST['name'];
    $class = $_POST['class'];
    $selected_category = $_POST['category'];

// uplaod file
    if($_FILES['file']['error'] === UPLOAD_ERR_OK && $_FILES['imageSing']['name']){
        $filename = 'Nhac/' . $_FILES['file']['name'];
        $bucket->upload(
            file_get_contents($_FILES['file']['tmp_name']),
            ['name' => $filename]
        );
        
        $urlFile = $bucket->object($filename)->signedUrl(time() + 3600);
        
// upload img
           $fileImg = 'Anh/' . $_FILES['imageSing']['name'];;
  
                $bucket->upload(
                    file_get_contents($_FILES['imageSing']['tmp_name']),
                    ['name' => $fileImg]
                );
    
                $urlImg = $bucket->object($fileImg)->signedUrl(time() + 3600);

  
    $postData = [
        'name' => $name,
        'class' => $class,
        'category' => $selected_category,
        'urlFile' => $urlFile,
        'urlImg' => $urlImg,
    ];
    $ref_table = "DataSong";
    $postRef_result = $database->getReference($ref_table)->push($postData);
 
    if($postRef_result){
        $_SESSION['status'] = "add Successfully";
        header('Location: index.php');
    }
    else
    {
        $_SESSION['status'] = "add fail";
        header('Location: index.php');
    }

} 
}


?>
