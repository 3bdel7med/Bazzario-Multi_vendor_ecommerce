<div class="modal fade" id="messagesModal" tabindex="-1" aria-labelledby="messagesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title fw-bold" id="messagesModalLabel">Messages</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Modal Body (Split Layout) -->
      <div class="modal-body p-0" style="height: 70vh;">
        <div class="row g-0 h-100">

          <!-- Left Column: User List -->
          <div class="col-12 col-md-4 border-end d-flex flex-column h-100">
            <div class="p-3 border-bottom">
              <input type="search" class="form-control rounded-pill" placeholder="Search chats...">
            </div>
            <div class="list-group list-group-flush overflow-y-auto flex-grow-1">
              <!-- Active/Selected User -->
              <a href="#" class="list-group-item list-group-item-action active p-3 d-flex align-items-center border-0">
                <div class="position-relative">
                  <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center text-white font-weight-bold" style="width: 45px; height: 45px;">JD</div>
                  <span class="position-absolute bottom-0 end-0 p-1 bg-success border border-white rounded-circle"></span>
                </div>
                <div class="ms-3 overflow-hidden">
                  <h6 class="mb-0 text-truncate">John Doe</h6>
                  <small class="text-white-50 text-truncate d-block">Hey, are we still meeting today?</small>
                </div>
              </a>
              <!-- Other User -->
              <a href="#" class="list-group-item list-group-item-action p-3 d-flex align-items-center border-0">
                <div class="position-relative">
                  <div class="bg-info rounded-circle d-flex align-items-center justify-content-center text-white font-weight-bold" style="width: 45px; height: 45px;">AS</div>
                </div>
                <div class="ms-3 overflow-hidden">
                  <h6 class="mb-0 text-truncate">Anna Smith</h6>
                  <small class="text-muted text-truncate d-block">Sent an attachment.</small>
                </div>
              </a>
            </div>
          </div>

          <!-- Right Column: Chat Box -->
          <div class="col-12 col-md-8 d-flex flex-column h-100 bg-light">
            <!-- Active Chat Header -->
            <div class="p-3 bg-white border-bottom d-flex align-items-center">
              <h6 class="mb-0 fw-bold">John Doe</h6>
            </div>

            <!-- Messages Stream Area -->
            <div class="flex-grow-1 p-3 overflow-y-auto d-flex flex-column gap-3">
              <!-- Received Message -->
              <div class="d-flex align-items-start max-width-75">
                <div class="bg-white p-3 rounded shadow-sm text-dark">
                  Hey, are we still meeting today?
                  <div class="text-end"><small class="text-muted" style="font-size: 0.75rem;">10:30 AM</small></div>
                </div>
              </div>
              <!-- Sent Message -->
              <div class="d-flex align-items-end justify-content-end max-width-75 ms-auto">
                <div class="bg-primary p-3 rounded shadow-sm text-white">
                  Yes! See you in 10 minutes.
                  <div class="text-end"><small class="text-white-50" style="font-size: 0.75rem;">10:32 AM</small></div>
                </div>
              </div>
            </div>

            <!-- Message Input Footer -->
            <div class="p-3 bg-white border-top">
              <form class="d-flex gap-2">
                <input type="text" class="form-control rounded-pill" placeholder="Type a message...">
                <button type="submit" class="btn btn-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                  <i class="bi bi-send-fill"></i>
                </button>
              </form>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>
