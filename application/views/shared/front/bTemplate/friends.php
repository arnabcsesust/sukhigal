<script type ="text/template" id="proposalFriendTemplate">
    <div class="row-fluid">
    <% _.each(res.result, function(businessFriend){ %>
        <div class="span3">
            <% if(businessFriend.ProfilePictureName == null){ %>
            <a class='proposalFriend' href='#/interaction/<%= businessFriend.UserID %>'><img src="<?php echo base_url().'assets/img/defaultProfilePic(40x40).jpg'; ?>" /></a>
            <% }else{ %>
            <a class='proposalFriend' href='#/interaction/<%= businessFriend.UserID %>'><img src="<?php echo base_url() . 'uploads/x-small/<%= businessFriend.ProfilePictureName %>'; ?>" alt="" /></a>
            <% }%>
        </div>
        <% if(_.indexOf(_.toArray(res.result), businessFriend) % 4 == 3){%>
            </div>
            <hr class="friendListHr" />
            <div class="row-fluid">
        <% } %>
    <% }) %>
</script>
