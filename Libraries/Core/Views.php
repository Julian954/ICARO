<?php
class Views{
<<<<<<< HEAD
    function getView($controller, $view, $alert="", $data1 = "", $data2 = "", $data3 = "", $data4 = "", $data5 = "", $data10 = "")
=======
    function getView($controller, $view, $alert="", $data1 = "", $data2 = "", $data3 = "", $data4 = "", $data5 = "", $data6 = "", $data7 = "", $data8 = "", $data9 = "", $data10 = "")
>>>>>>> d03e81aad8cb8814dc8bf4d6146d9ec572bfd289
    {
        $controller = get_class($controller);
        if ($controller == "Login") {
            $view = "Views/".$view.".php";
        }else{
            $view = "Views/" . $controller . "/" . $view . ".php";
        }
        require_once($view);
    }
}

?>