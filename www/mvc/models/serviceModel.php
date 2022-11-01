<?php 
    class serviceModel extends db{
        public function getService($serviceID){
            $qr = "SELECT nameService, price, unit 
                FROM Services
                WHERE (serviceID = '$serviceID')";
            $rows = mysqli_query($this ->conn, $qr);
            $row = mysqli_fetch_array($rows);
            return json_encode($row, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        }
    }
?>