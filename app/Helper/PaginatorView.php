<?php namespace App\Helper;

class PaginatorView {

    private $view;
    private $template;
    private $data;

    public function __construct()
    {
        $this->view = (new \App\Helper\View);
    }

    public function make(string $template, $data = null)
    {
        $this->template = $template;
        $this->data = $data;

        return $this->render();
    }

    private function render()
    {
        return $this->view->render(resource_path() . $this->template, $this->data);
    }

}