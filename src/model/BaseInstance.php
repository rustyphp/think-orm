<?php
/**
 * Created by PhpStorm.
 *
 * @author lx
 */
namespace think\model;
use think\helper\Str;

/**
 * Class BaseInstance
 *
 * @package think\model
 */
final class BaseInstance {
    private $props;

    public function __construct() {
        $this->props=[];
    }

    public function __get(string $name) {
        return $this->props[$name];
    }

    public function __set(string $key, $val) {
        $name = Str::camel($key);
        $this->props[$name]=$val;
    }
}