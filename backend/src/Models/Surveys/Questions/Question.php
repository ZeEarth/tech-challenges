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
 * Time: 00:41
 */

namespace IWD\JOBINTERVIEW\Models\Surveys\Questions;


use IWD\JOBINTERVIEW\Models\ModelAbstract;

class Question extends ModelAbstract
{
    protected $_type;

    protected $_label;

    protected $_options;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * @param mixed $type
     * @return Question
     */
    public function setType($type)
    {
        $this->_type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->_label;
    }

    /**
     * @param mixed $label
     * @return Question
     */
    public function setLabel($label)
    {
        $this->_label = $label;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOptions()
    {
        return $this->_options;
    }

    /**
     * @param mixed $options
     * @return Question
     */
    public function setOptions($options)
    {
        $this->_options = $options;
        return $this;
    }

    public function getArrayCopy() {
        $arrayCopy = [
            'id' => $this->getId(),
            'type' => $this->getType(),
            'label' => $this->getLabel(),
            'options' => $this->getOptions(),
        ];
        return $arrayCopy;
    }
}