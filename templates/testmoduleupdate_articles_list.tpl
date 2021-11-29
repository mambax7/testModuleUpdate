<div class='panel-heading'>
    <h3 class='panel-title'><{$article.cat}></h3>
    <h3 class='panel-title'><{$article.title}></h3>
    <h3 class='panel-title'><{$article.img}></h3>
</div>
<div class='panel-body'>
    <span class='col-sm-9 justify'><{$article.file}></span>
</div>
<div class='panel-foot'>
    <span class='block-pie justify'><{$smarty.const._MA_TESTMODULEUPDATE_ARTICLE_CREATED}>: <{$article.created}></span>
    <span class='col-sm-12'><a class='btn btn-primary' href='articles.php?op=show&amp;art_id=<{$article.art_id}>' title='<{$smarty.const._MA_TESTMODULEUPDATE_DETAILS}>'><{$smarty.const._MA_TESTMODULEUPDATE_DETAILS}></a></span>
</div>
