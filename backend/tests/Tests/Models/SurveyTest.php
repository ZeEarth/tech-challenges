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
 * Time: 08:32
 */

namespace IWD\JOBINTERVIEW\Tests\Models\Surveys;

use IWD\JOBINTERVIEW\Models\Surveys\Answers\AnswersCollection;
use IWD\JOBINTERVIEW\Models\Surveys\Questions\QuestionsCollection;
use IWD\JOBINTERVIEW\Models\Surveys\Survey;

/**
 * Class SurveyTest
 * @package IWD\JOBINTERVIEW\Tests\Models\Surveys
 * @covers \IWD\JOBINTERVIEW\Models\Surveys\Survey
 */
class SurveyTest extends \PHPUnit_Framework_TestCase
{

    public function testFirst()
    {

        $initData = [
            "code" => "XXX",
            "name" => "Survey Name",
        ];
        $id = base64_encode(serialize($initData['name'] . $initData['code']));
        $survey = new Survey($initData);

        $this->assertInstanceOf(Survey::class, $survey);
        $this->assertEquals($initData['name'], $survey->getName());
        $this->assertEquals($initData['code'], $survey->getCode());
        $this->assertEquals($id, $survey->getId());

        $this->assertInstanceOf(QuestionsCollection::class, $survey->getQuestions());
        $this->assertInstanceOf(AnswersCollection::class, $survey->getAnswers());

        $questionsCollection = new QuestionsCollection();
        $this->assertInstanceOf(Survey::class, $survey->setQuestions($questionsCollection));

        $answersCollection = new AnswersCollection();
        $this->assertInstanceOf(Survey::class, $survey->setAnswers($answersCollection));

    }

    /**
     * @test
     */
    public function testArray()
    {
        $initData = [
            "code" => "XXX",
            "name" => "Survey Name",
        ];
        $survey = new Survey($initData);
        $arrayCopy = $survey->getArrayCopy(false);
        $this->assertTrue(is_array($arrayCopy));
        $this->assertArrayNotHasKey("questions", $arrayCopy);
    }
}
