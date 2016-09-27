/**
 * Created by Andrey on 03.08.2016.
 */
$(document).ready(function () {
    $('#thumbs').delegate('img', 'click', function () {
        $('#largeImage').attr('src', $(this).attr('src').replace('thumb', 'large'));
        $('#description').html($(this).attr('alt'));
    });
    $(".special_select_1").select2({width: '100%', placeholder: "Select a state"});
    $(".special_select_2").select2({width: '100%', placeholder: "Select a state"});
    $(".special_select_3").select2({width: '100%', placeholder: "Select a state"});
    $(".regionId_first").select2({width: '100%', placeholder: "Select a state"});
    $(".regionId_second").select2({width: '100%', placeholder: "Select a state"});
    $(".regionId_third").select2({width: '100%', placeholder: "Select a state"});
    $(".filter1").select2({width: '100%', placeholder: "Select a state"});
    $(".filter2").select2({width: '100%', placeholder: "Select a state"});
    $(".filter3").select2({width: '100%', placeholder: "Select a state"});
    $(".city_filter").select2({width: '100%', placeholder: "Select a state"});
});


$(function () {
    var id = $(".regionId_first").val();

    $('.regionId_first').change(function () {
        var id = $(".regionId_first").val();
        var region_name = $(".region_ua").val();
        if (id == 0) {

        }
        $.ajax({
            type: "POST",
            url: './city_first',
            headers: {
                'X-CSRF-Token': $('input[name="_token"]').val()
            },
            data: {id_first: id},
            success: function (data) {
                $(".area_first").html(data);
                $(".area_first").select2({width: '100%', placeholder: "Select a city"});
                $("span.area_first").removeClass("select2-hidden-accessible");
            }
        });
    });

});

$(function () {


    $('.city_filter').change(function () {
        var id = $(".city_filter").val();
        if (id == 0) {

        }
        $.ajax({
            type: "POST",
            url: './specialists/city_filter',
            headers: {
                'X-CSRF-Token': $('input[name="_token"]').val()
            },
            data: {city_filter: id},
            success: function (data) {
                $(".area_first").html(data);
                $(".filter2").select2({width: '100%', placeholder: "Select a city"});
                $("span.area_first").removeClass("select2-hidden-accessible");
            }
        });
    });

});
$(function () {
    var id = $(".regionId_second").val();

    $('.regionId_second').change(function () {
        var id = $(".regionId_second").val();
        var region_name = $(".region_ua").val();
        if (id == 0) {

        }
        $.ajax({
            type: "POST",
            url: './city_second',
            headers: {
                'X-CSRF-Token': $('input[name="_token"]').val()
            },
            data: {id_second: id},
            success: function (data) {
                $(".area_second").html(data);
                $(".area_second").select2({width: '100%', placeholder: "Select a city"});
                $("span.area_second").removeClass("select2-hidden-accessible");
            }
        });
    });

});


$(function () {
    var id = $(".regionId_third").val();

    $('.regionId_third').change(function () {
        var id = $(".regionId_third").val();
        var region_name = $(".region_ua").val();
        if (id == 0) {

        }
        $.ajax({
            type: "POST",
            url: './city_third',
            headers: {
                'X-CSRF-Token': $('input[name="_token"]').val()
            },
            data: {id_third: id},
            success: function (data) {
                $(".area_third").html(data);
                $(".area_third").select2({width: '100%', placeholder: "Select a city"});
                $("span.area_third").removeClass("select2-hidden-accessible");
            }
        });
    });

});
$(function () {


    $('.city_filter').change(function () {
        var id = $(".city_filter").val();
        if (id == 0) {

        }
        $.ajax({
            type: "POST",
            url: './specialists/city_filter',
            headers: {
                'X-CSRF-Token': $('input[name="_token"]').val()
            },
            data: {city_filter: id},
            success: function (data) {
                $(".area_first").html(data);
                $(".filter2").select2({width: '100%', placeholder: "Select a city"});
                $("span.area_first").removeClass("select2-hidden-accessible");
            }
        });
    });

});
$(function () {
    var id = $(".regionId_second").val();

    $('.regionId_second').change(function () {
        var id = $(".regionId_second").val();
        var region_name = $(".region_ua").val();
        if (id == 0) {

        }
        $.ajax({
            type: "POST",
            url: './city_second',
            headers: {
                'X-CSRF-Token': $('input[name="_token"]').val()
            },
            data: {id_second: id},
            success: function (data) {
                $(".area_second").html(data);
                $(".area_second").select2({width: '100%', placeholder: "Select a city"});
                $("span.area_second").removeClass("select2-hidden-accessible");
            }
        });
    });

});


$(function () {
    var id = $(".regionId_third").val();

    $('.regionId_third').change(function () {
        var id = $(".regionId_third").val();
        var region_name = $(".region_ua").val();
        if (id == 0) {

        }
        $.ajax({
            type: "POST",
            url: './city_third',
            headers: {
                'X-CSRF-Token': $('input[name="_token"]').val()
            },
            data: {id_third: id},
            success: function (data) {
                $(".area_third").html(data);
                $(".area_third").select2({width: '100%', placeholder: "Select a city"});
                $("span.area_third").removeClass("select2-hidden-accessible");
            }
        });
    });

});
$(document).ready(function () {
    $("#filter2").on("click", function () {
        $("#filter22").toggle(500);
    });
    $("#filter3").on("click", function () {
        $("#filter33").toggle(500);
    });
});

$(function () {
    $('.col-sm-3').change(function () {
        var filter1_id = $(".form-control").val();
        var filter2_id = $(".filter2").val();
        if (!filter2_id){
            filter2_id=0;
        }
        var filter3_id = $(".filter3").val();

        $.ajax({
            type: "POST",
            url: './specialists/filter',
            headers: {
                'X-CSRF-Token': $('input[name="_token"]').val()
            },
            data: {
                filter1_id: filter1_id,
                filter2_id: filter2_id,
                filter3_id: filter3_id
            },
            success: function (data) {
                $(".col-sm-9").html(data);

            }
        });
    });

});
$(function () {
    $('.chosen-container').width('100%');
});