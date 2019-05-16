<?php
/*Необходимо переделать функцию так, чтобы использовать обычную переменную
вместо статической и не использовать ссылку.*/

function test($count=0)
{
    $count++;
    echo $count.'';

    if ($count < 10) {
        test($count);
    }
}
//test();

/*Написать функцию (рекурсивную либо обычную - по желанию),
которая принимает на вход параметр (например, $n)
 и вычисляет число Фибоначчи до предела $n.
Результат вычисления возвращается этой же функцией*/

function fibonachi($number)
{
    static $first = 0;
    static $second = 1;
    static $result = 0;

    if ($result<$number){

        $first = $second;
        $second = $result;
        $result = $first+$second;
        fibonachi($number);
    }
    return $second;
}
//echo fibonachi(100);

/*Напишите рекурсивную функцию, принимающую на вход натуральное число $n.
Функция возвращает строку из всех чисел от 1 до $n либо от $n до 1.
За порядок сортировки должен отвечать дополнительный параметр функции - $order,
который может принимать значение ‘desc’ (убывающий) или ‘asc’ (возрастающий)
и по-умолчанию должен быть равен ‘desc’.*/

function numbers($number,$order = 'desc')
{
    static $start = 1;

    switch ($order) {
        case $order == 'asc':
            if ($start <= $number) {
                echo $start.' ';
                $start++;
                numbers($number,$order);
            }
            break;
        case $order == 'desc':
            if ($start <= $number) {
                echo $number.' ';
                $number--;
                numbers($number,$order);
            }
            break;
    }
}
//numbers(10,'asc');

/*Напишите функцию, которая подсчитывает количество всех значений массива.
Функция должна учитывать вложенность массивов.
(функцией array_count_values пользоваться нельзя).*/

function arrayCount($array)
{
    $result = 0;
    for ($i=0;$i<count($array);$i++) {
        if ((!is_array($array[$i])) && (isset($array[$i]))) {
            $result++;
        } else {
            $result+=arrayCount($array[$i]);
        }
    } return $result;
}
//$arr = [1,[1,2,3,4,5],1,1,1,[1,1,1]];
//echo arrayCount($arr);

/*Дана строка. Вывести первые три символа и последние три символа,
если длина строки больше 5. Иначе вывести первый символ столько раз,
какова длина строки.*/

function stringAnalise($string)
{
    if (strlen($string)>5){
        $result = substr($string,0,3).substr($string,strlen($string)-3);
    } else $result = str_repeat($string[0],strlen($string));
    return $result;
}
//echo stringAnalise('asghj');

/*Дана строка. Разделить строку на фрагменты по три подряд идущих символа.
В каждом фрагменте средний символ заменить на случайный символ,
не совпадающий ни с одним из символов этого фрагмента.
Показать фрагменты, упорядоченные по алфавиту*/

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

/*Написать генерацию строк длиной 10 символов:
первые 4 символа - цифры,
следующие два символы - различные буквы,
следующие 4 символа - нули или единицы.*/

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
//echo generator();
