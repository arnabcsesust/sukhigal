<script type ="text/template" id="interactionSuccess">   
    <hr />
    <ul class="nav nav-tabs" id="ProfileTab">
        <li><a href="#personal" data-toggle="tab">Personal</a></li>
        <li><a href="#educational" data-toggle="tab">Educational</a></li>
        <li><a href="#professional" data-toggle="tab">Professional</a></li>
        <li><a href="#account" data-toggle="tab">Account Info</a></li>
        <li><a href="#others" data-toggle="tab">Others</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active scroll-table" id="personal">
            <div class="row">
                <div class="span1"></div>
                <div class="span2"><h6 class="ProfileLabel">Name:</h6></div>
                <div class="span3"><h6><%= res.EnglishName %></h6></div>
                <div class="span1"></div>
                <div class="span1"><h6 class="ProfileLabel">Email:</h6></div>
                <div class="span3"><h6><%= res.Email %></h6></div>
            </div>
            <div class="row">
                <div class="span1"></div>
                <div class="span2"><h6 class="ProfileLabel">Father's Name:</h6></div>
                <div class="span3"><h6><%= res.FathersName %></h6></div>
                <div class="span2"><h6 class="ProfileLabel">Mother's Name:</h6></div>
                <div class="span3"><h6><%= res.MothersName %></h6></div>
            </div>
            <div class="row">
                <div class="span1"></div>
                <div class="span1"><h6 class="ProfileLabel">Gender:</h6></div>
                <div class="span1"><h6><%= res.Gender %></h6></div>
                <div class="span1"></div>
                <div class="span2"><h6 class="ProfileLabel">Date of Birth:</h6></div>
                <div class="span2"><h6><%= res.BOD %></h6></div>
                <div class="span1"></div>
                <div class="span1"><h6 class="ProfileLabel">Age:</h6></div>
                <div class="span1"><h6><%= res.Age %></h6></div>
            </div>
            <div class="row">
                <div class="span1"></div>
                <div class="span1"><h6 class="ProfileLabel">Religion:</h6></div>
                <div class="span1"><h6><%= res.Religion %></h6></div>
                <div class="span1"></div>
                <div class="span2"><h6 class="ProfileLabel">Marital Status:</h6></div>
                <div class="span2"><h6><%= res.MaritalStatus %></h6></div>
                <div class="span1"></div>
                <div class="span1"><h6 class="ProfileLabel">Height:</h6></div>
                <div class="span1"><h6><%= res.Height %></h6></div>
            </div>
            <div class="row">
                <div class="span1"></div>
                <div class="span1"><h6 class="ProfileLabel">Mobile:</h6></div>
                <div class="span1"><h6><%= res.MobileNo %></h6></div>
                <div class="span1"></div>
                <div class="span2"><h6 class="ProfileLabel">Body Color:</h6></div>
                <div class="span2"><h6><%= res.Color %></h6></div>
                <div class="span1"></div>
                <div class="span1"><h6 class="ProfileLabel">Category:</h6></div>
                <div class="span1"><h6><%= res.Category %></h6></div>
            </div>
            <div class="row">
                <div class="span1"></div>
                <div class="span1"><h6 class="ProfileLabel">Area:</h6></div>
                <div class="span2"><h6><%= res.Area %></h6></div>
                <div class="span2"><h6 class="ProfileLabel">Sub Area:</h6></div>
                <div class="span2"><h6><%= res.SubArea %></h6></div>
            </div>
            <div class="row">
                <div class="span1"></div>
                <div class="span2"><h6 class="ProfileLabel">Present Address:</h6></div>
                <div class="span3"><h6><%= res.PresentAddress %></h6></div>
                <div class="span3"><h6 class="ProfileLabel">Permenant Address:</h6></div>
                <div class="span3"><h6><%= res.PermenantAddress %></h6></div>
            </div>
            <div class="row">
                <div class="span1"></div>
                <div class="span3"><h6 class="ProfileLabel">Remarks:</h6></div>
                <div class="span1"></div>
                <div class="span4"><h6><%= res.OwnRemarks %></h6></div>
            </div>
        </div>
        <div class="tab-pane" id="educational">
            <div class="row">
                <div class="span1"></div>
                <div class="span3"><h6 class="ProfileLabel">Education:</h6></div>
                <div class="span1"></div>
                <div class="span4"><h6><%= res.EducationalStatus %></h6></div>
            </div>
            <div class="row">
                <div class="span1"></div>
                <div class="span3"><h6 class="ProfileLabel">Father's Education:</h6></div>
                <div class="span1"></div>
                <div class="span4"><h6><%= res.FathersEducation %></h6></div>
            </div>
            <div class="row">
                <div class="span1"></div>
                <div class="span3"><h6 class="ProfileLabel">Mother's Education:</h6></div>
                <div class="span1"></div>
                <div class="span4"><h6><%= res.MothersEducation %></h6></div>
            </div>
            <div class="row">
                <div class="span1"></div>
                <div class="span3"><h6 class="ProfileLabel">Education Mode:</h6></div>
                <div class="span1"></div>
                <div class="span4"><h6><%= res.EducationMode %></h6></div>
            </div>
        </div>
        <div class="tab-pane" id="professional">
            <div class="row">
                <div class="span1"></div>
                <div class="span3"><h6 class="ProfileLabel">Profession:</h6></div>
                <div class="span1"></div>
                <div class="span4"><h6><%= res.ProfessionalStatus %></h6></div>
            </div>
            <div class="row">
                <div class="span1"></div>
                <div class="span3"><h6 class="ProfileLabel">Father's Profession:</h6></div>
                <div class="span1"></div>
                <div class="span4"><h6><%= res.FathersProfession %></h6></div>
            </div>
            <div class="row">
                <div class="span1"></div>
                <div class="span3"><h6 class="ProfileLabel">Mother's Profession:</h6></div>
                <div class="span1"></div>
                <div class="span4"><h6><%= res.MothersProfession %></h6></div>
            </div>
        </div>
        <div class="tab-pane" id="account">
            <div class="row">
                <div class="span1"></div>
                <div class="span2"><h6 class="ProfileLabel">Username:</h6></div>
                <div class="span1"><h6><%= res.username %></h6></div>
                <div class="span1"></div>
                <div class="span2"><h6 class="ProfileLabel">Pin No:</h6></div>
                <div class="span2"><h6><%= res.Pin %></h6></div>
                <div class="span1"></div>
                <div class="span1"><h6 class="ProfileLabel">Quality:</h6></div>
                <div class="span1"><h6><%= res.UserQuality %></h6></div>
            </div>
            <div class="row">
                <div class="span1"></div>
                <div class="span2"><h6 class="ProfileLabel">Group:</h6></div>
                <div class="span1"><h6><%= res.GroupNo %></h6></div>
                <div class="span1"></div>
                <div class="span2"><h6 class="ProfileLabel">Batch:</h6></div>
                <div class="span2"><h6><%= res.BatchNo %></h6></div>
                <div class="span1"></div>
                <div class="span1"><h6 class="ProfileLabel">Voucher:</h6></div>
                <div class="span1"><h6><%= res.VoucherNo %></h6></div>
            </div>
        </div>
        <div class="tab-pane" id="others">
            <div class="row">
                <div class="span1"></div>
                <div class="span3"><h6 class="ProfileLabel">Financial Status:</h6></div>
                <div class="span1"></div>
                <div class="span4"><h6><%= res.FinancialStatus %></h6></div>
            </div>
            <div class="row">
                <div class="span1"></div>
                <div class="span3"><h6 class="ProfileLabel">Guardian's Name:</h6></div>
                <div class="span1"></div>
                <div class="span4"><h6><%= res.GuardiansName %></h6></div>
            </div>
            <div class="row">
                <div class="span1"></div>
                <div class="span3"><h6 class="ProfileLabel">Guardian's Mobile:</h6></div>
                <div class="span1"></div>
                <div class="span4"><h6><%= res.GuardiansMobileNo %></h6></div>
            </div>
            <div class="row">
                <div class="span1"></div>
                <div class="span3"><h6 class="ProfileLabel">Guardian's Relation:</h6></div>
                <div class="span1"></div>
                <div class="span4"><h6><%= res.RelationWithGuardian %></h6></div>
            </div>
            <div class="row">
                <div class="span1"></div>
                <div class="span3"><h6 class="ProfileLabel">Parent's Mobile:</h6></div>
                <div class="span1"></div>
                <div class="span4"><h6><%= res.ParentMobileNo %></h6></div>
            </div>
            <div class="row">
                <div class="span1"></div>
                <div class="span3"><h6 class="ProfileLabel">Home Royality:</h6></div>
                <div class="span1"></div>
                <div class="span4"><h6><%= res.HomeRoyality %></h6></div>
            </div>
            <div class="row">
                <div class="span1"></div>
                <div class="span3"><h6 class="ProfileLabel">Organization Name:</h6></div>
                <div class="span1"></div>
                <div class="span4"><h6><%= res.NameOfOrganization %></h6></div>
            </div>
            <div class="row">
                <div class="span1"></div>
                <div class="span3"><h6 class="ProfileLabel">Organization Type:</h6></div>
                <div class="span1"></div>
                <div class="span4"><h6><%= res.OrganizationType %></h6></div>
            </div>
            <div class="row">
                <div class="span1"></div>
                <div class="span3"><h6 class="ProfileLabel">Children Description:</h6></div>
                <div class="span1"></div>
                <div class="span4"><h6><%= res.ChildrenDescription %></h6></div>
            </div>
        </div>
    </div>
</script>

<script type ="text/template" id="interactionError"> 
    <h4>Permission Denied</h4>
    <hr />
    <div class="row">
        <div class="span1"></div>
        <div class="span10 alert-error" id="interactionErrorMessage">
        <h5>Sorry!</h5>
        <%= res %>
        <p>Please <a href="#/permission">Apply</a> For The Permission</p>
        </div>
        <div class="span1"></div>
    </div>
</script>