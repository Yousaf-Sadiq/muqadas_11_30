<?php
// 1. Find the area of a rectangle where the length is 5 and the width is 8.
class Rectangle
{
    private $length;
    private $width;

    public function SetValue($l, $w)
    {
        $this->length = $l;
        $this->width = $w;
    }

    public function calculate()
    {
        return $this->length * $this->width;
    }
}

$r = new Rectangle;
$r->SetValue(5, 8);
echo "The area of rectangle is: " . $r->calculate();
echo "<hr>";


// 2. Find the area of a triangle where the base is 4 and the height is 3.
class Triangle
{
    private $base;
    private $height;

    public function SetValue($b, $h)
    {
        $this->base = $b;
        $this->height = $h;
    }

    public function calculate()
    {
        return 1 / 2 * $this->base * $this->height;
    }
}

$t = new Triangle;
$t->SetValue(4, 3);
echo "The area of triangle is: " . $t->calculate();
echo "<hr>";

// 3. Find the area of a circle where the radius is 3.
class Circle
{
    private $radius;

    public function SetValue($x)
    {
        $this->radius = $x;
    }

    public function calculate()
    {
        return 3.14 * ($this->radius ** 2);
    }
}

$c = new Circle;
$c->SetValue(3);
echo "The area of circle is: " . $c->calculate();
echo "<hr>";

// 4. Convert temperatures from Celsius to Fahrenheit and Fahrenheit to Celsius.
class TemperatureConverter
{
    public function celsiusToFahrenheit($celsius)
    {
        // Celsius ko Fahrenheit mein convert karna
        $f = ($celsius * 9 / 5) + 32;

        $c = $this->fahrenheitToCelsius($f);


        return [$f, $c];
    }

    private function fahrenheitToCelsius($fahrenheit)
    {
        // Fahrenheit ko Celsius mein convert karna
        return ($fahrenheit - 32) * 5 / 9;
    }
}

$tc = new TemperatureConverter;

$tempCelsius = 30;
$tempFahrenheit = 86;

$w = $tc->celsiusToFahrenheit($tempCelsius);
echo $tempCelsius . " Celsius is equal to " . $w[0] . "°F";
echo "<br>";
echo $tempFahrenheit . " Fahrenheit is equal to " . $w[1] . "°C";
echo "<hr>";

// 5. Check from the given integer, whether it is positive or negative
class NumberChecker
{
    public function isPositive($x)
    {
        if ($x > 0) {
            return "positive";
        } else {
            return "negative";
        }


    }

    public function isNegative($x)
    {
        return $x < 0;
    }
}
$nc = new NumberChecker;

// Test with positive number


echo $nc->isPositive(-5);
echo "<br>";


// Test with negative number
// echo "Is 5 negative? ";
// echo $nc->isNegative(8) ? 'Yes' : 'No';
// echo "<hr>";


// Check whether a given number is even or odd. (mod sign % )

class EVENoDD
{
    private $n;

    public function SetN($a)
    {
        $this->n = $a;
    }

    public function CheckEVEnOdd()
    {
        if ($this->n % 2 == 0) {
            return "Even";
        } else {
            return "Odd";
        }
    }
}


$nc = new EVENoDD;

$nc->SetN(11);
echo $nc->CheckEVEnOdd();
echo "<br>";













?>