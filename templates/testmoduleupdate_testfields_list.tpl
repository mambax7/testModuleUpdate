<div class='panel-heading'>
</div>
<div class='panel-body'>
    <span class='col-sm-9 justify'><{$testfield.text}></span>
    <span class='col-sm-9 justify'><{$testfield.textarea}></span>
    <span class='col-sm-9 justify'><{$testfield.dhtml}></span>
    <span class='col-sm-9 justify'><{$testfield.checkbox}></span>
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
</div>
<div class='panel-foot'>
    <span class='block-pie justify'><{$smarty.const._MA_TESTMODULEUPDATE_TESTFIELD_YESNO}>: <{$testfield.yesno}></span>
    <span class='block-pie justify'><{$smarty.const._MA_TESTMODULEUPDATE_TESTFIELD_SELECTBOX}>: <{$testfield.selectbox}></span>
    <span class='block-pie justify'><{$smarty.const._MA_TESTMODULEUPDATE_TESTFIELD_IP}>: <{$testfield.ip}></span>
    <span class='col-sm-12'><a class='btn btn-primary' href='testfields.php?op=show&amp;tf_id=<{$testfield.tf_id}>' title='<{$smarty.const._MA_TESTMODULEUPDATE_DETAILS}>'><{$smarty.const._MA_TESTMODULEUPDATE_DETAILS}></a></span>
</div>
