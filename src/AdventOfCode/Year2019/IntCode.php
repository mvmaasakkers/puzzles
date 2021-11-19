<?php

namespace App\AdventOfCode\Year2019;

class IntCode
{
    private const OPCODE_ADD = 1;
    private const OPCODE_MULTIPLY = 2;
    private const OPCODE_INPUT = 3;
    private const OPCODE_OUTPUT = 4;
    private const OPCODE_HALT = 99;

    private const PARAMETER_MODE_POSITION_MODE = 0;
    private const PARAMETER_MODE_IMMEDIATE_MODE = 1;


    private int $instructionPointer = 0;
    private int $parameterMode = self::PARAMETER_MODE_POSITION_MODE;

    private ?int $input = null;
    private array $output = [];

    private bool $isStarted = false;
    private bool $isHalted = false;

    public function __construct(private array $instructions = [])
    {
    }
    
    public function getValue(int $address)
    {
        return $this->instructions[$address];
    }

    public function getValueFromPointer(int $address)
    {
        return $this->instructions[$this->instructions[$address]];
    }

    public function setValue(int $address, int $value)
    {
        $this->instructions[$address] = $value;
    }

    public function setValueToPointer(int $address, int $value)
    {
        $this->instructions[$this->instructions[$address]] = $value;
    }

    public function changeRelativeInstructionPointer(int $address)
    {
        $this->instructionPointer += $address;
    }

    public function getInput(): ?int
    {
        return $this->input;
    }

    public function setInput(int $value)
    {
        $this->input = $value;
    }

    public function getOutput(): array {
        return $this->output;
    }

    public function addOutput(int $value) {
        $this->output[] = $value;
    }

    public function halt()
    {
        $this->isHalted = true;
    }

    public function start()
    {
        $this->isStarted = true;
    }

    public function getOpcodeData(int $instructionPointer): array {
        $rawOpcode = $this->instructions[$this->instructionPointer];


        $data = [
            'opcode' => $rawOpcode
        ];

        return $data;
    }

    public function run()
    {
        $this->start();
        while ($this->isStarted && !$this->isHalted) {
            $opcodeData = $this->getOpcodeData($this->instructionPointer);
            $currentOpcode = $opcodeData['opcode'];

            switch ($currentOpcode) {
                case self::OPCODE_ADD:
                    $inputValue1 = $this->getValueFromPointer($this->instructionPointer + 1);
                    $inputValue2 = $this->getValueFromPointer($this->instructionPointer + 2);
                    $this->setValueToPointer($this->instructionPointer + 3, $inputValue1 + $inputValue2);
                    $this->changeRelativeInstructionPointer(4);
                    break;
                case self::OPCODE_MULTIPLY:
                    $inputValue1 = $this->getValueFromPointer($this->instructionPointer + 1);
                    $inputValue2 = $this->getValueFromPointer($this->instructionPointer + 2);
                    $this->setValueToPointer($this->instructionPointer + 3, $inputValue1 * $inputValue2);
                    $this->changeRelativeInstructionPointer(4);
                    break;
                case self::OPCODE_INPUT:
                    $this->setValueToPointer($this->instructionPointer + 1, $this->getInput());
                    $this->changeRelativeInstructionPointer(2);
                case self::OPCODE_OUTPUT:
                    $this->addOutput($this->getValueFromPointer($this->instructionPointer + 1));
                    $this->changeRelativeInstructionPointer(2);
                case self::OPCODE_HALT:
                    $this->halt();
                    break;
                default:
                    // error
            }
        }
    }
}
