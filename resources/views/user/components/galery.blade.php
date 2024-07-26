<section id="gallery" class="pt-32 pb-32 bg-slate-200 dark:bg-slate-700">
    <div class="container mx-auto text-center">
        <h2 class="text-2xl font-bold text-cyan-400 uppercase pb-7">PENGURUS INTI</h2>
    </div>
    <div class="container mx-auto grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Card 1 -->
        <div class="relative bg-cover bg-center bg-red-200 transition-transform transform hover:scale-105 w-full h-64 sm:h-80 lg:h-96 rounded-lg" style="background-image: url('{{asset('assets/img/1.jpeg')}}');">
            <div class="absolute inset-0 flex flex-col items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-300 bg-slate-500 bg-opacity-50 rounded-lg">
                <div class="bg-white p-4 text-center mb-3 absolute bottom-0 bg-opacity-75 rounded-md">
                    <h4 class="text-slate-700 text-lg font-bold">MOH FADHIL</h4>
                    <p class="text-slate-700">Ketua Devisi Learning</p>
                </div>
            </div>
        </div>
        <!-- Card 2 -->
        <div class="relative bg-cover bg-center bg-red-200 transition-transform transform hover:scale-105 w-full h-64 sm:h-80 lg:h-96 rounded-lg" style="background-image: url('{{asset('assets/img/1.jpeg')}}');">
            <div class="absolute inset-0 flex flex-col items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-300 bg-slate-500 bg-opacity-50 rounded-lg">
                <div class="bg-white text-center mb-3 absolute bottom-0 bg-opacity-75 p-4 rounded-md">
                    <h4 class="text-slate-700 text-lg font-bold">MOH FADHIL</h4>
                    <p class="text-slate-700">Ketua Devisi Learning</p>
                </div>
            </div>
        </div>
        <!-- Card 3 -->
        <div class="relative bg-cover bg-center bg-red-200 transition-transform transform hover:scale-105 w-full h-64 sm:h-80 lg:h-96 rounded-lg" style="background-image: url('{{asset('assets/img/1.jpeg')}}');">
            <div class="absolute inset-0 flex flex-col items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-300 bg-slate-500 bg-opacity-50 rounded-lg">
                <div class="bg-white text-center mb-3 absolute bottom-0 bg-opacity-75 p-4 rounded-md">
                    <h4 class="text-slate-700 text-lg font-bold">MOH FADHIL</h4>
                    <p class="text-slate-700">Ketua Devisi Learning</p>
                </div>
            </div>
        </div>
        <!-- Card 4 -->
        <div class="relative bg-cover bg-center bg-red-200 transition-transform transform hover:scale-105 w-full h-64 sm:h-80 lg:h-96 rounded-lg" style="background-image: url('{{asset('assets/img/1.jpeg')}}');">
            <div class="absolute inset-0 flex flex-col items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-300 bg-slate-500 bg-opacity-50 rounded-lg">
                <div class="bg-white text-center mb-3 absolute bottom-0 bg-opacity-75 p-4 rounded-md">
                    <h4 class="text-slate-700 text-lg font-bold">MOH FADHIL</h4>
                    <p class="text-slate-700">Ketua Devisi Learning</p>
                </div>
            </div>
        </div>
    </div>
</section>  

<!-- <script>
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
</script> -->
