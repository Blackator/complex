<?php

namespace Blackator\Complex;

/**
 * A class for representing a complex number
 */
class ComplexNumber
{
    protected $real = 0;
    protected $imaginary = .0;

    public function __construct(float $real = .0, float $imaginary = .0)
    {
        $this->real = $real;
        $this->imaginary = $imaginary;
    }

    public function __toString()
    {
        return '{' . $this->real . ', ' . $this->imaginary . '}';
    }

    /**
     * Get the real part of a complex number
     * @return float
     */
    public function getReal(): float
    {
        return $this->real;
    }

    /**
     * Set the real part of a complex number
     * @param float $real Real part of a complex number
     * @return $this
     */
    public function setReal(float $real): self
    {
        $this->real = $real;
        return $this;
    }

    /**
     * Get the imaginary part of a complex number
     * @return float
     */
    public function getImaginary(): float
    {
        return $this->imaginary;
    }

    /**
     * Set the imaginary part of a complex number
     * @param float $imaginary Imaginary part of a complex number
     * @return $this
     */
    public function setImaginary(float $imaginary): self
    {
        $this->imaginary = $imaginary;
        return $this;
    }
}