<?= "<?php\n"; ?>

namespace <?= $namespace ?>;

use App\LeetCode\Problems\<?= $numberClass ?>;
use App\Input\DefaultInput;
use PHPUnit\Framework\TestCase;

class <?= $class_name ?> extends TestCase
{
    public function test(): void
    {
        $cases = [
            ['input' => new DefaultInput(''), 'expected' => 0],
        ];

        foreach ($cases as $case) {
            self::assertSame($case['expected'], (new <?= $numberClass ?>())->puzzle($case['input']));
        }
    }
}