<script type ="text/template" id="profilePicTemplate">
<div class="sidebar-nav">
    <% if(res == null){ %>
    <img src="<?php echo base_url() . 'assets/img/defaultProfilePic.jpg'; ?>" alt="" />
    <% }else{ %>
    <img src="<?php echo base_url() . 'uploads/resized/<%= res %>'; ?>" alt="" />
    <% } %>
    <% if(!isInteraction){ %>
    <a href="javascript:void(0);" id="upload"><i class="icon-upload"></i></a>
    <hr class="friendListHr" />
    <div class="accordion" id="accordion2">
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                    Item #1
                </a>
            </div>
            <div id="collapseOne" class="accordion-body collapse in">
                <div class="accordion-inner">
                    <ul class="accor-dropdown-menu">
                        <li><a href="#/permission">Permission</a></li>
                        <li class="divider"></li>
                        <li><a href="#/receiveProposal">Proposal</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Like</a></li>
                        <li class="divider"></li>
                        <li><a href="#/inbox">Messages</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Change Profile Picture</h3>
    </div>
    <div class="modal-body">
        <?php echo form_open_multipart('main/webservice/profilePicUpload', 'id="uploadSubmit"'); ?>
        <input type="file" name="userfile" size="20" />
        <input type="submit" class="btn btn-success" value = "Upload" />
        </form>

        <div class="span10" id="uploadErrorMessage">
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
    <% }%>
</div>
</script>
