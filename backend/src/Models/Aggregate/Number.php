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
 * Time: 23:59
 */

namespace IWD\JOBINTERVIEW\Models\Aggregate;


class Number
{

    protected $_aggregate = [];

    public function aggregateData($options, $answer ) {
       array_push($this->_aggregate, $answer);
    }

    public function getFormatedAggregate() {
        $formated = array_sum($this->getAggregate()) / count($this->getAggregate());
        $formatter = new \NumberFormatter('fr-FR', \NumberFormatter::DECIMAL);
        return $formatter->format($formated);
    }

    public function getAggregate() {
        return $this->_aggregate;
    }

}