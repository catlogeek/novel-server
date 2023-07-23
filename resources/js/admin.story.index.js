(function ($) {
    'use strict'; // Start of use strict

    $('select[name^="Genre"]').select2({
        theme: 'bootstrap-5',
        width: '100%',
        allowClear: true,
        placeholder: 'ジャンルを選択',
    });
})(jQuery); // End of use strict
