<?php
error_reporting(E_ALL | E_STRICT);
define('ITERATIONS', 2000000);

class Bench {
    private $bench_name;
    private $start_time;
    private $end_time;

    public function start($name) {
        $this->bench_name=$name;
        $this->start_time=microtime(true);
    }

    public function end() {
        $this->end_time=microtime(true);
        echo "Call style: " . $this->bench_name . '; ' . ($this->end_time - $this->start_time) . " seconds" .
            PHP_EOL;
    }
}

function use_foreach($array) {
    $arrayPrefix=[];
    foreach ($array as $key=>$value) {
        $arrayPrefix['http_' . $key]=$value;
    }
    $array=$arrayPrefix;
}

function use_array_map($array) {
    array_combine(array_map(function($v) {
        return "http_" . $v;
    }, array_keys($array)), array_values($array));
}

function use_array_walk($array) {
    $new_arr=[];
    array_walk($array, function($value, $key) use (&$new_arr) {
        $new_arr['http_' . $key]=$value;
    });
}

$bench=new Bench;
$array=[
    "version"=>"1.1",
    "connection"=>"close",
    "version2"=>"1.1",
    "connection2"=>"close",
    "version3"=>"1.1",
    "connection3"=>"close",
];
$bench->start('use_foreach');
for ($i=0; $i < ITERATIONS; ++$i) {
    use_foreach($array);
}
$bench->end();
$bench->start('use_array_walk');
for ($i=0; $i < ITERATIONS; ++$i) {
    use_array_walk($array);
}
$bench->end();
$bench->start('use_array_map');
for ($i=0; $i < ITERATIONS; ++$i) {
    use_array_map($array);
}
$bench->end();
