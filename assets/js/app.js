
$.ajaxPrefilter(function(options, originalOptions, jqXHR) {
    //options.url = 'http://localhost:81/sukhigal/main/webservice/' + options.url;
    options.url = 'http://www.sukhigal.com/main/webservice/' + options.url;
});
/*---------------------Model Start---------------------*/
var Model_AdvanceSearchForm = Backbone.Model.extend({
    url: 'getAdvancedSearchForm'
});
var Model_AdvanceSearchResult = Backbone.Model.extend({
    url: 'getAdvanceSearchResult'
});
var Model_QuickSearchResult = Backbone.Model.extend({
    url: 'getQuickSearchResult'
});
var Model_AddPermission = Backbone.Model.extend({
    url: 'addPermission'
});
var Model_UserInteractionCheck = Backbone.Model.extend({
    url: 'checkPermission'
});
var Model_ProfilePic = Backbone.Model.extend({
    url: 'getProfilePic'
});
var Model_SendMessage = Backbone.Model.extend({
    url: 'sendMessage'
});
var Model_SendProposal = Backbone.Model.extend({
    url: 'sendProposal'
});
var Model_InboxUser = Backbone.Model.extend({
    url: 'inboxUser'
});
var Model_SentMessageUser = Backbone.Model.extend({
    url: 'sentMessageUser'
});
var Model_InboxMessages = Backbone.Model.extend({
    url: 'inboxMessage'
});
var Model_SentMessages = Backbone.Model.extend({
    url: 'sentMessage'
});
var Model_SentProposal = Backbone.Model.extend({
    url: 'sentProposal'
});
var Model_ReceiveProposal = Backbone.Model.extend({
    url: 'receiveProposal'
});
var Model_AcceptedProposal = Backbone.Model.extend({
    url: 'acceptedProposal'
});
var Model_DeniedProposal = Backbone.Model.extend({
    url: 'deniedProposal'
});
var Model_PendingProposal = Backbone.Model.extend({
    url: 'pendingProposal'
});
var Model_ProposalAccept = Backbone.Model.extend({
    url: 'proposalAccept'
});
var Model_ProposalDeny = Backbone.Model.extend({
    url: 'proposalDeny'
});
var Model_BusinessFriend = Backbone.Model.extend({
    url: 'businessFriend'
});
var Model_MarryFriend = Backbone.Model.extend({
    url: 'marryFriend'
});
var Model_JobFriend = Backbone.Model.extend({
    url: 'jobFriend'
});
var Model_FullProfile = Backbone.Model.extend({
    url: 'fullProfile'
});
var Model_PersonalDetailEdit = Backbone.Model.extend({
    url: 'personalDetailEdit'
});
var Model_GuardianDetailEdit = Backbone.Model.extend({
    url: 'guardianDetailEdit'
});
var Model_OrganizationDetailEdit = Backbone.Model.extend({
    url: 'organizationDetailEdit'
});
var Model_OthersInformationEdit = Backbone.Model.extend({
    url: 'othersInformationEdit'
});
/*---------------------Model End---------------------*/
var showAjaxLoader = function($tempObj) {
    $tempObj.html("<img src='./assets/img/ajax-loader.gif' />");
};
var friendList = function() {
    var vBusinessFriend = new View_BusinessFriend();
    vBusinessFriend.render();

    var vJobFriend = new View_JobFriend();
    vJobFriend.render();

    var vMarryFriend = new View_MarryFriend();
    vMarryFriend.render();
};
/*---------------------View Start---------------------*/
var View_AdvanceSearchArea = Backbone.View.extend({
    el: '.page',
    initialize: function() {
        $(this.el).undelegate('#advanceSearchForm', 'submit');
        $(this.el).undelegate('#genderID', 'change');
        $(this.el).undelegate('#areaID', 'change');
        $(this.el).undelegate('.loadAgain', 'click');
    },
    events: {
        'change #genderID': 'genderChange',
        'change #areaID': 'areaChage',
        'submit #advanceSearchForm': 'formSubmit',
        'click .loadAgain': 'loadAgain'
    },
    loadAgain: function(e) {
        e.preventDefault();
        this.render();
    },
    genderChange: function() {
        $.ajax({
            url: 'getBodyHeightByGender',
            type: 'POST',
            data: '&genderID=' + $('#genderID').val(),
            success: function(res) {
                $('#bodyHeightID').html(res);
            }
        });
        $.ajax({
            url: 'getAgeByGender',
            type: 'POST',
            data: '&genderID=' + $('#genderID').val(),
            success: function(res) {
                $('#seventhDigitID').html(res);
            }
        });
    },
    areaChage: function() {
        $.ajax({
            url: 'getSubAreaByArea',
            type: 'POST',
            data: '&areaID=' + $('#areaID').val(),
            success: function(res) {
                $('#subAreaID').html(res);
            }
        });
    },
    formSubmit: function(e) {
        e.preventDefault();
        var formData = $('#advanceSearchForm').serializeArray();
        var vAdvanceSearchResult = new View_AdvanceSearchResult();
        vAdvanceSearchResult.render(formData);
    },
    render: function() {
        var $this = this;
        showAjaxLoader($this.$el);
        var mAdvanceSearchForm = new Model_AdvanceSearchForm();
        mAdvanceSearchForm.fetch({
            success: function(res) {
                var template = _.template($('#advance_search_area').html(),
                        {
                            res: res.attributes
                        });
                $this.$el.html(template);
            },
            error: function() {
                $this.$el.html("<a class='loadAgain'>Load Again</a>");
            }
        });
    }
});
var View_QuickSearchArea = Backbone.View.extend({
    el: '.page',
    initialize: function() {
        $(this.el).undelegate('#quickSearchForm', 'submit');
    },
    events: {
        'submit #quickSearchForm': 'formSubmit'
    },
    render: function() {
        var $this = this;
        showAjaxLoader($this.$el);
        var template = _.template($('#quick_search_area').html());
        $this.$el.html(template);
    },
    formSubmit: function(e) {
        e.preventDefault();
        var formData = $(e.currentTarget).serializeArray();
        var vQuickSearchResult = new View_QuickSearchResult();
        vQuickSearchResult.render(formData);
    }
});
var View_Home = Backbone.View.extend({
    el: '.page',
    render: function() {
        var $this = this;
        $this.$el.html('');
    }
});
var View_AdvanceSearchResult = Backbone.View.extend({
    el: '#searchResult',
    render: function(formData) {
        var $this = this;
        showAjaxLoader($this.$el);
        var mAdvanceSearchResult = new Model_AdvanceSearchResult();
        mAdvanceSearchResult.fetch({
            data: formData,
            type: 'POST',
            success: function(res) {
                if (typeof res.attributes.searchResult === 'object') {
                    var template = _.template($('#advance_search_result').html(),
                            {
                                res: res.attributes
                            });
                    $this.$el.html(template);
                } else {
                    alertify.error(res.attributes.searchResult);
                    $this.$el.html('');
                }
            }
        });
    }
});
var View_QuickSearchResult = Backbone.View.extend({
    el: '#quickSearchResult',
    render: function(formData) {
        var $this = this;
        showAjaxLoader($this.$el);
        var mQuickSearchResult = new Model_QuickSearchResult();
        mQuickSearchResult.fetch({
            data: formData,
            type: 'POST',
            success: function(res) {
                if (typeof res.attributes.result === 'object') {
                    var template = _.template($('#quick_search_result').html(),
                            {
                                res: res.attributes.result[0]
                            });
                    $this.$el.html(template);
                } else {
                    alertify.error(res.attributes.result);
                    $this.$el.html('');
                }
            }
        });
    }
});
var View_Interaction = Backbone.View.extend({
    el: '.page',
    events: {
        'document.ready #myModal': 'modalShow'
    },
    render: function(options) {
        var $this = this;
        var mUserInteractionCheck = new Model_UserInteractionCheck();
        mUserInteractionCheck.fetch({
            data: "&id=" + options.id,
            success: function(res) {
                showAjaxLoader($this.$el);
                if (typeof(res.attributes.result) === 'object') {
                    var vInteractionButton = new View_InteractionButton();
                    vInteractionButton.render(options);
                    var template = _.template($('#interactionSuccess').html(),
                            {
                                res: res.attributes.result[0]
                            });
                    $this.$el.html(template);
                    $('#ProfileTab a:first').tab('show');
                    $('.scroll-table').mCustomScrollbar({
                        theme: "dark",
                        autoHideScrollbar: true
                    });
                } else {
                    var vSearchButton = new View_SearchButton();
                    vSearchButton.render();
                    alertify.log("<h5>Sorry!</h5><p>" + res.attributes.result + "</p><p>Please <a href='#/permission'>Apply</a> For The Permission</p>", "", 0);
                }
            }
        });
    },
    modalShow: function(e) {
        $(e.currentTarget).modal();
    }
});
var View_Permission = Backbone.View.extend({
    el: '.page',
    initialize: function() {
        $(this.el).undelegate('#permissionForm', 'submit');
    },
    events: {
        'submit #permissionForm': 'formSubmit'
    },
    render: function() {
        var $this = this;
        showAjaxLoader($this.$el);
        var template = _.template($('#permission').html());
        $this.$el.html(template);
    },
    formSubmit: function(e) {
        e.preventDefault();
        var formData = $('#permissionForm').serializeArray();
        var mAddPermission = new Model_AddPermission();
        mAddPermission.fetch({
            data: formData,
            type: 'POST',
            success: function(res) {
                if (res.attributes.result !== 1) {
                    alertify.error(res.attributes.result);
                }
                else {
                    alertify.success("<h5>Congratulation!</h5> Your application for viewing user profile is accepted");
                }

            }
        });
    }
});
var View_ProfilePic = Backbone.View.extend({
    el: '#profilePic',
    initialize: function() {
        $(this.el).undelegate('#upload', 'click');
        $(this.el).undelegate('#uploadSubmit', 'submit');
    },
    events: {
        'click #upload': 'upload',
        'submit #uploadSubmit': 'formSubmit'
    },
    upload: function() {
        $('#uploadErrorMessage').html('');
        $('#uploadErrorMessage').removeClass('alert-error');
        $('#myModal').modal();
    },
    formSubmit: function(e) {
        e.preventDefault();
        $(e.currentTarget).ajaxSubmit({
            url: 'profilePicUpload',
            data: $(e.currentTarget).serializeArray(),
            success: function(res) {
                if (res === '1') {
                    $('#myModal').modal('hide');
                    alertify.success('<h5>Congratulations!</h5> Your Profile Picture Is Updated');
                    var vProfilePic = new View_ProfilePic();
                    vProfilePic.render({userid: 'defaultUser'});
                } else {
                    alertify.error('Please select a image(jpg|jpeg|gif|png) of 2MB max!');
                }
            }
        });
    },
    render: function(options) {
        var $this = this;
        //showAjaxLoader($this.$el);
        var mProfilePic = new Model_ProfilePic();
        mProfilePic.fetch({
            data: '&userID=' + options.userid,
            success: function(res) {
                var template = _.template($('#profilePicTemplate').html(),
                        {
                            res: res.attributes.result[0].ProfilePictureName,
                            isInteraction: options.interaction
                        });
                $this.$el.html(template);
            }
        });
    }
});
var View_SearchButton = Backbone.View.extend({
    el: '#buttonArea',
    render: function() {
        var $this = this;
        showAjaxLoader($this.$el);
        var template = _.template($('#searchButton').html());
        $this.$el.html(template);
    }
});
var View_InteractionButton = Backbone.View.extend({
    el: '#buttonArea',
    initialize: function() {
        $(this.el).undelegate('#frmMessageSend', 'submit');
        $(this.el).undelegate('#frmMarryProposal', 'submit');
        $(this.el).undelegate('#frmJobProposal', 'submit');
        $(this.el).undelegate('#frmMessageSend', 'submit');
        $(this.el).undelegate('#frmBusinessProposal', 'submit');
        $(this.el).undelegate('#likeProfile', 'click');
    },
    events: {
        'submit #frmMessageSend': 'messageSubmit',
        'hide #sendMessage': 'hideModalSendMessage',
        'submit #frmMarryProposal': 'marryProposalSend',
        'submit #frmJobProposal': 'jobProposalSend',
        'submit #frmBusinessProposal': 'businessProposalSend',
        'click #likeProfile': 'likeProfile'
    },
    hideModalSendMessage: function(e) {

    },
    likeProfile: function(e) {
        e.preventDefault();
        console.log($(e.currentTarget).attr('data-userID'));
    },
    messageSubmit: function(e) {
        e.preventDefault();
        var mSendMessage = new Model_SendMessage();
        mSendMessage.fetch({
            type: 'POST',
            data: $(e.currentTarget).serializeArray(),
            success: function(res) {
                if (res.attributes.result === 1) {
                    $('#sendMessage').modal('hide');
                    alertify.success("Your Message Have Been Sent");
                } else {
                    alertify.error("You can not send any message without subject and text");
                }
            }
        });
    },
    marryProposalSend: function(e) {
        e.preventDefault();
        var mSendProposal = new Model_SendProposal();
        mSendProposal.fetch({
            type: 'POST',
            data: $(e.currentTarget).serializeArray(),
            success: function(res) {
                if (res.attributes.result === 1) {
                    $('#marraigeProposal').modal('hide');
                    alertify.success("Your Proposal Have Been Sent");
                } else {
                    alertify.error(res.attributes.result);
                }
            }
        });
    },
    jobProposalSend: function(e) {
        e.preventDefault();
        var mSendProposal = new Model_SendProposal();
        mSendProposal.fetch({
            type: 'POST',
            data: $(e.currentTarget).serializeArray(),
            success: function(res) {
                if (res.attributes.result === 1) {
                    $('#jobProposal').modal('hide');
                    alertify.success("Your Proposal Have Been Sent");
                } else {
                    alertify.error(res.attributes.result);
                }
            }
        });
    },
    businessProposalSend: function(e) {
        e.preventDefault();
        var mSendProposal = new Model_SendProposal();
        mSendProposal.fetch({
            type: 'POST',
            data: $(e.currentTarget).serializeArray(),
            success: function(res) {
                if (res.attributes.result === 1) {
                    $('#businessProposal').modal('hide');
                    alertify.success("Your Proposal Have Been Sent");
                } else {
                    alertify.error(res.attributes.result);
                }
            }
        });
    },
    render: function(options) {
        var $this = this;
        showAjaxLoader($this.$el);
        var template = _.template($('#interactionButton').html(),
                {
                    senderID: options.id
                });
        $this.$el.html(template);

        $('#marraigeToolTip').tooltip({
            title: 'Send A Marry Proposal',
            animation: true,
            placement: 'bottom'
        });
        $('#jobToolTip').tooltip({
            title: 'Send A Job Proposal',
            animation: true,
            placement: 'bottom'
        });
        $('#businessToolTip').tooltip({
            title: 'Send A Business Proposal',
            animation: true,
            placement: 'bottom'
        });
        $('#messageToolTip').tooltip({
            title: 'Send Message',
            animation: true,
            placement: 'bottom'
        });
        $('#messageBody').elastic();
        $('#jobProposalBody').elastic();
        $('#marraigeProposalBody').elastic();
        $('#businessProposalBody').elastic();
    }
});
var View_Message = Backbone.View.extend({
    el: '.page',
    render: function() {
        var $this = this;
        var template = _.template($('#messageParentPage').html());
        $this.$el.html(template);
    }
});
var View_InboxMessagesList = Backbone.View.extend({
    el: '#messageList',
    render: function(userID, username, userpic) {
        var $this = this;
        showAjaxLoader($this.$el);
        var mInboxMessages = new Model_InboxMessages();
        mInboxMessages.fetch({
            type: 'POST',
            data: '&userID=' + userID,
            success: function(res) {
                if (typeof res.attributes.result === 'object') {
                    var template = _.template($('#messageListTemplate').html(),
                            {
                                res: res.attributes,
                                username: username,
                                userpic: userpic
                            });
                    $this.$el.html(template);
                    $('.scroll-table').mCustomScrollbar({
                        theme: "dark",
                        autoHideScrollbar: true
                    });
                } else {
                    alertify.error(res.attributes.result);
                    $this.$el.html('');
                }
            }
        });
    }
});
var View_SentMessagesList = Backbone.View.extend({
    el: '#messageList',
    render: function(userID, username, userpic) {
        var $this = this;
        showAjaxLoader($this.$el);
        var mInboxMessages = new Model_SentMessages();
        mInboxMessages.fetch({
            type: 'POST',
            data: '&userID=' + userID,
            success: function(res) {
                if (typeof res.attributes.result === 'object') {
                    var template = _.template($('#messageListTemplate').html(),
                            {
                                res: res.attributes,
                                username: username,
                                userpic: userpic
                            });
                    $this.$el.html(template);
                    $('.scroll-table').mCustomScrollbar({
                        theme: "dark",
                        autoHideScrollbar: true
                    });
                } else {
                    alertify.error(res.attributes.result);
                    $this.$el.html('');
                }
            }
        });
    }
});
var View_Inbox = Backbone.View.extend({
    el: '#userList',
    initialize: function() {
        $(this.el).undelegate('.inboxMessage', 'click');
    },
    events: {
        'click .inboxMessage': 'clickInbox',
    },
    clickInbox: function(e) {
        e.preventDefault();
        var vInboxMessagesList = new View_InboxMessagesList();
        vInboxMessagesList.render($(e.currentTarget).attr('data-userID'), $(e.currentTarget).attr('data-username'), $(e.currentTarget).attr('data-pic'));
    },
    render: function() {
        var $this = this;
        showAjaxLoader($this.$el);
        var mInboxUser = new Model_InboxUser();
        mInboxUser.fetch({
            success: function(res) {
                if (typeof res.attributes.result === 'object') {
                    var template = _.template($('#inboxTemplate').html(),
                            {
                                res: res.attributes
                            });
                    $this.$el.html(template);
                } else {
                    alertify.error(res.attributes.result);
                    $this.$el.html('');
                }
            }
        });
    }
});
var View_SentMessage = Backbone.View.extend({
    el: '#userList',
    initialize: function() {
        $(this.el).undelegate('.sentMessage', 'click');
    },
    events: {
        'click .sentMessage': 'clickSent',
    },
    clickSent: function(e) {
        e.preventDefault();
        var vSentMessagesList = new View_SentMessagesList();
        vSentMessagesList.render($(e.currentTarget).attr('data-userID'), $(e.currentTarget).attr('data-username'), $(e.currentTarget).attr('data-pic'));
    },
    render: function() {
        var $this = this;
        showAjaxLoader($this.$el);
        var mSentMessageUser = new Model_SentMessageUser();
        mSentMessageUser.fetch({
            success: function(res) {
                if (typeof res.attributes.result === 'object') {
                    var template = _.template($('#sentMessageTemplate').html(),
                            {
                                res: res.attributes
                            });
                    $this.$el.html(template);
                } else {
                    alertify.error(res.attributes.result);
                    $this.$el.html('');
                }
            }
        });
    }
});
var View_Proposal = Backbone.View.extend({
    el: '.page',
    render: function() {
        var $this = this;
        var template = _.template($('#proposalParentTemplate').html());
        $this.$el.html(template);
    }
});
var View_SentProposal = Backbone.View.extend({
    el: '#proposalList',
    render: function() {
        var $this = this;
        showAjaxLoader($this.$el);
        var mSentProposal = new Model_SentProposal();
        mSentProposal.fetch({
            success: function(res) {
                if (typeof res.attributes.result === 'object') {
                    var template = _.template($('#sentProposalListTemplate').html(),
                            {
                                res: res.attributes
                            });
                    $this.$el.html(template);
                    $('.scroll-table').mCustomScrollbar({
                        theme: "dark",
                        autoHideScrollbar: true
                    });
                } else {
                    alertify.error(res.attributes.result);
                    $this.$el.html('');
                }
            }
        });
    }
});
var View_ReceiveProposal = Backbone.View.extend({
    el: '#proposalList',
    initialize: function() {
        $(this.el).undelegate('#accept', 'click');
        $(this.el).undelegate('#deny', 'click');
        $(this.el).undelegate('.loadAgain', 'click');
    },
    events: {
        'click #accept': 'accept',
        'click #deny': 'deny',
        'click .loadAgain': 'loadAgain'
    },
    accept: function(e) {
        var $this = this;
        var mProposalAccept = new Model_ProposalAccept();
        mProposalAccept.fetch({
            type: 'POST',
            data: '&proposalID=' + $(e.currentTarget).attr('data-proposalID'),
            success: function(res) {
                if (res.attributes.status === 1) {
                    var vBusinessFriend = new View_BusinessFriend();
                    vBusinessFriend.render();

                    var vJobFriend = new View_JobFriend();
                    vJobFriend.render();

                    var vMarryFriend = new View_MarryFriend();
                    vMarryFriend.render();

                    $this.render();
                    alertify.success('Now You and ' + res.attributes.result[0].EnglishName + ' are Mutual Friend');
                } else {
                    alertify.error(res.attributes.result);
                }
            }
        });
    },
    deny: function(e) {
        var $this = this;
        var mProposalDeny = new Model_ProposalDeny();
        mProposalDeny.fetch({
            type: 'POST',
            data: '&proposalID=' + $(e.currentTarget).attr('data-proposalID'),
            success: function(res) {
                if (res.attributes.status === 1) {
                    $this.render();
                    alertify.success(res.attributes.result);
                } else {
                    alertify.error(res.attributes.result);
                }
            }
        });
    },
    loadAgain: function(e) {
        e.preventDefault();
        this.render();
    },
    render: function() {
        var $this = this;
        showAjaxLoader($this.$el);
        var mSentProposal = new Model_ReceiveProposal();
        mSentProposal.fetch({
            success: function(res) {
                if (typeof res.attributes.result === 'object') {
                    var template = _.template($('#receiveProposalListTemplate').html(),
                            {
                                res: res.attributes
                            });
                    $this.$el.html(template);
                    $('.scroll-table').mCustomScrollbar({
                        theme: "dark",
                        autoHideScrollbar: true
                    });
                } else {
                    alertify.error(res.attributes.result);
                    $this.$el.html('');
                }
            },
            error: function() {
                $this.$el.html("<a class='loadAgain'>Load Again</a>");
            }
        });
    }
});
var View_AcceptedProposal = Backbone.View.extend({
    el: '#proposalList',
    initialize: function() {
        $(this.el).undelegate('.loadAgain', 'click');
    },
    events: {
        'click .loadAgain': 'loadAgain',
    },
    loadAgain: function(e) {
        e.preventDefault();
        this.render();
    },
    render: function() {
        var $this = this;
        showAjaxLoader($this.$el);
        var mAcceptedProposal = new Model_AcceptedProposal();
        mAcceptedProposal.fetch({
            success: function(res) {
                if (typeof res.attributes.result === 'object') {
                    var template = _.template($('#acceptedProposalListTemplate').html(),
                            {
                                res: res.attributes
                            });
                    $this.$el.html(template);
                    $('.scroll-table').mCustomScrollbar({
                        theme: "dark",
                        autoHideScrollbar: true
                    });
                } else {
                    alertify.error(res.attributes.result);
                    $this.$el.html('');
                }
            },
            error: function() {
                $this.$el.html("<a class='loadAgain'>Load Again</a>");
            }
        });
    }
});
var View_DeniedProposal = Backbone.View.extend({
    el: '#proposalList',
    initialize: function() {
        $(this.el).undelegate('.loadAgain', 'click');
    },
    events: {
        'click .loadAgain': 'loadAgain',
    },
    loadAgain: function(e) {
        e.preventDefault();
        this.render();
    },
    render: function() {
        var $this = this;
        showAjaxLoader($this.$el);
        var mDeniedProposal = new Model_DeniedProposal();
        mDeniedProposal.fetch({
            success: function(res) {
                if (typeof res.attributes.result === 'object') {
                    var template = _.template($('#deniedProposalListTemplate').html(),
                            {
                                res: res.attributes
                            });
                    $this.$el.html(template);
                    $('.scroll-table').mCustomScrollbar({
                        theme: "dark",
                        autoHideScrollbar: true
                    });
                } else {
                    alertify.error(res.attributes.result);
                    $this.$el.html('');
                }
            },
            error: function() {
                $this.$el.html("<a class='loadAgain'>Load Again</a>");
            }
        });
    }
});
var View_PendingProposal = Backbone.View.extend({
    el: '#proposalList',
    initialize: function() {
        $(this.el).undelegate('.loadAgain', 'click');
    },
    events: {
        'click .loadAgain': 'loadAgain',
    },
    loadAgain: function(e) {
        e.preventDefault();
        this.render();
    },
    render: function() {
        var $this = this;
        showAjaxLoader($this.$el);
        var mPendingProposal = new Model_PendingProposal();
        mPendingProposal.fetch({
            success: function(res) {
                if (typeof res.attributes.result === 'object') {
                    var template = _.template($('#pendingProposalListTemplate').html(),
                            {
                                res: res.attributes
                            });
                    $this.$el.html(template);
                    $('.scroll-table').mCustomScrollbar({
                        theme: "dark",
                        autoHideScrollbar: true
                    });
                } else {
                    alertify.error(res.attributes.result);
                    $this.$el.html('');
                }
            },
            error: function() {
                $this.$el.html("<a class='loadAgain'>Load Again</a>");
            }
        });
    }
});
var View_BusinessFriend = Backbone.View.extend({
    el: '#businessFriend',
    initialize: function() {
        $(this.el).undelegate('.loadAgain', 'click');
    },
    events: {
        'click .loadAgain': 'loadAgain',
    },
    loadAgain: function(e) {
        e.preventDefault();
        this.render();
    },
    render: function() {
        var $this = this;
        showAjaxLoader($this.$el);
        var mBusinessFriend = new Model_BusinessFriend();
        mBusinessFriend.fetch({
            success: function(res) {
                if (typeof res.attributes.result === 'object') {
                    var template = _.template($('#proposalFriendTemplate').html(),
                            {
                                res: res.attributes,
                                proposalType: 'Business'
                            });
                    $this.$el.html(template);
                    $('#businessFriendScroll').mCustomScrollbar({
                        theme: "dark",
                        autoHideScrollbar: true
                    });
                } else {
                    $this.$el.html('');
                }
            },
            error: function() {
                $this.$el.html("<a class='loadAgain'>Load Again</a>");
            }
        });
    }
});
var View_JobFriend = Backbone.View.extend({
    el: '#jobFriend',
    initialize: function() {
        $(this.el).undelegate('.loadAgain', 'click');
    },
    events: {
        'click .loadAgain': 'loadAgain',
    },
    loadAgain: function(e) {
        e.preventDefault();
        this.render();
    },
    render: function() {
        var $this = this;
        showAjaxLoader($this.$el);
        var mJobFriend = new Model_JobFriend();
        mJobFriend.fetch({
            success: function(res) {
                if (typeof res.attributes.result === 'object') {
                    var template = _.template($('#proposalFriendTemplate').html(),
                            {
                                res: res.attributes,
                                proposalType: 'Job'
                            });
                    $this.$el.html(template);
                    $('#jobFriendScroll').mCustomScrollbar({
                        theme: "dark",
                        autoHideScrollbar: true
                    });
                } else {
                    $this.$el.html('');
                }
            },
            error: function() {
                $this.$el.html("<a class='loadAgain'>Load Again</a>");
            }
        });
    }
});
var View_MarryFriend = Backbone.View.extend({
    el: '#marryFriend',
    initialize: function() {
        $(this.el).undelegate('.loadAgain', 'click');
    },
    events: {
        'click .loadAgain': 'loadAgain',
    },
    loadAgain: function(e) {
        e.preventDefault();
        this.render();
    },
    render: function() {
        var $this = this;
        showAjaxLoader($this.$el);
        var mMarryFriend = new Model_MarryFriend();
        mMarryFriend.fetch({
            success: function(res) {
                if (typeof res.attributes.result === 'object') {
                    var template = _.template($('#proposalFriendTemplate').html(),
                            {
                                res: res.attributes,
                                proposalType: 'Marry'
                            });
                    $this.$el.html(template);
                    $('#marryFriendScroll').mCustomScrollbar({
                        theme: "dark",
                        autoHideScrollbar: true
                    });
                } else {
                    $this.$el.html('');
                }
            },
            error: function() {
                $this.$el.html("<a class='loadAgain'>Load Again</a>");
            }
        });
    }
});
var View_FullProfile = Backbone.View.extend({
    el: '.page',
    initialize: function() {
        $(this.el).undelegate('.loadAgain', 'click');
        $(this.el).undelegate('#personalDetailsForm', 'submit');
        $(this.el).undelegate('#guardiansDetailForm', 'submit');
        $(this.el).undelegate('#organizationDetailForm', 'submit');
        $(this.el).undelegate('#othersForm', 'submit');
    },
    events: {
        'click .loadAgain': 'loadAgain',
        'submit #personalDetailsForm': 'personalDetailFormSubmit',
        'submit #guardiansDetailForm': 'guardiansDetailFormSubmit',
        'submit #organizationDetailForm': 'organizationDetailFormSubmit',
        'submit #othersForm': 'othersFormSubmit'
    },
    personalDetailFormSubmit: function(e) {
        e.preventDefault();
        var mPersonalDetailEdit = new Model_PersonalDetailEdit();
        mPersonalDetailEdit.fetch({
            data: $('#personalDetailsForm').serializeArray(),
            type: 'POST',
            success: function(res){
                if(res.attributes.success){
                    alertify.success("<p>Your profile has been updated successfully</p>");
                }else{
                    alertify.error(res.attributes.validationMessage);
                }
            }
        });
    },
    guardiansDetailFormSubmit: function(e) {
        e.preventDefault();
        var mGuardianDetailEdit = new Model_GuardianDetailEdit();
        mGuardianDetailEdit.fetch({
            data: $('#guardiansDetailForm').serializeArray(),
            type: 'POST',
            success: function(res){
                if(res.attributes.success){
                    alertify.success("<p>Your profile has been updated successfully</p>");
                }else{
                    alertify.error(res.attributes.validationMessage);
                }
            }
        });
    },
    organizationDetailFormSubmit: function(e) {
        e.preventDefault();
        var mOrganizationDetailEdit = new Model_OrganizationDetailEdit();
        mOrganizationDetailEdit.fetch({
            data: $('#organizationDetailForm').serializeArray(),
            type: 'POST',
            success: function(res){
                if(res.attributes.success){
                    alertify.success("<p>Your profile has been updated successfully</p>");
                }else{
                    alertify.error(res.attributes.validationMessage);
                }
            }
        });
    },
    othersFormSubmit: function(e) {
        e.preventDefault();
        var mOthersInformationEdit = new Model_OthersInformationEdit();
        mOthersInformationEdit.fetch({
            data: $('#othersForm').serializeArray(),
            type: 'POST',
            success: function(res){
                if(res.attributes.success){
                    alertify.success("<p>Your profile has been updated successfully</p>");
                }else{
                    alertify.error(res.attributes.validationMessage);
                }
            }
        });
    },
    loadAgain: function(e) {
        e.preventDefault();
        this.render();
    },
    render: function() {
        var $this = this;
        showAjaxLoader($this.$el);
        var mFullProfile = new Model_FullProfile();
        mFullProfile.fetch({
            success: function(res) {
                if (typeof res.attributes.result === 'object') {
                    var template = _.template($('#fullProfileTemplate').html(),
                            {
                                res: res.attributes
                            });
                    $this.$el.html(template);
                    $('#ProfileTab a:first').tab('show');
                } else {
                    $this.$el.html('');
                }
            },
            error: function() {
                $this.$el.html("<a class='loadAgain'>Load Again</a>");
            }
        });
    }
});
/*---------------------View End---------------------*/

