<?php
/**
 * Description of Registry
 * Default Registation the register class responsible for all
 * the object initialization
 * @author 0x4E0x650x6F
 */
class Registry {


    private $vars = array();
    
    /**
     * @set undifined initialization vareables
     * @param string $index
     * @param mixed value
     * @return void
     */

    public function  __set($index,  $value) {
        $this->vars[$index] = $value;
    }

    /**
     * @get variables
     * @param mixed index
     * @return mixed
     * 
     */
    public function  __get($index) {
        return $this->vars[$index];
    }
    
}
?>
