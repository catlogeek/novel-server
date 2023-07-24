(function ($) {
    'use strict'; // Start of use strict

    $('select[name^="Genre"]').select2({
        theme: 'bootstrap-5',
        width: '100%',
        allowClear: true,
        placeholder: 'ジャンルを選択',
        minimumResultsForSearch: 20,
    });

    $('select[name^="Status"]').select2({
        theme: 'bootstrap-5',
        width: '100%',
        allowClear: true,
        placeholder: 'ステータスを選択',
        minimumResultsForSearch: 10,
    });
})(jQuery); // End of use strict
