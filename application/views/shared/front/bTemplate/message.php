<script type="text/template" id="messageParentPage">
    <h4>Messages</h4>
    <hr />
    <div class='row-fluid'>
        <div class='span4'>
            <table class="table table-bordered">
                <tr>
                    <td id='inbox'><a href='#/inbox'>inbox</a></td>
                    <td id='sent'><a href='#/sent'>sent items</a></td>
<!--                    <td id='deleted'>deleted</td>-->
                </tr>
            </table>
        </div>
    </div>
    <div class='row-fluid'>
        <div id="userList" class='span4'>
        </div>
        <div id="messageList" class="span8">
        </div>
    </div>
</script>
<script type="text/template" id="inboxTemplate">
<h5>Inbox</h5>
<table class="table table-striped table-hover">
    <% _.each(res.result, function(inboxUser){ %>
        <tr>
            <td>
                <a href='#' class='inboxMessage' data-pic='<%= inboxUser.ProfilePictureName %>' data-username = '<%= inboxUser.EnglishName %>' data-userID = '<%= inboxUser.UserID %>'>
                    <% if(inboxUser.ProfilePictureName == null){ %>
                    <img src="<?php echo base_url().'assets/img/defaultProfilePic(600x900).jpg'; ?>" />
                    <% }else{ %>
                    <img src="<?php echo base_url().'uploads/x-small/<%= inboxUser.ProfilePictureName %>'; ?>" />
                    <% }%>
                    <%= inboxUser.EnglishName %>
                </a>
            </td>
        </tr>
    <% }) %>
</table>
</script>
<script type="text/template" id="sentMessageTemplate">
<h5>Sent Items</h5>
<table class="table table-striped table-hover">
    <% _.each(res.result, function(sentUser){ %>
        <tr>
            <td>
                <a href='#' class='sentMessage' data-pic='<%= sentUser.ProfilePictureName %>' data-username = '<%= sentUser.EnglishName %>' data-userID='<%= sentUser.UserID %>'>
                    <% if(sentUser.ProfilePictureName == null){ %>
                    <img src="<?php echo base_url().'assets/img/defaultProfilePic(40x40).jpg'; ?>" />
                    <% }else{ %>
                    <img src="<?php echo base_url().'uploads/x-small/<%= sentUser.ProfilePictureName %>'; ?>" />
                    <% }%>
                    <%= sentUser.EnglishName %>
                </a>
                </td>
        </tr>
    <% }) %>
</table>
</script>
<script type="text/template" id="messageListTemplate">
    <h5>
    <img src="<?php echo base_url().'uploads/x-small/<%= userpic %>'; ?>" />
    <%= username %>
    </h5>
    <div class="scroll-table">
    <table class="table table-striped">
        <% _.each(res.result, function(inboxMessages){ %>
            <tr>
                <td>
                    <h6><%= inboxMessages.Subject %>
                    <span class='pull-right'><%
                    var d = new Date(inboxMessages.Date*1000);
                    print(d.getDate()+'/'+(d.getMonth() + 1)+'/'+d.getFullYear()+' '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds());
                    %></span>
                    </h6>
                    <p><%= inboxMessages.Text %></p>
                </td>
            </tr>
        <% }) %>
    </table>
    </div>
</script>
