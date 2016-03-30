<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Winterfell</title>
    <link rel="stylesheet" type="text/css" href="/Public/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="/Public/css/Query/word_show.css" />
<link rel="stylesheet" type="text/css" href="/Public/css/Words/index.css" />
</head>
<body class="body_s">
<div class="header_s">
    <nav class="navbar navbar-default navbar-fixed-top navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo U('Index/Words/index');?>">Winterfell</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="<?php echo U('Index/Words/index');?>">首页</a></li>
                    <li><a href="<?php echo U('Add/index');?>">添加单词</a></li>
                    <li><a href="<?php echo U('Query/all');?>">查询单词</a></li>
                    <li><a href="#contact">随便看看</a></li>
                </ul>
                <form class="so_form navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a><span>你好,<?php echo session('name')?></span></a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
</div>
<div class="body_1">

<div class="body_2">
    <p class="p_s">现在开始复习单词</p>
</div>
<div class="body_3">
    <div class="show_content">
        <table class="table table-hover">
            <tr>
                <th style="width: 13%">单词</th>
                <th style="width: 70%">释义</th>
                <th style="width: 17%">操作</th>
            </tr>
            <?php if(is_array($select)): foreach($select as $key=>$word): ?><tr>
                    <td style="width: 13%"><?php echo ($word["word_name"]); ?></td>
                    <td style="width: 70%"><?php echo ($word["paraphrase"]); ?></td>
                    <td style="width: 17%">
                        <a href="<?php echo U('Query/show_one',array('word_id'=>$word['word_id']));?>" aria-label="Previous">
                            <button type="button" class="btn btn-success btn-sm">查看</button>
                        </a>
                        &nbsp;
                        <a href="<?php echo U('Query/delete_word',array('word_id'=>$word['word_id']));?>" aria-label="Previous">
                            <button type="button" class="btn btn-success btn-sm">删除</button>
                        </a>
                    </td>
                </tr><?php endforeach; endif; ?>
        </table>
        <nav>
            <ul class="pagination">
                <?php if(($p == 1)): ?><li class="disabled"><?php else: ?><li><?php endif; ?>
                <a href="<?php echo U('Query/all_word_show',array('p'=>$p-1,'count'=>$count,'bz'=>$bz,'key1' => $key1));?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>

                </li>
                <li class="active"><a href="#"><span><?php echo ($p); ?></span></a></li>
                <?php if(($maxp > ($p+1)) OR ($maxp == ($p+1))): ?><li><a href="<?php echo U('Query/all_word_show',array('p'=>$p+1,'count'=>$count,'bz'=>$bz,'key1' => $key1));?>"><span><?php echo ($p+1); ?></span></a></li><?php endif; ?>
                <?php if(($maxp > ($p+2)) OR ($maxp == ($p+2))): ?><li><a href="<?php echo U('Query/all_word_show',array('p'=>$p+2,'count'=>$count,'bz'=>$bz,'key1' => $key1));?>"><span><?php echo ($p+2); ?></span></a></li><?php endif; ?>
                <?php if(($maxp > ($p+3)) OR ($maxp == ($p+3))): ?><li><a href="<?php echo U('Query/all_word_show',array('p'=>$p+3,'count'=>$count,'bz'=>$bz,'key1' => $key1));?>"><span><?php echo ($p+3); ?></span></a></li><?php endif; ?>
                <?php if(($maxp > ($p+4)) OR ($maxp == ($p+4))): ?><li><a href="<?php echo U('Query/all_word_show',array('p'=>$p+4,'count'=>$count,'bz'=>$bz,'key1' => $key1));?>"><span><?php echo ($p+4); ?></span></a></li><?php endif; ?>

                <?php if(($p == $maxp)): ?><li class="disabled"><?php else: ?><li><?php endif; ?>
                <a href="<?php echo U('Query/all_word_show',array('p'=>$p+1,'count'=>$count,'bz'=>$bz,'key1' => $key1));?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
                </li>
                <li><span><?php echo ($p); ?>/<?php echo ($maxp); ?>页&nbsp;&nbsp;<?php echo ($count); ?>条记录</span></li>
            </ul>
        </nav>
    </div>
</div>

<div class="clear">
    <div class="clear_1">
        <div class="introduction">
            <span class="font_color">关于Winterfell</span>
            <p class="font_color">Winterfell是一款帮助英语学习的程序，在英语阅读的过程中你可以将不认识的单词进行整理成卡片,
                使用Winterfell可以帮助你收集整理单词卡片电子化,并方便自己再次查阅已经积累的单词卡片.
            </p>
            <p class="font_color">你可以通过添加单词功能添加陌生单词的例句出处,释义,并可以添加3个造句.
                你可以通过某一个释义,某一个例句中的关键词,某一个造句中的关键词进行单词查询,也可以复习一段时间内的单词,
                当然,可以调取所有的单词进行复习
            </p>
            <p class="font_color">你可以点击随便看看,就可以看到10条你的或其他战友的单词卡片
            </p>
        </div>
        <div class="technology">
            <span class="font_color">技术栈</span>
            <p class="font_color">PHP&nbsp;&nbsp;&nbsp;&nbsp;ThinkPHP&nbsp;&nbsp;&nbsp;&nbsp;
                Bootstrap&nbsp;&nbsp;&nbsp;&nbsp;Python&nbsp;&nbsp;&nbsp;&nbsp;
                Flask&nbsp;&nbsp;&nbsp;&nbsp;Rest&nbsp;&nbsp;&nbsp;&nbsp;Mongo&nbsp;&nbsp;&nbsp;&nbsp;Mysql</p>
        </div>
    </div>
    <div class="clear_2">
        <span class="body_bottom">&copy; 2015-2016</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a class="body_bottom" href="http://yanzl.net" target="_blank">挂在树上的兔子</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="body_bottom">山东理工大学</span>
    </div>
</div>
</div>
<script src="/Public/js/jquery.min.js"></script>
<script src="/Public/js/bootstrap.min.js"></script>
</body>
</html>