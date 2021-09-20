<?php

namespace App\Tests\Helpers;

use App\Helpers\ShiftCipher;
use PHPUnit\Framework\TestCase;

class ShiftCipherTest extends TestCase
{
    public function testShiftRight() {
        $plain = 'abcdefghijklmnopqrstuvwxyz';
        $testCases = [
            ['position' => 49, 'expected' => 'xyzabcdefghijklmnopqrstuvw'],
            ['position' => 23, 'expected' => 'xyzabcdefghijklmnopqrstuvw'],
        ];
        $shiftCipher = new ShiftCipher($plain);
        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], $shiftCipher->shiftRight($testCase['position']), "Testcase #$n");
        }
    }

    public function testTranslate() {
        $plain = 'abcdefghijklmnopqrstuvwxyz';
        $shiftCipher = new ShiftCipher($plain);
        $shiftCipher->shiftRight(343);
        $testCases = [
            ['input' => 'qzmt-zixmtkozy-ivhz', 'expected' => 'very-encrypted-name'],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], $shiftCipher->translate($testCase['input']), "Testcase #$n");
        }
    }
}
