<?php

$pag = new \Commmon\Pager();

$pag->AbsolutePage = 3; //当前锁定页
$pag->PageCount = 20;   //总页数量
$pag->Prefix="?page=";  //链接前缀
$pag->Suffix="#head";   //链接后缀
$pag->FirstPageLink = '/share/1'; //首页链接
$pag->Size = 5;   //尺寸

$pageCodeHtml = $pag->ToString(); //获得分页过后的html


?>