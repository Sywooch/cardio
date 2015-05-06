$(document).ready(function () {
    /** Append rows with inputs to prehistory blocks **/
    $('a.prehistory').bind('click', function(e) {
        e.preventDefault();
        var prehistoryBlock = $(this).parents('div.prehistory-block'),
            prehistoryHeading = $(prehistoryBlock).find('.prehistory-heading');
        $.ajax($(this).attr('href'))
            .done(function(data) {
                prehistoryBlock.append(data);
                prehistoryHeading.addClass('bordered-heading');
                resizeStub();
            });
    });

    var submitBtn = $('.submit-btn'),
        form = $('form#ht-report-form'),
        mainFormSubmitted = false,
        htReportId = false;

    submitBtn.bind('click', function(e) {
        e.preventDefault();

        /** Allow only one submission of the main form **/
        if (mainFormSubmitted) {
            if (htReportId) {
                if (sendPrehistoryForms(htReportId)) {
                    closeWindow();
                }
            }
            return;
        } else {
            mainFormSubmitted = true;
        }

        /** Submitting main form **/
        makeMainFormNonEditable();
        $('.stub').css('opacity', '0.8');
        $.ajax({
            type: 'POST',
            url: form.action,
            data: form.serialize(),
            statusCode: {
                200: function (data) {
                    // TODO: Replace form with the response but first copy prehistory sub-forms
                    var htFormData = $.parseJSON(data);

                    htReportId = htFormData.ht_report_id;

                    /** Get and send all prehistory forms **/
                    if (sendPrehistoryForms(htReportId)) {
                        closeWindow();
                    } else {
                        makePrehistoryFormsEditable();
                    }
                },
                500: function(data) {
                    mainFormSubmitted = false;
                    // TODO: Replace main form content with the result but take into account prehistory subforms
                }
            }
        });
    });

    $('select#htreport-ccr_report_id').bind('change', function() {
        /** When HC report is selected replace cag section with hc data **/
        $.ajax({
            type: 'GET',
            url: '/forms/ht-report/cag-section?ccr_report_id=' + $(this).val(),
            success: function (data) {
                $('.cag.box').replaceWith(data);
            }
        });
    });
});

function sendPrehistoryForms(htReportId) {
    var prehistoryFormsDivs = $('div.ht-report-prehistory-form'),
        formsNum = prehistoryFormsDivs.length;

    prehistoryFormsDivs.each(function() {
        var $this = $(this),
            prehistoryForm = $this.find('form')[0],
            prehistoryFormAction = prehistoryForm.action + '&ht_report_id=' + htReportId;

        /** Save form **/
        $.ajax({
            type: 'POST',
            url: prehistoryFormAction,
            data: $(prehistoryForm).serialize(),
            async: false,
            statusCode: {
                200: function (data) {
                    $this.replaceWith(data);
                    formsNum -= 1;
                },
                400: function (data) {
                    var response = data.responseText.replace('Bad Request (#400):', '');
                    $this.replaceWith(response);
                }
            }
        });

    });

    if (formsNum === 0) {
        /** Means all prehistory sub-forms sent with no errors **/
       return true;
    }

    return false;
}

function closeWindow() {
    if (window.opener) {
        window.opener.location.reload();
    }
    window.close();
}

function insertStub() {
    var mainSection = $('div.ht-report-create');

    /** Prepend fullContainerSection with stub div **/
    mainSection.prepend('<div class="stub"></div>');
    $('.stub').css('opacity', '0.8');
}

function makeMainFormNonEditable() {
    insertStub();
    resizeStub(0);
}

function makePrehistoryFormsEditable() {
    /** Resize stub leaving buttons out of the stub **/
    resizeStub();

    /** Make Infarct/PCI/CABG/Additional/Echo blocks editable **/
    $('.prehistory-blocks-row').css('z-index', '10');
    $('.prehistory-blocks-row').css('position', 'relative');
}

