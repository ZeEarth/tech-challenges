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
 * Time: 00:38
 */

namespace IWD\JOBINTERVIEW\Models\Surveys;

use IWD\JOBINTERVIEW\Models\ModelAbstract;
use IWD\JOBINTERVIEW\Models\Surveys\Answers\AnswersCollection;
use IWD\JOBINTERVIEW\Models\Surveys\Questions\QuestionsCollection;

class Survey extends ModelAbstract
{

    protected $_name;

    protected $_code;

    /**
     * @var QuestionsCollection
     */
    protected $_questions = null;

    /**
     * @var AnswersCollection
     */
    protected $_answers = null;

    public function getId()
    {
        return base64_encode(serialize($this->getName().$this->getCode()));
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param mixed $name
     * @return Survey
     */
    public function setName($name)
    {
        $this->_name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->_code;
    }

    /**
     * @param mixed $code
     * @return Survey
     */
    public function setCode($code)
    {
        $this->_code = $code;
        return $this;
    }

    /**
     * @return QuestionsCollection
     */
    public function getQuestions(): QuestionsCollection
    {
        if (is_null($this->_questions) ) {
            $this->_questions = new QuestionsCollection();
        }
        return $this->_questions;
    }

    /**
     * @param QuestionsCollection $questions
     * @return Survey
     */
    public function setQuestions(QuestionsCollection $questions): Survey
    {
        $this->_questions = $questions;
        return $this;
    }

    /**
     * @return AnswersCollection
     */
    public function getAnswers(): AnswersCollection
    {
        if (is_null($this->_answers) ) {
            $this->_answers = new AnswersCollection();
        }
        return $this->_answers;
    }

    /**
     * @param AnswersCollection $answers
     * @return Survey
     */
    public function setAnswers(AnswersCollection $answers): Survey
    {
        $this->_answers = $answers;
        return $this;
    }

    /**
     * Return an array copy of the current object
     * @return array
     */
    public function getArrayCopy($withCollection = true) {
        $arrayCopy = [
            'name' => $this->getName(),
            'code' => $this->getCode(),
        ];
        if ($withCollection){
            $arrayCopy['questions'] = $this->getQuestions()->toArray();
            $arrayCopy['answers'] = $this->getAnswers()->toArray();
        }
        return $arrayCopy;
    }
}