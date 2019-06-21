var map;

function LoadMap() {
    var Krakow = {lat: -25.363, lng: 131.044};
    var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: Krakow
        });

    var marker = new google.maps.Marker({
        position: Krakow,
        map: map

    });
    var allData = JSON.parse(document.getElementById('allData').innerHTML);
    showallfoodtrucks(allData);

}

function showallfoodtrucks(allData) {
    Array.prototype.forEach.call(allData,function (data) {
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(data.lat,data.lng),
            map:map
        })

    })
}

function get_places_of_user() {
    const apiUrl = "http://localhost";
    const $list = $('.places-user-list');

    $.ajax({
        url : apiUrl + '/?page=get_places_of_user',
        dataType : 'json'
    })
        .done((res) => {

            $list.empty();
            //robimy pętlę po zwróconej kolekcji
            //dołączając do tabeli kolejne wiersze
            res.forEach(el => {
                $list.append(`<tr>
                    <td>${el.name}</td>
                    <td>${el.address}</td>
                    <td>${el.lat}</td>
                    <td>${el.lng}</td>
                    <td>${el.type}</td>
                    <td>${el.datetime_added}</td>
                    <td>${el.email_address}</td>
                    <td>${el.webpage}</td>
                    <td>
                    <button class="btn btn-info" type="button" onclick="editPlace(${el.ID})">
                        <i class="material-icons">build</i>
                    </button>
                    </td>
                    <td>
                    <button class="btn btn-danger" type="button" onclick="deletePlace(${el.ID})">
                        <i class="material-icons">delete_forever</i>
                    </button>
                    </td>
                    </tr>`);
            })
        });
}

function get_all_places() {
    const apiUrl = "http://localhost";
    const $list = $('.places-list');

    $.ajax({
        url : apiUrl + '/?page=get_all_places',
        dataType : 'json'
    })
        .done((res) => {

            $list.empty();
            //robimy pętlę po zwróconej kolekcji
            //dołączając do tabeli kolejne wiersze
            res.forEach(el => {
                $list.append(`<tr>
                    <td>${el.name}</td>
                    <td>${el.address}</td>
                    <td>${el.lat}</td>
                    <td>${el.lng}</td>
                    <td>${el.type}</td>
                    <td>${el.datetime_added}</td>
                    <td>${el.email_address}</td>
                    <td>${el.webpage}</td>
                    <td>
                    <button class="btn btn-info" type="button" onclick="editPlace(${el.id})">
                        <i class="material-icons">build</i>
                    </button>
                    </td>
                    <td>
                    <button class="btn btn-danger" type="button" onclick="deletePlace(${el.id})">
                        <i class="material-icons">delete_forever</i>
                    </button>
                    </td>
                    </tr>`);
            })
        });
}

function deletePlace(id) {
    if (!confirm('Do you want to delete this place')) {
        return;
    }

    const apiUrl = "http://localhost";

    $.ajax({
        url : apiUrl + '/?page=delete_place',
        method : "POST",
        data : {
            id : id
        },
        success: function() {
            alert('Selected place successfully deleted from database!');
            get_all_places();
        }
    });
}