/*---------------------Routing Start---------------------*/
var Router = Backbone.Router.extend({
    routes: {
        '': 'home',
        'quickSearchForm': 'quickSearchForm',
        'advanceSearchForm': 'advanceSearchForm',
        'permission': 'permission',
        'interaction/:id': 'interaction',
        'sent': 'sent',
        'inbox': 'inbox',
        'sentProposal': 'sentProposal',
        'receiveProposal': 'receiveProposal',
        'acceptedProposal': 'acceptedProposal',
        'deniedProposal': 'deniedProposal',
        'pendingProposal': 'pendingProposal'
    }
});
var router = new Router();
router.on('route:home', function() {
    var vHome = new View_Home();
    vHome.render();

    var vSearchButton = new View_SearchButton();
    vSearchButton.render();

    var vProfilePic = new View_ProfilePic();
    vProfilePic.render({userid: 'defaultUser'});

    var vFullProfile = new View_FullProfile();
    vFullProfile.render();

    friendList();
});
router.on('route:advanceSearchForm', function() {
    var vSearchButton = new View_SearchButton();
    vSearchButton.render();

    var vAdvanceSearchArea = new View_AdvanceSearchArea();
    vAdvanceSearchArea.render();

    var vProfilePic = new View_ProfilePic();
    vProfilePic.render({userid: 'defaultUser'});

    friendList();
});
router.on('route:quickSearchForm', function() {
    var vSearchButton = new View_SearchButton();
    vSearchButton.render();

    var vQuickSearchArea = new View_QuickSearchArea();
    vQuickSearchArea.render();

    var vProfilePic = new View_ProfilePic();
    vProfilePic.render({userid: 'defaultUser'});

    friendList();
});
router.on('route:permission', function() {
    var vSearchButton = new View_SearchButton();
    vSearchButton.render();

    var vPermission = new View_Permission();
    vPermission.render();

    var vProfilePic = new View_ProfilePic();
    vProfilePic.render({userid: 'defaultUser'});

    friendList();
});
router.on('route:interaction', function(id) {
    var vInteraction = new View_Interaction();
    vInteraction.render({id: id});

    var vProfilePic = new View_ProfilePic();
    vProfilePic.render({userid: id, interaction: true});

    friendList();
});
router.on('route:inbox', function() {
    var vProfilePic = new View_ProfilePic();
    vProfilePic.render({userid: 'defaultUser'});

    var vSearchButton = new View_SearchButton();
    vSearchButton.render();

    var vMessage = new View_Message();
    vMessage.render();

    var vInbox = new View_Inbox();
    vInbox.render();

    friendList();
});
router.on('route:sent', function() {
    var vProfilePic = new View_ProfilePic();
    vProfilePic.render({userid: 'defaultUser'});

    var vSearchButton = new View_SearchButton();
    vSearchButton.render();

    var vMessage = new View_Message();
    vMessage.render();

    var vSentMessage = new View_SentMessage();
    vSentMessage.render();

    friendList();
});
router.on('route:sentProposal', function() {
    var vProfilePic = new View_ProfilePic();
    vProfilePic.render({userid: 'defaultUser'});

    var vSearchButton = new View_SearchButton();
    vSearchButton.render();

    var vProposal = new View_Proposal();
    vProposal.render();

    var vSentProposal = new View_SentProposal();
    vSentProposal.render();

    friendList();
});
router.on('route:receiveProposal', function() {
    var vProfilePic = new View_ProfilePic();
    vProfilePic.render({userid: 'defaultUser'});

    var vSearchButton = new View_SearchButton();
    vSearchButton.render();

    var vProposal = new View_Proposal();
    vProposal.render();

    var vReceiveProposal = new View_ReceiveProposal();
    vReceiveProposal.render();

    friendList();
});
router.on('route:acceptedProposal', function() {
    var vProfilePic = new View_ProfilePic();
    vProfilePic.render({userid: 'defaultUser'});

    var vSearchButton = new View_SearchButton();
    vSearchButton.render();

    var vProposal = new View_Proposal();
    vProposal.render();

    var vAcceptedProposal = new View_AcceptedProposal();
    vAcceptedProposal.render();

    friendList();
});
router.on('route:deniedProposal', function() {
    var vProfilePic = new View_ProfilePic();
    vProfilePic.render({userid: 'defaultUser'});

    var vSearchButton = new View_SearchButton();
    vSearchButton.render();

    var vProposal = new View_Proposal();
    vProposal.render();

    var vDeniedProposal = new View_DeniedProposal();
    vDeniedProposal.render();

    friendList();
});
router.on('route:pendingProposal', function() {
    var vProfilePic = new View_ProfilePic();
    vProfilePic.render({userid: 'defaultUser'});

    var vSearchButton = new View_SearchButton();
    vSearchButton.render();

    var vProposal = new View_Proposal();
    vProposal.render();

    var vPendingProposal = new View_PendingProposal();
    vPendingProposal.render();

    friendList();
});

Backbone.history.start();