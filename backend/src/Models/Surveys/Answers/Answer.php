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
 * Time: 00:53
 */

namespace IWD\JOBINTERVIEW\Models\Surveys\Answers;


class Answer
{

    protected $_answer;

    /**
     * @return mixed
     */
    public function getAnswer()
    {
        return $this->_answer;
    }

    /**
     * @param mixed $answer
     * @return Answer
     */
    public function setAnswer($answer)
    {
        $this->_answer = $answer;
        return $this;
    }

}