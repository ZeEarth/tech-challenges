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


use IWD\JOBINTERVIEW\Models\Surveys\Questions\QuestionsCollection;

class Survey
{

    protected $_name;

    protected $_code;

    /**
     * @var QuestionsCollection
     */
    protected $_questions;

}