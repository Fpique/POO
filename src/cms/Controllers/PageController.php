<?php
require_once('../Library/RenderClass.php');
class Page
{
    protected $title;
    protected $content;
    protected $render;
    protected $menu;
    // On créer ensuite méthode de construction

    public function __construct($title, $content)
    {
        $this->render = Render::getInstance();
        $this->title = $title;
        $this->content = $content;
        $this->menu = file_get_contents('../Views/menu.php');
        
       
    }
    public function display()
    {
        $template = file_get_contents('../Views/template.php');                     //On utilise file_get_contents car il s'agit de HTML
        echo $this->render->render($this->menu, $this->title, $this->content, $template);
    }
}