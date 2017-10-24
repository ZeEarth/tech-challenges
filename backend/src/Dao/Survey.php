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
     * @var \FilesystemIterator
     */
    protected $_directoryIterator;

    public function __construct( \FilesystemIterator $directory )
    {
        $this->setDirectoryIterator($directory);
    }

    public function findAll() {
        /** @var \SplFileInfo $file */
        $entries = [];
        foreach ( $this->getDirectoryIterator() as $file) {
            $entries[$file->getFilename()] = json_decode( file_get_contents( $file->getPath() . DIRECTORY_SEPARATOR . $file->getFilename()), true);
        }
        return $entries;
    }

    /**
     * @return \FilesystemIterator
     */
    public function getDirectoryIterator(): \FilesystemIterator
    {
        return $this->_directoryIterator;
    }

    /**
     * @param \FilesystemIterator $directoryIterator
     * @return Survey
     */
    public function setDirectoryIterator(\FilesystemIterator $directoryIterator): Survey
    {
        $this->_directoryIterator = $directoryIterator;
        return $this;
    }

}