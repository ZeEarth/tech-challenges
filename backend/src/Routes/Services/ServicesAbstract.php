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
 * Time: 22:31
 */

namespace IWD\JOBINTERVIEW\Routes\Services;

class ServicesAbstract
{
    /**
     * @var string
     */
    protected $_name = '';

    /**
     * @var string
     */
    protected $_endpoint = '';

    /**
     * @var string
     */
    protected $_description = '';

    /**
     * @var string
     */
    protected $_version = '';

    protected $_allowedMethods = ['GET', 'POST', 'UPDATE', 'PUT', 'DELETE'];

    public function __construct($options = [])
    {
        foreach ( $options as $property => $value ) {
            if ( false !== $methodName = $this->_getFunctionNameForProperty($property, "set")) {
                $this->$methodName($value);
            }
        }
    }

    /**
     * If property exist in the current object then return the setter or the getter
     * If not, then return false
     * @param $property
     * @param string $type
     * @return bool|string
     */
    protected function _getFunctionNameForProperty($property, $type = "get") {
        if ( property_exists(static::class, "_$property")) {
            $methodName = $type . ucfirst($property);
            return $methodName;
        } else {
            return false;
        }
    }

    /**
 * Return an array copy of the current object
 * @return array
 */
    public function getArrayCopy() {
        $arrayCopy = [
            'name' => $this->getName(),
            'endpoint' => $this->getEndpoint(),
            'description' => $this->getDescription(),
            'version' => $this->getVersion(),
            'allowedMethods' => $this->getAllowedMethods(),
        ];
        return $arrayCopy;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->_name;
    }

    /**
     * @param string $name
     * @return ServicesAbstract
     */
    public function setName(string $name): ServicesAbstract
    {
        $this->_name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return $this->_endpoint;
    }

    /**
     * @param string $endpoint
     * @return ServicesAbstract
     */
    public function setEndpoint(string $endpoint): ServicesAbstract
    {
        $this->_endpoint = $endpoint;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->_description;
    }

    /**
     * @param string $description
     * @return ServicesAbstract
     */
    public function setDescription(string $description): ServicesAbstract
    {
        $this->_description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->_version;
    }

    /**
     * @param string $version
     * @return ServicesAbstract
     */
    public function setVersion(string $version): ServicesAbstract
    {
        $this->_version = $version;
        return $this;
    }

    /**
     * @return array
     */
    public function getAllowedMethods(): array
    {
        return $this->_allowedMethods;
    }

    /**
     * @param array $allowedMethods
     * @return ServicesAbstract
     */
    public function setAllowedMethods(array $allowedMethods): ServicesAbstract
    {
        $this->_allowedMethods = $allowedMethods;
        return $this;
    }

}