<script type ="text/template" id="advance_search_result">
    <hr />
    <div class="row-fluid">
    <% _.each(res.searchResult, function(test){ %>
            <div class="span4">
            <a href="#/interaction/<%= test.UserID %>" class="thumbnail">
                <div class="span2">
                    <% if(test.ProfilePictureName == null){ %>
                    <img src="<?php echo base_url().'assets/img/defaultProfilePic(600x900).jpg'; ?>" />
                    <% }else{ %>
                    <img src="<?php echo base_url().'uploads/thumbs/<%= test.ProfilePictureName %>'; ?>" />
                    <% }%>
                </div>
                <div class="span1"></div>
                <div class="span9">
                    <p><%= test.EnglishName %></p>
                    <p><%= test.Email %></p>
                    <p>Quality: <%= test.UserQuality %></p>
                </div>
                <div style="clear:both"></div>
            </a>
            </div>
            <% if(_.indexOf(_.toArray(res.searchResult), test) % 3 == 2){%>
                </div>
                <hr />
                <div class="row">
            <% } %>
    <% }) %>
</script>
