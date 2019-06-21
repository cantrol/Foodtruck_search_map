function myMap() {
    var Krakow = {lat: -25.363, lng: 131.044};
    var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: Krakow
        });
}

function get_places_by_user() {
    const apiUrl = "http://localhost";
    const $list = $('.places-list');

    $.ajax({
        url : apiUrl + '/?page=get_places',
        dataType : 'json'
    })
        .done((res) => {

            $list.empty();
            //robimy pętlę po zwróconej kolekcji
            //dołączając do tabeli kolejne wiersze
            res.forEach(el => {
                $list.append(`<tr>
                    ${el.ID}
                    <td>${el.name}</td>
                    <td>${el.address}</td>
                    <td>${el.lat}</td>
                    <td>${el.lng}</td>
                    <td>${el.type}</td>
                    <td>${el.datetime_added}</td>
                    <td>${el.email_address}</td>
                    <td>${el.webpage}</td>
                    <td>
                    <button class="btn btn-danger" type="button" onclick="deletePlace(${el.ID})">
                        <i class="material-icons">delete_forever</i>
                    </button>
                    </td>
                    </tr>`);
            })
        });
}