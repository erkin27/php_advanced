<?php

class Color
{
    private int $red;
    private int $green;
    private int $blue;

    private const MIN_RANGE = 0;
    private const MAX_RANGE = 255;

    /**
     * @throws Exception
     */
    public function __construct(int $red, int $green, int $blue)
    {
        $this->setRed($red);
        $this->setGreen($green);
        $this->setBlue($blue);
    }

    public function getRed(): int
    {
        return $this->red;
    }

    /**
     * @throws Exception
     */
    public function setRed(int $red): void
    {
        $this->red = $this->validateRange($red);
    }

    public function getGreen(): int
    {
        return $this->green;
    }

    /**
     * @throws Exception
     */
    public function setGreen(int $green): void
    {
        $this->green = $this->validateRange($green);
    }

    public function getBlue(): int
    {
        return $this->blue;
    }

    /**
     * @throws Exception
     */
    public function setBlue(int $blue): void
    {
        $this->blue = $this->validateRange($blue);
    }

    public function equals(Color $object): bool
    {
        return $this->green === $object->green && $this->blue === $object->blue && $this->red === $object->red;
    }

    public function mix(Color $object): self
    {
        $red = round(($this->red + $object->red) / 2);
        $blue = round(($this->blue + $object->blue) / 2);
        $green = round(($this->green + $object->green) / 2);
        return new self($red, $blue, $green);
    }

    public static function getRandom(): self
    {
        return new self(
            random_int(self::MIN_RANGE, self::MAX_RANGE),
            random_int(self::MIN_RANGE, self::MAX_RANGE),
            random_int(self::MIN_RANGE, self::MAX_RANGE),
        );
    }

    public function __toString()
    {
        return $this->print();
    }

    public function print(): string
    {
        return sprintf('R: %s; G: %s; B: %s', $this->red, $this->green, $this->blue) . PHP_EOL;
    }

    /**
     * @throws Exception
     */
    private function validateRange(int $value): int
    {
        $isCorrect = $value >= self::MIN_RANGE && $value <= self::MAX_RANGE;
        if (!$isCorrect) {
            throw new Exception("RGB has not valid range for value: $value.");
        }
        return $value;
    }
}

try {
    $color = new Color(200,200,200);
    echo "Base Color: " . $color;

    $mixedColor = $color->mix(new Color(100, 100, 100));
    echo "Mixed Color: " . $mixedColor;

    $randomColor = Color::getRandom();
    echo "Random Color: " . $randomColor;

    $sameColor = clone($color);
    $sameColor->setGreen(120);
    echo "Same Color: " . $sameColor;
    echo 'Same Color ' . ($sameColor->equals($color) ? 'Equal' : 'Not Equal') . ' to Base Color' . PHP_EOL;
} catch (Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
}
