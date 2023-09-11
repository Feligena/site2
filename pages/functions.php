<?php
    function connect($host='localhost', $user='', $pass='', $dbname='')
    {
        $link=mysqli_connect($host,$user,$pass,$dbname) or die('connection error');
        // mysqli_select_db($dbname) or die('DB open error');
        mysqli_query($link, "set names 'utf8'");
        return $link;
    }
    
    function register($name, $pass, $email)
    {
        $name = trim(htmlspecialchars($name));
        $pass = trim(htmlspecialchars($pass));
        $email = trim(htmlspecialchars($email));

        if($name =='' || $pass =='' || $email ==''){
            echo "<h3/><span style='color:red;'>Fill All Required Fields!</span><h3/>";
            return false;
        }

        if(strlen($name) < 3 || strlen($name) > 30 || strlen($pass) < 3 || strlen($pass) > 30){
            echo "<h3/><span style='color:red;'>Values Length Must Be Between 3 And 30!</span><h3/>";
            return false;
        }

        $ins='INSERT INTO users (login_user, pass, email, roleid) 
              values("'.$name.'","'.md5($pass).'","'.$email.'",2)';

        mysqli_query(connect(), $ins);
        $err = mysqli_errno(connect());

        if ($err){
            
            if($err == 1062)
            echo "<h3/><span style='color:red;'>This Login Is Already Taken!</span><h3/>";
        
            else
            echo "<h3/><span style='color:red;'>Error code:".$err."!</span><h3/>";
        
            return false;
        }
        
        return true;
    }

    function login($name, $pass)
    {
        $name = trim(htmlspecialchars($name));
        $pass = trim(htmlspecialchars($pass));
        
        if ($name == "" || $pass == "")
        {
            echo "<h3/><span style='color:red;'>Fill All Required Fields!</span><h3/>";
            return false;
        }
        
        if (strlen($name)<3 || strlen($name)>30 ||strlen($pass)<3 || strlen($pass)>30) 
        {
            echo "<h3/><span style='color:red;'>Value Length Must Be Between 3 And 30!</span><h3/>";
            return false;
        }
        
        $msq = connect();
        
        $sel='select * from users where login_user="'.$name.'" and pass="'.md5($pass).'"';
        
        $res = mysqli_query($msq, $sel);
        
        if($row = mysqli_fetch_array($res, MYSQLI_NUM))
        {
            $_SESSION['ruser'] = $name;
            
            if($row[5] == 1)
            {
                $_SESSION['radmin'] = $name;
            }
            return true;
        }
        else{
            echo "<h3/><span style='color:red;'>No Such User!</span><h3/>";
            return false;
        }
    }

?>