@extends('voyager::bread.edit-add')
@section('submit-buttons')
    @if($dataTypeContent->key == 'xy')
        <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=7996e89b-a008-42d6-9408-258858c8afe3" type="text/javascript"></script>
        <div id="map" style="width: 100%;height: 400px"></div>
        <script>
            let el = document.getElementsByName('value')[0]
            el.style.display = 'none'
            ymaps.ready(function () {
                let coords = JSON.parse(el.value)
                console.log(coords)
                let myMap = new ymaps.Map('map', {
                        center: coords,
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
                    coords = e.get('coords');
                    el.value = JSON.stringify(coords)
                    myPlacemark.geometry.setCoordinates(coords);
                });
            });
        </script>
    @endif
    <button type="submit" class="btn btn-primary save" style="margin: 1rem 0;">Save And Publish</button>
@endsection
