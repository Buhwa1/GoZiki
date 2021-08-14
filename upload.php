<?php
require("database/dbconfig.php");
?>

<?php 

if(isset($_POST["submit"]))
{
    $artist = $_POST["artist"];
    $song_title= $_POST['song_title'];
    $song = $_POST["song"];
    $folder_path = 'song/';

    $filename = $_FILES['song']['name'];
    $newname = $folder_path . $filename;

    $FileType = pathinfo($newname,PATHINFO_EXTENSION);

    if($FileType == "mp3")
    {
        if (move_uploaded_file($_FILES['song']['tmp_name'], $newname))
        {

            $filesql = "INSERT INTO songs (artist,song_title,song) VALUES('$artist','$song_title','$filename')";
            $fileresult = mysqli_query($connection,$filesql);

            if (isset($fileresult))
            {
                echo '<div class="alert alert-success">File Uploaded</div>';
            } else
            {
                echo '<div class="alert alert-danger">Something went Wrong</div>';
            }
        }
        else
        {

            echo '<div class="alert alert-danger">Upload Failed.</div>';
        }


    }
    else
    {
        echo '<div class="alert alert-danger">Songs must be uploaded in mp3 format.</div>';
    }

}

?>
<div class="container">
    

<form action="upload.php" method="post" enctype="multipart/form-data">

            <label>Artist</label>
            <input type="text" name="artist" class="form-control" placeholder="Enter artist name">
            <label> Song title </label>
            <input type="text" name="song_title" class="form-control" placeholder="Enter song name">
            <label> Song file </label>
                <span class="btn btn-default btn-file">
                   <input name="song" type="file">
                </span>
            <br/><br/>
            <input type="submit" name="submit" class="btn btn-success" value="Upload">
        </form>
        </div>


<?php
include("includes/footer.php");
?>
