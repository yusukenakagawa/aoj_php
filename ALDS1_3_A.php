<?php
// http://judge.u-aizu.ac.jp/onlinejudge/description.jsp?id=ALDS1_3_A

// 逆ポーランド記法のstackによる解法は
// 応用が利くことが多いので、初学者に有用。

// シンプルに array で書いているが、
// SplStackを使ったほうが良い。

$stdin = trim(fgets(STDIN));
$a = explode(" ", $stdin);
$n = count($a);
$stack = [];
for ($i = 0; $i < $n; ++$i) {
    $v = $a[$i];

    if ($v === "+") {
        $pop1 = array_pop($stack);
        $pop2 = array_pop($stack);
        array_push($stack, $pop2 + $pop1);
    }
    elseif ($v === "-") {
        $pop1 = array_pop($stack);
        $pop2 = array_pop($stack);
        array_push($stack, $pop2 - $pop1);
    }
    elseif ($v === "*") {
        $pop1 = array_pop($stack);
        $pop2 = array_pop($stack);
        array_push($stack, $pop2 * $pop1);
    }
    elseif ($v === "/") {
        $pop1 = array_pop($stack);
        $pop2 = array_pop($stack);
        array_push($stack, $pop2 / $pop1);
    }
    else {
        array_push($stack, $v);
    }
}

echo $stack[0], PHP_EOL;
