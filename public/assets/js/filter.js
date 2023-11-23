document.addEventListener('DOMContentLoaded', function () {
    //id de filters.html.twig
    const filtresForm = document.getElementById('filtresForm');
   
     // id carsContainer
    const carsContainer = document.getElementById('carsContainer');

    filtresForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(filtresForm);

        // url annonce = controller carsController
        fetch('/cars/filters', {method: 'POST',body: formData})
            .then(response => response.json())
            .then(data => {
                console.log('Received data:', data);
                carsContainer.innerHTML = data.html;
            })
            .catch(error => {
                console.error('An error occurred:', error);
            });
    });
});


// const response = await fetch("get_cars", {
//       method: "POST",
//       headers: {
//         "Content-Type": "application/json",
//       },
//       body: JSON.stringify({
//         marque: marque,
//         kilometre: kilometre,
//         annee: annee,
//         price: price,
//       }),
//     });






//Réinitialiser 
function resetFilters() {
    document.getElementById('search_cars_minPrice').value = null;
    document.getElementById('search_cars_maxPrice').value = null;
    document.getElementById('search_cars_minKilometer').value = null;
    document.getElementById('search_cars_maxKilometer').value = null;
    document.getElementById('search_cars_minYear').value = null;
    document.getElementById('search_cars_maxYear').value = null;
    document.getElementById('search_cars_brand').value = null;
    document.getElementById('search_cars_energy').value = null;
}


// console.log("coucou cars")
// alert('je suis dans ma page ')