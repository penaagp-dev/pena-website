<section id="about" class="about d-flex justify-content-center">
    <div class="about-content container" style="gap: 30px" data-aos="fade-up" data-aos-duration="1000">
        <div class="image-about">
            <img id="imageAbout" src="" class="img-fluid bg-transparent" alt="image"  />
        </div>
        <div class="w-100 bg-transparent content-about">
            <p class="mt-3 fs-1 fw-bold bg-transparent" id="titleAbout">About</p>
            <p id="deskripsiAbout" class="fw-normal text-body" style="text-align: justify;font-size:20px;" ></p>
        </div>
    </div>
</section>

<script>
$(document).ready(function(){
  $.ajax({
    url: `{{ url('v2/dd0af7cb-a745-4810-a12c-cefa8a4b24d8/setup/getbytitle/') }}/` +'<p>about</p>',
    method: "GET",
    dataType: "json",
    success: function(response) {
        if (response.data) {
            var item = response.data;
            $("#imageAbout").attr('src', `/uploads/setup/${item.gambar}`);
            var deskripsi = item.deskripsi.replace(/<[^>]+>/g, '');
            $("#deskripsiAbout")[0].innerText = deskripsi;
        } else {
            console.log("Data tidak ditemukan");
        }
    },
    error: function() {
      console.log("Failed to get data from the server");
    }
  });
});

</script>

