<script id="apt-template" type="text/x-handlebars-template">

  <div class="col-md-6">
    <div class="card my-2 show-apt-link rounded" style="max-width: 540px;" data-id="{{id}}">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="{{ img }}" class="card-img" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body h-100 d-flex flex-column justify-content-between">
              <h5 class="card-title">{{ title }}</h5>
              <p class="card-text">{{ address }}</p>
              <ul class="list-inline mb-0 service-icons-list">

              </ul>
            </div>
          </div>
        </div>
    </div>
  </div>

</script>