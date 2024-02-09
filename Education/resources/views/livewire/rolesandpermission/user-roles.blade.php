<div>
    <div>
   
        <div class="card  pb-4 px-lg-4 px-2">
            <div>
            <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                class="edit-data py-2 mt-3">Add Roles</button></div>
            <h5 class="card-header px-0 bg-white border-bottom-0  py-3 mb-2 ">Users Roles</h5>
    
            <table id="assign" class="table  nowrap border-0 " style="width:100%">
                <thead>
                    <tr class="dt-head">
                        <th class="text-center">#</th>
                        <th>Role </th>
                        <th >Actions</th>
                    </tr>
    
                </thead>
                <tbody>
                  @foreach ($show as $key => $item)
                    <tr>
                        <td class="text-center">{{$key+1}}</td>
                        <td>{{$item->name}}</td>
                       
                        <td>
                          <div class="d-flex align-items-center">
                            <button type="button" class="edit-data"
                            data-bs-toggle="modal" data-bs-target="#access" wire:click="assigncontrol({{$item->name}})">
                            Access Controls
                        </button>
                            <button type="button" wire:click="editRecord({{$item->id}})" data-bs-toggle="modal" data-bs-target="#Editmodel"
                              class="edit-data">Edit</button>
                            <button class="delete-data" wire:click="confirmDelete({{$item->id}})">Delete</button>
                          </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
              {{$show->links()}}
            </div>
        </div>
    
    
        <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Role </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closemodel" aria-label="Close"></button>
      </div>
      <form action="" wire:submit="saverole">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Role</label>
            <input type="text" class="form-control" id="basic-default-fullname" wire:model="role" placeholder="Enter Role" 
              value="" />
              @error('role') <span class="error">{{ $message }}</span> @enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="closemodel">Close</button>
          <button type="button" class="btn btn-primary" wire:click="saverole">Save</button>
        </div>
      </form>
    </div>
    </div>
    </div>
    
        <!-- Edit Modal -->
        <div class="modal fade" id="Editmodel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Edit Role </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closemodel" aria-label="Close"></button>
          </div>
          <form action="" wire:submit="updateRecord">
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Role</label>
                <input type="text" class="form-control" id="basic-default-fullname" wire:model="role" placeholder="Enter Role" 
                  value="" />
                  @error('role') <span class="error">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="closemodel">Close</button>
              <button type="button" class="btn btn-primary" wire:click="updateRecord">Save</button>
            </div>
          </form>
        </div>
        </div>
        </div>
    </div>
    
    {{-- access control --}}

    <div class="modal fade" id="access" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="modal-content ">
            <div class="modal-header modal-header-style">
                <h5 class="modal-title mb-3 text-white " id="staticBackdropLabel">Acess Control</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" wire:submit="Assignpermissions" wire:ignore.self>
                <div class="modal-body">
                    <div class="container ">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-bordered" style="min-width: 700px;" >
                                    <thead>
                                        <tr class="dt-head">
                                            <th scope="col">Permission Name</th>
                                            <th scope="col" class="text-center">Assign</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        
                                        @foreach ($permissions as $item)
                                            
                                        
                                        <tr class="">

                                            <td class="">
                                                {{$item->name}}
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <input type="checkbox" class="" value="{{$item->name}}" wire:model="permissiongive.{{$item->id}}">
                                                </div>
                                            </td>
                                           
                                        </tr>
                                        @endforeach
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="Assignpermissions">Submit</button>
                    <!-- <button type="button" class="btn btn-primary">Save</button> -->
                </div>
            </form>
        </div>
    </div>
</div>
</div>
