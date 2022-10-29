<?php


class Row
{

    private int $x;
    private float $y, $r;
    private bool $hit;
    private int $scriptTime;
    private string $curTime;

    private static array $xLimits = [-5, -4, -3, -2, -1, 0, 1, 2, 3, 4, 5];

    private static array $yLimits = [
        "min" => -5,
        "max" => 5
    ];

    private static array $rLimits = [
        "min" => 1,
        "max" => 4
    ];

    public function __construct($x, $y, $r)
    {
        $this->x = $x;
        $this->y = $this->parseY($y);
        $this->r = $this->parseR($r);
        $this->hit = $this->funcXYR();
    }

    private function funcXYR(): bool
    {
        $x = $this->x;
        $y = (float)$this->y;
        $r = (float)$this->r;


        if ($x >= 0){
            if ($y <= 0){
                return $x >= -$r && $y <= $r;
            } else {
                return false;
            }
        } else {
            if ($y >= 0){
                return $x ** 2 + $y ** 2 <= $r ** 2;
            } else {
                return $y >= -$x - $r;
            }
        }
    }

    private function parseY($y): string
    {
        $y = rtrim(str_ireplace(",", ".", $y), "0");
        $symbolsAfterDot = strlen(substr($y, strpos($y, "."), null)) - 1;
        if (abs((float)$y - (int)$y) > 0) {
            return number_format($y, $symbolsAfterDot, ".");
        } else {
            return (float)$y + 0;
        }
    }

    private function parseR($r): string
    {
        $r = rtrim(str_ireplace(",", ".", $r), "0");
        $symbolsAfterDot = strlen(substr($r, strpos($r, "."), null)) - 1;
        if (abs((float)$r - (int)$r) > 0) {
            return number_format($r, $symbolsAfterDot, ".");
        } else {
            return (float)$r + 0;
        }
    }



    public function setTime($scriptTime, $curTime): void
    {
        $this->scriptTime = $scriptTime;
        $this->curTime = $curTime;
    }

    public function getArray(): array
    {
        return [
            "x" => $this->x,
            "y" => $this->y,
            "r" => $this->r,
            "hit" => $this->hit,
            "scriptTime" => $this->scriptTime,
            "curTime" => $this->curTime
        ];
    }

    public static function validateParams($x, $y, $r): bool
    {
        $xArr = self::$xLimits;
        $yArr = self::$yLimits;
        $rArr = self::$rLimits;
        $y = str_ireplace(",", ".", $y);
        $r = str_ireplace(",", ".", $r);

        return in_array($x, $xArr) &&
            is_numeric($y) &&
            (float)$y >= $yArr["min"] &&
            (float)$y <= $yArr["max"] &&
            strlen($y) < 11 && is_numeric($r) &&
            (float)$r >= $rArr["min"] &&
            (float)$r <= $rArr["max"] &&
            strlen($r) < 11;
    }

    public function getX(): float
    {
        return $this->x;
    }

    public function getY(): float
    {
        return $this->y;
    }

    public function getR(): float
    {
        return $this->r;
    }

    public function getHit(): bool
    {
        return $this->hit;
    }

    public function getScriptTime(): int
    {
        return $this->scriptTime;
    }

    public function getCurTime(): string
    {
        return date("H:i:s", $this->curTime);
    }
}