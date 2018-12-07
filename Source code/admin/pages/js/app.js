$(document).ready(function(){
	$.ajax({
		url:"http://localhost:8080/admin/pages/data.php",
		method:"GET",
		success:function(data){
			console.log(data);
			var name=[];
			var free=[];

			for(var i in data){
				name.push(data[i].name);
				free.push(data[i].free);
			}
			var	chartdata={
				labels: name,
				datasets:[
					{
						label:'free',
						backgroundColor:'rgba(200,200,200,0.75)',
						borderColor:'rgba(200,200,200,0.75)',
						hoverBackgroundColor:'rgba(200,200,200,1)',
						hoverBorderColor:'rgba(200,200,200,1)',
						data: free
					}
				]
			};
			var cxt = $("#mycanvas");
			var barGraph = new Chart(cxt,{
			    type: 'bar',
			    data: chartdata
			});
		},
		error: function(data){
		console.log(data);
	}
});
});
