<?php
// http://judge.u-aizu.ac.jp/onlinejudge/description.jsp?id=ALDS1_4_A

// 条件判定の回数を減らすタイプの番兵を学ぶ。
// 答えを求める速さだけならarray_intersectなどのビルトイン関数を使ったほうがよい。

fscanf(STDIN, '%d', $n);
$s = explode(" ", trim(fgets(STDIN)));
$s[$n] = null; // 番兵用に追加
fscanf(STDIN, '%d', $q);
$t = explode(" ", trim(fgets(STDIN)));

// 探し当てる数を配列の最後に置く事で
// for ($i = 0; $i < $n; ++$i) {
//     if ($a[$i] === $key) {
// とするより、ループ内の条件判定が少なくできる。
function linearSearch(&$a, $key, $n)
{
    $a[$n] = $key; // 番兵を追加
    $i = 0;
    while ($a[$i] !== $key)
        ++$i;

    // 配列の最後まで探索している = 探している数値が無かった
    if ($n === $i)
        return false;

    return true;
}

$count = 0;
for ($i = 0; $i < $q; $i++){
    if (linearSearch($s, $t[$i], $n) !== false)
        ++$count;
}

echo $count, PHP_EOL;
