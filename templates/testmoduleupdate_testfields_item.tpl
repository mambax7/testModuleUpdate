<i id='tfId_<{$testfield.tf_id}>'></i>
<div class='panel-heading'>
</div>
<div class='panel-body'>
    <span class='col-sm-9 justify'><{$testfield.text}></span>
    <span class='col-sm-9 justify'><{$testfield.textarea}></span>
    <span class='col-sm-9 justify'><{$testfield.dhtml}></span>
    <span class='col-sm-9 justify'><{$testfield.checkbox}></span>
    <span class='col-sm-9 justify'><{$testfield.yesno}></span>
    <span class='col-sm-9 justify'><{$testfield.selectbox}></span>
    <span class='col-sm-9 justify'><{$testfield.user}></span>
    <span class='col-sm-9 justify'><{$testfield.color}></span>
    <span class='col-sm-3'><img src='<{$xoops_icons32_url|default:false}>/<{$testfield.imagelist}>' alt='testfields' ></span>
    <span class='col-sm-9 justify'><{$testfield.urlfile}></span>
    <span class='col-sm-3'><img src='<{$testmoduleupdate_upload_url|default:false}>/images/testfields/<{$testfield.uplimage}>' alt='testfields' ></span>
    <span class='col-sm-9 justify'><{$testfield.uplfile}></span>
    <span class='col-sm-9 justify'><{$testfield.textdateselect}></span>
    <span class='col-sm-9 justify'><{$testfield.selectfile}></span>
    <span class='col-sm-9 justify'><{$testfield.country_list}></span>
    <span class='col-sm-9 justify'><{$testfield.radio}></span>
    <span class='col-sm-9 justify'><{$testfield.status}></span>
    <span class='col-sm-9 justify'><{$testfield.datetime}></span>
    <span class='col-sm-9 justify'><{$testfield.combobox}></span>
    <span class='col-sm-9 justify'><{$testfield.ratings}></span>
</div>
<div class='panel-foot'>
    <span class='block-pie justify'><{$smarty.const._MA_TESTMODULEUPDATE_TESTFIELD_COMMENTS}>: <{$testfield.comments}></span>
    <span class='block-pie justify'><{$smarty.const._MA_TESTMODULEUPDATE_TESTFIELD_IP}>: <{$testfield.ip}></span>
    <span class='block-pie justify'><{$smarty.const._MA_TESTMODULEUPDATE_TESTFIELD_READS}>: <{$testfield.reads}></span>
    <div class='col-sm-12 right'>
        <{if $showItem|default:''}>
            <a class='btn btn-success right' href='testfields.php?op=list&amp;start=<{$start}>&amp;limit=<{$limit}>#tfId_<{$testfield.tf_id}>' title='<{$smarty.const._MA_TESTMODULEUPDATE_TESTFIELDS_LIST}>'><{$smarty.const._MA_TESTMODULEUPDATE_TESTFIELDS_LIST}></a>
        <{else}>
            <a class='btn btn-success right' href='testfields.php?op=show&amp;tf_id=<{$testfield.tf_id}>&amp;start=<{$start}>&amp;limit=<{$limit}>' title='<{$smarty.const._MA_TESTMODULEUPDATE_DETAILS}>'><{$smarty.const._MA_TESTMODULEUPDATE_DETAILS}></a>
        <{/if}>
        <{if $permEdit|default:''}>
            <a class='btn btn-primary right' href='testfields.php?op=edit&amp;tf_id=<{$testfield.tf_id}>&amp;start=<{$start}>&amp;limit=<{$limit}>' title='<{$smarty.const._EDIT}>'><{$smarty.const._EDIT}></a>
            <a class='btn btn-primary right' href='testfields.php?op=clone&amp;tf_id_source=<{$testfield.tf_id}>' title='<{$smarty.const._CLONE}>'><{$smarty.const._CLONE}></a>
            <a class='btn btn-danger right' href='testfields.php?op=delete&amp;tf_id=<{$testfield.tf_id}>' title='<{$smarty.const._DELETE}>'><{$smarty.const._DELETE}></a>
        <{/if}>
        <a class='btn btn-warning right' href='testfields.php?op=broken&amp;tf_id=<{$testfield.tf_id}>&amp;start=<{$start}>&amp;limit=<{$limit}>' title='<{$smarty.const._MA_TESTMODULEUPDATE_BROKEN}>'><{$smarty.const._MA_TESTMODULEUPDATE_BROKEN}></a>
    </div>
</div>
<{if $rating|default:''}>
    <{include file='db:testmoduleupdate_rate.tpl' item=$testfield}>
<{/if}>
