<?php

require_once "./src/ComplexNumber.php";
require_once "./src/DivisionByZeroException.php";
require_once "./src/MathComplex.php";

use PHPUnit\Framework\TestCase;
use Blackator\Complex\ComplexNumber;
use Blackator\Complex\DivisionByZeroException;
use Blackator\Complex\MathComplex;

class MathComplexTest extends TestCase
{
    public function testConstruct()
    {
        $reflection = new ReflectionClass(MathComplex::class);
        $constructor = $reflection->getConstructor();
        $this->assertNotTrue($constructor->isPublic(), 'MathComplex constructor is public!');
        $complex_zero = new ComplexNumber();
        $this->assertTrue($complex_zero->getReal() === .0);
        $this->assertTrue($complex_zero->getImaginary() === .0);
    }

    public function testEquals()
    {
        $complex_1 = new ComplexNumber(rand(-100000, 100000), rand(-100000, 100000));
        $complex_2 = new ComplexNumber(rand(-100000, 100000), rand(-100000, 100000));
        $this->assertTrue(MathComplex::equals($complex_1, $complex_1));
        $this->assertNotTrue(MathComplex::equals($complex_1, $complex_2));
    }

    public function testDivisionByZero()
    {
        $complex_1 = new ComplexNumber(rand(-100000, 100000), rand(-100000, 100000));
        $complex_zero = new ComplexNumber();
        $result = false;
        try {
            MathComplex::div($complex_1, $complex_zero);
        }
        catch (DivisionByZeroException $e) {
            $result = true;
        }
        $this->assertTrue($result, 'DivisionByZeroException not generated');
    }

    public function testOperations()
    {
        do {
            $complex_1 = new ComplexNumber(rand(-100000, 100000), rand(-100000, 100000));
            $complex_2 = new ComplexNumber(rand(-100000, 100000), rand(-100000, 100000));
        } while (
            $complex_1->getReal() != 0
            && $complex_1->getImaginary() != 0
            && $complex_2->getReal() != 0
            && $complex_2->getImaginary() != 0
        );
        $this->assertInstanceOf(ComplexNumber::class, MathComplex::add($complex_1, $complex_2));
        $this->assertInstanceOf(ComplexNumber::class, MathComplex::sub($complex_1, $complex_2));
        $this->assertInstanceOf(ComplexNumber::class, MathComplex::multiply($complex_1, $complex_2));
        $this->assertInstanceOf(ComplexNumber::class, MathComplex::div($complex_1, $complex_2));
    }
}