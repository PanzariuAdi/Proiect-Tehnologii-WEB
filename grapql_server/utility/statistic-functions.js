function create_in(args){
    var in_queries = []
    if(typeof args.countries!=='undefined')
        if(args.countries.length>0 ){
            in_queries.push("AND country_txt IN(" + args.countries.map(element=>{
                return "'"+element+"'";
            }).join(", ") + ")" );
        }   
    if(typeof args.regions!=='undefined')
        if(args.regions.length>0 ){
            in_queries.push("AND region_txt IN(" + args.regions.map(element=>{
                return "'"+element+"'";
            }).join(", ") + ")" );
        }    
    if(typeof args.cities!=='undefined')
        if(args.cities.length>0 ){
            in_queries.push("AND city IN(" + args.cities.map(element=>{
                return "'"+element+"'";
            }).join(", ") + ")" );
        }        
    if(typeof args.states!=='undefined')
        if(args.states.length>0 ){
            in_queries.push("AND provstate IN(" + args.states.map(element=>{
                return "'"+element+"'";
            }).join(", ") + ")" );
        }
    if(typeof args.motives!=='undefined')
        if(args.motives.length>0 ){
            in_queries.push("AND motive IN(" + args.motives.map(element=>{
                return "'"+element+"'";
            }).join(", ") + ")" );
        }
    if(typeof args.gangs!=='undefined')
        if(args.gangs.length>0 ){
            in_queries.push("AND gname IN(" + args.gangs.map(element=>{
                return "'"+element+"'";
            }).join(", ") + ")" );
        }    
    if(typeof args.wepTypes!=='undefined')
        if(args.wepTypes.length>0 ){
            in_queries.push("AND weaptype1_txt IN(" + args.wepTypes.map(element=>{
                return "'"+element+"'";
            }).join(", ") + ")" );
        }
        if(typeof args.wepSubtypes!=='undefined')
    if(args.wepSubtypes.length>0 ){
            in_queries.push("AND weapsubtype1_txt IN(" + args.wepSubtypes.map(element=>{
                return "'"+element+"'";
            }).join(", ") + ")" );
        }    
    if(typeof args.lossExtents!=='undefined')
        if(args.lossExtents.length>0 ){
            in_queries.push("AND propextent_txt IN(" + args.lossExtents.map(element=>{
                return "'"+element+"'";
            }).join(", ") + ")" );
        } 
    if(typeof args.months!=='undefined')
        if(args.months.length>0 ){
            in_queries.push("AND imonth IN(" + args.months.join(", ") + ")" );
        }       
    if(typeof args.years!=='undefined')
        if(args.years.length>0 ){
            in_queries.push("AND iyear IN(" + args.years.join(", ") + ")" );
        } 
    if(typeof args.attackTypes!=='undefined')
        if(args.attackTypes.length>0 ){
            in_queries.push("AND attacktype1_txt IN(" + args.attackTypes.map(element=>{
                return "'"+element+"'";
            }).join(", ") + ")" );
        }        
    if(typeof args.targetNatalities!=='undefined')
        if(args.targetNatalities.length>0 ){
            in_queries.push("AND natlty1_txt IN(" + args.targetNatalities.map(element=>{
                return "'"+element+"'";
            }).join(", ") + ")" );
        }  
        return in_queries;   
   }

   function create_between(args){
       var between_queries = []
       if(typeof args.attackUB !=='undefined' && typeof args.attackLB !=='undefined')
           between_queries.push("count(*) BETWEEN " + args.attackLB + " AND " + args.attackUB) 
       else
           if(typeof args.attackLB !=='undefined' && typeof args.attackUB =='undefined')
                between_queries.push("count(*) >" + args.attackLB);
                else
                    if(typeof args.attackUB !=='undefined' && typeof args.attackLB =='undefined')
                            between_queries.push("count(*) <" + args.attackUB);
        
        if(typeof args.casualitiesUB !=='undefined' && typeof args.casualitiesLB !=='undefined')
            between_queries.push("SUM(nkill) BETWEEN " + args.casualitiesLB + " AND " + args.casualitiesUB) 
        else
            if(typeof args.casualitiesLB !=='undefined' && typeof args.casualitiesUB =='undefined')
                between_queries.push("SUM(nkill) >" + args.casualitiesLB);
                else
                    if(typeof args.casualitiesUB !=='undefined' && typeof args.casualitiesLB =='undefined')
                        between_queries.push("SUM(nkill) <" + args.casualitiesUB);
                      
        if(typeof args.woundedUB !=='undefined' &&  typeof args.woundedLB !=='undefined')
            between_queries.push("SUM(nwound) BETWEEN " + args.woundedLB + " AND " + args.woundedUB) 
        else
            if(typeof args.woundedLB !=='undefined' && typeof args.woundedUB =='undefined')
                between_queries.push("SUM(nwound) >" + args.woundedLB);
                else
                    if(typeof args.woundedUB !=='undefined' && typeof args.woundedLB =='undefined')
                        between_queries.push("SUM(nwound) <" + args.woundedUB);

        if(typeof args.lossUB !=='undefined' && typeof args.lossLB !=='undefined')
            between_queries.push("SUM(propvalue) BETWEEN " + args.lossLB + " AND " + args.lossUB) 
        else
            if(typeof args.lossLB !=='undefined' && typeof args.lossUB =='undefined')
                between_queries.push("SUM(propvalue) >" + args.lossLB);
                else
                    if(typeof args.lossUB !=='undefined' && typeof args.lossLB =='undefined')
                        between_queries.push("SUM(propvalue) <" + args.lossUB);

        if(typeof args.ransomUB !=='undefined' && typeof args.ransomLB !=='undefined')
            between_queries.push("SUM(ransomamt) BETWEEN " + args.ransomLB + " AND " + args.ransomUB) 
        else
            if(typeof args.ransomLB !=='undefined' && typeof args.ransomUB =='undefined')
                between_queries.push("SUM(ransomamt) >" + args.ransomLB);
                else
                    if(typeof args.ransomUB !=='undefined' && typeof args.ransomLB =='undefined')
                        between_queries.push("SUM(ransomamt) <" + args.ransomUB);

        if(typeof args.terroristUB !=='undefined' && typeof args.terroristLB !=='undefined')
            between_queries.push("SUM(nperps) BETWEEN " + args.terroristLB + " AND " + args.terroristUB) 
        else
            if(typeof args.terroristLB !=='undefined' && typeof args.terroristUB =='undefined')
                between_queries.push("SUM(nperps) >" + args.terroristLB);
                else
                    if(typeof args.terroristUB !=='undefined' && typeof args.terroristLB =='undefined')
                        between_queries.push("SUM(nperps) <" + args.terroristUB);
       return between_queries;
   }

   module.exports = {create_between,create_in};