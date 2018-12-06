$(document).ready(function(){
	$.ajax({
		url:"http://localhost:8080/admin/pages/test.php",
		method:"GET",
		success:function(data){
			console.log(data);
			var name=[];
			var free=[];

			for(var i in data){
				name.push("name "+data[i].name);
				free.push(data[i].free);
			}
			var	chartdata={
				labels: name,
				datasets:[
					{
						label:'khu tro',
						backgroundColor:'rgba(200,200,200,0.75)',
						borderColor:'rgba(200,200,200,0.75)',
						hoverBackgroundColor:'rgba(200,200,200,1)',
						hoverBorderColor:'rgba(200,200,200,1)',
						data:free
					}
				]
			
			console.log(12)			// var ctx= $("#mycanvas");
			// var barGraph=new Chart(ctx,{
			// 	type:'bar',
			// 	data:chartdata
			// });
		},
		error: function(data){
			console.log(data);
		},
	});
});