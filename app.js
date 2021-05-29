
function tplawesome(e,t){res=e;for(var n=0;n<t.length;n++){res=res.replace(/\{\{(.*?)\}\}/g,function(e,r){return t[n][r]})}return res}



$(function() {
    $("form").on("submit", function(e) {
       e.preventDefault();
       // prepare the request
       var request = gapi.client.youtube.search.list({
            part: "snippet",
            type: "video",
            q: encodeURIComponent($('#search').val()).replace(/%20/g, "+"),
            maxResults: 6,
            order: "viewCount",
            topicId: "/m/04rlf",
       });
       // execute the request
       request.execute(function(response) {
          var results = response.result;
          $("#results").html("");
          $.each(results.items, function(index, item) {
            $.get("item.html", function(data) {
                $("#results").append(tplawesome(data, [{"title":item.snippet.title, "videoid":item.id.videoId}]));
            });
          });
          resetVideoHeight();
       });
    });

    $(window).on("resize", resetVideoHeight);
});

//document.getElementById('abc').addEventListener("click", seeVid);

 function seeVid(album) {
  window.location.replace("http://localhost/dashboard/brex/yt.html");
  //document.write(album);
  document.getElementById("search").value="abcd";
  //document.getElementById('results').innerHTML=abc;
}

function resetVideoHeight() {
    $(".video").css("height", $("#results").width() * 9/16);
}


function init() {
    gapi.client.setApiKey("AIzaSyD5p2Qa2W6bd8jtPJhbs_I9fRiTFDeAccw");
    gapi.client.load("youtube", "v3", function() {
        // yt api is ready
    });
}
