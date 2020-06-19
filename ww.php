<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style_parsley.css">
</head>
<body>

		<div class="container ">
		<h2>Appending Items</h2>
		<hr/>
		<div id="msg"></div>
		<form id="add_data" method="post" data-parsley-validate="">			
				<table class="table table-primary table-hover " id="add" >
					<tr>
						<td><input type="text" name="txt1[]" id="txt1" placeholder="Name" required data-parsley-pattern="^[a-zA-Z.]+$" data-parsley-trigger="keyup">
						</td>
						<td><input type="text" name="txt2[]" id="txt2" placeholder="password" required data-parsley-length="[3, 12]" data-parsley-trigger="keyup">

							 <input type="text"  name="subtxt" id="subtxt" style="display: none;" required data-parsley-pattern="^[a-zA-Z.]+$" data-parsley-trigger="keyup">

						</td>
						<td>
						<select name="txt3[]" id="txt3"  required  placeholder="Enter your gender">
								<option value="">--Select--</option>
								<option  value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
  						</td>
  						<td><input type="text" name="txt5[]" id="txt5" placeholder="Enter the amount" maxlength="4" required data-parsley-pattern="^[0-9]+$" data-parsley-trigger="keyup"></td>
  						<td><input type="date" id="txt4" name="txt4[]" required data-parsley-date="yyyy-mm-dd" data-parsley-trigger="keyup"></td>  						

						<td><input type="submit" class="btn btn-dark" name="btn" id="btn" value="Add more"></td>
					</tr>
				</table>
				<input type="submit" class="btn btn-success" name="ins" id="ins" value="Submit">
		</form>		
	</div>
		<script src="http://parsleyjs.org/dist/parsley.js"></script>


		<script>
		$(document).ready(function(){
				$(document).on("change","#txt3",function(e){
					e.preventDefault();

					var ser = $(this).val();					
					if(ser == "Male")
					{
						 $('#subtxt').css("display","block");
					}

					else
					{	
						$("#subtxt").css("display","none");	
						
					}
				})


				var i=1;
				$("#btn").click(function(e){

					e.preventDefault();
					
					if(i<5)
					{
						i++;
					$('#add').append('<tr id="row'+i+'">'+
											'<td><input type="text" name="txt1[]" id="txt1" placeholder="Name" required data-parsley-pattern="^[a-zA-Z.]+$" data-parsley-trigger="keyup"></td>'+

											'<td><input type="text" name="txt2[]" id="txt2" placeholder="password"  required data-parsley-length="[3, 12]" data-parsley-trigger="keyup">'+ 
												'<input type="date"  name="subtxt'+i+'" id="subtxt'+i+'" style="display: none;">'+
											'</td>'+

											'<td><select name="txt3[]" required id="sel'+i+'"  placeholder="Enter your gender"  onclick="enableTxt('+i+')" >'+

											'<option value="">--Select--</option><option  value="Male">Male</option><option  value="Female">Female</option></select></td>'+								 

											 '<td><input type="text" name="txt5[]" id="txt5" placeholder="Enter the amount"  required data-parsley-length="[2, 10]" data-parsley-trigger="keyup"></td>'+

											 '<td><input type="date" id="txt4" name="txt4[]" required data-parsley-date="yyyy-mm-dd" data-parsley-trigger="keyup"></td>'+

											 '<td><input type="submit" class="btn btn-danger btnremove" name="remove"id="'+i+'" value="&times;"></td></tr>'); 
					}
					else
					{
						alert("Only 5 fields");
					}
				});


				$(document).on("click", ".btnremove" , function() {
					var but = $(this).attr('id');
		
					$('#row'+but+'').remove();
					i--;
				});
			});

					function enableTxt(i)
						{
							var mm = $("#sel"+i).val();

							if(mm == "Male")
							{	
								$("#subtxt"+i).css("display","block");
							}
							else
							{
								$("#subtxt"+i).css("display","none");	
							}	
						}
	
		</script>
</body>
</html>