<?php
class Template
{
    protected $template;
    protected $vars = array();

    public function __construct($template)
    {
        $this->template = $template;
    }
    //Getter 
    public function __get($key)
    {
        return $this->vars[$key];
    }

    //Setter
    public function __set($key, $value)
    {
        $this->vars[$key] = $value;
    }

    //Convert Object to String
    public function __toString()
    {
        extract($this->vars); //Spilts the array into seprate varaibles
        chdir(dirname($this->template)); // Taking us into the directory where the template resides.
        ob_start(); // starting the buffer to store the contents.

        include basename($this->template); //including the contents of the template to be rendered and saved in to the buffer.

        return ob_get_clean(); //Flushing the buffer and returning the contents starting from ob_start();
    }
}
