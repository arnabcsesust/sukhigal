<script type="text/template" id="interactionButton">
<div class='span1'></div>    
<div class='span2'>
    <a id="messageToolTip" href="#sendMessage" class="btn btn-primary btn-block" data-toggle="modal">Message</a>
</div>
<div class='span2'>
    <a id="marraigeToolTip" href="#marraigeProposal" class="btn btn-primary btn-block" data-toggle="modal">Marraige</a>
</div>
<div class='span2'>
    <a id="jobToolTip" href="#jobProposal" class="btn btn-primary btn-block" data-toggle="modal">Job</a>
</div>
<div class='span2'>
    <a id="businessToolTip" href="#businessProposal" class="btn btn-primary btn-block" data-toggle="modal">Business</a>
</div>
<div class='span3'>
    <a id='likeProfile' data-userID='<%= senderID %>' href='#' class="btn btn-primary btn-block" >Like This Profile</a>
</div>
<!--START Message Send Modal-->
<div id="sendMessage" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Send Message</h3>
    </div>
    <div class="modal-body">
        <form id="frmMessageSend" action="javascript:void(0);" method="POST">
            <div class="row">
                <div class="span1"></div>
                <div class="span8">
                    <input type="text" name="messageSubject" placeholder="Type subject" class="block" />
                </div>
            </div>
            <div class="row">
                <div class="span1"></div>
                <div class="span8">
                    <input type="hidden" name="receiverId" value="<%= senderID %>" />
                    <textarea id="messageBody" name="messageBody" placeholder="Type your message here"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="span9"></div>
                <div class="span1">
                    <input type="submit" value="Send Message" class="btn btn-success" />
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>
<!--END Message Send Modal-->


<!--START Marraige Proposal Send Modal-->
<div id="marraigeProposal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Marraige Proposal</h3>
    </div>
    <div class="modal-body">
        <form id="frmMarryProposal" action="javascript:void(0);" method="POST">
            <div class="row">
                <div class="span1"></div>
                <div class="span8">
                    <input type="hidden" name="ProposedUserID" value="<%= senderID %>" />
                    <input type="hidden" name="ProposalType" value="1" />
                    <textarea id="marraigeProposalBody" name="ProposalBody" placeholder="Additional Message For Marraige Proposal.."></textarea>
                </div>
            </div>
            <div class="row">
                <div class="span9"></div>
                <div class="span1">
                    <input type="submit" value="Propose" class="btn btn-success" />
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>
<!--END Marraige Proposal Send Modal-->


<!--START Job Proposal Send Modal-->
<div id="jobProposal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Job Proposal</h3>
    </div>
    <div class="modal-body">
        <form id="frmJobProposal" action="javascript:void(0);" method="POST">
            <div class="row">
                <div class="span1"></div>
                <div class="span8">
                    <input type="hidden" name="ProposedUserID" value="<%= senderID %>" />
                    <input type="hidden" name="ProposalType" value="2" />
                    <textarea id="jobProposalBody" name="ProposalBody" placeholder="Additional Message For Job Proposal"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="span9"></div>
                <div class="span1">
                    <input type="submit" value="Propose" class="btn btn-success" />
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>
<!--END Job Proposal Send Modal-->


<!--START Business Proposal Send Modal-->
<div id="businessProposal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Business Proposal</h3>
    </div>
    <div class="modal-body">
        <form id="frmBusinessProposal" action="javascript:void(0);" method="POST">
            <div class="row">
                <div class="span1"></div>
                <div class="span8">
                    <input type="hidden" name="ProposedUserID" value="<%= senderID %>" />
                    <input type="hidden" name="ProposalType" value="3" />
                    <textarea id="businessProposalBody" name="ProposalBody" placeholder="Additional Message For Business Proposal.."></textarea>
                </div>
            </div>
            <div class="row">
                <div class="span9"></div>
                <div class="span1">
                    <input type="submit" value="Propose" class="btn btn-success" />
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>
<!--END Business Proposal Send Modal-->
</script>
