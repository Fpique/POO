<?php 
  Class Render
  {
    private $color = "black";
    private $errorcolor = "red";
    private $successcolor = "green";
    private $infocolor = "blue";
    
    
    

    private static $_instance = null;
    private function __construc() {

    }
    public static function getInstance()
    {
      if(is_null(self::$_instance)) {
        self::$_instance = new Render();
      }
      return self::$_instance;
    }


    public function message($string)
    {
      echo "<p style='color:" . $this->color . "'>" . $string . "</p><br>";
    }
    public function error($string)
    {
      echo "<p style='color:" . $this->errorcolor . "'>" . $string . "</p><br>";
    }
     public function success($string)
    {
      echo "<p style='color:" . $this->successcolor . "'>" . $string . "</p><br>";
    }
    public function info($string)
    {
      echo "<p style='color:" . $this->infocolor . "'>" . $string . "</p><br>";
    }
  }