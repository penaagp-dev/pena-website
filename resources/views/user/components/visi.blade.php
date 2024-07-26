<!-- Visi & Misi Start -->
<section class="pt-32 pb-32 dark:bg-black">
    <div class="container">
        <div class="flex flex-wrap justify-center lg:justify-between items-center">
            <div class="w-full lg:w-5/12 px-4 mb-10 lg:mb-0">
                <h1 class="font-bold text-center lg:text-center text-2xl uppercase text-black mb-5 dark:text-white">VISI</h1>
                <p class="font-medium text-center lg:text-center text-base max-w-xl lg:text-lg dark:text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti ratione, nisi quia dicta animi possimus ex tempore dolores accusamus amet?</p>
            </div>
            <div class="hidden lg:block border-l border-slate-800 h-64 mx-4"></div>
            <div class="w-full lg:w-5/12 px-4">
                <h1 class="font-bold text-center lg:text-center text-2xl uppercase text-black mb-5 dark:text-white">MISI</h1>
                <p class="font-medium text-center lg:text-center text-base max-w-xl lg:text-lg dark:text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti ratione, nisi quia dicta animi possimus ex tempore dolores accusamus amet?</p>
            </div>
        </div>
    </div>
</section>
        <!-- Visi & Misi End -->
<!-- <script>
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
</script> -->

