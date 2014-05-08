<script type ="text/template" id="quick_search_area">
    <form id="quickSearchForm" action="<?php echo base_url() . 'main/home'; ?>" method="POST">
    <div class="row">
    <div class="span12"><h4>Quick Search</h4><hr /></div>
    </div>
    <div class="row">
    <div class="span6">
    <input type="text" placeholder="Enter the Pin" class="input-block-level" name='pin' id='pin' />
    </div>
    <div class='span2'>
    <input type="submit" class="btn btn-block btn-primary" value="Search" />
    </div>
    <div class='span4' id="ajax-loader">
    <img src="<?php echo base_url() . 'assets/img/ajax-loader.gif'; ?>" />
    </div>
    </div>
    </form>
    <div id="quickSearchResult"></div>
</script>
<script type ="text/template" id="quick_search_result">
<div class="row">
    <div class="span4"></div>
    <div class="span5">
        <a href="#/interaction/<%= res.UserID %>" class="thumbnail">
            <div class="span2">
                <% if(res.ProfilePictureName == null){ %>
                <img src="<?php echo base_url() . 'assets/img/defaultProfilePic(600x900).jpg'; ?>" />
                <% }else{ %>
                <img src="<?php echo base_url() . 'uploads/thumbs/<%= res.ProfilePictureName %>'; ?>" />
                <% }%>
            </div>
            <div class="span1"></div>
            <div class="span9">
                <p><%= res.EnglishName %></p>
                <p><%= res.Email %></p>
                <p>Quality: <%= res.UserQuality %></p>
            </div>
            <div style="clear:both"></div>
        </a>
    </div>
</div>
</script>
