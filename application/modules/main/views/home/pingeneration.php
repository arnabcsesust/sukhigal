
<form id="pingenerationForm" action="<?php echo base_url() . 'main/pingeneration'; ?>" method="POST">
    <div class="row-fluid">
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
    <div class="row-fluid">
        <div class="span4">
            <select name='religionID' id='religionID'>
                <option value="">-- Select Religion --</option>
                <?php
                foreach ($religionList as $rl) {
                    ?>
                    <option value='<?php echo $rl->ReligionID; ?>'><?php echo $rl->EnglishName; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="span4">
            <select name='genderID' id='genderID'>
                <option value="">-- Select Gender --</option>
                <?php
                foreach ($genderList as $gl) {
                    ?>
                    <option value='<?php echo $gl->GenderID; ?>'><?php echo $gl->EnglishName; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="span4">
            <select name='categoryID' id='CategoryID'>
                <option value="">-- Select Category --</option>
                <?php
                foreach ($categoryList as $cl) {
                    ?>
                    <option value='<?php echo $cl->CategoryID; ?>'><?php echo $cl->EnglishName; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>

    <div class="row-fluid">
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

    <div class="row-fluid">
        <div class="span4">
            <select name='maritalStatusID' id='maritalStatusID'>
                <option value="">-- Select Marital Status --</option>
                <?php
                foreach ($maritalStatusList as $ml) {
                    ?>
                    <option value='<?php echo $ml->MaritalStatusID; ?>'><?php echo $ml->EnglishTitle; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="span4">
            <select name='financialStatusID' id='financialStatusID'>
                <option value="">-- Select Financial Status --</option>
                <?php
                foreach ($financialStatusList as $fl) {
                    ?>
                    <option value='<?php echo $fl->FinancialStatusID; ?>'><?php echo $fl->EnglishTitle; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="span4">
            <select name='educationalStatusID' id='educationalStatusID'>
                <option value="">-- Select Educational Status --</option>
                <?php
                foreach ($educationalStatusList as $el) {
                    ?>
                    <option value='<?php echo $el->EducationalStatusID; ?>'><?php echo $el->EnglishTitle; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="row-fluid">
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
    <div class="row-fluid">
        <div class="span4">
            <select name='professionalStatusID' id='professionalStatusID'>
                <option value="">-- Select Professional Status --</option>
                <?php
                foreach ($professionalStatusList as $pl) {
                    ?>
                    <option value='<?php echo $pl->ProfessionalStatusID; ?>'><?php echo $pl->EnglishTitle; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="span4">
            <select name='bodyColorID' id='bodyColorID'>
                <option value="">-- Select Body Color --</option>
                <?php
                foreach ($bodyColorList as $bcl) {
                    ?>
                    <option value='<?php echo $bcl->BodyColorID; ?>'><?php echo $bcl->EnglishTitle; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="span4">
            <select name='bodyHeightID' id='bodyHeightID'>
                <option value="">-- Select Body Height --</option>
            </select>
            <input type="hidden" name="bodyHieghtText" id="bodyHieghtText" value="" />
        </div>
    </div>
    <div class="row-fluid">
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
    <div class="row-fluid">
        <div class="span4">
            <select name='seventhDigitID' id='seventhDigitID'>
                <option value="">-- Select Age --</option>
            </select>
        </div>
        <div class="span4">
            <select name='areaID' id='areaID'>
                <option value="">-- Select Area --</option>
                <?php
                foreach ($areaList as $al) {
                    ?>
                    <option value='<?php echo $al->AreaID; ?>'><?php echo $al->EnglishName; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="span4">
            <select name='subAreaID' id='subAreaID'>
                <option value="">-- Select Sub Area --</option>
            </select>
        </div>
    </div>
    
<!--    <div class="row-fluid">
        <div class="span4">
            <input type="text" placeholder="Mobile No" name='mobNo' id='mobNo' />
        </div>
        <div class="span4">
            <input type="password" placeholder="Password" name='password' id='password' />
        </div>
        <div class="span4">
            <input type="password" placeholder="Repeat Password" name='rep-password' id='rep-password' />
        </div>
    </div>
    <div class="row-fluid">
        <div class="span4">
            <input type="text" placeholder="Father's Name" name='fathersName' id='fathersName' />
        </div>
        <div class="span4">
            <input type="text" placeholder="Mother's Name" name='mothersName' id='mothersName' />
        </div>
        <div class="span4">
            <input type="text" placeholder="Guardian's Name" name='guardiansName' id='guardiansName' />
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6">
            <input type="text" class="input-block-level" placeholder="Relation With Guardian" name='guardianRel' id='guardianRel' />
        </div>
        <div class="span6">
            <input type="text" class="input-block-level" placeholder="Guardian's Mobile No" name='guardiansMobileNo' id='guardiansMobileNo' />
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6">
            <textarea class='elasticTextArea input-block-level' placeholder='Present Address' name='presentAddress'></textarea>
        </div>
        <div class="span6">
            <textarea class='elasticTextArea input-block-level' placeholder='Permenant Address' name='permenantAddress'></textarea>
        </div>
    </div>-->
    <div class="row-fluid">
        <div class='span12' id="form-submit-button">
            <input type="submit" class="btn btn-large btn-block btn-success" value="Generate PIN" />
        </div>
    </div>
</form>

<script type='text/javascript'>
    $(document).ready(function() {
        $('.elasticTextArea').elastic();
        $('#errorDisplay').hide();
        $('#form-submit-button').show();
        $('#genderID').change(function() {
            $.ajax({
                url: '<?php echo base_url() . 'main/pingeneration/getBodyHeightByGender' ?>',
                type: 'POST',
                data: '&genderID=' + $(this).val(),
                success: function(res) {
                    $('#bodyHeightID').html(res);
                }
            });

            $.ajax({
                url: '<?php echo base_url() . 'main/pingeneration/getAgeByGender' ?>',
                type: 'POST',
                data: '&genderID=' + $(this).val(),
                success: function(res) {
                    $('#seventhDigitID').html(res);
                }
            });
        });

        $('#areaID').change(function() {
            $.ajax({
                url: '<?php echo base_url() . 'main/pingeneration/getSubAreaByArea' ?>',
                type: 'POST',
                data: '&areaID=' + $(this).val(),
                success: function(res) {
                    $('#subAreaID').html(res);
                }
            });
        })

        $('#pingenerationForm').on('submit', function(e) {
            e.preventDefault();
            $('#ajax-loader').show();
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serializeArray(),
                success: function(res) {
                    $('#ajax-loader').hide();
                    if (res == 1) {
                        window.location = "<?php echo base_url() . 'main/home/pingenerationsuccess/' ?>";
                    }
                    else {
                        //$('#errorDisplay').html(res).show();
                        alertify.error(res);
                    }

                }
            });
        });

        $('#bodyHeightID').on('change', function() {
            $('#bodyHieghtText').attr('value', $('#bodyHeightID option:selected').text());
        });
    });
</script>