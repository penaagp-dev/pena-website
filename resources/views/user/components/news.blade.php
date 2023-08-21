<div class="bg-primary" id="event">
    <h1 class="d-flex justify-content-center pt-5 fw-bold text-white">News</h1>
    <swiper-container class="mySwiper" slides-per-view="auto" space-between="30">
        
        <swiper-slide>
      <div class="" style="width: 18rem;">
        <img src="{{ asset('assets/img/bg.jpg')}}" class="card-img-top mt-3" alt="..." style="height: 200px; object-fit: cover;">
        <div class="card-body p-2">
          <h5 class="card-title fw-semibold">Card title</h5>
          <p class="card-text">
            Some quick example text to build on the card title and make up the bulk of the card's content.
          </p>
          <div class="d-flex justify-content-center align-items-center gap-4">
            <a href="#" class="btn btn-primary">visit site</a>
            <a data-bs-toggle="modal" data-bs-target="#newsModal" class="btn btn-primary">read more</a>
          </div>
        </div>
      </div>
    </swiper-slide>

</swiper-container>
</div>

<div class="modal fade" id="newsModal"  tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <div>
            <h1 class="modal-title fs-5">Modal title</h1>
            <small>
              <i class="fa-solid fa-calendar-days me-2"></i> 23 Juli 2023
            </small>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="text-indent: 24px; text-align: justify;">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto commodi incidunt facilis expedita earum officia. Dolorum repudiandae ullam debitis a tempora enim quaerat, dignissimos unde repellat pariatur itaque blanditiis corporis modi distinctio impedit? Aperiam officia animi molestias? Amet quae quaerat, enim excepturi aliquid inventore fugit optio mollitia fuga sed ad tenetur corporis incidunt, obcaecati minima! Libero quas velit dolorem dolore eaque debitis aliquid! Explicabo eius aperiam enim tempora incidunt atque vel ipsa deserunt repellat id, nihil libero eum corporis nostrum, alias cupiditate est. Eligendi ducimus officiis placeat vitae cupiditate odio, sapiente praesentium sunt veniam esse alias tempore voluptates reiciendis soluta.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a href="#" type="button" class="btn btn-primary">Visit site</a>
        </div>
      </div>
    </div>
  </div>

