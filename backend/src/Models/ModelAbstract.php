<?php
/**
 * ______      ______
 * | ___ \___  |  _  \
 * | |_/ ( _ ) | | | |
 * |    // _ \/\ | | |
 * | |\ \ (_>  < |/ /
 * \_| \_\___/\/___/
 *
 * Created by PhpStorm.
 * User: jndesjardins
 * Date: 19/10/2017
 * Time: 01:39
 */

namespace IWD\JOBINTERVIEW\Models;


Abstract class ModelAbstract
{

    protected $_id = null;

    public function __construct( $options = [])
    {
        if (is_array($options) ) {
            $this->_setOptions($options);
        }
        $this->_id = uniqid();
    }

    protected function _setOptions($options) {
        foreach ($options as $property => $value ) {
            /**
             * @todo : implement a mapping between storage and model
             */
            $method = "set" . ucfirst($property);
            if ( method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getId()
    {
        return $this->_id;
    }

    public function setId($id) {
        $this->_id = $id;
    }

    abstract public function getArrayCopy();
}