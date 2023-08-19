<?
spl_autoload_register(function ($class_name) {
    // echo "WWWWWWWWWWW";
    if (strHas($class_name, "Model")) {
        echo "<hr>Model AutoLoad !!!!!!!!!!!!!!!!!! <hr>";
        $fileName = str_replace("Model", "", $class_name);
        $fileName = strtolower($fileName);
        require_once("mvc/model/$fileName.php");
        return;
    }
    if (strHas($class_name, "Controller")) {
        // echo "<hr>Controller AutoLoad !!!!!!!!!!!!!!!!!! <hr>";
        $fileName = str_replace("Controller", "", $class_name);
        $fileName = strtolower($fileName);
        require_once("mvc/controller/$fileName.php");
        return;
    }
});
