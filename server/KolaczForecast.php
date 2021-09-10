<?php

class KolaczForecast
{
    public $param;
    public $processesCount;
    public $result;

    private const EXPECTED_VALUE = 1;
    private const START_PROCESSING = 1;
    private const MAX_PROCESSES_COUNT = 10000;

    public function __construct(int $int)
    {
        $this->param = $int;
        $this->processesCount = self::START_PROCESSING;
        $this->result = $this->init($int);
    }

    /**
     * @param bool $int
     * @return int
     */
    private function init(int $int): int
    {
        $this->processesCount++;
        $result = $this->formula($int);
        if ($this->processesCount >= self::MAX_PROCESSES_COUNT) return $result;
        return (int)$result !== self::EXPECTED_VALUE ? $this->init($result) : $result;
    }

    /**
    * @param int $int
    * @return int
    */
    private function formula(int $int): float
    {
        return (bool)($int % 2) ? ($int * 3) + 1 : $int / 2;
    }
}
