$(document).ready(function() {
    resizeStub();
});

function resizeStub(buttonsOffset) {
    if (typeof(buttonsOffset) === 'undefined') {
        buttonsOffset = 36;
    }
    var stub = $('div.stub'),
        fullContainerSection = $('section.full_container_section'),
        containerOffset = fullContainerSection.offset();

    // Make view form non-editable
    stub.ready(function() {
        stub.show();

        // 10 px for top heading that comes out of the parent div
        // and minus px for bottom print buttons
        stub.height(fullContainerSection.height() + containerOffset.top - buttonsOffset);
        stub.width(fullContainerSection.width());

        stub.offset({'top' : 0, 'left' : 0});
    });
}
