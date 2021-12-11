var programs=[
	{
		name:"Config",
		icon:`url("jquery-ui-1.12.1/images/ui-icons_777777_256x240.png")`,
		pos:"-192px -112px",
		start:function(){
			ind=programs.indexOf(this)
			if(this.shargs)alert(ind,this.shargs);
			var window=createWindow(this, "Config",`<button onclick='$.ajax({url:"/setclock?clock=${Date.now()}",method:"PUT"}).error((_,e)=>alert(ind,e));'>Configure Time</button>`,0,0,[this.icon,this.pos]);
			var hwnd=window.children().last();
			hwnd.append("<button>Sensoren</button>").children().last().on("click",function(){
				
				createWindow(this, "Sensoren",null)
			})
		},
		permissions:{notify:true},
		shattr:["Sensoren"],
	},
	
	{
		name:"Daten",
		icon:`url("jquery-ui-1.12.1/images/ui-icons_777777_256x240.png")`,
		pos:"-224px -96px",
		start:function(){
			var Ih=setInterval(_=>{
				$.ajax({url:"/data.json"})
				.success(data=>this.data.call(this,data))
				.error((_,e)=>{clearInterval(Ih);})},500);
			this.stop=_=>{clearInterval(Ih);};(this.window=createWindow(this, "Daten","Daten des Esp",0,0,[this.icon,this.pos])).children().last().append("<div style='position:relative;left:10px;width:50%'><canvas></canvas></div>")
		},
		
		data:function(data){
			data=data.data;
			var ctx=(content=this.window.children().last()).children().last().children("canvas").last();
			if(!ctx.attr("init")){
				window.chart=new Chart(ctx,{type:'line',data: {labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],datasets: [{label: '# of Votes',data: [12, 19, 3, 5, 2, 3],backgroundColor: ['rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)'],borderColor: ['rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)'],borderWidth: 1}]},options: {scales: {y: {beginAtZero: true}}}});
				l=data.length
				for(var i=1;i<l;i++){
				
				const dsColor = namedColor(chart.data.datasets.length);
				const newDataset = {
					label: data[i][0],
					backgroundColor: (dsColor),
					borderColor: dsColor,
					data: data[i][1],
				};
				chart.data.datasets.push(newDataset);
				chart.update();	
				}
				}
			ctx.attr("init",true)
			l=chart.data.datasets.length
			chart.data.labels=(function(e){var res=[];for(var i=0;i<e[0][1].length-1;i++){res.push("-"+(e[0][1].length-i)+"h");}res.push("Jetzt");return res;})(data);
			for(var i=0;i<l;i++){chart.data.datasets[i].label=data[i][0];chart.data.datasets[i].data=data[i][1];}
			chart.update()
		},
		permissions:{},
	},
];
