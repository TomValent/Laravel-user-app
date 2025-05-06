<?php

namespace experiment3;

class PHPStan
{
    public string $name;

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return 123;
    }

    // Method with incorrect argument type
    public function multiply(int $a, int $b): int
    {
        return $a * $b;
    }

    /**
     * @param float $length
     * @param float $width
     *
     * @return positive-int
     */
    public function calculateArea(float $length, float $width): void
    {
        return $length * $width;
    }

    public function getAge($age)
    {
        return $age;
    }

    public function setAddress(string $address): void
    {
        $address = [];
        $this->address = $address;
    }

    public function privateMethod(): void
    {
        // Do something
    }

    public function callPrivateMethod(): void
    {
        $this->privateMethod();
    }

    public function sum($a, $b)
    {
        return $a + $b;
    }
}

$phpStan = new PHPStan();
$phpStan->setName(123);  // Type mismatch: expects string, given integer
$phpStan->setAddress(123); // Type mismatch: expects string, given integer
echo $phpStan->getName(); // Type mismatch: expects string, returns integer
$phpStan->callPrivateMethod();  // Error: calling private method outside of class
echo $phpStan->sum("a", "b");  // Type mismatch: expects integers, given strings
