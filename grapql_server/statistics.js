const { ApolloServer, gql} = require('apollo-server');
const { buildFederatedSchema} = require('@apollo/federation');
const myLib = require("./utility/statistic-functions");
const port = 4001;

var mysql = require('mysql');
var c = mysql.createConnection({
  host     : 'localhost',
  user     : 'root',
  password : '',
  database : 'terrorism'

});

const  typeDefs = gql`

    type field {
        value: String
    }
    type statistic{
        field: String
        value: Int
    }
    
    extend type Query {
        fields(field: String!): [field] 
        statistics(xaxis:String!, yaxis:String!,
            countries:[String],regions:[String],cities:[String],states:[String],motives:[String],gangs:[String],wepTypes:[String],wepSubtypes:[String],lossExtents:[String],months:[Int],years:[Int],attackTypes:[String],targetNatalities:[String],
            attackUB:Int,attackLB:Int,casualitiesUB:Int,casualitiesLB:Int,woundedUB:Int,woundedLB:Int,lossUB:Int,lossLB:Int,ransomUB:Int,ransomLB:Int,terroristLB:Int,terroristUB:Int,
            suicide:Boolean,extended:Boolean,ransom:Boolean,success:Boolean): [statistic]
    }
    `;
    function create_boolean(args){
        var boolean_queries = [];
        console.log(args.suicide);
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

    function getData(args){
        return new Promise(function(resolve,reject){
        var query;
        var in_queries = myLib.create_in(args);
        
            
        var between_queries_arr = myLib.create_between(args);
        var between_queries;
        if(between_queries_arr.length>0)
            between_queries = "HAVING " + between_queries_arr.join(" AND ");
        else{
            between_queries = "";
        }     

        var boolean_queries = create_boolean(args);

        switch(args.yaxis){
            case 'attacks':
                query = "SELECT DISTINCT "+args.xaxis+" as field, count(*) as value FROM terrorism WHERE lower("+args.xaxis+") not like '%unknown%' and "+args.xaxis+" not like '' "+in_queries.join(" ")+" "+boolean_queries.join(" ")+" group by "+args.xaxis+" "+between_queries+" order by count(*) desc ";
                break; 
            default:
                query = "SELECT DISTINCT "+args.xaxis+" as field, SUM("+args.yaxis+") as value FROM terrorism WHERE lower("+args.xaxis+") not like '%unknown%' and "+args.xaxis+" not like ''"+in_queries.join(" ")+" "+ between_queries+" "+boolean_queries.join(" ")+" group by "+args.xaxis+"  order by SUM("+args.yaxis+") desc ";
                break;         
                  
        }
        console.log(query);
        c.query(query,function(err,result,fields){
            if (err)
                reject({field:"error: " + err.message,value:"code: "+err.code});
            resolve(result);
        });
    })
    }

const resolvers = {
    Query: {
        fields:(_,args)=>{
            return new Promise(function(resolve,reject){
                c.query("SELECT DISTINCT " + args.field + " as value FROM terrorism", function (err, result, fields) {
                    if (err)
                        reject({name:"error: " + err.message});
                    resolve(result);
                }); 
            });
        },
        statistics: (_,args) =>{
            return getData(args);
        }
    },
};

c.on('error', function(err) {
  console.log(err.code); 
});

const server = new ApolloServer({
    schema: buildFederatedSchema ([{typeDefs, resolvers}])
});

server.listen({port}).then(({url}) => {
    console.log(`Statistics ready at ${url}`);
});