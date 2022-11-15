
<?php

 // prepare reload to local version according by first visit
 session_start();
 $location_reload = isset($_SESSION["loc_reload"]) ? (bool)$_SESSION["loc_reload"] : false;
 // prepare reload to local version according by first visit
 if(!$location_reload){
     $location = visitor_location();
     if(in_array($location["country"], array("NG", "US", "UA"))){
         $_SESSION["loc_reload"] = true;
         header("location: https://orchidwins.com/apps/language/US");
         exit;
     }

     else
     if(in_array($location["country"], array("IL"))){
         $_SESSION["loc_reload"] = true;
         header("location: https://orchidwins.com/apps/language/IL");
         exit;
     }

     else
     if(in_array($location["country"], array("CN"))){
         $_SESSION["loc_reload"] = true;
         header("location: https://orchidwins.com/apps/language/CN");
         exit;
     }

     else
     if(in_array($location["country"], array("VN"))){
         $_SESSION["loc_reload"] = true;
         header("location: https://orchidwins.com/apps/language/VN");
         exit;
     }

     else
     if(in_array($location["country"], array("TH"))){
         $_SESSION["loc_reload"] = true;
         header("location: https://orchidwins.com/apps/language/TH");
         exit;
     }

     else
     if(in_array($location["country"], array("MY"))){
         $_SESSION["loc_reload"] = true;
         header("location: https://orchidwins.com/apps/language/MY");
         exit;
     }

     else
     if(in_array($location["country"], array("IN"))){
         $_SESSION["loc_reload"] = true;
         header("location: https://orchidwins.com/apps/language/IN");
         exit;
     }

     else
     if(in_array($location["country"], array("JP"))){
         $_SESSION["loc_reload"] = true;
         header("location: https://orchidwins.com/apps/language/JP");
         exit;
     }

    //  else
    //  if(in_array($location["country"], array("IL"))){
    //      $_SESSION["loc_reload"] = true;
    //      header("location: https://orchidwins.com/apps/language/YE");
    //      exit;
    //  }


 }



 function visitor_location(){
     $client  = @$_SERVER["HTTP_CLIENT_IP"];
     $forward = @$_SERVER["HTTP_X_FORWARDED_FOR"];
     $remote  = @$_SERVER["REMOTE_ADDR"];
     $result  = array("country"=>"", "city"=>"");
     if(filter_var($client, FILTER_VALIDATE_IP)){
         $ip = $client;
     }elseif(filter_var($forward, FILTER_VALIDATE_IP)){
         $ip = $forward;
     }else{
         $ip = $remote;
     }
     $ip_data = @json_decode
 (file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
     if($ip_data && $ip_data->geoplugin_countryName != null){
         $result["country"] = $ip_data->geoplugin_countryCode;
         $result["city"] = $ip_data->geoplugin_city;
     }
     return $result;
 }
 ?>
