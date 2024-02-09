<div>
   
    <div class="card  pb-4 px-lg-4 px-2">
        <div>
        <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
            class="edit-data py-2 mt-3">Add Permissions</button></div>
        <h5 class="card-header px-0 bg-white border-bottom-0  py-3 mb-2 ">Users Permissions</h5>

        <table id="assign" class="table  nowrap border-0 " style="width:100%">
            <thead>
                <tr class="dt-head">
                    <th class="text-center">#</th>
                    <th>Permission </th>
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
    <h5 class="modal-title" id="staticBackdropLabel">Add Permission </h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closemodel" aria-label="Close"></button>
  </div>
  <form action="" wire:submit="savepermission">
    <div class="modal-body">
      <div class="mb-3">
        <label class="form-label" for="basic-default-fullname">Permission</label>
        <input type="text" class="form-control" id="basic-default-fullname" wire:model="permission" placeholder="Enter Permission" 
          value="" />
          @error('permission') <span class="error">{{ $message }}</span> @enderror
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="closemodel">Close</button>
      <button type="button" class="btn btn-primary" wire:click="savepermission">Save</button>
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
        <h5 class="modal-title" id="staticBackdropLabel">Add Permission </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closemodel" aria-label="Close"></button>
      </div>
      <form action="" wire:submit="updateRecord">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Permission</label>
            <input type="text" class="form-control" id="basic-default-fullname" wire:model="permission" placeholder="Enter Permission" 
              value="" />
              @error('permission') <span class="error">{{ $message }}</span> @enderror
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
