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
 * Date: 21/10/2017
 * Time: 14:11
 */

namespace IWD\JOBINTERVIEW\Models;


use IWD\JOBINTERVIEW\Models\Surveys\Answers\Answer;
use IWD\JOBINTERVIEW\Models\Surveys\Answers\AnswersCollection;
use IWD\JOBINTERVIEW\Models\Surveys\Questions\Question;
use IWD\JOBINTERVIEW\Models\Surveys\Questions\QuestionsCollection;
use IWD\JOBINTERVIEW\Models\Surveys\Survey;
use IWD\JOBINTERVIEW\Models\Surveys\SurveyCollection;
use Symfony\Component\Debug\Exception\ClassNotFoundException;

class CollectionAbstractTest extends \PHPUnit_Framework_TestCase
{

    public function testQuestionsCollection()
    {
        /** @var QuestionsCollection $collection */
        $collection = $this->_getCollection(QuestionsCollection::class);
        /** @var Question $model */
        $model = $this->_getModel(Question::class);

        $collection->addItem($model, $model->getId());

        $this->assertEquals(1, $collection->count());
        try {
            $collection->offsetSet($model->getId(), $model);
        } catch (\Exception $e) {
            $this->assertInstanceOf(\Exception::class, $e);
            $this->assertEquals("Key {$model->getId()} already in use.", $e->getMessage());
        }
        $this->assertInstanceOf(Question::class, $collection->offsetGet($model->getId()));
        $this->assertTrue($collection->valid());

        try {
            $collection->getItem('NotValidKey');
        } catch (\Exception $e) {
            $this->assertInstanceOf(\Exception::class, $e);
            $this->assertEquals("Invalid key NotValidKey.", $e->getMessage());
        }

        try {
            $collection->deleteItem('NotValidKey');
        } catch (\Exception $e) {
            $this->assertInstanceOf(\Exception::class, $e);
            $this->assertEquals("Invalid key NotValidKey.", $e->getMessage());
        }

        /** @var Question $tmpModel */
        $tmpModel = $collection->current();
        $this->assertInstanceOf(Question::class, $tmpModel);
        $this->assertEquals($tmpModel->getType(), "qcm");
        $this->assertEquals("What best sellers are available in your store?", $model->getLabel());
        $this->assertTrue(is_array($tmpModel->getOptions()));
        $this->assertEquals(["Product 1", "Product 2", "Product 3", "Product 4", "Product 5", "Product 6"], $tmpModel->getOptions());

        $newModel = new Question();
        $newModel->setType("numeric")->setLabel("Number of products?")->setOptions(null)->setId(uniqid());
        $collection->offsetSet("NewKey", $newModel);
        $this->assertEquals(2, $collection->count());

        /** @var Question $otherModel */
        $otherModel =  $collection->next();
        $this->assertEquals("numeric", $otherModel->getType());

        $keys = $collection->key();
        $this->assertEquals("NewKey", $keys);
        /** @var Question $otherModel */
        $otherModel =  $collection->rewind();;
        $this->assertEquals("qcm", $otherModel->getType());

        $collection->offsetUnset("NewKey");
        $this->assertEquals(1, $collection->count());

        $collection->deleteItem($model->getId());
        $this->assertEquals(0, $collection->count());

        $collection->addItem($model);
        $this->assertEquals(1, $collection->count());

        /** @var Question $otherModel */
        $otherModel = $collection->current();
        $this->assertEquals($model->getId(), $otherModel->getId());
        $this->assertEquals($model->getType(), $otherModel->getType());
        $this->assertEquals($model->getOptions(), $otherModel->getOptions());
        $this->assertEquals($model->getLabel(), $otherModel->getLabel());
    }


    /**
     * @param string $class
     * @return CollectionAbstract|QuestionsCollection|AnswersCollection|SurveyCollection
     * @throws ClassNotFoundException
     */
    protected function _getCollection($class)
    {
        switch ($class) {
            case QuestionsCollection::class:
                $collection = new QuestionsCollection();
                break;
            case AnswersCollection::class:
                $collection = new AnswersCollection();
                break;
            default :
                throw new ClassNotFoundException("Class '$class' not implemented", null);
                break;
        }
        return $collection;
    }

    /**
     * @param $class
     * @return Question|Answer|Survey|ModelAbstract
     * @throws ClassNotFoundException
     */
    protected function _getModel($class)
    {
        switch ($class) {
            case Question::class:
                $model = new Question($this->_getInitDataForQuestionModel());
                break;
            case Answer::class:
                $model = new Question($this->_getInitDataForAnswerModel());
                break;
            case Survey::class:
                $model = new Question($this->_getInitDataForSurveyModel());
                break;
            default:
                throw new ClassNotFoundException("Class '$class' not implemented", null);
                break;
        }
        return $model;
    }

    /**
     * @return array
     */
    protected function _getInitDataForQuestionModel()
    {
        return [
            "type" => "qcm",
            "label" => "What best sellers are available in your store?",
            "options" => ["Product 1", "Product 2", "Product 3", "Product 4", "Product 5", "Product 6"],
        ];
    }

    /**
     * @return array
     */
    protected function _getInitDataForAnswerModel()
    {
        return [
            "id" => "5044ab25",
            "answer" => [false, true, true, false, true, false],
        ];
    }

    /**
     * @return array
     */
    protected function _getInitDataForSurveyModel()
    {
        return [
            "id" => "5044ab25",
            "code" => "XXX",
            "name" => "Name",
        ];
    }
}
