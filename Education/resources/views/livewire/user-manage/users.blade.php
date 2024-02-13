<div>
       <!-- <h4 class=" pb-2">User Register</h4> -->
       <div class="card mb-4" wire:ignore.self>
        <h5 class="card-header">User Register</h5>
        <div class="card-body">
            <form class="row" wire:submit="saveusers" wire:ignore.self>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" placeholder="Enter Name" wire:model="name" />
                        @error('name') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">User Email</label>
                        <input type="email" class="form-control" placeholder="User Email"  wire:model="email"/>
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="Enter Password" wire:model="password" />
                        @error('password') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">User Role</label>
                        <select class="form-select" name="level" wire:model="role">
                            <option value="">--SELECT--</option>
                            @foreach ($roles as $item)
                            <option value="{{$item->name}}">{{$item->name}}</option>  
                            @endforeach

                        </select>
                        @error('role') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary" wire:click="saveusers">Register</button>
                </div>
            </form>
        </div>
    </div>


    <div class="card  pb-4 px-lg-4 px-2">
        <h5 class="card-header px-0 bg-white border-bottom-0  py-3 mb-2 ">User List</h5>
        <table id="assign" class="table  nowrap border-0 " style="width:100%">
            <thead>
                <tr class="dt-head">
                    <th class="text-center" style="width: 50px;">#</th>
                    <th>Name </th>
                    <th>User Email</th>
                    <th class="text-center">User Role</th>
                    <th class="text-center">Status</th>
                    <th>Last Login</th>
                    <th class="text-center">Actions</th>
                </tr>

            </thead>
            <tbody>
                @foreach ($show as $key=> $item)
                    
               
                <tr>
                    <td class="text-center d-flex">{{$key}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td class="text-center">{{$item->role}}</td>
                    <td class="text-center">
                        <span class="label label-success">Active</span>
                    </td>
                    <td>December 27, 2023, 4:31:59 pm</td>
                    <td class="text-center">
                        <div class="btn-group">

                            <button type="button" class="btn btn-xs  btn-warning"
                                data-bs-toggle="modal" data-bs-target="#edit" wire:click="editrecord({{$item->id}})">
                                Edit
                            </button>

                            <button type="button" class="btn btn-xs btn-danger"
                                 wire:click="confirmDelete({{$item->id}})">
                                Delete
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

          <!--edit Modal -->
          <div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
          <div class="modal-dialog  modal-fullscreen ">
              <div class="modal-content ">
                  <div class="modal-header modal-header-style">
                      <h5 class="modal-title mb-3 text-white" id="staticBackdropLabel">Update User Profile
                      </h5>
                      <button type="button" class="btn-close" wire:click="closemodel" data-bs-dismiss="modal" aria-label="Close" ></button>
                  </div>
                  <form action="" wire:submit="updaterecord" >
                      <div class="modal-body">
                          <div class="container ">
                              <div class="row">
                                  <div class="col-lg-12">
                                      <h5 class="modal-title mb-3">Update Admin Account
                                      </h5>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="mb-3">
                                          <label class="form-label">Name</label>
                                          <input type="text" class="form-control" wire:model="name" />
                                          @error('name') <span class="error">{{ $message }}</span> @enderror
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="mb-3">
                                          <label class="form-label">Email</label>
                                          <input type="text" class="form-control" wire:model="email"/>
                                          @error('email') <span class="error">{{ $message }}</span> @enderror
                                      </div>
                                  </div>

                                  <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" placeholder="Enter Password" wire:model="password" />
                                        @error('password') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="mb-3">
                                          <label class="form-label">User Role</label>
                                          <select class="form-select"  wire:model="role">
                                            <option value="">--SELECT--</option>

                                            @foreach ($roles as $item)
                                            <option value="{{$item->name}}">{{$item->name}}</option>
                                            @endforeach
                
                                        </select>
                                        @error('role') <span class="error">{{ $message }}</span> @enderror
                                      </div>
                                  </div>


                                  <div class="d-flex justify-content-end">
                                      <button type="button" class="btn btn-primary" wire:click="updaterecord" >Update</button>
                                  </div>
                              </div>

                          </div>
                      </div>

                  </form>
              </div>
          </div>
      </div>
</div>
