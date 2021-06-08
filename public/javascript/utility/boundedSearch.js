export class boundedSearch{
    constructor(field,name,server_name){
        this.field = field;
        this.name = name;
        this.server_name = server_name
        document.getElementById(this.name.concat("LowerCheck")).addEventListener("click",(e)=>{this.lowerBoundChange()})
        document.getElementById(this.name.concat("UpperCheck")).addEventListener("click",(e)=>{this.upperBoundChange()})
    }

    lowerBoundChange(){
        var checked = document.getElementById(this.name.concat('LowerCheck')).checked;
        var result;
        if(checked){
            result='block';
        }
        else{
            result='none';
        }
    
        document.getElementById(this.name.concat('LowerValueDiv')).style.display=result;
    }
    upperBoundChange(){
        var checked = document.getElementById(this.name.concat('UpperCheck')).checked;
        var result;
        if(checked){
            result='block';
        }
        else{
            result='none';
        }
    
        document.getElementById(this.name.concat('UpperValueDiv')).style.display=result;
    }
    create_Query(){
        var query = "";
        var UpperCheck = document.getElementById(this.name.concat('UpperCheck')).checked;
        var LowerCheck = document.getElementById(this.name.concat('LowerCheck')).checked;
        if(UpperCheck){
            query = query.concat(this.server_name+"UB:"+ document.getElementById(this.name.concat('UpperValue')).value + ",");
        }
        if(LowerCheck){
            query= query.concat(this.server_name+"LB:"+ document.getElementById(this.name.concat('LowerValue')).value + ",");
        }
        return query;
    }
}