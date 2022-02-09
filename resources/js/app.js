require('./bootstrap');


$('.user-link').on('click',function(e) {
    axios.post('/visit/' + $(this).data('link-id'), {
        link: $(this).attr('href')
    })
        .then(response => console.log('response: ', response))
        .catch(error => console.error('error: ', error));
});

import Alpine from 'alpinejs';
import Swal from 'sweetalert2';
window.Swal=require('sweetalert2');
Swal.start();
window.Alpine = Alpine;

Alpine.start();
