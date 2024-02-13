<script src="https://d3js.org/d3.v7.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/d3-org-chart@3"></script>
<script src="https://cdn.jsdelivr.net/npm/d3-flextree@2.1.2/build/d3-flextree.js"></script>
<div class="chart-container"></div>

<script>
	$.ajax({
                url: "<?php echo base_url()?>TAD/orgChange/getGL/3",
                type: "post",
                dataType: "json",
                success: function(data) {
                    var chart;
					const dataFlattened=[{
						name : "Rudi Anandia",
						imageUrl: "https://raw.githubusercontent.com/bumbeishvili/Assets/master/Projects/D3/Organization%20Chart/cto.jpg",
						area:"Corporate",
						profileUrl:"http://example.com/employee/profile",
						office:"CEO office",
						tags:"Ceo,tag1,manager,cto",
						isLoggedUser:false,
						positionName:"Direktur Utama",
						id:"30166663",
						parentId:"",
						size:""
					},{
						name : "Febri Haryoko",
						imageUrl: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRudDbHeW2OobhX8E9fAY-ctpUAHeTNWfaqJA&usqp=CAU",
						area:"TAD",
						profileUrl:"http://example.com/employee/profile",
						office:"Office",
						tags:"associate,tad",
						isLoggedUser:false,
						positionName:"Associate Safety Officer",
						id:"1140000006",
						parentId:"30235381",
						size:""
					}];

					data.forEach(row => {
						var obj = {
									name : row.Name,
									imageUrl: "https://murwillumbahvet.com.au/wp-content/uploads/2019/08/profile-blank.png",
									area:"Corporate",
									profileUrl:"http://example.com/employee/profile",
									office:"CTO office",
									tags:"Ceo,tag1,manager,cto",
									isLoggedUser:false,
									positionName:row.Position,
									id:row.ID_Position,
									parentId:row.ID_Position_Atasan,
									size:""
								}
						dataFlattened.push(obj)
					});
                    console.log(data)
                    chart = new d3.OrgChart()
				          .container('.chart-container')
				          .data(dataFlattened)
				          .nodeWidth((d) => 250)
				          .initialZoom(0.7)
				          .nodeHeight((d) => 175)
				          .childrenMargin((d) => 40)
				          .compactMarginBetween((d) => 15)
				          .compactMarginPair((d) => 80)
				          .nodeContent(function (d, i, arr, state) {
				          	if (d.data.area == "TAD"){
				                return `
				    		            <a href="#" onclick="showCard(${d.data.id})">
				    		            <div style="padding-top:30px;background-color:none;margin-left:1px;height:${
				    		              d.height
				    		            }px;border-radius:2px;overflow:visible">
				    		              <div style="height:${
				    		                d.height - 32
				    		              }px;padding-top:0px;background-color:#f6c23e70;border:1px solid lightgray;">

				    		                <img src=" ${
				    		                  d.data.imageUrl
				    		                }" style="margin-top:-30px;margin-left:${d.width / 2 - 30}px;border-radius:100px;width:60px;height:60px;" />

				    		               <div style="margin-right:10px;margin-top:15px;float:right">${
				    		                 d.data.id
				    		               }</div>
				    		               
				    		               <div style="margin-top:-30px;background-color:#2AB6E3;height:10px;width:${
				    		                 d.width - 2
				    		               }px;border-radius:1px"></div>

				    		               <div style="padding:20px; padding-top:35px;text-align:center">
				    		                   <div style="color:#111672;font-size:16px;font-weight:bold"> ${
				    		                     d.data.name
				    		                   } </div>
				    		                   <div style="color:#404040;font-size:16px;margin-top:4px"> ${
				    		                     d.data.positionName
				    		                   } </div>
				    		               </div> 
				    		               <div style="display:flex;justify-content:space-between;padding-left:15px;padding-right:15px;">
				    		                
				    		               </div>
				    		              </div>     
				    		      		  </div>
				    		      		  </a>
				    		  `;
				          	}else{
				                    return `
				        		            <div style="padding-top:30px;background-color:none;margin-left:1px;height:${
				        		              d.height
				        		            }px;border-radius:2px;overflow:visible">
				        		              <div style="height:${
				        		                d.height - 32
				        		              }px;padding-top:0px;background-color:white;border:1px solid lightgray;">

				        		                <img src=" ${
				        		                  d.data.imageUrl
				        		                }" style="margin-top:-30px;margin-left:${d.width / 2 - 30}px;border-radius:100px;width:60px;height:60px;" />

				        		               <div style="margin-right:10px;margin-top:15px;float:right">${
				        		                 d.data.id
				        		               }</div>
				        		               
				        		               <div style="margin-top:-30px;background-color:#3AB6E3;height:10px;width:${
				        		                 d.width - 2
				        		               }px;border-radius:1px"></div>

				        		               <div style="padding:20px; padding-top:35px;text-align:center">
				        		                   <div style="color:#111672;font-size:16px;font-weight:bold"> ${
				        		                     d.data.name
				        		                   } </div>
				        		                   <div style="color:#404040;font-size:16px;margin-top:4px"> ${
				        		                     d.data.positionName
				        		                   } </div>
				        		               </div> 
				        		               <div style="display:flex;justify-content:space-between;padding-left:15px;padding-right:15px;padding-bottom:10px">
				        		                 <div > Manages:  ${d.data._directSubordinates} 👤</div>  
				        		                 <div > Formation: ${d.data._totalSubordinates} 👤</div>    
				        		               </div>
				        		              </div>     
				        		      </div>
				        		  `;
				          	}
				            
				          })
				          .render();




                }
    });
 
 // d3
 //  .csv(
 //   "https://raw.githubusercontent.com/bumbeishvili/sample-data/main/org.csv"
 //  ).then((dataFlattened) => {
 //  	console.log(dataFlattened)
 //        chart = new d3.OrgChart()
 //          .container('.chart-container')
 //          .data(dataFlattened)
 //          .nodeWidth((d) => 250)
 //          .initialZoom(0.7)
 //          .nodeHeight((d) => 175)
 //          .childrenMargin((d) => 40)
 //          .compactMarginBetween((d) => 15)
 //          .compactMarginPair((d) => 80)
 //          .nodeContent(function (d, i, arr, state) {
 //            return `
 //            <div style="padding-top:30px;background-color:none;margin-left:1px;height:${
 //              d.height
 //            }px;border-radius:2px;overflow:visible">
 //              <div style="height:${
 //                d.height - 32
 //              }px;padding-top:0px;background-color:white;border:1px solid lightgray;">

 //                <img src=" ${
 //                  d.data.imageUrl
 //                }" style="margin-top:-30px;margin-left:${d.width / 2 - 30}px;border-radius:100px;width:60px;height:60px;" />

 //               <div style="margin-right:10px;margin-top:15px;float:right">${
 //                 d.data.id
 //               }</div>
               
 //               <div style="margin-top:-30px;background-color:#3AB6E3;height:10px;width:${
 //                 d.width - 2
 //               }px;border-radius:1px"></div>

 //               <div style="padding:20px; padding-top:35px;text-align:center">
 //                   <div style="color:#111672;font-size:16px;font-weight:bold"> ${
 //                     d.data.name
 //                   } </div>
 //                   <div style="color:#404040;font-size:16px;margin-top:4px"> ${
 //                     d.data.positionName
 //                   } </div>
 //               </div> 
 //               <div style="display:flex;justify-content:space-between;padding-left:15px;padding-right:15px;">
 //                 <div > Manages:  ${d.data._directSubordinates} 🤘👤</div>  
 //                 <div > Oversees: ${d.data._totalSubordinates} 👤</div>    
 //               </div>
 //              </div>     
 //      </div>
 //  `;
 //          })
 //          .render();
 //      });

 function showCard(id){
		$.ajax({
		url: "<?php echo base_url()?>TAD/employeeTKJP/selectData",
		type: "GET",
		dataType: "json",
		success: function(data) {   
		    
		        for (var key in data) {
		            if (data[key].Nopek == id) {

		            console.log(data[key])    
		            break;
		        }
		    }
		    // Perform edit action with the corresponding ID
		    Swal.fire({
		      title: 'Personnel Card',
		      html: '<div class="table-responsive px-2">'+
		      '<div class="row text-sm-left">'+
		          '<div class="col-lg-9 mb-4"> '+
		              '<div class="card bg-white text-black-50 shadow">'+
		                '<h5 style="margin: 10px;">Personal Information</h5>'+ //Personal Information
		                  '<hr class="sidebar-head my-0 bg-white"></hr>'+
		                  '<div class="row justify-content-md-right text-sm-left" style="margin: 10px;">'+
		                     `<div class="col-sm-2 text-weight-800">ID</div><div class="col-sm-4">${data[key].Nopek}</div>`+
		                      `<div class="col-sm-2">Birth Day</div><div class="col-sm-4">${data[key].Tgl_Lahir}</div>`+
		                      '<br>'+
		                      `<div class="col-sm-2">First Name</div><div class="col-sm-4">${data[key].Nama}</div>`+
		                      '<div class="col-sm-2">Birth Country</div><div class="col-sm-4">Indonesia</div>'+
		                      '<br>'+
		                      `<div class="col-sm-2">Marital Status</div><div class="col-sm-4">${data[key].Status_Pernikahan}</div>`+
		                      '<br>'+
		                      `<div class="col-sm-2">Tax Code</div><div class="col-sm-4">${data[key].Jumlah_Tanggungan}</div>`+
		                      '<br>'+
		                      `<div class="col-sm-2">Gender</div><div class="col-sm-4">${data[key].Jenis_Kelamin}</div>`+
		                      `<div class="col-sm-2">Religion</div><div class="col-sm-4">${data[key].Agama}</div>`+
		                      '<br>'+
		                      `<div class="col-sm-2">Birth Place</div><div class="col-sm-4">${data[key].Tempat_lahir}</div>`+
		                      '<div class="col-sm-2">Blood Group</div><div class="col-sm-4">AB</div>'+
		                      '<br>'+
		                      `<div class="col-sm-2">Address</div><div class="col-sm-10">${data[key].Alamat}</div>`+
		                      '<br>'+
		                  '</div>'+
		              '</div>'+
		          '</div>'+

		              '<div class="col-lg-3 mb-4"> '+
		                '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRudDbHeW2OobhX8E9fAY-ctpUAHeTNWfaqJA&usqp=CAU" style="width:100%;height:auto"> '+
		              '</div> '+
		          '<!-- Education -->'+
		        '<div class="col-lg-6 mb-4">'+
		            '<div class="card bg-white text-black-50 shadow">'+
		                '<h5 style="margin: 10px;">Education</h5>'+ 
		                '<hr class="sidebar-head my-0 bg-white"></hr>'+
		                '<div class="row justify-content-md-right text-sm-left" style="margin: 10px;">'+
		                    `<div class="col-md-4">Degree</div><div class="col-sm-8">${data[key].Tingkat_Pendidikan }</div>`+
		                    '<br>'+
		                    `<div class="col-sm-4">Last Majoring</div><div class="col-sm-8">${data[key].Jurusan_Pendidikan_Terakhir}</div>`+
		                    '<br>'+
		                    `<div class="col-sm-4">Last Institution</div><div class="col-sm-8">${data[key].Last_Education_Institution}</div>`+
		                    '<br>'+
		                    '<br>'+
		                '</div>'+
		            '</div>'+
		        '</div>'+
		        '<!-- Experience -->'+
		        '<div class="col-lg-6 mb-4">'+
		            '<div class="card bg-white text-black-50 shadow">'+
		                '<h5 style="margin: 10px;">Experience</h5>'+ 
		                '<hr class="sidebar-head my-0 bg-white"></hr>'+
		                '<div class="row justify-content-md-right text-sm-left" style="margin: 10px;">'+
		                    `<div class="col-md-6">First Work Experience</div><div class="col-sm-6">${data[key].Pengalaman_Kerja_Pertama}</div>`+
		                    '<br>'+
		                    `<div class="col-sm-6">First Joined Pertamina</div><div class="col-sm-6">${data[key].Bergabung_Pertama_kali_di_Pertamina}</div>`+
		                    '<br>'+
		                    `<div class="col-sm-6">Company Name Before SHU</div><div class="col-sm-6">${data[key].Nama_Perusahaan_Sebelum_SHU}</div>`+
		                    '<br>'+
		                    '<br>'+
		                '</div>'+
		            '</div>'+
		        '</div>'+
		       '<!-- Contacts -->'+
		        '<div class="col-lg-6 mb-4">'+
		            '<div class="card bg-white text-black-50 shadow">'+
		                '<h5 style="margin: 10px;">Contacts</h5>'+ 
		                '<hr class="sidebar-head my-0 bg-white"></hr>'+
		                '<div class="row justify-content-md-right text-sm-left" style="margin: 10px;">'+
		                    `<div class="col-md-4">Email</div><div class="col-sm-8">${data[key].email_pertamina}</div>`+
		                    '<br>'+
		                    `<div class="col-sm-4">Phone</div><div class="col-sm-8">${data[key].Phone}</div>`+
		                    '<br>'+
		                    '<br>'+
		                '</div>'+
		            '</div>'+
		        '</div>'+
		        '<!-- Contacts -->'+
		        '<div class="col-lg-6 mb-4">'+
		            '<div class="card bg-white text-black-50 shadow">'+
		                '<h5 style="margin: 10px;"> Emergency Contacts</h5>'+ 
		                '<hr class="sidebar-head my-0 bg-white"></hr>'+
		                '<div class="row justify-content-md-right text-sm-left" style="margin: 10px;">'+
		                    `<div class="col-md-4">Name</div><div class="col-sm-8">${data[key].Nama_Kontak_Emergency}</div>`+
		                    '<br>'+
		                    `<div class="col-sm-4">Phone</div><div class="col-sm-8">${data[key].Nomor_Kontak_Emergency}</div>`+
		                    '<br>'+
		                    '<br>'+
		                '</div>'+
		            '</div>'+
		        '</div>'+
		        
		        '<!-- Assignment Order -->'+
		        '<div class="col-lg-12 mb-4">'+
		            '<div class="card bg-white text-black-50 shadow">'+
		                '<h5 style="margin: 10px;">Assignment Order</h5>'+ 
		                '<hr class="sidebar-head my-0 bg-white"></hr>'+
		                '<div class="row justify-content-md-right text-sm-left" style="margin: 10px;">'+
		                    `<div class="col-md-6">Contract ./Period</div><div class="col-sm-6">${data[key].contractor_id}</div>`+
		                    '<br>'+
		                    `<div class="col-sm-6">Contractor</div><div class="col-sm-6">${data[key].Name}</div>`+
		                    '<br>'+
		                    `<div class="col-sm-6">Assignment Order No</div><div class="col-sm-6">${data[key].AO_No}</div>`+
		                    '<br>'+
		                    `<div class="col-sm-6">MRF No</div><div class="col-sm-6">${data[key].mrf_code}</div>`+
		                    '<br>'+
		                    `<div class="col-md-6">Title</div><div class="col-sm-6">${data[key].PosTitle}</div>`+
		                    '<br>'+
		                    `<div class="col-sm-6">Work Schedule</div><div class="col-sm-6">${data[key].Work_Schedule}</div>`+
		                    '<br>'+
		                    `<div class="col-sm-6">Point of Hire</div><div class="col-sm-6">${data[key].point_of_hire}</div>`+
		                    '<br>'+
		                    `<div class="col-sm-6">Period</div><div class="col-sm-6">${data[key].contract_start} -> ${data[key].contract_end}</div>`+
		                    '<br>'+
		                '</div>'+
		            '</div>'+
		        '</div>'+
		        '<div class="col-lg-6 mb-4">'+
		            '<div class="card bg-white text-black-50 shadow">'+
		                '<h5 style="margin: 10px;">Experience</h5>'+ 
		                '<hr class="sidebar-head my-0 bg-white"></hr>'+
		                '<div class="row justify-content-md-right text-sm-left" style="margin: 10px;">'+
		                    `<div class="col-md-6">Company's Operation Area</div><div class="col-sm-6">${data[key].PersSubArea_ID}</div>`+
		                    '<br>'+
		                    `<div class="col-sm-6">Company's Supervisor</div><div class="col-sm-6">${data[key].Company_ID}</div>`+
		                    '<br>'+
		                    `<div class="col-sm-6">Cost Center</div><div class="col-sm-6">${data[key].CostCenter}</div>`+
		                    '<br>'+
		                    `<div class="col-sm-6">Personnel Clasified/Category</div><div class="col-sm-6">${data[key].personnel_category}</div>`+
		                    '<br>'+
		                    '<br>'+
		                '</div>'+
		            '</div>'+
		        '</div>'+
		       
		        '</div>'+
		    '</div>',
		      width : 1200,
		      showCloseButton: true,
		    })
		}
	})
	}
</script>
<script type="text/javascript">
	
	
</script>