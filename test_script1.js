

fetch("http://192.168.100.252:8081/sfmm/test_all_report.php")
.then(res=>res.json())
.then(data=>{
	
	console.log(data.data[11].medi);
	let tableData="";
	data.map(values=>{
		tableData+=`<h1>${values.medi}</h1>`;
		
	});
})
	