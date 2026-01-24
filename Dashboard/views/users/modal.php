<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $value['id']; ?>">
  Delete
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?= $value['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLabel">DELETE USER</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-dark fs-5">
       Are you sure to delete <span class="text-primary"><?= $value['name']; ?></span> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a class="btn btn-danger" href="functions/users/delete.php?id=<?= $value['id']; ?>">Delete</a>
      </div>
    </div>
  </div>
</div>