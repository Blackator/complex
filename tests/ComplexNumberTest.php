<?php

require_once "./src/ComplexNumber.php";

use PHPUnit\Framework\TestCase;
use Blackator\Complex\ComplexNumber;

class ComplexNumberTest extends TestCase
{
    public function testReturnValues()
    {
        $complex = new ComplexNumber(rand(-100000, 100000), rand(-100000, 100000));
        $this->assertInstanceOf(ComplexNumber::class, $complex);
        $this->assertIsString((string)$complex);
        $this->assertIsFloat($complex->getReal());
        $this->assertIsFloat($complex->getImaginary());
        $this->assertInstanceOf(ComplexNumber::class,$complex->setReal(rand(-100000, 100000)));
        $this->assertInstanceOf(ComplexNumber::class,$complex->setImaginary(rand(-100000, 100000)));
    }
}