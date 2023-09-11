<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="./css/style.css" rel="stylesheet">
</head>
<body>
    <?php
    include_once("functions.php");
    
    if(isset($_GET['hotel']))
    {
        $hotel = $_GET['hotel'];

        $msq = connect();

        $sel = 'select * from hotels where id='.$hotel;
        $res = mysqli_query($msq, $sel);
        $row = mysqli_fetch_array($res, MYSQLI_NUM);

        $hname = $row[1];
        $hstars = $row[4];
        $hcost = $row[5];
        $hinfo = $row[6];
        
        mysqli_free_result($res);

        echo '<h2 class="text-uppercase textcenter">'.$hname.'</h2>';
        echo '<div class="row"><div class="col-md-6 textcenter">';

        // connect();

        $sel='select imagepath from images where hotelid='.$hotel;

        $res = mysqli_query($msq, $sel);

        echo '<span class="label label-info">Watch our pictures</span>';
        // echo'<ul id="gallery">';
    ?>
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
            <?php
                // $i = 0;
        
                while($row = mysqli_fetch_array($res, MYSQLI_NUM))
                {
                    $j = 1;
                    if($j == 1){
                        echo '<div class="carousel-item active">';
                        echo '<img src="../'.$row[0].'" class="d-block w-100" alt="picture">';
                        echo '</div>';
                        
                        $j++;
                    }
                    else{
                        echo '<div class="carousel-item">';
                        echo '<img src="../'.$row[0].'" class="d-block w-100" alt="picture">';
                        echo '</div>';
                    }
                }
            
            ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Предыдущий</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Следующий</span>
            </button>
        </div>
    <?php 
        mysqli_free_result($res); 

        echo '</div></div>';

        $sel = 'select * from comments where hotelid='.$hotel;
        $res = mysqli_query($msq, $sel);

        echo '<span class="label label-info">Comments: </span>';
        echo'<ul id="comments-blok">';
        // $i=0;
        while($row = mysqli_fetch_array($res, MYSQLI_NUM))
        {
            echo ' <li><p>'.$row[1].'</p></li>';
        }
        mysqli_free_result($res);
        echo ' </ul>';
    }
    ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>