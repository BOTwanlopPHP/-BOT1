<?php
    header("Content-type: text/html; charset=UTF-8");
    header('Cache-Control: no-cache');
    header('Pragma: no-cache');
    header('Expires: 0');
    include("connectdb.php");
    $where = "";
    $sql = "SELECT province.province_id AS province_id,province_name,SUM(population_male) AS population_male,SUM(population_female) AS population_female FROM population INNER JOIN province ON province.province_id = population.province_id GROUP BY province.province_id $where";
    $result = runSQL($sql);
    $numrow = countRec('province_id','province',$where);
    if($numrow>0){
        $json = "";
        $json .= "{";
        $json .= "\"aaData\":[";
        $rc = false;
        while ($row = mysql_fetch_array($result)) {
            if ($rc) $json .= ",";
            $json .= "[";
            $json .= "\"".$row['province_name']."\"";
            $json .= ",\"".number_format($row['population_male'])."\"";
            $json .= ",\"".number_format($row['population_female'])."\"]";
            $rc = true;
        }
            $json .= "]";
            $json .= "}";
            echo $json;
    }
?>
