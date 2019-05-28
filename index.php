<!-------------------------
Author  : Dimas Putra Y
class   : Praktiku B2
NIM     : 17 / 410834 / SV / 12761
---------------------------->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Mahasiswa Hogwarts</title>
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
<table class="container">
        <thead>
          <tr>
              <th>No</th>
              <th>Picture</th>
              <th>Full Name</th>
              <th>Address</th>
              <th>Email</th>
          </tr>
        </thead>

        <tbody>
            <?php
            $i=0;
            if(isset($_GET['results'])){
                $x=$_GET['results'];
            }
            else {
                $x=1;
            }
            if(isset($_GET['gender'])){
                while($i<$x){
                    // echo $_GET['gender'];
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://randomuser.me/api/",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET"
                    ));
                    
                    $response = curl_exec($curl);
                    $response = json_decode($response,true);
                    $err = curl_error($curl);
                    
                    curl_close($curl);
                    
                    if ($err) {
                    echo "cURL Error #:" . $err;
                    } else {
                    //   echo $response;
                    }
                    // echo $response['results'][0]['gender'];
                    if($response['results'][0]['gender']==$_GET['gender']){
                        ?>
                         <tr>
                            <td><?php echo $i+1 ?></td>
                            <td> <img class="responsive-img" src="<?php echo $response['results'][0]['picture']['large'] ?>"></td>
                            <td><?php echo $response['results'][0]['name']['title']." ".$response['results'][0]['name']['first']." ".$response['results'][0]['name']['last'] ?></td>
                            <td><?php echo $response['results'][0]['location']['street'] ?></td>
                            <td><?php echo $response['results'][0]['email'] ?></td>
                        </tr>
                     <?php $i++;} ?> 
            <?php }
            }
            else {
                for($i=0;$i<$x;$i++){
                    $curl = curl_init();
                    // echo "asuuu";

                    curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://randomuser.me/api/",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET"
                    ));
                    
                    $response = curl_exec($curl);
                    $response = json_decode($response,true);
                    $err = curl_error($curl);
                    
                    curl_close($curl);
                    
                    if ($err) {
                    echo "cURL Error #:" . $err;
                    } else {
                    //   echo $response;
                    }
            ?>
                <tr>
                    <td><?php echo $i+1 ?></td>
                    <td> <img class="responsive-img" src="<?php echo $response['results'][0]['picture']['large'] ?>"></td>
                    <td><?php echo $response['results'][0]['name']['title']." ".$response['results'][0]['name']['first']." ".$response['results'][0]['name']['last'] ?></td>
                    <td><?php echo $response['results'][0]['location']['street'] ?></td>
                    <td><?php echo $response['results'][0]['email'] ?></td>
                </tr>
            <?php }} ?>
        </tbody>
      </table>
      <div class="center-align">© 2019 RESPONSI DIMAS PUTRA</div>
</body>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</html>