<table class='table table-<{$table_type|default:false}>'>
    <thead>
        <tr class='head'>
            <th>&nbsp;</th>
            <th class='center'><{$smarty.const._MB_TESTMODULEUPDATE_TF_TEXT}></th>
        </tr>
    </thead>
    <{if count($block)}>
    <tbody>
        <{foreach item=testfield from=$block}>
        <tr class='<{cycle values="odd, even"}>'>
            <td class='center'><{$testfield.id}></td>
            <td class='center'><{$testfield.text}></td>
            <td class='center'><a href='testfields.php?op=show&amp;tf_id=<{$testfield.id}>' title='<{$smarty.const._MB_TESTMODULEUPDATE_TESTFIELD_GOTO}>'><{$smarty.const._MB_TESTMODULEUPDATE_TESTFIELD_GOTO}></a></td>
        </tr>
        <{/foreach}>
    </tbody>
    <{/if}>
    <tfoot><tr><td>&nbsp;</td></tr></tfoot>
</table>
