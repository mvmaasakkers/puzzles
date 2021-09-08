<?= "<?php\n"; ?>

namespace <?= $namespace; ?>;

use App\LeetCode\LeetCode;
use App\Input\DefaultInput;
use App\Input\InputInterface;

class <?= $class_name ?> extends LeetCode
{
    public function puzzle(DefaultInput|InputInterface $input): mixed
    {
        return 0;
    }

}

