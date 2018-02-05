<?php
// Our closure
class Test{
    public  function quoteValue($value){
        trigger_error(
            'Attempting to quote a value in ' . get_class($this) .
            ' without extension/driver support can introduce security vulnerabilities in a production environment'
        );
        return '\'' . addcslashes((string) $value, "\x00\n\r\\'\"\x1a") . '\'';

    }
    public  function quoteValueList(){
        $valueList = array(
            1 => 'wh',
            2 => 'wh2',
            3 => array(
                1 => 12,
                2 => 13
            )
        );

        return implode(', ', array_map([$this, 'quoteValue'], (array) $valueList));
    }
}

$test = new Test();
echo $test->quoteValueList();

echo "Hello World!!!";

?>