
var myData = {
				labels: ["Javascript", "Java", "Python", "PHP", "C++", "TypeScript", "Linux Shell","C","Ruby on Rails"],
				datasets: [{
					label: "Hey, baby!",
					fill: false,
					backgroundColor: ['#ff0000', '#ff4000', '#ff8000', '#ffbf00', '#ffbf00', '#ffff00', '#bfff00', '#80ff00', '#40ff00', '#00ff00'],
					borderColor: 'black',
					data: [85, 60,70, 50, 18, 20, 45, 30, 20],
				}]
			};
			
			// Code to drow Chart
            // Default chart defined with type: 'bar'
			var ctx = document.getElementById('my_Chart').getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'doughnut',    	// Define chart type
				data: myData,    	// Chart data
                options: {
                    legend: {
                        display: false
                    },
                
                },
			});
			
			// Function runs on chart type select update
            
			function updateChartType() {
                // Destroy the previous chart
				myChart.destroy();
                // Draw a new chart on the basic of dropdown
				myChart = new Chart(ctx, {
					type: document.getElementById("graphForm").value,  // Select chart type from dropdown
					data: myData,
                    options: {
                        legend: {
                            display: false
                        },
                    
                    },
				});
             
			};

			var countries = Array('country1','country2','country0');
			var states = Array('state1','state2','state0');
			var regions = Array('region1','region2','region0');
			var cities	 = Array('city1','city2','city0');
			var attackType	 = Array('attackType1','attackType2','attackType0');
			var targetNatality	 = Array('targetNatality1','targetNatality2','targetNatality0');
			var gang	 = Array('gang1','gang2','gang0');
			var motive	 = Array('motive1','motive2','motive0');
			var weaponType	 = Array('weaponType1','weaponType2','weaponType0');
			var weaponSubtype	 = Array('weaponSubtype1','weaponSubtype2','weaponSubtype0');
			var lossExtent	 = Array('lossExtent1','lossExtent2','lossExtent0');
			var year = Array('year1','year2','year0');
			var month = Array('month1','month2','month0');


			function selectAll(type){
				var array;
				var selectAll;
				switch(type){
					case 'country':
						array = countries;
						selectAll = 'selectAllcountry';
						break;
					case 'region':
						array = regions;
						selectAll = 'selectAllregion';
						break;	
					case 'state':
							array = states;
							selectAll = 'selectAllstate';
							break;	
				case 'city':
							array = cities;
							selectAll = 'selectAllcity';
							break;	
				case 'attackType':
							array = attackType;
							selectAll = 'selectAllattackType';
							break;	
				case 'targetNatality':
							array = targetNatality;
							selectAll = 'selectAlltargetNatality';
							break;
				case 'gang':
							array = gang;
							selectAll = 'selectAllgang';
							break;
				case 'motive':
							array = motive;
							selectAll = 'selectAllmotive';
							break;	
				case 'weaponType':
							array = weaponSubtype;
							selectAll = 'selectAllweaponSubtype';
							break;	
				case 'weaponSubtype':
							array = weaponSubtype;
							selectAll = 'selectAllweaponSubtype';
							break;	
				case 'lossExtent':
							array = lossExtent;
							selectAll = 'selectAlllossExtent';
							break;	
				case 'year':
							array = year;
							selectAll = 'selectAllyear';
							break;					
				case 'month':
							array = month;
							selectAll = 'selectAllmonth';
							break;														
				}

				array.forEach(element=>document.getElementById(element).checked=document.getElementById(selectAll).checked);
			}

			function lowerBoundChange(type){
				var checked = document.getElementById(type.concat('LowerCheck')).checked;
				var result;
				if(checked){
					result='block';
				}
				else{
					result='none';
				}

				document.getElementById(type.concat('LowerValueDiv')).style.display=result;
			}
			function upperBoundChange(type){
				var checked = document.getElementById(type.concat('UpperCheck')).checked;
				var result;
				if(checked){
					result='block';
				}
				else{
					result='none';
				}

				document.getElementById(type.concat('UpperValueDiv')).style.display=result;
			}


            
