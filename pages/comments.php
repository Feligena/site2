<h2>Comments</h2>
<hr>
<?php
    $msq = connect();
    $commentid;

    echo '<form action="index.php?page=2" method="post" name="commentform">';
    echo '<select name="commentid" class="col-sm-3 col-md-3 col-lg-3">';
    
    $res = mysqli_query($msq, "SELECT * FROM hotels");

    echo '<option value="0">Select hotel...</option>';
    while($row = mysqli_fetch_array($res, MYSQLI_NUM))
    {
        echo '<option value="'.$row[0].'">'.$row[1].'</option>';
    }
    
    mysqli_free_result($res);
    
    echo '<input type="submit" name="selhotel" value="Select hotel" class="btn btn-xs btn-primary">';
    echo '</select><br>';

    // if(isset($_POST['selhotel'])){

        // $commentid = $_POST['commentid'];

        // $res = mysqli_query($msq, "SELECT * FROM comments WHERE hotelid=".$commentid);

        echo "<textarea name='text' maxlength='1024' plaseholder='Write your comment'></textarea>";
        echo "<input type='submit' id='sendcomment' name='sendcomment' value='Send' class='btn btn-xs btn-primary'>";
    // }

    if(isset($_POST['sendcomment'])){

        $commentid = $_POST['commentid'];
        $text = $_POST['text'];

        echo "<lable>Comment id:".$commentid."</lable><br>";
        echo "<lable>Text".$text."</lable>";

        $ins='INSERT INTO comments (comment, hotelid) 
          values("'.$text.'",'.$commentid.')';

        mysqli_query($msq, $ins);
        $err = mysqli_errno($msq);

        if ($err){
        
            if($err)
            echo "<h3/><span style='color:red;'>Error code:".$err."!</span><h3/>";
    
            return false;
        }

    }
?>