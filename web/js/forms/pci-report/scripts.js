
$(document).ready(function() {
    var parentSection = $('.full_container_section');
    
    function loadArteryForm() {
        // Load artery form
        parentSection.append('<section class="sec_gap40"></section');
        var arteryForm = $('.sec_gap40:last');
        arteryForm.load('/forms/pci-report-artery/create', function () {
            var arterySelect = $('.sec_gap40:last select.active-select');
            arterySelect.bind('change', function (e) {
                // When value is changed load another form
                if (arterySelect.val() !== '0') {
                    arterySelect.unbind('change');
                    loadArteryForm();
                } 
            });
        });
    }

    if (window.location.href.indexOf('view') === -1) {
        loadArteryForm();
    }

    var submitBtn = $('.submit-btn'),
        submitted = false;

    submitBtn.bind('click', function (e) {

        e.preventDefault();

        var pciReportForm = $('form#pci-report-form');

        if (submitted) {
            return;
        } else {
            submitted = true;
        }

        $.ajax({
            type: 'POST',
            url: pciReportForm.action,
            data: pciReportForm.serialize(),
            statusCode: {
                200: function(data) {
                    var forms = $('form:not(#pci-report-form)');
                    forms.each(function () {
                        var arteryFormData = $(this);
                        if (this.action.indexOf('update') === -1) {
                            var obData = $.parseJSON(data);
                            var arteryAction = this.action + '?pci_report_id=' + obData.pci_report_id;
                        } else {
                            var arteryAction = this.action;
                        }

                        $.ajax({
                            type: 'POST',
                            url: arteryAction,
                            data: arteryFormData.serialize(),
                        });
                    });

                    window.opener.location.reload();
                    window.close();
                },
                500: function(data) {
                    submitted = false;
                    $('section.main-subform').html(data.responseText.replace('Internal Server Error (#500):', ''));
                }
            }
        });
    });

});
