<?php
namespace think\model;

use think\contract\Arrayable;
use think\helper\Str;

/**
 * Class BaseModel
 *
 * @package think\model
 */
final class BaseModel implements Arrayable {
    /**
     * @var array $attrs
     */
    private $attrs;

    /**
     * BaseModel constructor.
     */
    public function __construct() {
        $this->attrs=[];
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function __get(string $name) {
        return $this->attrs[$name];
    }

    /**
     * @param string $key
     * @param $val
     */
    public function __set(string $key, $val) {
        $name=Str::camel($key);
        //js MAX_SAFE_INTEGER = 9007199254740991
        $this->attrs[$name]=$val > 9007199254740991 ? '' . $val : $val;

    }

    /**
     * @return array
     */
    public function toArray() : array {
        return $this->attrs;
    }

    /**
     * @return array
     */
    public function getFields() : array {
        $data=[];
        foreach ($this->attrs as $name=>$value) {
            $data[Str::snake($name)]=$value;
        }
        return $data;
    }
}