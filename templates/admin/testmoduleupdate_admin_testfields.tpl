<!-- Header -->
<{include file='db:testmoduleupdate_admin_header.tpl' }>

<{if $testfields_list|default:''}>
    <table class='table table-bordered'>
        <thead>
            <tr class='head'>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_TESTFIELD_ID}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_TESTFIELD_TEXT}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_TESTFIELD_TEXTAREA}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_TESTFIELD_DHTML}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_TESTFIELD_CHECKBOX}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_TESTFIELD_YESNO}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_TESTFIELD_SELECTBOX}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_TESTFIELD_USER}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_TESTFIELD_COLOR}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_TESTFIELD_IMAGELIST}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_TESTFIELD_URLFILE}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_TESTFIELD_UPLIMAGE}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_TESTFIELD_UPLFILE}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_TESTFIELD_TEXTDATESELECT}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_TESTFIELD_SELECTFILE}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_TESTFIELD_PASSWORD}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_TESTFIELD_COUNTRY_LIST}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_TESTFIELD_LANGUAGE}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_TESTFIELD_RADIO}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_TESTFIELD_STATUS}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_TESTFIELD_DATETIME}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_TESTFIELD_COMBOBOX}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_TESTFIELD_COMMENTS}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_TESTFIELD_RATINGS}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_TESTFIELD_VOTES}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_TESTFIELD_UUID}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_TESTFIELD_IP}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_TESTFIELD_READS}></th>
                <th class="center width5"><{$smarty.const._AM_TESTMODULEUPDATE_FORM_ACTION}></th>
            </tr>
        </thead>
        <{if $testfields_count|default:''}>
        <tbody>
            <{foreach item=testfield from=$testfields_list}>
            <tr class='<{cycle values='odd, even'}>'>
                <td class='center'><{$testfield.id}></td>
                <td class='center'><{$testfield.text}></td>
                <td class='center'><{$testfield.textarea_short}></td>
                <td class='center'><{$testfield.dhtml_short}></td>
                <td class='center'><img src="<{xoModuleIcons16}><{$testfield.checkbox}>.png" alt="testfields" ></td>
                <td class='center'><{$testfield.yesno}></td>
                <td class='center'><{$testfield.selectbox}></td>
                <td class='center'><{$testfield.user}></td>
                <td class='center'><span style='background-color:<{$testfield.color}>;'>&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
                <td class='center'><img src="<{xoModuleIcons32}><{$testfield.imagelist}>" alt="testfields" ></td>
                <td class='center'><{$testfield.urlfile}></td>
                <td class='center'><img src="<{$testmoduleupdate_upload_url|default:false}>/images/testfields/<{$testfield.uplimage}>" alt="testfields" style="max-width:100px" ></td>
                <td class='center'><{$testfield.uplfile}></td>
                <td class='center'><{$testfield.textdateselect}></td>
                <td class='center'><{$testfield.selectfile}></td>
                <td class='center'><{$testfield.password}></td>
                <td class='center'><{$testfield.country_list}></td>
                <td class='center'><{$testfield.language}></td>
                <td class='center'><{$testfield.radio}></td>
                <td class='center'><img src="<{$modPathIcon16}>status<{$testfield.status}>.png" alt="<{$testfield.status_text}>" title="<{$testfield.status_text}>" ></td>
                <td class='center'><{$testfield.datetime}></td>
                <td class='center'><{$testfield.combobox}></td>
                <td class='center'><{$testfield.comments}></td>
                <td class='center'><{$testfield.ratings}></td>
                <td class='center'><{$testfield.votes}></td>
                <td class='center'><{$testfield.uuid}></td>
                <td class='center'><{$testfield.ip}></td>
                <td class='center'><{$testfield.reads}></td>
                <td class="center  width5">
                    <a href="testfields.php?op=edit&amp;tf_id=<{$testfield.id}>&amp;start=<{$start}>&amp;limit=<{$limit}>" title="<{$smarty.const._EDIT}>"><img src="<{xoModuleIcons16 edit.png}>" alt="<{$smarty.const._EDIT}> testfields" ></a>
                    <a href="testfields.php?op=clone&amp;tf_id_source=<{$testfield.id}>" title="<{$smarty.const._CLONE}>"><img src="<{xoModuleIcons16 editcopy.png}>" alt="<{$smarty.const._CLONE}> testfields" ></a>
                    <a href="testfields.php?op=delete&amp;tf_id=<{$testfield.id}>" title="<{$smarty.const._DELETE}>"><img src="<{xoModuleIcons16 delete.png}>" alt="<{$smarty.const._DELETE}> testfields" ></a>
                </td>
            </tr>
            <{/foreach}>
        </tbody>
        <{/if}>
    </table>
    <div class="clear">&nbsp;</div>
    <{if $pagenav|default:''}>
        <div class="xo-pagenav floatright"><{$pagenav|default:false}></div>
        <div class="clear spacer"></div>
    <{/if}>
<{/if}>
<{if $form|default:''}>
    <{$form|default:false}>
<{/if}>
<{if $error|default:''}>
    <div class="errorMsg"><strong><{$error|default:false}></strong></div>
<{/if}>

<!-- Footer -->
<{include file='db:testmoduleupdate_admin_footer.tpl' }>
