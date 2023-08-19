<? class Render
{
    public static function render($filePath, $data=array())
    {
        echo "<br>renderform";

        extract($data);
        ob_start();
        require_once("mvc/view/" . $filePath);
        $out = ob_get_clean();
        require_once('theme/default.php');
    }
}
