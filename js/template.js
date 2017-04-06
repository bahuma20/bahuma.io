var sheet = document.querySelector('google-sheets');

sheet.addEventListener('google-sheet-data', function() {
    this.rows.sort(function(a, b) {
        if (a.gsx$title.$t < b.gsx$title.$t) return -1;
        if (a.gsx$title.$t > b.gsx$title.$t) return 1;
    });

    var html = "";

    jQuery.each(this.rows, function(index, el){
        html += "<li>" + el.gsx$title.$t + ': <a href="'+ el.gsx$url.$t +'" class="mdl-color-text--primary" target="_blank">'+ el.gsx$username.$t + '</a>';
    });

    $('.profil-liste').html(html);
});

sheet.addEventListener('error', function(e){
    console.error(e.detail.response);
});

var imprintHeadline = document.querySelector('#impressum h4');
var imprintContent = document.querySelector('#impressum .content');

imprintHeadline.addEventlistener('click', function(e) {
    imprintContent.style.display = 'block';
});


// jQuery = jQuery || {};
// jQuery(document).ready(function ($) {
//   $("section#referenzen .mdl-card__actions a.mdl-button").click(function (event) {
//     event.preventDefault();
//     $(".referenz-overlay").removeClass("closed");
//   });
//
//   $(".referenz-overlay .close-button").click(function (event) {
//     event.preventDefault;
//     $(".referenz-overlay").addClass("closed");
//   });
// });
