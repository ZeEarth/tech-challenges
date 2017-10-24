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


use IWD\JOBINTERVIEW\Models\ModelAbstract;

class Answer extends ModelAbstract
{

    protected $_answer;

    protected $_questionId;

    protected $_timeStamp;

    /**
     * @return mixed
     */
    public function getTimeStamp()
    {
        return $this->_timeStamp;
    }

    /**
     * @param mixed $timeStamp
     * @return Answer
     */
    public function setTimeStamp($timeStamp)
    {
        $this->_timeStamp = $timeStamp;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuestionId()
    {
        return $this->_questionId;
    }

    /**
     * @param mixed $questionId
     * @return Answer
     */
    public function setQuestionId($questionId)
    {
        $this->_questionId = $questionId;
        return $this;
    }

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

    public function getArrayCopy()
    {
        $arrayCopy = [
            'id' => $this->getId(),
            'questionId' => $this->getQuestionId(),
            'answer' => $this->getAnswer()
        ];
        return $arrayCopy;
    }
}