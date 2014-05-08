<script type ="text/template" id="fullProfileTemplate">
    <hr />
    <div class="accordion" id="fullProfileAccordion">
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#fullProfileAccordion" href="#personalDetail">
                    Personal Detail
                </a>
            </div>
            <div id="personalDetail" class="accordion-body collapse in">
                <div class="accordion-inner accordion-form">
                    <form id="personalDetailsForm" action="" method="POST">
                        <div class="span3 pull-right"><input type="submit" class="btn btn-info btn-block" value="Save" /></div>
                        <div class="span12">
                            <label class="span4">Name</label>
                            <input type="text" value="<%= res.result[0].EnglishName %>" class="form-control span8" name="englishName" />
                        </div>
                        <div class="span12">
                            <label class="span4">Email</label>
                            <input type="text" value="<%= res.result[0].Email %>" class="form-control span8" name="email" />
                        </div>
                        <div class="span12">
                            <label class="span4">Date of Birth</label>
                            <input type="text" value="<%= res.result[0].BOD %>" class="form-control span8" name="BOD" />
                        </div>
                        <div class="span12">
                            <label class="span4">Mobile No</label>
                            <input type="text" value="<%= res.result[0].MobileNo %>" class="form-control span8" name="mobileNo" />
                        </div>
                        <div class="span12">
                            <label class="span4">Present Address</label>
                            <textarea rows="3" class="form-control span8" name="presentAddress"><%= res.result[0].PresentAddress %></textarea>
                        </div>
                        <div class="span12">
                            <label class="span4">Permenant Address</label>
                            <textarea rows="3" class="form-control span8" name="permenantAddress"><%= res.result[0].PermenantAddress %></textarea>
                        </div>
                        <div class="span12">
                            <label class="span4">Own Remarks</label>
                            <textarea rows="3" class="form-control span8" name="ownRemarks"><%= res.result[0].OwnRemarks %></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#fullProfileAccordion" href="#guardiansDetail">
                    Guardian's Details
                </a>
            </div>
            <div id="guardiansDetail" class="accordion-body collapse">
                <div class="accordion-inner accordion-form">
                    <form id="guardiansDetailForm" action="" method="POST">
                        <div class="span3 pull-right"><input type="submit" class="btn btn-info btn-block" value="Save" /></div>
                        <div class="span12">
                            <label class="span4">Father's Name</label>
                            <input type="text" value="<%= res.result[0].FathersName %>" class="form-control span8" name="fathersName">
                        </div>
                        <div class="span12">
                            <label class="span4">Father's Education</label>
                            <textarea rows="3" class="form-control span8" name="fathersEducation"><%= res.result[0].FathersEducation %></textarea>
                        </div>
                        <div class="span12">
                            <label class="span4">Father's Profession</label>
                            <textarea rows="3" class="form-control span8" name="fathersProfession"><%= res.result[0].FathersProfession %></textarea>
                        </div>
                        <div class="span12">
                            <label class="span4">Mother's Name</label>
                            <input type="text" value="<%= res.result[0].MothersName %>" class="form-control span8" name="mothersName">
                        </div>
                        <div class="span12">
                            <label class="span4">Mother's Education</label>
                            <textarea rows="3" class="form-control span8" name="mothersEducation"><%= res.result[0].MothersEducation %></textarea>
                        </div>
                        <div class="span12">
                            <label class="span4">Mother's Profession</label>
                            <textarea rows="3" class="form-control span8" name="mothersProfession"><%= res.result[0].MothersProfession %></textarea>
                        </div>
                        <div class="span12">
                            <label class="span4">Parent's Mobile No</label>
                            <input type="text" value="<%= res.result[0].ParentMobileNo %>" class="form-control span8" name="parentMobileNo" />
                        </div>
                        <div class="span12">
                            <label class="span4">Guardian's Name</label>
                            <input type="text" value="<%= res.result[0].GuardiansName %>" class="form-control span8" name="guardiansName" />
                        </div>
                        <div class="span12">
                            <label class="span4">Relationship With Guardian</label>
                            <input type="text" value="<%= res.result[0].RelationWithGuardian %>" class="form-control span8" name="relationWithGuardian" />
                        </div>
                        <div class="span12">
                            <label class="span4">Guardian's Mobile No</label>
                            <input type="text" value="<%= res.result[0].GuardiansMobileNo %>" class="form-control span8" name="guardiansMobileNo" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#fullProfileAccordion" href="#organizationDetail">
                    Organization Details
                </a>
            </div>
            <div id="organizationDetail" class="accordion-body collapse">
                <div class="accordion-inner accordion-form">
                    <form id="organizationDetailForm" action="" method="POST">
                        <div class="span3 pull-right"><input type="submit" class="btn btn-info btn-block" value="Save" /></div>
                        <div class="span12">
                            <label class="span4">Organization Type</label>
                            <select name='organizationType' id='organizationType'>
                                <option value="">-- Select One --</option>
                                <% _.each(res.organizationTypeList, function(list){ 
                                        if(list.OrganizationTypeID == res.result[0].OrganizationTypeID){ %>
                                            <option value="<%= list.OrganizationTypeID %>" selected><%= list.Title %></option>
                                        <% } else{ %>
                                            <option value="<%= list.OrganizationTypeID %>"><%= list.Title %></option>
                                        <% } %>
                                <% }) %>
                            </select>
                        </div>
                        <div class="span12">
                            <label class="span4">Name of Organization</label>
                            <input type="text" value="<%= res.result[0].NameOfOrganization %>" class="form-control span8" name="nameOfOrganization">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#fullProfileAccordion" href="#pinDetail">
                    Pin Detail
                </a>
            </div>
            <div id="pinDetail" class="accordion-body collapse">
                <div class="accordion-inner accordion-form">
                    <form id="pinDetailForm">
                        <div class="span12"></div>
                        <div class="span12">
                            <label class="span4">Username</label>
                            <input type="text" disabled value="<%= res.result[0].username %>" class="form-control span8" />
                        </div>
                        <div class="span12">
                            <label class="span4">Pin</label>
                            <input type="text" disabled value="<%= res.result[0].Pin %>" class="form-control span8" />
                        </div>
                        <div class="span12">
                            <label class="span4">User Quality</label>
                            <input type="text" disabled value="<%= res.result[0].UserQuality %>" class="form-control span8" />
                        </div>
                        <div class="span12">
                            <label class="span4">Religion</label>
                            <input type="text" disabled value="<%= res.result[0].Religion %>" class="form-control span8" />
                        </div>
                        <div class="span12">
                            <label class="span4">Gender</label>
                            <input type="text" disabled value="<%= res.result[0].Gender %>" class="form-control span8" />
                        </div>
                        <div class="span12">
                            <label class="span4">Marital Status</label>
                            <input type="text" disabled value="<%= res.result[0].MaritalStatus %>" class="form-control span8" />
                        </div>
                        <div class="span12">
                            <label class="span4">Category</label>
                            <input type="text" disabled value="<%= res.result[0].Category %>" class="form-control span8" />
                        </div>
                        <div class="span12">
                            <label class="span4">Financial Status</label>
                            <input type="text" disabled value="<%= res.result[0].FinancialStatus %>" class="form-control span8" />
                        </div>
                        <div class="span12">
                            <label class="span4">Educational Status</label>
                            <input type="text" disabled value="<%= res.result[0].EducationalStatus %>" class="form-control span8" />
                        </div>
                        <div class="span12">
                            <label class="span4">Professional Status</label>
                            <input type="text" disabled value="<%= res.result[0].ProfessionalStatus %>" class="form-control span8" />
                        </div>
                        <div class="span12">
                            <label class="span4">Height</label>
                            <input type="text" disabled value="<%= res.result[0].Height %>" class="form-control span8" />
                        </div>
                        <div class="span12">
                            <label class="span4">Color</label>
                            <input type="text" disabled value="<%= res.result[0].Color %>" class="form-control span8" />
                        </div>
                        <div class="span12">
                            <label class="span4">Age</label>
                            <input type="text" disabled value="<%= res.result[0].Age %>" class="form-control span8" />
                        </div>
                        <div class="span12">
                            <label class="span4">Area</label>
                            <input type="text" disabled value="<%= res.result[0].Area %>" class="form-control span8" />
                        </div>
                        <div class="span12">
                            <label class="span4">Sub Area</label>
                            <input type="text" disabled value="<%= res.result[0].SubArea %>" class="form-control span8" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#fullProfileAccordion" href="#others">
                    Others
                </a>
            </div>
            <div id="others" class="accordion-body collapse">
                <div class="accordion-inner accordion-form">
                    <form id="othersForm"  action="" method="POST">
                        <div class="span3 pull-right"><input type="submit" class="btn btn-info btn-block" value="Save" /></div>
                        <div class="span12">
                            <label class="span4">Home Royality</label>
                            <select name='homeRoyality' id='homeRoyality'>
                                <option value="">-- Select One --</option>
                                <% _.each(res.homeRoyalityList, function(list){ 
                                        if(list.HomeRoyalityID == res.result[0].HomeRoyalityID){ %>
                                            <option value="<%= list.HomeRoyalityID %>" selected><%= list.Title %></option>
                                        <% } else{ %>
                                            <option value="<%= list.HomeRoyalityID %>"><%= list.Title %></option>
                                        <% } %>
                                <% }) %>
                            </select>
                        </div>
                        <div class="span12">
                            <label class="span4">Education Mode</label>
                            <select name='educationMode' id='educationMode'>
                                <option value="">-- Select One --</option>
                                <% _.each(res.educationModeList, function(list){ 
                                        if(list.EducationModeID == res.result[0].EducationModeID){ %>
                                            <option value="<%= list.EducationModeID %>" selected><%= list.Title %></option>
                                        <% } else{ %>
                                            <option value="<%= list.EducationModeID %>"><%= list.Title %></option>
                                        <% } %>
                                <% }) %>
                            </select>
                        </div>
                        <div class="span12">
                            <label class="span4">Children Description</label>
                            <select name='childrenDescription' id='childrenDescription'>
                                <option value="">-- Select One --</option>
                                <% _.each(res.childrenDescriptionList, function(list){ 
                                        if(list.ChildrenDescriptionID == res.result[0].ChildrenDescriptionID){ %>
                                            <option value="<%= list.ChildrenDescriptionID %>" selected><%= list.Title %></option>
                                        <% } else{ %>
                                            <option value="<%= list.ChildrenDescriptionID %>"><%= list.Title %></option>
                                        <% } %>
                                <% }) %>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</script>
