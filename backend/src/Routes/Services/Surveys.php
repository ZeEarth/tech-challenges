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
 * Date: 18/10/2017
 * Time: 22:30
 */

namespace IWD\JOBINTERVIEW\Routes\Services;

use IWD\JOBINTERVIEW\Models\Aggregate\Date;
use IWD\JOBINTERVIEW\Models\Aggregate\Number;
use IWD\JOBINTERVIEW\Models\Aggregate\Qcm;
use IWD\JOBINTERVIEW\Models\Surveys\Answers\Answer;
use IWD\JOBINTERVIEW\Models\Surveys\Questions\Question;
use IWD\JOBINTERVIEW\Models\Surveys\Survey;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class Surveys extends ServicesAbstract
{

    /**
     * @return mixed
     */
    protected function _getAllSurveysHardDatas(Application $app)
    {
        $surveys = $app['dao.surveys']->findAll();
        return $surveys;
    }

    /**
     * @param $surveys
     * @return array
     */
    protected function _getSurveysWithDetails($surveys)
    {
        $responseDatas = [];
        foreach ($surveys as $surveyData) {
            $surveyModel = new Survey($surveyData['survey']);
            if (isset($surveyData['questions'])) {
                foreach ($surveyData['questions'] as $questionDatas) {
                    $question = new Question($questionDatas);
                    $idQuestion = $question->getId();
                    if (!$surveyModel->getQuestions()->offsetExists($idQuestion)) {
                        $surveyModel->getQuestions()->offsetSet($idQuestion, $question);
                    }
                    if (isset($questionDatas['answer'])) {
                        $initDatas = [
                            "answer" => $questionDatas['answer'],
                            "questionId" => $idQuestion,
                            "timeStamp" => time(),
                        ];
                        $answer = new Answer($initDatas);
                        $surveyModel->getAnswers()->offsetSet($idQuestion, $answer);
                    }
                }
            }
            if (!isset($responseDatas[$surveyModel->getCode()])) {
                $responseDatas[$surveyModel->getCode()] = $surveyModel->getArrayCopy(true);
            } else {
                $completeArrayQuestions = $surveyModel->getQuestions()->toArray();
                $existantQuestions = $responseDatas[$surveyModel->getCode()]["questions"];
                $responseDatas[$surveyModel->getCode()]["questions"] = array_merge($existantQuestions, $completeArrayQuestions);
                $completeArrayAnswers = $surveyModel->getAnswers()->toArray();
                $existantAnswers = $responseDatas[$surveyModel->getCode()]["answers"];
                $responseDatas[$surveyModel->getCode()]["answers"] = array_merge($existantAnswers, $completeArrayAnswers);
            }
        }
        return $responseDatas;
    }

    public function home(Request $request, Application $app)
    {
        $surveys = $app['dao.surveys']->findAll();
        $responseDatas = [];
        foreach ($surveys as $surveyData) {
            $surveyModel = new Survey();
            $surveyModel->setName($surveyData['survey']['name'])->setCode($surveyData['survey']['code']);

            $responseDatas[$surveyModel->getCode()] = $surveyModel->getArrayCopy(false);
        }
        return $app->json(array_values($responseDatas));
    }

    public function details(Request $request, Application $app)
    {
        $surveys = $this->_getAllSurveysHardDatas($app);
        $responseDatas = $this->_getSurveysWithDetails($surveys);

        $code = $this->_getQueryParamFromRequest($request, "code");
        if ( isset($responseDatas[$code])) {
            return $app->json($responseDatas[$code]);
        }

        return $app->json(array_values($responseDatas));
    }

    public function aggregate(Request $request, Application $app)
    {
        $surveys = $this->_getAllSurveysHardDatas($app);
        $responseDatas = $this->_getSurveysWithDetails($surveys);
        $aggreateResponse = [];
        foreach ($responseDatas as $surveyData) {
            $qcm = new Qcm();
            $number = new Number();
            $date = new Date();
            foreach ($surveyData['answers'] as $questionId => $answerData) {
                $answer = new Answer($answerData);
                if (isset($surveyData['questions'][$questionId])) {
                    $question = new Question($surveyData['questions'][$questionId]);
                    switch ($question->getType()) {
                        case "qcm":
                            $qcm->aggregateData($question->getOptions(), $answer->getAnswer());
                            break;
                        case "numeric":
                        case "number":
                            $number->aggregateData([], $answer->getAnswer());
                            break;
                        case "date":
                            $date->aggregateData([], $answer->getAnswer());
                            break;
                    }
                }
            }
            $aggreateResponse[$surveyData['code']]['qcm'] = $qcm->getFormatedAggregate();
            $aggreateResponse[$surveyData['code']]['number'] = $number->getFormatedAggregate();
            $aggreateResponse[$surveyData['code']]['date'] = $date->getFormatedAggregate();
        }

        $code = $this->_getQueryParamFromRequest($request, "code");
        if ( isset($aggreateResponse[$code])) {
            return $app->json($aggreateResponse[$code]);
        }

        return $app->json($aggreateResponse);
    }


    /**
     * @param Request $request
     * @param $name
     * @param null $default
     * @return mixed|null
     */
    protected function _getQueryParamFromRequest(Request $request, $name, $default = null)
    {
        $queryString = $request->getQueryString();
        if (empty($queryString)) {
            return $default;
        }

        $params = $this->_extractParams($queryString);
        if ( isset($params[$name])) {
            return $params[$name];
        } else {
            return $default;
        }
    }

    /**
     * @param $query
     * @return array
     */
    protected function _extractParams($query) {
        if ( strpos($query, "&") !== false ) {
            $paramsListTmp = explode("&", $query);
            $paramsList = [];
            foreach( $paramsListTmp as $paramData ) {
                $params = explode("=", $paramData);
                $paramsList[$params[0]] = $params[1];
            }
        } else {
            $paramsListTmp = explode("=", $query);
            $paramsList[$paramsListTmp[0]] = $paramsListTmp[1];
        }
        return $paramsList;
    }
}