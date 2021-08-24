@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create Product
    </div>
    <div class="card-body">
        <form  enctype="multipart/form-data" method="POST" action="{{ route('admin.product.store') }}" >
            @csrf
            <div class="row">
			      	<div class="col-md-6">
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Name*</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="category_id">Select Categories*</label>
                <select name="category_id" id="category_id" class="form-control select2" required>
                    @foreach($categories as $id => $category)
                     <option  value="{{ $category->id }}" > {{$category->name}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="subCategory_id">Select SubCategories*</label>
                <select name="subCategory_id" id="subCategory_id" class="form-control select2" required>
                    @foreach($subCategories as $id => $subCategory)
                     <option  value="{{ $subCategory->id }}" > {{$subCategory->name}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="amount">Amount*</label>
                <input type="text" id="amount" name="amount" class="form-control"  required>
              </div>
              </div>
              <div class="col-md-6">
                    <div class="form-group">
                      <label for="description">Description*</label>
                      <textarea name="description" id="description" class="form-control"></textarea>
                  </div>
              </div>
            </div>
            <div class="form-group">
              <label for="image">Image*</label>
              <input type="file" id="image" name="image" class="form-control" >
          </div>
          <div class="form-group">
            <div class="image-block">
              <label for="image" >Other Image*</label>
            </div>
          </div>
          <div class="form-group">
            <label for="files">Select multiple files: </label>
            <input id="files" type="file" name="filenames[]" onchange="loadFile(event)" multiple/>   
              <div class="row">
                <div class="col-12">
                  <div id="sortableImgThumbnailPreview">
                  </div>
                </div>
              </div>
        </div>
         
              <script>
                var loadFile = function(event) {
                  var sortableImgThumbnailPreview = document.getElementById('sortableImgThumbnailPreview');
                  sortableImgThumbnailPreview.src = URL.createObjectURL(event.target.files[0]);
                  sortableImgThumbnailPreview.onload = function() {
                    URL.revokeObjectURL(sortableImgThumbnailPreview.src) // free memory
                  }
                };
              </script>
   
      <p class="helper-block">
          {{ trans('cruds.permission.fields.title_helper') }}
      </p>
  </div>
  <div>
      <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
  </div>
<br>
  <div class="container">
  <h2>Product Variant</h2>
  <div class="card">
    <div class="card-header">Select Variant</div>
    <div class="card-body">
   
    <section class="container">
      <div class="table table-responsive">
      <table class="table table-responsive table-striped table-bordered">
      <thead>
        <tr>
          <td>Color</td>
            <td>price</td>
            <td>Stock</td>
            <td>BTN</td>
          </tr>
      </thead>
      <tbody id="TextBoxContainer">
      </tbody>
      <tfoot>
        <tr>
          <th colspan="5">
          <button id="btnAdd" type="button" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add more controls"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp; Add&nbsp;</button></th>
        </tr>
      </tfoot>
      </table>
      </div>
      </section>

<form name="form1" id="form1" action="/action_page.php">
Subjects: <select name="subject" id="subject">
    <option value="" selected="selected">Select subject</option>
  </select>
  <br><br>
Topics: <select name="topic" id="topic">
    <option value="" selected="selected">Please select subject first</option>
  </select>
  <br><br>
Chapters: <select name="chapter" id="chapter">
    <option value="" selected="selected">Please select topic first</option>
  </select>
  <br><br>
  <input type="submit" value="Submit">  
</form>

    </div> 
    <div class="card-footer">Footer</div>
  </div>
</div>
</form>
    </div>
</div>
<script>
    

</script>
<script>
var subjectObject = {
  "Color": {
    "red": ["Links", "Images", "Tables", "Lists"],
    "CSS": ["Borders", "Margins", "Backgrounds", "Float"],
    "JavaScript": ["Variables", "Operators", "Functions", "Conditions"]    
  },
  "size": {
    "PHP": ["Variables", "Strings", "Arrays"],
    "SQL": ["SELECT", "UPDATE", "DELETE"]
  }
}
window.onload = function() {
  var subjectSel = document.getElementById("subject");
  var topicSel = document.getElementById("topic");
  var chapterSel = document.getElementById("chapter");
  for (var x in subjectObject) {
    subjectSel.options[subjectSel.options.length] = new Option(x, x);
  }
  subjectSel.onchange = function() {
    //empty Chapters- and Topics- dropdowns
    chapterSel.length = 1;
    topicSel.length = 1;
    //display correct values
    for (var y in subjectObject[this.value]) {
      topicSel.options[topicSel.options.length] = new Option(y, y);
    }
  }
  topicSel.onchange = function() {
    //empty Chapters dropdown
    chapterSel.length = 1;
    //display correct values
    var z = subjectObject[subjectSel.value][this.value];
    for (var i = 0; i < z.length; i++) {
      chapterSel.options[chapterSel.options.length] = new Option(z[i], z[i]);
    }
  }
}
</script>
@endsection