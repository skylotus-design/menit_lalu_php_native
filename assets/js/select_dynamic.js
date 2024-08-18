const benua = document.getElementById('benua');
 benua.addEventListener('change', fungsiSaya);

     function fungsiSaya(event){
     let selekBenua = event.target.value;
     let negara = document.getElementById('negara').options;
                         
     for (let i = 0; i < negara.length; i++) {

         let seleksNegara = negara[i].getAttribute('data-kategori');

         if (seleksNegara === selekBenua) {
             negara[i].style.display = '';
         } else {
             negara[i].style.display = 'none';
         }
     }
 }
