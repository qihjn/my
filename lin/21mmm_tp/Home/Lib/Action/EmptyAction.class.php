<?php
//地地
class EmptyAction extends Action{



        function index(){

                header("HTTP/1.0 404 Not Found");
				header("Location: /404.html");
        }
		
		//function _empty(){
//			 header("Location: /404.html");
//		}

        

}

?>