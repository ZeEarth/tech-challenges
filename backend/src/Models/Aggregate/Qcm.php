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
 * Time: 23:22
 */

namespace IWD\JOBINTERVIEW\Models\Aggregate;


class Qcm
{

    protected $_aggregate = [];

    public function aggregateData($options, $answer ) {
        array_walk($options, function(&$value, $key){
            $value = str_replace(" ", "_", $value);
        });
        $tmp = array_combine($options, $answer);
        extract($tmp);
        foreach ( $options as $option ) {
            if (!isset($this->_aggregate[$option])) {
                $this->_aggregate[$option]  = 0;
            } else {
                $number = $this->_aggregate[$option];
            }
            if ($$option === true) {
                $this->_aggregate[$option] += 1;
            }
        }
    }

    public function getFormatedAggregate() {
        $formated = "";
        foreach( $this->getAggregate() as $option => $number ) {
            $option = str_replace("_", " ", $option);
            $formated .= ",$number $option ";
        }
        $formated = substr($formated, 1);
        $formated = explode(",", $formated);
        return $formated;
    }

    public function getAggregate() {
        return $this->_aggregate;
    }

}