<?php 

namespace app\core\form;

abstract class BaseField 
{
    abstract public function renderInput(): string;
}