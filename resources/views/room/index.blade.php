@extends ('layout')

@section ('content')

    <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Employee</h5>
                    </div>
                    <div class="card-body">
                      <form action="/app/employee" method="post">
                        @csrf
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                            <input type="text" class="form-control" id="basic-icon-default-fullname" name="name" placeholder="Mulyono" aria-label="Username..." required>
                          </div>
                        </div>

                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-phone">Phone No</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>
                            <input type="text" id="basic-icon-default-phone" name="phone" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" required>
                          </div>
                        </div>

                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-email">Email</label>
                          <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                            <input type="email" id="basic-icon-default-email" name="email" class="form-control" placeholder="john.doe" aria-label="john.doe" required>
                          </div>
                        </div>

                        <div class="mb-3">
                          <label class="form-label" for="password">Password</label>
                          <div class="input-group input-group-merge">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                          </div>
                        </div>

                        <div class="mb-3">
                          <label class="form-label" for="gender">Gender</label>
                          <select name="gender" id="gender" class="form-select">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                        </div>

                        <div class="mb-2 text-end">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              <hr>