<!-- Header -->
<{include file='db:testmoduleupdate_header.tpl' }>

<table class='table table-bordered'>
    <thead>
        <tr class='head'>
            <th class="center"><{$smarty.const._MA_TESTMODULEUPDATE_TESTFIELD_ID}></th>
            <th class="center"><{$smarty.const._MA_TESTMODULEUPDATE_TESTFIELD_TEXT}></th>
            <th class="center"><{$smarty.const._MA_TESTMODULEUPDATE_TESTFIELD_TEXTAREA}></th>
            <th class="center"><{$smarty.const._MA_TESTMODULEUPDATE_TESTFIELD_DHTML}></th>
            <th class="center"><{$smarty.const._MA_TESTMODULEUPDATE_TESTFIELD_CHECKBOX}></th>
            <th class="center"><{$smarty.const._MA_TESTMODULEUPDATE_TESTFIELD_YESNO}></th>
            <th class="center"><{$smarty.const._MA_TESTMODULEUPDATE_TESTFIELD_SELECTBOX}></th>
            <th class="center"><{$smarty.const._MA_TESTMODULEUPDATE_TESTFIELD_USER}></th>
            <th class="center"><{$smarty.const._MA_TESTMODULEUPDATE_TESTFIELD_COLOR}></th>
            <th class="center"><{$smarty.const._MA_TESTMODULEUPDATE_TESTFIELD_IMAGELIST}></th>
            <th class="center"><{$smarty.const._MA_TESTMODULEUPDATE_TESTFIELD_URLFILE}></th>
            <th class="center"><{$smarty.const._MA_TESTMODULEUPDATE_TESTFIELD_UPLIMAGE}></th>
            <th class="center"><{$smarty.const._MA_TESTMODULEUPDATE_TESTFIELD_UPLFILE}></th>
            <th class="center"><{$smarty.const._MA_TESTMODULEUPDATE_TESTFIELD_TEXTDATESELECT}></th>
            <th class="center"><{$smarty.const._MA_TESTMODULEUPDATE_TESTFIELD_SELECTFILE}></th>
            <th class="center"><{$smarty.const._MA_TESTMODULEUPDATE_TESTFIELD_COUNTRY_LIST}></th>
            <th class="center"><{$smarty.const._MA_TESTMODULEUPDATE_TESTFIELD_RADIO}></th>
            <th class="center"><{$smarty.const._MA_TESTMODULEUPDATE_TESTFIELD_STATUS}></th>
            <th class="center"><{$smarty.const._MA_TESTMODULEUPDATE_TESTFIELD_DATETIME}></th>
            <th class="center"><{$smarty.const._MA_TESTMODULEUPDATE_TESTFIELD_COMBOBOX}></th>
            <th class="center"><{$smarty.const._MA_TESTMODULEUPDATE_TESTFIELD_COMMENTS}></th>
            <th class="center"><{$smarty.const._MA_TESTMODULEUPDATE_TESTFIELD_RATINGS}></th>
            <th class="center"><{$smarty.const._MA_TESTMODULEUPDATE_TESTFIELD_IP}></th>
            <th class="center"><{$smarty.const._MA_TESTMODULEUPDATE_TESTFIELD_READS}></th>
        </tr>
    </thead>
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
            <td class='center'><{$testfield.country_list}></td>
            <td class='center'><{$testfield.radio}></td>
            <td class='center'><img src="<{$modPathIcon16}>status<{$testfield.status}>.png" alt="<{$testfield.status_text}>" title="<{$testfield.status_text}>" ></td>
            <td class='center'><{$testfield.datetime}></td>
            <td class='center'><{$testfield.combobox}></td>
            <td class='center'><{$testfield.comments}></td>
            <td class='center'><{$testfield.ratings}></td>
            <td class='center'><{$testfield.ip}></td>
            <td class='center'><{$testfield.reads}></td>
        </tr>
        <{/foreach}>
    </tbody>
</table>
<!-- Footer -->
<{include file='db:testmoduleupdate_footer.tpl' }>
