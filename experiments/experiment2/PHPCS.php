<?php

global $var;

class Example {
    public function getDirectory() {
        return __DIR__;
    }
}

class AnotherClass {
    public $someProperty;

    public function someMethod() {
        return true;
    }
}

class LastClass { // Violation: Class declaration should follow PSR-1 conventions
    private $myVar = 42;

    public function getMyVar() { // Violation: Missing return type hint
        return $this->myVar;
    }
}

function longFunction() {
    if (true) {
        echo "Hello, World!";
    }

    if (true) {
        echo "This is a very long function to test the length limit imposed by Slevomat.";
    }
    return "Done";
}

function Foo() {
    return "bar";
}
