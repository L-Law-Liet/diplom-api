@extends('voyager::bread.edit-add')
@section('submit-buttons')
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=7996e89b-a008-42d6-9408-258858c8afe3" type="text/javascript"></script>
    <style>
    </style>
    <div id="map" style="width: 400px;height: 400px"></div>
    <script>
        ymaps.ready(function () {
            let myMap = new ymaps.Map('map', {
                    center: [55.751574, 37.573856],
                    zoom: 9
                }),
                myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
                    hintContent: 'Собственный значок метки',
                    balloonContent: 'Это красивая метка'
                });

            myMap.geoObjects
                .add(myPlacemark);

            myMap.events.add('click', function (e) {
                // Получение координат щелчка
                let coords = e.get('coords');
                myPlacemark.geometry.setCoordinates(coords);
            });
        });
    </script>
    <button type="submit" class="btn btn-primary save">Save And Publish</button>
@endsection
