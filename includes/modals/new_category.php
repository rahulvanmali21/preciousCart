<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-group">
       <label for="category" class="form-label">new category</label>
       <input type="text" class="form-control" id="category" onkeypress="check(event)">
       </div>
       <p class="text-danger" id="msg"></p>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onClick="addCategory()">Add</button>
      </div>
    </div>
  </div>
</div>
<script>
let check=(event)=>{
  if(event.keyCode == 13){
    addCategory();
  }
}
let addCategory=()=>{
  let category = $("#category").val()
  $.post("../includes/handlers/add_category_ajax.php",{category})
    .done(msg=>{
      $("#msg").html(msg);
      $("#category").val("");
      setTimeout(() => {
        location.reload()
      }, 1000);
    });
}
</script>
