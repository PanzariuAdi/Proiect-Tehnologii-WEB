function create_in(args,c   ){
    var in_queries = []
    if(typeof args.countries!=='undefined')
        if(args.countries.length>0 ){
            in_queries.push("AND country_txt IN(" + args.countries.map(element=>{
                return c.escape(element) ;
            }).join(", ") + ")" );
        }   
    if(typeof args.regions!=='undefined')
        if(args.regions.length>0 ){
            in_queries.push("AND region_txt IN(" + args.regions.map(element=>{
                return c.escape(element);
            }).join(", ") + ")" );
        }    
    if(typeof args.cities!=='undefined')
        if(args.cities.length>0 ){
            in_queries.push("AND city IN(" + args.cities.map(element=>{
                return c.escape(element);
            }).join(", ") + ")" );
        }        
    if(typeof args.states!=='undefined')
        if(args.states.length>0 ){
            in_queries.push("AND provstate IN(" + args.states.map(element=>{
                return c.escape(element);
            }).join(", ") + ")" );
        }
    if(typeof args.motives!=='undefined')
        if(args.motives.length>0 ){
            in_queries.push("AND motive IN(" + args.motives.map(element=>{
                return c.escape(element);
            }).join(", ") + ")" );
        }
    if(typeof args.gangs!=='undefined')
        if(args.gangs.length>0 ){
            in_queries.push("AND gname IN(" + args.gangs.map(element=>{
                return c.escape(element);
            }).join(", ") + ")" );
        }    
    if(typeof args.wepTypes!=='undefined')
        if(args.wepTypes.length>0 ){
            in_queries.push("AND weaptype1_txt IN(" + args.wepTypes.map(element=>{
                return c.escape(element);
            }).join(", ") + ")" );
        }
        if(typeof args.wepSubtypes!=='undefined')
    if(args.wepSubtypes.length>0 ){
            in_queries.push("AND weapsubtype1_txt IN(" + args.wepSubtypes.map(element=>{
                return c.escape(element);
            }).join(", ") + ")" );
        }    
    if(typeof args.lossExtents!=='undefined')
        if(args.lossExtents.length>0 ){
            in_queries.push("AND propextent_txt IN(" + args.lossExtents.map(element=>{
                return c.escape(element);
            }).join(", ") + ")" );
        } 
    if(typeof args.months!=='undefined')
        if(args.months.length>0 ){
            in_queries.push("AND imonth IN(" + args.months.map(element=>{return c.escape(element)}).join(", ") + ")" );
        }       
    if(typeof args.years!=='undefined')
        if(args.years.length>0 ){
            in_queries.push("AND iyear IN(" + args.years.map(element=>{return c.escape(element)}).join(", ") + ")" );
        } 
    if(typeof args.attackTypes!=='undefined')
        if(args.attackTypes.length>0 ){
            in_queries.push("AND attacktype1_txt IN(" + args.attackTypes.map(element=>{
                return c.escape(element);
            }).join(", ") + ")" );
        }        
    if(typeof args.targetNatalities!=='undefined')
        if(args.targetNatalities.length>0 ){
            in_queries.push("AND natlty1_txt IN(" + args.targetNatalities.map(element=>{
                return c.escape(element);
            }).join(", ") + ")" );
        }  
        return in_queries;   
   }

   function create_between(args,c){
       var between_queries = []
       if(typeof args.attackUB !=='undefined' && typeof args.attackLB !=='undefined')
           between_queries.push("count(*) BETWEEN " + c.escape(args.attackLB) + " AND " + c.escape(args.attackUB)) 
       else
           if(typeof args.attackLB !=='undefined' && typeof args.attackUB =='undefined')
                between_queries.push("count(*) >" + c.escape(args.attackLB));
                else
                    if(typeof c.escape(args.attackUB) !=='undefined' && typeof c.escape(args.attackLB) =='undefined')
                            between_queries.push("count(*) <" + c.escape(args.attackUB));
        
        if(typeof args.casualitiesUB !=='undefined' && typeof args.casualitiesLB !=='undefined')
            between_queries.push("SUM(nkill) BETWEEN " + c.escape(args.casualitiesLB) + " AND " + c.escape(args.casualitiesUB)) 
        else
            if(typeof args.casualitiesLB !=='undefined' && typeof args.casualitiesUB =='undefined')
                between_queries.push("SUM(nkill) >" + c.escape(args.casualitiesLB));
                else
                    if(typeof args.casualitiesUB !=='undefined' && typeof args.casualitiesLB =='undefined')
                        between_queries.push("SUM(nkill) <" + c.escape(args.casualitiesUB));
                      
        if(typeof args.woundedUB !=='undefined' &&  typeof args.woundedLB !=='undefined')
            between_queries.push("SUM(nwound) BETWEEN " + c.escape(args.woundedLB) + " AND " + c.escape(args.woundedUB)) 
        else
            if(typeof args.woundedLB !=='undefined' && typeof args.woundedUB =='undefined')
                between_queries.push("SUM(nwound) >" + c.escape(args.woundedLB));
                else
                    if(typeof args.woundedUB !=='undefined' && typeof args.woundedLB =='undefined')
                        between_queries.push("SUM(nwound) <" + c.escape(args.woundedUB));

        if(typeof args.lossUB !=='undefined' && typeof args.lossLB !=='undefined')
            between_queries.push("SUM(propvalue) BETWEEN " + c.escape(args.lossLB) + " AND " + c.escape(args.lossUB)) 
        else
            if(typeof args.lossLB !=='undefined' && typeof args.lossUB =='undefined')
                between_queries.push("SUM(propvalue) >" + c.escape(args.lossLB));
                else
                    if(typeof args.lossUB !=='undefined' && typeof args.lossLB =='undefined')
                        between_queries.push("SUM(propvalue) <" + c.escape(args.lossUB));

        if(typeof args.ransomUB !=='undefined' && typeof args.ransomLB !=='undefined')
            between_queries.push("SUM(ransomamt) BETWEEN " + c.escape(args.ransomLB) + " AND " + c.escape(args.ransomUB)) 
        else
            if(typeof args.ransomLB !=='undefined' && typeof args.ransomUB =='undefined')
                between_queries.push("SUM(ransomamt) >" + c.escape(args.ransomLB));
                else
                    if(typeof args.ransomUB !=='undefined' && typeof args.ransomLB =='undefined')
                        between_queries.push("SUM(ransomamt) <" + c.escape(args.ransomUB));

        if(typeof args.terroristUB !=='undefined' && typeof args.terroristLB !=='undefined')
            between_queries.push("SUM(nperps) BETWEEN " + c.escape(args.terroristLB) + " AND " + c.escape(args.terroristUB)) 
        else
            if(typeof args.terroristLB !=='undefined' && typeof args.terroristUB =='undefined')
                between_queries.push("SUM(nperps) >" + c.escape(args.terroristLB));
                else
                    if(typeof args.terroristUB !=='undefined' && typeof args.terroristLB =='undefined')
                        between_queries.push("SUM(nperps) <" + c.escape(args.terroristUB));
       return between_queries;
   }
function create_boolean(args){
    var boolean_queries = [];
    if(typeof args.suicide!=='undefined'){
        var val;
        if(args.suicide)
            val = 1;
        else
            val = 0;
        boolean_queries.push("AND suicide="+val);
    }
    if(typeof args.extended!=='undefined'){
        var val;
        if(args.extended)
            val = 1;
        else
            val = 0;
        boolean_queries.push("AND extended="+val);
    }
    if(typeof args.ransom!=='undefined'){
        var val;
        if(args.ransom)
            val = 1;
        else
            val = 0;
        boolean_queries.push("AND ransom="+val);
    }
    if(typeof args.success!=='undefined'){
        var val;
        if(args.success)
            val = 1;
        else
            val = 0;
        boolean_queries.push("AND success="+val);
    }
    return boolean_queries
}
   module.exports = {create_between,create_in,create_boolean};