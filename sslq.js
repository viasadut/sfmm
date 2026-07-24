fetch("http://192.168.100.252:8081/sfmm/test_all_report.php").then((data)=>{
//console.log(data);
return data.json();
}).then((objectData)=>{
console.log(objectData[2].medi);	
let tableData="";

objectData.map((values)=>{
tableData=`<h1>${values.medi}</h1>`;
});
document.getElementById("table_data").
innerHTML=tableData;

})
	