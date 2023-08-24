<div class="event" id="event">
    <h1 class="d-flex justify-content-center pt-5 fw-bold text-white">News</h1>
    <div class="slider-container">
        <div class="slider" id="newsData">
           
        </div>
    </div>
</div>

<script>
    function stripHtmlTags(text) {
        var div = document.createElement("div");
        div.innerHTML = text;
        return div.textContent || div.innerText || "";
    }

    const limitTextCard = (text, characterLimit) => {
        if (text.length > characterLimit) {
            return text.slice(0, characterLimit) + " ...";
        } else {
            return text;
        }
    };

    function hideInvalidLinks() {
        const visitButtons = document.querySelectorAll('.visit-site-btn');
        
        visitButtons.forEach(button => {
            const hrefValue = button.getAttribute('href');
            if (hrefValue === null || hrefValue === undefined || hrefValue === '') {
                button.classList.add('d-none');
            }
        });
    }

    $(document).ready(function(){
      $.ajax({
        url: `{{ url('v5/nfhrydjt-9863-5248-c9uj-bdy47fhw4cj7/news') }}`,
        method: "GET",
        dataType: "json",
        success: function(response) {
          var galleryData = "";
          $.each(response.data, function(index, item) {
            galleryData += /*html*/
            `
            <div class="card-event" style="width: 18rem;">
                <div class="card-image">
                    <img src="/uploads/news/${item.gambar}" class="card-img-top mt-3" alt="..." style="height: 200px; object-fit: cover;">
                </div>
                <div class="card-body p-2">
                    <h5 class="card-title fw-semibold">${limitTextCard(item.title, 25)}</h5>
                    <p class="card-text p-2">${limitTextCard(item.deskripsi, 30)}</p>
                    <div class="d-flex justify-content-center align-items-center gap-4 pt-4">
                        <a href="${stripHtmlTags(item.link)}" target="_blank" class="btn btn-primary visit-site-btn">visit site</a>
                        <a data-bs-toggle="modal" data-bs-target="#newsModal${index}" class="btn btn-primary">read more</a>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="newsModal${index}" tabindex="-1" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div>
                                <h1 class="modal-title fs-5">${item.title}</h1>
                                <small>
                                    <i class="fa-solid fa-calendar-days me-2"></i> ${item.tgl_upload}
                                </small>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="text-indent: 24px; text-align: justify;">${item.deskripsi}</div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="${stripHtmlTags(item.link)}" target="_blank" type="button" class="btn btn-primary visit-site-btn">Visit site</a>
                        </div>
                    </div>
                </div>
            </div>
            `;
          });
          $("#newsData").html(galleryData);
          hideInvalidLinks()
        },
        error: function() {
          console.log("Failed to get data from the server");
        }
      });

    });
</script>

