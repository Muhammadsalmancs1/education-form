<div>
    <form wire:submit.prevent="savereference">
        <div class="mb-3">
            <!-- <label class="form-label" for="basic-default-fullname">Name</label> -->
            @if ($updateMode)
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Enter Reference Name"
                    name="reference" />
            @else
                <input type="text" class="form-control" wire:model="reference" id="basic-default-fullname"
                    placeholder="Enter Reference Name" name="reference" />
                @error('reference')
                    <span class="error">{{ $message }}</span>
                @enderror
            @endif
        </div>

        <div class="d-flex justify-content-end">
            <!-- <button type="submit">Register</button> -->
            <button type="button" class="btn btn-primary" wire:click="savereference">Register</button>
        </div>
    </form>



    <hr class="my-1" />

    <!-- Striped Rows -->
    <div class="card px-4 pb-4">
        <h5 class="card-header px-0">Reference Listing</h5>
        <div class="table-responsive">
            <input type="search" class="form-control ps-4 mb-4" wire:model="search" placeholder="Search...">
            <table class="table  nowrap border-0 " style="width:100%">
                <thead>
                    <tr class="dt-head">
                        <th>#</th>
                        <th>Reference</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($show as $key => $item)
                        <tr>
                            <td>{{ $key }}</td>
                            <td>{{ $item->reference }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <button type="button" wire:click="editRecord({{ $item->id }})"
                                        data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                        class="edit-data">Edit</button>
                                    <button class="delete-data"
                                        wire:click="confirmDelete({{ $item->id }})">Delete</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <div>
                {{ $show->links() }}
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Reference </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closemodel"
                        aria-label="Close"></button>
                </div>
                <form action="" wire:submit="updateRecord">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Reference</label>
                            <input type="text" class="form-control" id="basic-default-fullname"
                                wire:model="reference" name="reference" placeholder="Edit Reference Name"
                                value="" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            wire:click="closemodel">Close</button>
                        <button type="button" class="btn btn-primary" wire:click="updateRecord">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
