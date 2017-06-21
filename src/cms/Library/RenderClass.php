<?php 
  Class Render
    { 

    private static $_instance = null;
    private function __construct() {

    }
    public static function getInstance()
    {
      if(is_null(self::$_instance)) {
        self::$_instance = new Render();
      }
      return self::$_instance;
    }
    public function render($menu, $title, $content,$template)
    {
        $finalHtml = "";
        $finalHtml = $this->renderMenu($menu, $template);
        $finalHtml = $this->renderTitle($title, $finalHtml);
        $finalHtml = $this->renderContent($content, $finalHtml);
        return $finalHtml;
    }
   
    public function renderMenu($menu, $template)
    {
        return str_replace('%%MENU%%', $menu, $template);       // On recherche %%TITLE%% pour le remplacer par $title dans notre $template
        
    }
    public function renderTitle($title, $template) // RenderTitle doit prendre 2 arguments : le titre et template
    {
        return str_replace('%%TITLE%%', $title, $template);       // On recherche %%TITLE%% pour le remplacer par $title dans notre $template
    }
    public function renderContent($content, $template) 
    {
        return str_replace('%%CONTENT%%', $content, $template);
    }
  }