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
 * Time: 00:26
 */

namespace IWD\JOBINTERVIEW\Models;


class CollectionAbstract implements \Countable, \Iterator, \ArrayAccess
{

    protected $_methodForKey = "getId";

    protected $_items = [];

    public function toArray() {
        $collectionAsArray = [];
        /** @var ModelAbstract $item */
        foreach ( $this->_items as $item ) {
            if ( method_exists($item, "getArrayCopy") ) {
                $collectionAsArray[$item->{$this->_methodForKey}()] = $item->getArrayCopy();
            }
        }
        return $collectionAsArray;
    }

    /**
     * @param $object
     * @param null $key
     * @throws \Exception
     */
    public function addItem($object, $key = null)
    {
        if ($key == null) {
            $this->_items[] = $object;
        } else {
            if (isset($this->_items[$key])) {
                throw new \Exception("Key $key already in use.");
            } else {
                $this->_items[$key] = $object;
            }
        }
    }

    /**
     * @param $key
     * @throws \Exception
     */
    public function deleteItem($key)
    {
        if (isset($this->_items[$key])) {
            unset($this->_items[$key]);
        } else {
            throw new \Exception("Invalid key $key.");
        }
    }

    /**
     * @param $key
     * @return mixed
     * @throws \Exception
     */
    public function getItem($key)
    {
        if (isset($this->_items[$key])) {
            return $this->_items[$key];
        } else {
            throw new \Exception("Invalid key $key.");
        }
    }

    /**
     * Count elements of an object
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        return count($this->_items);
    }

    /**
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        return current($this->_items);
    }

    /**
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return ModelAbstract.
     * @since 5.0.0
     */
    public function next()
    {
        return next($this->_items);
    }

    /**
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        return key($this->_items);
    }

    /**
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        return $this->current() !== false;
    }

    /**
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return ModelAbstract
     * @since 5.0.0
     */
    public function rewind()
    {
        return reset($this->_items);
    }

    /**
     * Whether a offset exists
     * @link http://php.net/manual/en/arrayaccess.offsetexists.php
     * @param mixed $offset <p>
     * An offset to check for.
     * </p>
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     * @since 5.0.0
     */
    public function offsetExists($offset)
    {
        return isset($this->_items[$offset]);
    }

    /**
     * Offset to retrieve
     * @link http://php.net/manual/en/arrayaccess.offsetget.php
     * @param mixed $offset <p>
     * The offset to retrieve.
     * </p>
     * @return mixed Can return all value types.
     * @since 5.0.0
     */
    public function offsetGet($offset)
    {
        return $this->getItem($offset);
    }

    /**
     * Offset to set
     * @link http://php.net/manual/en/arrayaccess.offsetset.php
     * @param mixed $offset <p>
     * The offset to assign the value to.
     * </p>
     * @param mixed $value <p>
     * The value to set.
     * </p>
     * @return void
     * @since 5.0.0
     */
    public function offsetSet($offset, $value)
    {
        $this->addItem($value, $offset);
    }

    /**
     * Offset to unset
     * @link http://php.net/manual/en/arrayaccess.offsetunset.php
     * @param mixed $offset <p>
     * The offset to unset.
     * </p>
     * @return void
     * @since 5.0.0
     */
    public function offsetUnset($offset)
    {
        $this->deleteItem($offset);
    }
}