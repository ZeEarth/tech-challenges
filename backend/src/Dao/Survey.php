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
 * Time: 01:08
 */

namespace IWD\JOBINTERVIEW\Dao;


class Survey
{

    /**
     * @var \DirectoryIterator
     */
    protected $_directoryIterator;

    public function __construct( \DirectoryIterator $directory )
    {
        $this->_directoryIterator = $directory;
    }

    /**
     * @return \DirectoryIterator
     */
    public function getDirectoryIterator(): \DirectoryIterator
    {
        return $this->_directoryIterator;
    }

    /**
     * @param \DirectoryIterator $directoryIterator
     * @return Survey
     */
    public function setDirectoryIterator(\DirectoryIterator $directoryIterator): Survey
    {
        $this->_directoryIterator = $directoryIterator;
        return $this;
    }

}