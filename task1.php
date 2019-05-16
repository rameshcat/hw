<?php

function test($count)
{
    $count++;
    echo $count.'';

    if ($count < 10) {
        test($count);
    }
}
//test(0);

function fibonachi($number)
{
    static $first = 0;
    static $second = 1;
    static $result = 0;

    if ($result<$number){

        $first = $second;
        $second = $result;
        $result = $first+$second;
        //echo $second.' ';
        fibonachi($number);
    }
    return $second;
}
//echo fibonachi(100);

function numbers($number,$order = 'desc')
{
    static $start = 1;
    $sortorder = $order;

    switch ($order) {
        case $order == 'asc':
            if ($start <= $number) {
                echo $start.' ';
                $start++;
                numbers($number,$sortorder);
            }
            break;
        case $order == 'desc':
            if ($start <= $number) {
                echo $number.' ';
                $number--;
                numbers($number,$sortorder);
            }
            break;
    }
}
//numbers(10,'asc');

function arrayCount($array)
{
    static $result = 0;
    for ($i=0;$i<count($array);$i++) {
        if ((!is_array($array[$i])) && (isset($array[$i]))) {
            $result++;
        } else {
            arrayCount($array[$i]);
        }
    } return $result;

}
/*$arr = [[1,1],1,1,1,1,1,1,[1,1,1]];
echo arrayCount($arr);*/

function stringAnalise($string)
{
    if (strlen($string)>5){
        $result = substr($string,0,3).substr($string,strlen($string)-3);
    } else $result = str_repeat($string[0],strlen($string));
    return $result;
}
//echo stringAnalise('asghj');

function stringFormat($string)
{
    $result = chunk_split($string,3,'/');
    $result = explode('/',$result);

    foreach ($result as $fragment){
        if (strlen($fragment)==3) {
            $random = chr(rand(97, 122));
            while ((strpbrk($fragment, $random)) != false){
                $random = chr(rand(97, 122));
            }
            $fragment[1] = $random;
            $arr[] = $fragment;
        }
    }
    sort($arr);
    $resultText = '';
    foreach ($arr as $value){
        $resultText .= $value . PHP_EOL;
    }
    return $resultText;

}
//echo stringFormat('asdcwebxcas');

function generator()
{
    $string='';
    for ($i=0;$i<4;$i++){
        $string .= rand(0,9);
    }
    for ($i=0;$i<2;$i++){
        $string .= chr(rand(97, 122));
    }
    $string .= str_repeat(rand(0,1),4);
    return $string;
}
echo generator();
