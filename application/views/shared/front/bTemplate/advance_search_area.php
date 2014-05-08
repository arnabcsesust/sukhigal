<script type ="text/template" id="advance_search_area">
    <div class="row">
        <div class="span12"><h4>Advance Search</h4><hr /></div>
    </div>
    <form id="advanceSearchForm" action="" method="POST">
        <div class="row">
            <div class='span4'>
                <label for=''>Religion:</label>
            </div>
            <div class='span4'>
                <label for=''>Gender:</label>
            </div>
            <div class='span4'>
                <label for=''>Category:</label>
            </div>
        </div>
        <div class="row">
            <div class="span4">
                <select name='religionID' id='religionID'>
                    <option value="">-- Select One --</option>
                    <% _.each(res.religionList, function(list){ %>
                        <option value="<%= list.ReligionID %>"><%= list.EnglishName %></option>
                    <% }) %>
                </select>
            </div>
            <div class="span4">
                <select name='genderID' id='genderID'>
                    <option value="">-- Select One --</option>
                    <% _.each(res.genderList, function(list){ %>
                        <option value="<%= list.GenderID %>"><%= list.EnglishName %></option>
                    <% }) %>
                </select>
            </div>
            <div class="span4">
                <select name='categoryID' id='CategoryID'>
                    <option value="">-- Select One --</option>
                    <% _.each(res.categoryList, function(list){ %>
                        <option value="<%= list.CategoryID %>"><%= list.EnglishName %></option>
                    <% }) %>
                </select>
            </div>
        </div>
        <div class="row">
            <div class='span4'>
                <label for=''>Marital Status:</label>
            </div>
            <div class='span4'>
                <label for=''>Financial Status:</label>
            </div>
            <div class='span4'>
                <label for=''>Educational Status:</label>
            </div>
        </div>
        <div class="row">
            <div class="span4">
                <select name='maritalStatusID' id='maritalStatusID'>
                    <option value="">-- Select One --</option>
                    <% _.each(res.maritalStatusList, function(list){ %>
                        <option value="<%= list.MaritalStatusID %>"><%= list.EnglishTitle %></option>
                    <% }) %>
                </select>
            </div>
            <div class="span4">
                <select name='financialStatusID' id='financialStatusID'>
                    <option value="">-- Select One --</option>
                    <% _.each(res.financialStatusList, function(list){ %>
                        <option value="<%= list.FinancialStatusID %>"><%= list.EnglishTitle %></option>
                    <% }) %>
                </select>
            </div>
            <div class="span4">
                <select name='educationalStatusID' id='educationalStatusID'>
                    <option value="">-- Select One --</option>
                    <% _.each(res.educationalStatusList, function(list){ %>
                        <option value="<%= list.EducationalStatusID %>"><%= list.EnglishTitle %></option>
                    <% }) %>
                </select>
            </div>
        </div>
        <div class="row">
            <div class='span4'>
                <label for=''>Professional Status:</label>
            </div>
            <div class='span4'>
                <label for=''>Body Color:</label>
            </div>
            <div class='span4'>
                <label for=''>Body Height:</label>
            </div>
        </div>
        <div class="row">
            <div class="span4">
                <select name='professionalStatusID' id='professionalStatusID'>
                    <option value="">-- Select One --</option>
                    <% _.each(res.professionalStatusList, function(list){ %>
                        <option value="<%= list.ProfessionalStatusID %>"><%= list.EnglishTitle %></option>
                    <% }) %>
                </select>
            </div>
            <div class="span4">
                <select name='bodyColorID' id='bodyColorID'>
                    <option value="">-- Select One --</option>
                    <% _.each(res.bodyColorList, function(list){ %>
                        <option value="<%= list.BodyColorID %>"><%= list.EnglishTitle %></option>
                    <% }) %>
                </select>
            </div>
            <div class="span4">
                <select name='bodyHeightID' id='bodyHeightID'></select>
            </div>
        </div>
        <div class="row">
            <div class='span4'>
                <label for=''>Age:</label>
            </div>
            <div class='span4'>
                <label for=''>Area:</label>
            </div>
            <div class='span4'>
                <label for=''>Sub Area:</label>
            </div>
        </div>
        <div class="row">
            <div class="span4">
                <select name='PresentAgeID' id='seventhDigitID'></select>
            </div>
            <div class="span4">
                <select name='areaID' id='areaID'>
                    <option value="">-- Select One --</option>
                    <% _.each(res.areaList, function(list){ %>
                        <option value="<%= list.AreaID %>"><%= list.EnglishName %></option>
                    <% }) %>
                </select>
            </div>

            <div class="span4">
                <select name='subAreaID' id='subAreaID'></select>
            </div>
        </div>
        <div class="row">
            <div class='span6'>
                <input type="submit" class="btn btn-large btn-block btn-primary" value="Search" />
            </div>
            <div class='span6' id="ajax-loader">
                <img src="<?php echo base_url() . 'assets/img/ajax-loader.gif'; ?>" />
            </div>
        </div>
    </form>
    <div id="searchResult"></div>
    
</script>

