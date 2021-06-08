export class booleanSearch{
    constructor(field){
        this.field = field;
    }
    create_Query(){
        var val = document.getElementById(this.field+"Form").value;
        if(val === "Yes"){
            return this.field+":true,";
        }
        if(val ==="No"){
            return this.field+":false,";
        }
        return "";
    }
}