<script id="fydResultsMetaTemplate" type="text/template">
  <div class="row fyd-results__report">
      <div class="col-sm-12">
          <div class="fyd-results__head"><%= count %> <%= who %> near <%= city %>, <%= state %></div>
          <% if (specialty) { %>
          <div class="fyd-results__subhead">Who practice <%= specialty %></div>
          <% } %>
      </div>
      <div class="fyd-results__filter clearfix">
          <div class="col-xs-12 col-sm-6">
              <div class="fyd-results__tags">
              <% if (specialty) { %>
                  <span class="fyd-results__tag"><%= specialty %>
                      <span data-role="remove"></span>
                  </span>
              <% } %>
                  <span class="fyd-results__tag"><%= radius %> miles 
                      <span data-role="remove"></span>
                  </span> 
              </div>
          </div>
          <div class="col-xs-12 col-sm-6">
              <div class="fyd-results__sort">
                  <label class="fyd-results__label">Sort by</label>
                  <select class="fyd-results__select">
                      <option value="distance">Distance</option>
                      <option value="name">Name</option>
                      <option value="experience">Experience</option>
                  </select>
              </div>
          </div>
      </div>
  </div>
</script>

<script id="fydDetailTemplate" type="text/template">
  <div class="fyd-detail__header">
      <div class="fyd-detail__profileimagecontainer pull-left">
           <img class="fyd-detail__image img-responsive" src="http://placehold.it/135x135" />    </div>
      <h3 class="fyd-detail__specialty"><strong><%= specialty %></strong></h3>
      <h1 class="fyd-detail__name"><%= full_name %></h1>
      <h6 class="fyd-detail__meta">XX years experience&nbsp;&bull;&nbsp;Gender</h6>
  </div>
  <div class="fyd-detail__body">
      <% if (aoa_cert) {  %>
      <div class="fyd-detail__boardcertcontainer pull-right">
          <img src="img/logo2-aoa-board-certified-150.png" />
      </div>
      <% } %>
      <h6 class="fyd-detail__subhead">Office location</h6>
      <h4>
        <% if (addr_2 != '') { %>
           <%= addr_2 %><br />
        <% } %>
        <%= addr_1 %><br /> 
        <%= city %>, <%= state %> <%= zip %><br />
      </h4>
      <h6 class="fyd-detail__subhead">Contact</h6>
      <h4>
        <% if (phone != '') { %>
        <i class="fa fa-phone"></i> <%= phone %><br />
        <% } %>
        <% if (email != '') { %>
        <a href="mailto:<%= email %>" class="fyd-detail__link"><i class="fa fa-envelope-o"></i>  Email Dr. <%= last_name %></a><br />
        <% } %>
        <% if (website != '') { %>
        <a href="<%= website %>" class="fyd-detail__link"><%= website %></a><br />
        <% } %>
      </h4>
      <h6 class="fyd-detail__subhead">About Dr. <%= last_name %></h6>
      <ul class="fyd-detail__list">
          <li class="fyd-detail__listitem">Dr. <%= last_name %> graduated in <%= grad_year %> from the <%= school %>.</li>
          <% if (secondary != 'BLANK') { %>
          <li class="fyd-detail__listitem">Dr. <%= last_name %> also specializes in <%= secondary %>.</li>
          <% } %>
          <% if (abms_cert == 1) { %>
          <li class="fyd-detail__listitem">Dr. <%= last_name %> is board-certified by the American Board of Medical Specialties.</li>
          <% } %>
      </ul>
  </div>
</script>
