<?php

namespace PersonLinks\Internship\app\core;

class View
{
    public function __construct(
        protected string $view,
        protected ?array $data = [],
        protected ?string $layout = 'main'
    ) {}

    public function withLayout(string $layout)
    {
        // Set the layout for the view
        $this->layout = $layout;

        return $this;
    }

    public function render()
    {
        // Extract the data array into variables
        extract($this->data);

        // Start output buffering
        ob_start();

        // Include the view file
        require_once APP_ROOT.'/src/views/'.$this->view.'.php';

        // Get the contents of the buffer
        $content = ob_get_clean();

        // Include the layout file
        require_once APP_ROOT.'/src/views/layouts/'.$this->layout.'.php';
    }
}
