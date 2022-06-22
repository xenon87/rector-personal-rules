<?php

    namespace App\Command;

    use some\namespace\{
        ClassA,
        ClassB,
        ClassC as C
    };
    use App\Test;

    class IndexCommand extends Command
    {
    }
?>
-----
<?php

    namespace App\Command;

    use some\namespace\{
        ClassA,
        ClassB,
        ClassC as C
    };
    use App\Test;

    class IndexCommand extends Command
    {
    }
?>