// window.onload = () => {
//     //id filters.html.twig
//     const filtresForm = document.getElementById("filtresForm");

//     //id filters.html.twig
//     const carsContainer = document.getElementById('carsContainer');

//      filtresForm.addEventListener('submit', function (event) {
//             event.preventDefault();

//             const formData = new FormData(filtresForm);

//              // Fabrication de queryString
//             const params = new URLSearchParams()
            
//             formData.forEach((value, key) =>{
//                 params.append(key, value)
//                 //console.log(params.toString())
//             })

//             //récuperation url active, c'est dire la page sur laquelle on se trouve
//             const url = new URL(window.location.href);
//             //console.log(url)

//             // lancement de la requête ajax
//             fetch(url.pathname + "?" + params.toString() + "&ajax=1" ,{
//                 headers: {
//                     "X-Requested-With": "XMLHttpRequest"
//                 }
//             }).then(response =>
//                 response.json()
//                 //console.log(response)
//             ).then(data =>{
//                 console.log(data)
//                  // On va chercher la zone de contenu
//                 //const content = document.querySelector("#featured");

//                 // On remplace le contenu
//                 //content.innerHTML = data.content;

//                 // On met à jour l'url
//                 //history.pushState({}, null, url.pathname + "?" + params.toString());

//             }).catch(e => arlet(e));


//         })
//     //featured

// }




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

// Filtre
document.addEventListener("DOMContentLoaded", function () {
    //id de filters.html.twig
    const filtresForm = document.getElementById("filtresForm");
   
     // id carsContainer
    const carsContainer = document.getElementById("carsContainer");

    filtresForm.addEventListener("submit", function (event) {
        event.preventDefault();

        const formData = new FormData(filtresForm);

        // url cars = controller carsController
        fetch("/cars/filters", {method: "POST",body: formData})
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

//console.log("coucou cars")
// alert('je suis dans ma page ')