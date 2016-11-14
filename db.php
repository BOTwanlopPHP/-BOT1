<?php
header("Content-type: text/html; charset=UTF-8");
    header('Cache-Control: no-cache');
    header('Pragma: no-cache');
    header('Expires: 0');
    include("bot.php");
    $where = "";
    $sql = "SELECT bee.id AS id,curdatee,curtime,status  GROUP BY bee.id $where";
    $result = runSQL($sql);
    $numrow = countRec('id','curdatee','curtime','status'',$where);
    if($numrow>0){
        $json = "";
        $json .= "{";
        $json .= "\"aaData\":[";
        $rc = false;
        while ($row = mysql_fetch_array($result)) {
            if ($rc) $json .= ",";
            $json .= "[";
            $json .= "\"".$row['curdatee']."\"";
            $json .= ",\"".number_format($row['curtime'])."\"";
            $json .= ",\"".number_format($row['status'])."\"]";
            $rc = true;
        }
            $json .= "]";
            $json .= "}";
            echo $json;
    }
echo "OK";
?>
