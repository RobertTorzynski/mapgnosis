var customIcons = { 
	
 "Red Disk": { icon: 'http://bike.zgroks.com/redDisk.php' }, 
 "Amber Disk": { icon: 'http://bike.zgroks.com/yellowDisk.php' }, 
 "Green Disk": { icon: 'http://bike.zgroks.com/greenDisk.php' }, 
 "Church": { icon: 'http://bike.zgroks.com/labelpurple.php?text=CH' }, 
 "Day Care": { icon: 'http://bike.zgroks.com/labelpurple.php?text=DC' }, 
 "School": { icon: 'http://bike.zgroks.com/labelpurple.php?text=SC' },                       
 "Historical": { icon: 'http://bike.zgroks.com/labelpurple.php?text=HI' },                       
 "Community Center": { icon: 'http://bike.zgroks.com/labelgreen.php?text=CC' },              
 "Community Garden": { icon: 'http://bike.zgroks.com/labelgreen.php?text=CG' },              
 "Farmers Market": { icon: 'http://bike.zgroks.com/labelgreen.php?text=FM' },                
 "Destination": { icon: 'http://www.zgroks.com/icons/destination.png' },                
 "Natural Area": { icon: 'http://bike.zgroks.com/labelgreen.php?text=NA' },                          
 "Park": { icon: 'http://bike.zgroks.com/labelgreen.php?text=PK' },                          
 "Playground": { icon: 'http://bike.zgroks.com/labelgreen.php?text=PG' },                    
 "Beauty Shop/Barber Shop": { icon: 'http://bike.zgroks.com/labelbrown.php?text=BS' },       
 "Convenience or Corner Store": { icon: 'http://bike.zgroks.com/labelbrown.php?text=CS' },   
 "Delicatessen": { icon: 'http://bike.zgroks.com/labelbrown.php?text=DE' },   
 "Dollar Store": { icon: 'http://bike.zgroks.com/labelbrown.php?text=D$' },   
 "Grocery Store": { icon: 'http://bike.zgroks.com/labelbrown.php?text=GR' },                 
 "Meat Market": { icon: 'http://bike.zgroks.com/labelbrown.php?text=MM' },                 
 "Liquor Store": { icon: 'http://bike.zgroks.com/labelbrown.php?text=L$' },                 
 "Establishment": { icon: 'http://bike.zgroks.com/labelbrown.php?text=E$' },                 
 "Drug Store": { icon: 'http://bike.zgroks.com/labelbrown.php?text=Rx' },                    
 "Restaurant": { icon: 'http://bike.zgroks.com/labelbrown.php?text=RS' },                    
 "Fire Station": { icon: 'http://bike.zgroks.com/labelred.php?text=FS&size=10' },            
 "Hospital": { icon: 'http://bike.zgroks.com/labelred.php?text=HO&size=10' },                
 "General Information": { icon: 'http://bike.zgroks.com/labelred.php?text=IN&size=10' },                
 "Police Station": { icon: 'http://bike.zgroks.com/labeler.php?text=PS' },                        
 "City Hall": { icon: 'http://bike.zgroks.com/labeler.php?text=CH' },                             
 "Trail": { icon: 'http://www.zgroks.com/icons/hiking/smallhiker.png' },                             
 "Park": { icon: 'http://www.zgroks.com/icons/hiking/smallpark.png' },                             
 "Town Hall": { icon: 'http://bike.zgroks.com/labeler.php?text=TH' },                             
 "Government Offices": { icon: 'http://bike.zgroks.com/labelgrey.php?text=GO&size=10' },     
 "Social Services": { icon: 'http://bike.zgroks.com/labelgrey.php?text=SS&size=10' },              
 "Non Government Organization": { icon: 'http://bike.zgroks.com/labelorange.php?text=NG&size=10' },
 "Health Care Provider": { icon: 'http://bike.zgroks.com/labelorange.php?text=HP&size=10' },    
  "Map Label": { icon: 'http://bike.zgroks.com/labelgreen.php?text=' },
 "Major Destination": { icon: 'http://assets.zgroks.com/attraction.png'},
 "Bike Shop": { icon: 'http://assets.zgroks.com/bikeShop.png'},
 "Bicycle Facility": { icon: 'http://assets.zgroks.com/bicycle.png'},
 "Blue Disk": { icon: 'http://assets.zgroks.com/blueDisk.png'},
 "Green Disk": { icon: 'http://assets.zgroks.com/greenDisk.png'},
 "Grey Disk": { icon: 'http://assets.zgroks.com/greyDisk.png'},
 "Trail": { icon: 'http://assets.zgroks.com/hiker.png'},
 "Park": { icon: 'http://assets.zgroks.com/park.png'},
 "Poor Conditions": { icon: 'http://assets.zgroks.com/redDisk.png'},
 "Yellow Disk": { icon: 'http://assets.zgroks.com/yellowDisk.png'},
 "Trailhead Parking": { icon: 'http://assets.zgroks.com/trailheadParking.png'}
 }; // end of json object var customIcons that holds the icon definitions note no comma previous line

// "<tr><td>Details:</td> <td><input type='text' id='address' size='40'/></td> </tr>" +   moved up temporarily

var html = "<div><table>" +
"<tr><td title='Title' ><b>Title:</b></td> <td><input type='text' id='name' size='20'/></td></tr>" +
"<tr><td title='Comments'><b>Comments:</b></td><td><input type = 'text' name= 'comments' id='comments2' size='20'/>" + 
"</textarea></td> </tr>" +
"<tr><td title='Name' ><b>Name:</b></td> <td><input type='text' id='userName' size='20'/> </td> </tr>" +
"<tr><td title='Please Choose Icon' ><b>Type:</b></td> <td><select id='type'>" + 
"<option value='Destination' selected>Point of Interest</option>" +
"<option value='Poor Conditions'>Poor Conditions</option>" +
"<option value='Major Destination'>Major Attraction</option>" +
"<option value='Trail'>Trail</option>" +
"<option value='Park'>Park</option>" +
"<option value='Bicycle Facility'>Bicycle Facility</option>" +
"<option value='Bike Shop'>Bike Shop</option>" +
"<option value='Park'>Park</option>" +
"<option value='Trailhead Parking'>Trailhead Parking</option>" +
"<option value='Map Label'>Add Your Own Label</option>" +
"</select> </td></tr>" +
"<tr><td><input type='button' title='Click Here to Save to Map' value='Save' onclick='saveData()'/></td></tr></table></div>";