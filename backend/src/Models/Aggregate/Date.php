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
 * Date: 20/10/2017
 * Time: 00:10
 */

namespace IWD\JOBINTERVIEW\Models\Aggregate;


class Date
{
    protected $_aggregate = [];

    public function aggregateData($options, $answer ) {
        array_push($this->_aggregate, $answer);
    }

    public function getFormatedAggregate() {
        return $this->getAggregate();
    }

    public function getAggregate() {
        return $this->_aggregate;
    }
}