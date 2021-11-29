<div class='panel-heading'><{$content_header|default:false}></div>
<div class='panel-body'>
    <div class='col-sm-3'><{$smarty.const._MA_TESTMODULEUPDATE_ARTICLE_DESCR}>: </div>
    <div class='col-sm-8'><{$article.descr}></div>
    <div class='col-sm-3'><{$smarty.const._MA_TESTMODULEUPDATE_ARTICLE_IMG}>: </div>
    <div class='col-sm-9'><img src='<{$testmoduleupdate_upload_url|default:false}>/images/articles/<{$article.img}>' alt='articles' ></div>
</div>
