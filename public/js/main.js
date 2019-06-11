$(document).ready(function() {
    $('body').on('click', '[data-toggle="modal"]', function() {
        $($(this).data("target")).removeData('bs.modal');
        $($(this).data("target")).find('.modal-content').empty();
        $($(this).data("target") + ' .modal-content').load($(this).data("remote"));
    });
});