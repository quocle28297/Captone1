<?php
    $query = "";
    $from = "";
    $where = "";
    $latmap = 16.054588;
    $longmap = 108.202930;
    $zoom = 13;
    if(isset($_GET['select-Province'])&&!empty($_GET['select-Province'])){
        $query .= "select province.PROVINCE_NAME";
        $from .=" FROM province";
        $idProvince = (string)$_GET['select-Province'];
        $where .= " where province.PROVINCE_ID = ". $idProvince;
        if(isset($_GET['select-District'])&&!empty($_GET['select-District'])){
            $zoom = 14;
            $query .= ", district.DISTRICT_NAME";
            $from .= ", district";
            $idDistrict = (string)$_GET['select-District'];
            $where .= " and district.DISTRICT_ID = ". $idDistrict;
            if (isset($_GET['select-Ward'])&&!empty($_GET['select-Ward'])) {
                $zoom = 15;
                $query .= ", ward.WARD_NAME";
                $from .= ", ward";
                $idWard = (string)$_GET['select-Ward'];
                $where .= " and ward.WARD_ID = ". $idWard;
            }
        }
        $query .= $from." ".$where;
        $connection=mysqli_connect ('localhost',"root","",$database);
        mysqli_set_charset($connection, 'utf8');
        if (!$connection) {
            die('Not connected : ' . mysqli_error());
        }
        $result = mysqli_query($connection,$query);
        if (!$result) {
            die('Invalid query: ' . mysqli_error($connection));
        }
        $row = @mysqli_fetch_assoc($result);
        $string = "".(isset($row['WARD_NAME'])?$row['WARD_NAME']."+":"").(isset($row['DISTRICT_NAME'])?$row['DISTRICT_NAME']."+":"").$row['PROVINCE_NAME']."+Việt Nam";
        echo $string;
        $coords = getCoordinates($string);
        $latmap = $coords[0];
        $longmap = $coords[1];
    }

                // function getCoordinates($address){
                //     $mapApiKey= 'AIzaSyBaEjohZpjSWkzIXQP0u01FZpZSe5Uxuhs';
                //     $address = urlencode($address);
                //     $url = "https://maps.googleapis.com/maps/api/geocode/json?sensor=false&address=" .$address ."&key=".$mapApiKey;
                //     $response = file_get_contents($url);
                //     $json = json_decode($response,true);
                //     $lat = $json['results'][0]['geometry']['location']['lat'];
                //     $lng = $json['results'][0]['geometry']['location']['lng'];

                //  return array($lat, $lng);
                //   }
                // $coords = getCoordinates("Hải Châu+Bình Thuận+Đà Nẵng+Việt Nam");
                // echo $coords[0];//get lat
                // echo "</br>".$coords[1];
?>