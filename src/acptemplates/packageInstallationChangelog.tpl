{include file='setupWindowHeader'}

<form method="post" action="index.php?page=Package">
    <fieldset>
        <legend>{lang}wcf.acp.package.changelog{/lang}</legend>
        <div class="inner">
            <p>{lang}wcf.acp.package.changelog.description{/lang}</p>
            
            <div>
               <p>{@$content}</p>
            </div>
            
            <input type="hidden" name="queueID" value="{@$queueID}" />
            <input type="hidden" name="action" value="{@$action}" />
            {@SID_INPUT_TAG}
            <input type="hidden" name="step" value="{@$step}" />
            <input type="hidden" name="packageID" value="{@PACKAGE_ID}" />
            <input type="hidden" name="send" value="send" />
        </div>
    </fieldset>
    
    
    <div class="nextButton">
        <input type="submit" value="{lang}wcf.global.button.next{/lang}" onclick="parent.stopAnimating();" />
    </div>
</form>

<script type="text/javascript">
    //<![CDATA[
    window.onload = function() {
	changeHeight();
};

    parent.showWindow(true);
    parent.setCurrentStep('{lang}wcf.acp.package.step.title{/lang}{lang}wcf.acp.package.step.{if $action == 'rollback'}uninstall{else}{@$action}{/if}.{@$step}{/lang}');
    //]]>
</script>

{include file='setupWindowFooter'}