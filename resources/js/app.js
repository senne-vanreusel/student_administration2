require('./bootstrap');

window.Noty = require('noty');
Noty.overrideDefaults({
    theme: 'bootstrap-v4',
    type: 'error',
    layout: 'center',
    modal: true,
});

import Student from "./student";

window.Student = Student;

// Run the hello() function
Student.hello();


$('[required]').each(function () {
    $(this).closest('.form-group')
        .find('label')
        .append('<sup class="text-danger mx-1">*</sup>');
});


$('nav i.fas').addClass('fa-fw mr-1');

$('body').tooltip({
    selector: '[data-toggle="tooltip"]',
    html: true,
}).on('click', '[data-toggle="tooltip"]', function () {
    // hide tooltip when you click on it
    $(this).tooltip('hide');
});

