<div id="galery" class="galery-wrap">
  <h1 class="text-center text-dark p-4" style="background: rgb(240, 240, 240); margin: 0">Pengurus inti dan Pembina</h1>
  <div class="galery pb-5" id="galleryData">

  </div>
</div>

<script>
$(document).ready(function(){
  $.ajax({
    url: `{{ url('v4/ee9p0ebt-r030-0308-d14r-any5rt4ed9o0/galery') }}`,
    method: "GET",
    dataType: "json",
    success: function(response) {
      var galleryData = "";
      $.each(response.data, function(index, item) {
        galleryData += /*html*/
        `
          <div class="card">
            <div class="content">
              <img src="/uploads/galery/${item.gambar}" alt="image" />
            </div>
            <div class="judul">
              <h1>${item.nama}</h1>
              <p class="text">${item.jabatan}</p>
            </div>
          </div>
        `;
      });
      $("#galleryData").html(galleryData);
    },
    error: function() {
      console.log("Failed to get data from the server");
    }
  });
});
</script>
