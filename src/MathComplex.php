<?php

namespace Blackator\Complex;

/**
 * Class for operations with complex numbers
 */
class MathComplex
{
    private function __construct() {}

    /**
     * Comparison of complex numbers
     * @param ComplexNumber $firstNumber First complex number
     * @param ComplexNumber $secondNumber Second complex number
     * @return bool
     */
    public static function equals(ComplexNumber $firstNumber, ComplexNumber $secondNumber): bool
    {
        return $firstNumber->getReal() === $secondNumber->getReal() && $firstNumber->getImaginary() === $secondNumber->getImaginary();
    }

    /**
     * Addition of complex numbers
     * @param ComplexNumber $firstNumber First complex number
     * @param ComplexNumber $secondNumber Second complex number
     * @return ComplexNumber
     */
    public static function add(ComplexNumber $firstNumber, ComplexNumber $secondNumber): ComplexNumber
    {
        return new ComplexNumber($firstNumber->getReal() + $secondNumber->getReal(), $firstNumber->getImaginary() + $secondNumber->getImaginary());
    }

    /**
     * Subtraction of complex numbers
     * @param ComplexNumber $firstNumber First complex number
     * @param ComplexNumber $secondNumber Second complex number
     * @return ComplexNumber
     */
    public static function sub(ComplexNumber $firstNumber, ComplexNumber $secondNumber): ComplexNumber
    {
        return new ComplexNumber($firstNumber->getReal() - $secondNumber->getReal(), $firstNumber->getImaginary() - $secondNumber->getImaginary());
    }

    /**
     * Multiplication of complex numbers
     * @param ComplexNumber $firstNumber First complex number
     * @param ComplexNumber $secondNumber Second complex number
     * @return ComplexNumber
     */
    public static function multiply(ComplexNumber $firstNumber, ComplexNumber $secondNumber): ComplexNumber
    {
        return new ComplexNumber(
            $firstNumber->getReal() * $secondNumber->getReal() - $firstNumber->getImaginary() * $secondNumber->getImaginary(),
            $firstNumber->getReal() * $secondNumber->getImaginary() + $firstNumber->getImaginary() * $secondNumber->getReal()
        );
    }

    /**
     * Finding the quotient of complex numbers
     * @param ComplexNumber $firstNumber First complex number
     * @param ComplexNumber $secondNumber Second complex number
     * @throws DivisionByZeroException
     * @return ComplexNumber
     */
    public static function div(ComplexNumber $firstNumber, ComplexNumber $secondNumber): ComplexNumber
    {
        $divider = $secondNumber->getReal() ** 2 + $secondNumber->getImaginary() ** 2;
        if ($divider == 0) throw new DivisionByZeroException();
        return new ComplexNumber(
            ($firstNumber->getReal() * $secondNumber->getReal() + $firstNumber->getImaginary() * $secondNumber->getImaginary()) / ($secondNumber->getReal() ** 2 + $secondNumber->getImaginary() ** 2),
            ($secondNumber->getReal() * $firstNumber->getImaginary() - $firstNumber->getReal() * $secondNumber->getImaginary()) / ($secondNumber->getReal() ** 2 + $secondNumber->getImaginary() ** 2)
        );
    }
}