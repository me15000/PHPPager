<?php

$pag = new \Commmon\Pager();

$pag->AbsolutePage = 3; //当前锁定页
$pag->PageCount = 20;   //总页数量
$pag->Prefix="?page=";  //链接前缀
$pag->Suffix="#head";   //链接后缀
$pag->FirstPageLink = '/share/1'; //首页链接
$pag->Size = 5;   //尺寸

$pageCodeHtml = $pag->ToString(); //获得分页过后的html

echo $pageCodeHtml; //将输出以下内容

/*
<a class="first" href="/share/1">首页</a>
<a class="prev" href="?page=2#head">上一页</a>
<a class="normal" href="/share/1">1</a>
<a class="normal" href="?page=2#head">2</a>
<strong class="selected">3</strong>
<a class="normal" href="?page=4#head">4</a>
<a class="normal" href="?page=5#head">5</a>
<a class="next" href="?page=4#head">下一页</a>
<a class="last" href="?page=20#head">末页</a>
<span class="total">3/20</span>
*/

?>

