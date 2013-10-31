<?
        $longitude        = $_REQUEST["longitude"];
        $latitude        = $_REQUEST["latitude"];
        $language        = $_REQUEST["language"];
        $udid                = $_REQUEST["UDID"];
        echo "<SCRIPT LANGUAGE=\"javascript\">document.location.href=\"customerlogin.php?longitude=$longitude&latitude=$latitude&language=$language&udid=$udid\";</SCRIPT>";
?>
