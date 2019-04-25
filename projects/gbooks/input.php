<?php
class input
{
    function post($content)
    {
        if ($content == "") {
            return false;
        }
        #禁止的用户名
        $n = ["张三", "李四"];
        foreach ($n as $name) {
            if ($content == $name) {
                return false;
            }
        }
        return true;
    }
}