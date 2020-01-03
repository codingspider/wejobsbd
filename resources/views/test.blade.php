<div class="col-xs-4 col-sm-4 col-md-4">
 <div class="form-group">
    <label class="control-label">Driver Name:</label>
   <form>
       <input type="text" name="search"  id="search"></input>
   </form>
 </div>
</div>


<div class="col-xs-4 col-sm-4 col-md-4">
 <div class="form-group filter-btn">
    <button class='btn btn-info' type='search'>Search</button>
 </div>
</div>

<div class="YOUR-AREA">
    
</div>


<script>
    $('button[type="search"]').click(function(e) {
    $.ajax({
        url: "test/fetch",
        type: "POST",
        data: { 
            '_token' : '{{csrf_token() }}',
        },
     success: function(data) {
          var customHtml = '';
          if(data.success){
            var response = data.success;
            for (var i in response) {
               customHtml = customHtml + '<div>'+ response[i].first_name+'</div>';
            
            }

            $('.YOUR-AREA').html(customHtml)
          }
        },
    });  
});
</script>