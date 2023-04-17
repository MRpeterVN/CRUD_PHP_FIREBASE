<h1>Edit</h1>

<?php
include('dbcon.php');

if(isset($_GET['id'])) // you missed to quote the key 'id' with single quotes
{
    $key_child = $_GET['id'];
    $ref_table = 'DataSong';
    $getdata = $database->getReference($ref_table)->getChild($key_child)->getValue(); 

    if($getdata != null) // check if the data exists
    {
        ?>
        <form action="code.php" method="POST">
            <input type="hidden" name="key" value="<?=$key_child;?>">
            <div class="row">
                <div class="col">
                    <label for="Name"></label>
                    <input type="text" class="form-control" placeholder="name" name="name" value="<?=$getdata['name'];?>">
                </div>
                <div class="col">
                    <label for="Class"></label>
                    <input type="text" class="form-control" placeholder="class" name="class" value="<?=$getdata['class'];?>">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                </div>
            </div>
        </form>
        <?php
    }
    else
    {
        $_SESSION['status'] = "Not found";
        header('Location: index.php');
        exit();
    }
}
else
{
    $_SESSION['status'] = "Fail";
    header('Location: index.php');
    exit();
}
?>
