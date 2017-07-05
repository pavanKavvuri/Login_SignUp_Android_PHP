<?php

 define('HOST','localhost');
 define('USER','id2123231_admin');
 define('PASS','password');
 define('DB','id2123231_mapview');

$var1 = 'Hello';
$var2 = 'signup';

$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');


if($_SERVER['REQUEST_METHOD']=='POST'){

$flag = $_POST['flag'];

if($flag == 'signup'){
                $name = $_POST['name'];
                $address = $_POST['address'];
                $mobile = $_POST['mobile'];
                $password = $_POST['password'];
                $email = $_POST['email'];





                $sql = "insert into Details (name,address,mobile,password,flag, email) values ('$name','$address','$mobile','$password', '$flag', '$email')";

                if(mysqli_query($con,$sql)){

                    // Successfully regtd
                        echo '1';
                  }

                else{echo '0'; }



}

else if ($flag == 'login'){

                $Name = $_POST['name'];
                $Pwd = $_POST['password'];

               // $sql2 = "SELECT * FROM Details WHERE email = $Name  AND password= $Pwd";
                //$result = mysqli_query($sql2);
                    $query=mysqli_query($con, "select * from Details where email='".$Name."' and password='".$Pwd."'") or die(mysqli_error());
                   // $res=mysqli_fetch_row($query);
                    $count = mysqli_num_rows($query);


                    if($count){
                    echo $count;
                    }else{echo  '0';}


}


else if ($flag == 'search'){

                $search = $_POST['SearchTerm'];

                    $query_search=mysqli_query($con, "select * from Details where name='".$search."'") or die(mysqli_error());
                  //  $res=mysqli_fetch_row($query_search);
                    $count = mysqli_num_rows($query_search);


                    if($count){
                    echo $count;
                    }else{echo  '0';}


}



mysqli_close($con);

}
?>