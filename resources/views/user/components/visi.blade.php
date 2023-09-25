<div class="visi">
    <div class="visi-wrapper container">
      <div class="visi-text w-100">
        <h1 class="display-5 fw-semibold" style="max-width: 600px;margin-left:-5px;">Visi Misi</h1>
        <p id="visiMisi" class="fw-normal" style="text-align: justify;font-size:20px;">

        </p>
      </div>
      <div class="img-visi w-100">
        <img id="imgVisiMisi" src="" class="img-fluid" alt="image" />
      </div>
    </div>
  </div>
<script>
$(document).ready(function(){
  $.ajax({
    url: `{{ url('v2/dd0af7cb-a745-4810-a12c-cefa8a4b24d8/setup/getbytitle/') }}/` +'<p>visimisi</p>',
    method: "GET",
    dataType: "json",
    success: function(response) {
        if (response.data) {
            var item = response.data;
            $("#imgVisiMisi").attr('src', `/uploads/setup/${item.gambar}`);
            var deskripsi = item.deskripsi.replace(/<[^>]+>/g, '');
            $("#visiMisi")[0].innerText = deskripsi;
        }
    },
    error: function() {
      console.log("Failed to get data from the server");
    }
  });
});
</script>

