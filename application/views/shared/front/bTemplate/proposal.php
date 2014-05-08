<script type="text/template" id="proposalParentTemplate">
    <h4>Proposal</h4>
    <hr />
    <div class='row-fluid'>
        <div class='span4'>
            <table class="table table-bordered">
                <tr>
                    <td id='receiveProposal'><a href='#/receiveProposal'>Received</a></td>
                    <td id='sentProposal'><a href='#/sentProposal'>Sent</a></td>
                    <td id='acceptedProposal'><a href='#/acceptedProposal'>Accepted</a></td>
                    <td id='deniedProposal'><a href='#/deniedProposal'>Denied</a></td>
                    <td id='pendingProposal'><a href='#/pendingProposal'>Pending</a></td>
                </tr>
            </table>
        </div>
    </div>
    <div class='row-fluid'>
        <div id="proposalList" class="span12">
        </div>
    </div>
</script>
<script type="text/template" id="sentProposalListTemplate">
    <h6>Sent Proposal</h6>
    <div class="scroll-table">
    <table class="table table-striped table-hover">
        <% _.each(res.result, function(sentProposal){ %>
        <tr>
            <td>
                <h6>You Send a <%= sentProposal.Proposal %> Proposal To <a href="#/interaction/<%= sentProposal.UserID %>"><%= sentProposal.EnglishName %></a>
                <span class='pull-right'><%
                var d = new Date(sentProposal.Date*1000);
                print(d.getDate()+'/'+(d.getMonth() + 1)+'/'+d.getFullYear()+' '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds());
                %></span>
                </h6>
                <p>Proposal Details: <%= sentProposal.Text %></p>
            </td>
        </tr>
        <% }) %>
    </table>
    </div>
</script>
<script type="text/template" id="receiveProposalListTemplate">
    <h6>Received Proposal</h6>
    <div class="scroll-table">
    <table class="table table-striped table-hover">
        <% _.each(res.result, function(receiveProposal){ %>
        <tr>
            <td>
                <h6>
                <img src="<?php echo base_url().'uploads/x-small/<%= receiveProposal.ProfilePictureName %>'; ?>" />
                <a href="#/interaction/<%= receiveProposal.UserID %>"><%= receiveProposal.EnglishName %></a> Send a <%= receiveProposal.Proposal %> Proposal To You
                <span class='pull-right'><%
                var d = new Date(receiveProposal.Date*1000);
                print(d.getDate()+'/'+(d.getMonth() + 1)+'/'+d.getFullYear()+' '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds());
                %></span>
                </h6>
                <p>Proposal Details: <%= receiveProposal.Text %>
                <span class="pull-right">
                    <button id="accept" data-proposalID='<%= receiveProposal.UserProposalID %>' class="btn btn-success">Accept</button>
                    <button id="deny" data-proposalID='<%= receiveProposal.UserProposalID %>' class="btn">Deny</button>
                </span>
                </p>
            </td>
        </tr>
        <% }) %>
    </table>
    </div>
</script>
<script type="text/template" id="acceptedProposalListTemplate">
    <h6>Accepted Proposal</h6>
    <div class="scroll-table">
        <table class="table table-striped table-hover">
            <% _.each(res.result, function(acceptedProposal){ %>
            <tr>
                <td>
                    <h6><a href="#/interaction/<%= acceptedProposal.UserID %>"><%= acceptedProposal.EnglishName %></a> (<%= acceptedProposal.Proposal %> Proposal)
                    <span class='pull-right'><%
                    var d = new Date(acceptedProposal.Date*1000);
                    print(d.getDate()+'/'+(d.getMonth() + 1)+'/'+d.getFullYear()+' '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds());
                    %></span>
                    </h6>
                    <p>Proposal Details: <%= acceptedProposal.Text %></p>
                </td>
            </tr>
            <% }) %>
        </table>
    </div>
</script>
<script type="text/template" id="deniedProposalListTemplate">
    <h6>Denied Proposal</h6>
    <div class="scroll-table">
        <table class="table table-striped table-hover">
            <% _.each(res.result, function(deniedProposal){ %>
            <tr>
                <td>
                    <h6><a href="#/interaction/<%= deniedProposal.UserID %>"><%= deniedProposal.EnglishName %></a> (<%= deniedProposal.Proposal %> Proposal)
                    <span class='pull-right'><%
                    var d = new Date(deniedProposal.Date*1000);
                    print(d.getDate()+'/'+(d.getMonth() + 1)+'/'+d.getFullYear()+' '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds());
                    %></span>
                    </h6>
                    <p>Proposal Details: <%= deniedProposal.Text %></p>
                </td>
            </tr>
            <% }) %>
        </table>
    </div>
</script>
<script type="text/template" id="pendingProposalListTemplate">
    <h6>Pending Proposal</h6>
    <div class="scroll-table">
        <table class="table table-striped table-hover">
            <% _.each(res.result, function(pendingProposal){ %>
            <tr>
                <td>
                    <h6><a href="#/interaction/<%= pendingProposal.UserID %>"><%= pendingProposal.EnglishName %></a> (<%= pendingProposal.Proposal %> Proposal)
                    <span class='pull-right'><%
                    var d = new Date(pendingProposal.Date*1000);
                    print(d.getDate()+'/'+(d.getMonth() + 1)+'/'+d.getFullYear()+' '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds());
                    %></span>
                    </h6>
                    <p>Proposal Details: <%= pendingProposal.Text %></p>
                </td>
            </tr>
            <% }) %>
        </table>
    </div>
</script>