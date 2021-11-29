<!-- Header -->
<{include file='db:testmoduleupdate_header.tpl' }>

<table class='table table-bordered'>
    <thead>
        <tr class='head'>
            <th class="center"><{$smarty.const._MA_TESTMODULEUPDATE_ARTICLE_ID}></th>
            <th class="center"><{$smarty.const._MA_TESTMODULEUPDATE_ARTICLE_CAT}></th>
            <th class="center"><{$smarty.const._MA_TESTMODULEUPDATE_ARTICLE_TITLE}></th>
            <th class="center"><{$smarty.const._MA_TESTMODULEUPDATE_ARTICLE_DESCR}></th>
            <th class="center"><{$smarty.const._MA_TESTMODULEUPDATE_ARTICLE_IMG}></th>
            <th class="center"><{$smarty.const._MA_TESTMODULEUPDATE_ARTICLE_FILE}></th>
            <th class="center"><{$smarty.const._MA_TESTMODULEUPDATE_ARTICLE_CREATED}></th>
            <th class="center"><{$smarty.const._MA_TESTMODULEUPDATE_ARTICLE_SUBMITTER}></th>
        </tr>
    </thead>
    <tbody>
        <{foreach item=article from=$articles_list}>
        <tr class='<{cycle values='odd, even'}>'>
            <td class='center'><{$article.id}></td>
            <td class='center'><{$article.cat}></td>
            <td class='center'><{$article.title}></td>
            <td class='center'><{$article.descr_short}></td>
            <td class='center'><img src="<{$testmoduleupdate_upload_url|default:false}>/images/articles/<{$article.img}>" alt="articles" style="max-width:100px" ></td>
            <td class='center'><{$article.file}></td>
            <td class='center'><{$article.created}></td>
            <td class='center'><{$article.submitter}></td>
        </tr>
        <{/foreach}>
    </tbody>
</table>
<!-- Footer -->
<{include file='db:testmoduleupdate_footer.tpl' }>
