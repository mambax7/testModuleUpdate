<!-- Header -->
<{include file='db:testmoduleupdate_admin_header.tpl' }>

<{if $articles_list|default:''}>
    <table class='table table-bordered'>
        <thead>
            <tr class='head'>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_ARTICLE_ID}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_ARTICLE_CAT}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_ARTICLE_TITLE}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_ARTICLE_DESCR}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_ARTICLE_IMG}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_ARTICLE_STATUS}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_ARTICLE_FILE}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_ARTICLE_RATINGS}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_ARTICLE_VOTES}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_ARTICLE_CREATED}></th>
                <th class="center"><{$smarty.const._AM_TESTMODULEUPDATE_ARTICLE_SUBMITTER}></th>
                <th class="center width5"><{$smarty.const._AM_TESTMODULEUPDATE_FORM_ACTION}></th>
            </tr>
        </thead>
        <{if $articles_count|default:''}>
        <tbody>
            <{foreach item=article from=$articles_list}>
            <tr class='<{cycle values='odd, even'}>'>
                <td class='center'><{$article.id}></td>
                <td class='center'><{$article.cat}></td>
                <td class='center'><{$article.title}></td>
                <td class='center'><{$article.descr_short}></td>
                <td class='center'><img src="<{$testmoduleupdate_upload_url|default:false}>/images/articles/<{$article.img}>" alt="articles" style="max-width:100px" ></td>
                <td class='center'><img src="<{$modPathIcon16}>status<{$article.status}>.png" alt="<{$article.status_text}>" title="<{$article.status_text}>" ></td>
                <td class='center'><{$article.file}></td>
                <td class='center'><{$article.ratings}></td>
                <td class='center'><{$article.votes}></td>
                <td class='center'><{$article.created}></td>
                <td class='center'><{$article.submitter}></td>
                <td class="center  width5">
                    <a href="articles.php?op=edit&amp;art_id=<{$article.id}>&amp;start=<{$start}>&amp;limit=<{$limit}>" title="<{$smarty.const._EDIT}>"><img src="<{xoModuleIcons16 edit.png}>" alt="<{$smarty.const._EDIT}> articles" ></a>
                    <a href="articles.php?op=clone&amp;art_id_source=<{$article.id}>" title="<{$smarty.const._CLONE}>"><img src="<{xoModuleIcons16 editcopy.png}>" alt="<{$smarty.const._CLONE}> articles" ></a>
                    <a href="articles.php?op=delete&amp;art_id=<{$article.id}>" title="<{$smarty.const._DELETE}>"><img src="<{xoModuleIcons16 delete.png}>" alt="<{$smarty.const._DELETE}> articles" ></a>
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
